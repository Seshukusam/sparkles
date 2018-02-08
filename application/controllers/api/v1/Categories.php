<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends CI_Controller {
	public function getCategories(){
		$this->load->model('api/v1/category_model');
		$response=array();
		$resp=$this->category_model->get_categories();
		if(!empty($resp)){
			$response['code']=200;
			$response['message']='success';
			$response['categories']=$resp;
			echo json_encode($response);
		}
		else{
			$response['code']=204;
			$response['message']='no result';
			$response['categories']=$resp;
			echo json_encode($response);
		}
	}
	/*adding categories*/
	public function addCategory(){
	$this->load->model('api/v1/category_model');
	$response=array();
	$reqdata=file_get_contents('php://input');
		if($this->isJson($reqdata))
		{
		$reqdata=json_decode(file_get_contents('php://input'));
		$data=array(
		'cat_name'=>$reqdata->cat_name,
		'cat_status'=>$reqdata->cat_status
		);
		$resp=$this->category_model->add_category($data);
			if($resp==1)
			{
				$response['code']=200;
				$response['message']='success';
			}
			if($resp==2)
			{
				$response['code']=204;
				$response['message']='not added';
			}
		}
		else{
			$response['code']=301;
			$response['message']='validation error';
		}
		echo json_encode($response);
	}




	public function isJson($string) {
	 json_decode($string);
	 return (json_last_error() == JSON_ERROR_NONE);
	}
	/*end adding categories*/
}
?>

