<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
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
      $this->profile_model->load_pictures();
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
         'profile_picture' => $this->profile_model->get_profile_picture(),
         /*'pictures' => $this->list_pictures(),*/
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
         if (!($this->profile_model->has_userfile()))
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
                        <div id="'.$this->filename.'" class="card card-border">
                           <div class="card-content">
                              <span class="card-title activator">
                                 <h5 class="blue-text text-darken-2">
                                    <strong>
                                       <span class="title grey-text text-darken-2">
                                          <!-- <i class="material-icons">subject</i> -->
                                          File: 
                                       </span>
                                    </strong>
                                    <strong>'.$this->remove_extension($file).'</strong>
                                    <i class="material-icons right light-blue-text">import_export</i>
                                 </h5>
                              </span>
                              <!--<object data="'.$file.'" type="application/pdf" width="100%" height="100%">-->
                              <embed src="'.$file.'" type="application/pdf" width="100%" height="100%">
                                 <div align="right">
                                    <strong>
                                       <a class="light-blue-text" href="files/uploads/'.$file.'" target="_blank">
                                          View
                                       </a>
                                    </strong>
                                    <strong>
                                       <script type="text/javascript">
                                          delete_link();
                                       </script>
                                    </strong>
                                 </div>
                              </embed>
                              <!--</object>-->
                           </div>
                           <div class="card-reveal">
                              <span class="card-title activator blue-text text-darken-2">
                                 <h5 class="blue-text text-darken-2">
                                    <strong>'.$this->remove_extension($file).'</strong>
                                    <i class="material-icons right">close</i>
                                 </h5>
                              </span>
                              <h6>
                                 <strong>Abstract:</strong>
                              </h6>
                              <h6>
                                 <small>This is a sample test.</small>
                              </h6>
                           </div>
                        </div>
                     </li>
                  ';
                  $result.='</ul>';
               }
               else { continue; } 
            }
         }
      }
      return $result;
   }
   
/* LIST PICTURES
************************************************************************************/
/*   public function list_pictures()
   {
      $result = $this->profile_model->get_pictures();
      $pictures = "";
      foreach ($result as $row)
      {
         $pictures.='<img class="col s3" src="files/profile_picture/'.$row->filename.'"
                      height="40" width="40">';
      }
      
      return $pictures;
   }
*/
	
/* DO UPLOAD PROFILE PICTURE
************************************************************************************/
	public function do_upload_pic()
	{
      $config['upload_path'] = './files/profile_picture';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size']	= '1000';
      $config['max_width']  = '10240';
      $config['max_height']  = '7680';

      $this->load->library('upload', $config);

      if ( !$this->upload->do_upload())
      {
         $error = array('error' => $this->upload->display_errors());
         redirect("profile/");         
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         $this->profile_model->insert_profile_picture($this->upload->data('file_name'));
         redirect("profile/");
      }
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

      if ( !$this->upload->do_upload())
      {
         $error = array('error' => $this->upload->display_errors());
         redirect("profile/");         
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         /* DEBUGGING USE
         ***************************************************************************/
         /* $this->session->set_userdata('data', $this->upload->data('file_name'));*/
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