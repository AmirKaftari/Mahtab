<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Useronlinemodel extends CI_Model
{

    public $table = 'tbl_user_online';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_online_user()
    {
//        $gap=60; // Gap value can be changed, this is in minutes.
        // let us find out the time before 10 minutes of present time. //
        $tm = date("Y-m-d H:i:s",strtotime("-30 minutes"));
        $this->db->where('time > ',$tm);
        $this->db->limit(10,0);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_user($id)
    {
        $this->db->where('IdUser', $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('ID', $keyword);
	$this->db->or_like('IdUser', $keyword);
	$this->db->or_like('Ip', $keyword);
	$this->db->or_like('time', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $keyword);
	$this->db->or_like('IdUser', $keyword);
	$this->db->or_like('Ip', $keyword);
	$this->db->or_like('time', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('IdUser', $id);
        $this->db->delete($this->table);
    }

}

/* End of file Useronlinemodel.php */
/* Location: ./application/models/Useronlinemodel.php */