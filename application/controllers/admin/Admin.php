<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/admin_login_view');
	}
	public function admin_login()
	{
		extract($_POST);
		if(isset($login))
		{
		}
		else
		{
			redirect('admin/admin');
		}
	}
}
