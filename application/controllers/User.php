<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	
	public function validation_test()
	{
		$this->load->view('form_validation_view');
	}
	public function test_server_validations()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','username','required|is_unique[users_tbl.name]
		',array('required'=>'Name is required','is_unique'=>'Entered name is already exists'));
$this->form_validation->set_rules('password','userpassword','required');
		if($this->form_validation->run()==false)
		{
				$this->load->view('form_validation_view');
		}	
		else
		{
				echo "Success";
				//db logic we have to write here 
		}
	}
	
	public function test_url()
	{

			echo uri_string();
			
		
	}
	public function download_test()
	{
			$this->load->helper('download');
			$data="This is adding content while downloading";
			$name="my.txt";
			force_download($name,$data);
	}
	public function save_download()
  { 
		//load mPDF library
		$this->load->library('m_pdf');
		//load mPDF library
 
 
		//now pass the data//
		 $this->data['title']="MY PDF TITLE 1.";
		 $this->data['description']="dear user";
		 $this->data['description']=$this->official_copies;
		 //now pass the data //
 
		
		$html=$this->load->view('pdf_output',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
 	 
		//this the the PDF filename that user will get to download
		$pdfFilePath ="mypdfName-".time()."-download.pdf";
 
		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "D");
		 
		 	
  }
  public function insert_list()
  {
	 $this->load->library('user_agent');

if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}

echo $agent;

  }
}
?>

