<?php
class Country_model extends CI_model
{
	public function test_batch_insert($data)
	{
		$this->db->insert_batch('country_tbl',$data);
	}
	public function test_batch_update($data)
	{
		$this->db->update_batch('country_tbl',$data,'country_id');
	}
}



?>