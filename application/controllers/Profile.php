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
      $this->profile_model->load_phone_number();
      $this->profile_model->load_standing();
      $this->profile_model->load_linkedin_account();
      $this->load->helper(array('form', 'url'));
      //$this->load->helper('simple_html_dom');
   }
   
/* INDEX
************************************************************************************/
   public function index()
   {
      /* SET PROFILE FIELDS
      ******************************************************************************/
      $data = array(
         'university' => $this->profile_model->get_university(),
         'files' => $this->get_files(),
         'profile_picture' => $this->profile_model->get_profile_picture(),
         'major' => $this->profile_model->get_major(),
         'phone' => $this->profile_model->get_phone_number(),
         'linkedin' => $this->profile_model->get_linkedin_account(),
         'education' => $this->profile_model->get_standing(),
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
      //$directory = "/var/www/html/files/uploads";
      $directory;
      
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      {
         $directory = "/var/www/html/users/".$this->session->user_id."/research";
      }
      else
      {
         $directory = "/var/www/html/users/research";
      }
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
               else if (is_dir('./../files/'.$file)) continue;
               else
               {
                  $this->filename = $file;
                  $this->profile_model->upload_filename($file);
               }

               if ($this->profile_model->is_userfile($this->filename))
               {
                  $result.='
                     <li class="col s12 m6 l4">
                        <div id="'.$this->filename.'" class="card card-border z-depth-2">
                           <div class="card-content">
                              <h5 class="card-title grey-text text-darken-2">
                                 <strong>
                                    <small>
                                       <span class="blue-text text-darken-2">
                                          File:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       </span>
                                          '.$this->remove_extension($file).'
                                    </small>
                                 </strong>
                              </h5>
                              <embed src="'.$file.'" type="application/pdf" width="100%" height="100%">
                                 <div align="right">                                 
                                    <strong class="green-text">
                                       <a class="green-text"
                                          href="/users/'.$this->session->user_id.'/research/'.$file.'"
                                          target="_blank">View</a>
                                       <script type="text/javascript">delete_link();</script>
                                    </strong>                                 
                                 </div>
                              </embed>
                           </div>
                        </div>
                     </li>
                  ';
               }
               else { continue; }
            }
            $result.='</ul>';
         }
      }
      return $result;
   }
	
/* DO UPLOAD PROFILE PICTURE
************************************************************************************/
	public function do_upload_pic()
	{
      $config['upload_path'] = './users/'.$this->session->user_id.'/pictures/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size']	= '1000';
      $config['max_width']  = '10240';
      $config['max_height']  = '7680';

      $this->load->library('upload', $config);

      if ( !$this->upload->do_upload())
      {
         $error = array('error' => $this->upload->display_errors());
         redirect("profile");         
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         $this->profile_model->insert_profile_picture($this->upload->data('file_name'));
         redirect("profile");
      }
    }
   
/* DO UPLOAD
************************************************************************************/
   public function do_upload()
   {
      $config['upload_path'] = './users/'.$this->session->user_id.'/research/';
      $config['allowed_types'] = 'pdf';
      $config['max_size']	= '1000';
      $config['max_width']  = '1024';
      $config['max_height']  = '768';

      //$this->load->helper('file');
      $this->load->library('upload', $config);

      if ( !$this->upload->do_upload())
      {
         $error = array('error' => $this->upload->display_errors());
         redirect("profile");         
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         /* DEBUGGING USE
         ***************************************************************************/
         /* $this->session->set_userdata('data', $this->upload->data('file_name'));*/
         redirect("profile");
      }
   }
   
/* DELETE
************************************************************************************/
   public function delete()
   {
      $file = $this->remove_url($this->input->post('action'));
      $this->profile_model->delete_filename($file);
      $this->delete_file($this->session->user_id, $file);
   }
   
/* DELETE FILE
************************************************************************************/
   public function delete_file($user_id, $file)
   {
      //$path='./files/uploads/'.$file;
      $path='./users/'.$user_id.'/research/'.$file;
      if (!unlink($path)) { echo ("Error deleting ".$file."."); }
      else { redirect('profile'); }
   }
   
/* REMOVE EXTENSION (filename) : returns substring
************************************************************************************/
   public function remove_extension($file)
   {
      $i;
      for ($i = (strlen($file)-1); $i >= 0; $i--) { if ($file[$i] == '.') break; }
      return substr($file, 0, $i);
   }
   
/* REMOVE URL (filename) : returns substring (for file delete)
************************************************************************************/  
   public function remove_url($file)
   {
      $i;
      for ($i = (strlen($file)-1); $i >= 0; $i--) { if ($file[$i] == '/') break; }
      return substr($file, $i+1, strlen($file)-1);
   }
}
?>