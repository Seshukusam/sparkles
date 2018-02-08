<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_model');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function paging()
	{
	   $this->load->library('pagination');
	   $config['base_url']=base_url()."index.php/welcome/paging/"; 
		$config['total_rows'] = 8;
		$config['per_page'] = 2;
		//$config['next_link'] = 'Next';
		//$config['prev_link'] = 'Previous';
		//$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		/*getting records for db per page*/
	     $si=$this->uri->segment(3);
		if(!empty($si))
			$si=$si;
		else
			$si=0;
$result=$this->user_model->get_all_records($config['per_page'],$si);
		$data['recs']=$result;
		$data['links']=$this->pagination->create_links();
		$this->load->view('pagination_view',$data);
		/*end*/
	}
	public function form_test()
	{
			$this->load->view('form_view');
	}
	public function validate_form()
	{
		
		$this->load->library('form_validation');

	$this->form_validation->set_rules('name', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Password', 'required',
      array('required' => 'You must provide a %s.')
                );
                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('form_view');
                }
	}
	public function send_mail()
	{
		$this->load->library("email");
		$this->email->from('seshu.kusam@gmail.com', 'Seshu');
		$this->email->to('seshu.richlabz@gmail.com');
		$this->email->cc('knsr1987@gmail.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Test Email');
		$this->email->message('Hi Testing this email class');
		$sent=$this->email->send();
		if($sent)
			echo "sent";
		else
			echo "Not sent";

	}
	public function test_download()
	{
		$this->load->helper('download');
		$data = 'Here is some text!';
		$name = 'mytext.txt';
		force_download($name, $data);

	}
	public function qrcode()
	{
		$this->load->library('ciqrcode');
		$params['data'] = 'Seshu';
		$params['level'] = 'H';
		$params['size'] = 10;
		$file_name="bz".rand(100000,999999);
$params['savename'] = FCPATH."/uploads/qrcodes/"."$file_name.png";
		$this->ciqrcode->generate($params);
		echo '<img src="'.base_url().'tes.png" />';
	}
	   public function test_upload()
        {
       $this->load->view('file_upload_view', array('error' => ' ' ));
        }

	public function do_upload()
	{
		   $config['upload_path']          = './uploads/';
           $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('userfile'))
                {
         $error = array('error' => $this->upload->display_errors());

          $this->load->view('file_upload_view', $error);
                }
                else
                {
              
                   $this->load->view('file_upload_success_view');
                }

	}
	public function test_fun()
	{
			$this->load->library('test');
			$this->test->test_lib();
	}
	public function load_batch_view()
	{
		$this->load->view('insert_batch_view');
	}
	public function test_calendar()
	{
		$this->load->library('calendar');
		$date_links=array(
		'5'=>'http://localhost/newci/index.php/user/get_users_bydate/'.date('m'),
		'8'=>'http://google.com',
		'10'=>'http://google.com'
		);
		echo $this->calendar->generate(2017,11,$date_links);
	}
	public function template()
	{
		$data['title']="Login";
		$data['body']="main_view";
		$this->load->view('template',$data);
	}
	public function template2()
	{
		$data['title']="Register";
		$data['body']="main2_view";
		$this->load->view('template',$data);
	}
}
