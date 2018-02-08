<?php
class Category_model extends CI_model
{
	public function get_categories()
	{
			$where=array('cat_status'=>1);
			$this->db->select('cat_id,cat_name');
			$this->db->from('categories_tbl');
			$this->db->where($where);
			$res=$this->db->get();
			$rows=array();
			$count=$res->num_rows();
			if($count>0)
			{
				foreach($res->result_array() as $row)
				{
					$rows[]=$row;
				}
			}
			return $rows;
    }
	public function add_category($data)
	{
		$result=$this->db->insert('categories_tbl',$data);
		if($result)
				return 1;
		else
			    return 2;
	}
	
}
?>
