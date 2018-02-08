<?php
class User_model extends CI_model
{
	//getting all records from users_tbl
	public function get_all_records($per_page,$si)
	{
		$this->db->limit($per_page,$si);
        $res=$this->db->get('users_tbl');
		//echo $this->db->last_query();
		$records=$res->result();
		$count=$res->num_rows();
		//returning records to controller method 
		return $records;
	}
	public function total_users_count($table)
	{
			$count=$this->db->count_all($table);
			return $count;
	}
	public function get_limited_records($no_of_records,$si,$table)
	{
		$this->db->limit($no_of_records,$si);
		$res=$this->db->get($table);
		return $res->result();

	}
	public function insert_bulk($data)
	{
		$this->db->update_batch('country_tbl',$data,'country_id');
	}
}
?>
