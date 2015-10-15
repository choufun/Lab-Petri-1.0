<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* PROFILE CONTROLLER
************************************************************************************/
class Profile extends CI_Controller
{
/* FIELD
************************************************************************************/
   private $error = '';
   private $filename;
   
/* CONSTRUCTOR
************************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('profile_model');
      $this->profile_model->load_major();
      $this->profile_model->load_university();
      $this->load->helper(array('form', 'url'));
      //$this->load->helper('simple_html_dom');
   }
   
/* INDEX
************************************************************************************/
   public function index()
   {      
      $data = array(
         'major' => $this->profile_model->get_major(),
         'university' => $this->profile_model->get_university(),
         'files' => $this->get_files(),
         'error' => $this->error
      );
      
      $this->load->view('templates/header');
      $this->load->view('profile', $data);
      $this->load->view('templates/footer');
   }
   
/* GET FILES
*************************************************************************************
   NOTES:
         Descending Order: scandir($directory,1)
         $result.= '<embed src="assets/pdf/'.$file.'" width="100" height="400"><br>';
         $result.= '<iframe src="assets/pdf/'.$file.'"width="100" height="400"></iframe><br>';
************************************************************************************/
   public function get_files()
   {
      $result = "";
      $directory = "files/uploads";

      $directory_result = scandir($directory);
      if (sizeof($directory_result) <= 2)
      {
         $result.='
                   <h5 align="center">
                     Starting Building Your Portfolio
                     <br>
                     <small><small>~ upload a file ~</small></small>
                   </h5>
                  ';
      }
      else
      {
         $result.='<ul>';
         foreach ($directory_result as $file)
         {
            if ('.' === $file) continue;
            else if ('..' === $file) continue;
            else if (is_dir('./files/'.$file)) continue;
            else
            {
               $this->filename = $file;
               $this->profile_model->upload_filename($file);
            }
            
            if ($this->profile_model->is_userfile($this->filename))
            {
               $result.='
                   <li>
                     <div id="'.$this->filename.'" class="card index-content">
                        <div class="card-content">
                           <span class="card-title activator blue-text text-darken-2">
                              <h5 class="blue-text text-darken-2">
                                 <strong>'.$this->remove_extension($file).'</strong>
                                 <i class="material-icons right">more_vert</i>
                              </h5>
                           </span>
                           <object data="'.$file.'" type="application/pdf" width="100%" height="100%">
                              <div align="right">
                                 <strong>
                                    <a class="light-blue-text" href="files/uploads/'.$file.'" target="_blank">
                                       View
                                    </a>
                                 </strong>
                                 <strong>
                                    <script type="text/javascript">delete_link();</script>
                                 </strong>
                              </div>
                           </object>
                        </div>
                        <div class="card-reveal">
                           <span class="card-title activator blue-text text-darken-2">
                              <h5 class="blue-text text-darken-2">
                                 <strong>'.$this->remove_extension($file).'</strong>
                                 <i class="material-icons right">close</i>
                              </h5>
                           </span>
                           <p>
                              <strong>Summary: This is a sample test.</strong>
                           </p>
                        </div>
                     </div>
                  </li>
               ';
               $result.='</ul>';
            }
            else
            {
               continue;
            } 
         }  
      }
      return $result;
   }
   
/* DO UPLOAD
************************************************************************************/
	public function do_upload()
	{
      $config['upload_path'] = './files/uploads';
      $config['allowed_types'] = 'jpg|png|jpeg|pdf';
      $config['max_size']	= '1000';
      $config['max_width']  = '1024';
      $config['max_height']  = '768';

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload())
      {
         $error = array('error' => $this->upload->display_errors());
         redirect("profile/");         
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         redirect("profile/");
      }
	}
   
/* DELETE
************************************************************************************/
   public function delete()
   {
      $file = $this->remove_url($this->input->post('action'));
      $this->profile_model->delete_filename($file);
      $this->delete_file($file);
   }
   
/* DELETE FILE
************************************************************************************/
   public function delete_file($file)
   {
      $path='files/uploads/'.$file;
      if (!unlink($path))
      {
         echo ("Error deleting ".$file.".");
      }
      else
      {
         redirect('profile');
      }
   }
   
/* REMOVE EXTENSION (filename) : returns substring
************************************************************************************/
   public function remove_extension($file)
   {
      $i;
      for ($i = (strlen($file)-1); $i >= 0; $i--)
      {
         if ($file[$i] == '.') break;
      }
      return substr($file, 0, $i);
   }
   
/* REMOVE URL (filename) : returns substring (for file delete)
************************************************************************************/  
   public function remove_url($file)
   {
      $i;
      for ($i = (strlen($file)-1); $i >= 0; $i--)
      {
         if ($file[$i] == '/') break;
      }
      return substr($file, $i+1, strlen($file)-1);
   }
}
?>