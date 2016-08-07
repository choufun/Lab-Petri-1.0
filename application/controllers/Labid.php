<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
/* PROFILE CONTROLLER
****************************************************************************/
class Labid extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('labid_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      //$this->load->helper('simple_html_dom');
   }
   
/* INDEX
****************************************************************************/
   public function index()
   {
      
/* VIEW :: profile
****************************************************************************/    
      $this->load->view('templates/header');
      $this->load->view('labid', $this->labid_model->get_profile());
      $this->load->view('templates/footer');
   }

/* UPDATE :: contacts or education
****************************************************************************/
	public function update()
	{      
      if ($this->input->post('contacts') == 'contacts')
      {
         // CONTACTS FORM VALIDATION
         $this->form_validation->set_rules('email','email','trim|required');
         $this->form_validation->set_rules('phone','phone','trim|required');
         $this->form_validation->set_rules('linkedin','linkedin','trim|required');         
         $this->labid_model->update_contacts(
                                                array(
                                                      'user_id' => $this->session->user_id,
                                                      'email' => $this->input->post('email'),
                                                      'phone' => $this->input->post('phone'),
                                                      'linkedin' => $this->input->post('linkedin'),
                                                )
         );
      }
      if ($this->input->post('education') == 'education')
      {
         // EDUCATION FORM VALIDATION
         $this->form_validation->set_rules('university','university','trim|required');
         $this->form_validation->set_rules('major','major','trim|required');
         $this->form_validation->set_rules('standing','standing','trim|required');         
         $this->profile_model->update_education(
               array(
                     'user_id' => $this->session->user_id,
                     'university' => $this->input->post('university'),
                     'major' => $this->input->post('major'),
                     'standing' => $this->input->post('standing'),
               )
         );
      }
      redirect('labid');
   }
   
/* DELETE :: bookmarks
****************************************************************************/ 
   public function delete_bookmark()
   {
      $this->labid_model->delete_bookmark(
                  array(
                     'bookmark_id' => $this->input->post('bookmark'),
                     'user_id' => $this->session->user_id,
                  )
      );
      redirect('labid');
   }
	
/* DELETE :: posts
****************************************************************************/
   public function delete_post()
   {
      $this->labid_model->delete_post(
                  array (
                     'post_id' => $this->input->post('post'),
                     'comment_id' => $this->input->post('comment'),
                     'user_id' => $this->session->user_id,
                  )
      );
      redirect('labid');
   }
	
/* UPLOAD :: profile picture
****************************************************************************/
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
         redirect('labid');         
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         $this->labid_model->insert_profile_picture($this->upload->data('file_name'));
         redirect('labid');
      }
	}
	
/* DOWNLOAD :: resume
****************************************************************************/
	public function resume()
	{
      $this->load->library('pdf');
      $this->fpdf->SetFont('Arial','B',20);
	   
	   // Header, only needs to appear on the first page
	   $this->fpdf->Image('assets/img/Logo.png',10,6,30);
	   
		// Need method to accomadate the # of characters the person's name may have
		// 70 total char for full name, so 35 char for first name
		// If first name = 35 characters, shift 30 cm to the right
		// This applies to all other variables
	   $this->fpdf->Cell(120);
      $this->fpdf->Cell(40,10, $this->session->firstname." ".$this->session->lastname, 0, 1);
      
	   $this->fpdf->SetFont('Arial','B',10);
	   $this->fpdf->Cell(120);
      $this->fpdf->Cell(40,10, $this->labid_model->get_university(), 0, 1);
		
		$this->fpdf->Cell(120);
      $this->fpdf->Cell(40,10, 'Major: '.$this->labid_model->get_major(), 0, 1);
		
		$this->fpdf->Cell(120);
      $this->fpdf->Cell(40,10, 'Phone: '.$this->labid_model->get_phone(), 0, 1);
	   
	   // Footer, located in the fpdf file under Footer() function
		// No immediate solution to inherit Footer() and Header() functions from FPDF instance
	   
	   $this->fpdf->SetDisplayMode('real', 'continuous');
      $this->fpdf->Output('D',$this->session->firstname." ".$this->session->lastname.'.pdf','TRUE');
      
      unset($this->fpdf);
      unset($this->pdf);
   }

}
?>