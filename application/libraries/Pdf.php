<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf
{   
   
/* CONSTRUCTOR
****************************************************************************/
   public function __construct()
   {
      require_once APPPATH.'third_party/fpdf181/fpdf.php';
      
      $pdf = new FPDF('P', 'mm', 'A4');
      $pdf->AddPage();
      
      $CI = &get_instance();
      $CI->fpdf = $pdf;
   }
   
   	
/* DOWNLOAD :: resume_options
 * 
 * Give more options for the user to select what kind of resume layout they
 * want. Possibly changing different fonts, size, etc.
****************************************************************************
	public function resume_options($opt) {
		$this->load->library('pdf');
		switch($opt) {
			case 'a':
				break;
			case 'b':
				break;
			case 'c':
				break;
		}
	}
	
*/
}