<?php
class Custommodel extends CI_Model
{
	public function getCityByStateId($stateId)
	{
		$this -> db -> select('*');
		$this -> db -> from('city');
		$this -> db -> where('province_id', $stateId);
		//$this -> db -> order_by($orderByField, 'asc');
		$query = $this -> db -> get();
		return $query;
	}
	
	public function getAllState()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('province')->result();
    }
}