<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usermodel extends CI_Model
{

    public $table = 'tbl_user';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by Email user
    function get_by_email($email)
    {
        $this->db->where('Email', $email);
        return $this->db->get($this->table)->row();
    }

    function get_by_username($username,$password)
    {
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($type=null)
    {
        $this->db->from($this->table);
        if($type == 'block')
            $this->db->where('Is_block = 1');
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
	$this->db->or_like('Username', $keyword);
	$this->db->or_like('Password', $keyword);
	$this->db->or_like('Email', $keyword);
	$this->db->or_like('Age', $keyword);
	$this->db->or_like('Subject_self', $keyword);
	$this->db->or_like('Avatar', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $keyword);
	$this->db->or_like('Username', $keyword);
	$this->db->or_like('Password', $keyword);
	$this->db->or_like('Email', $keyword);
	$this->db->or_like('Age', $keyword);
	$this->db->or_like('Subject_self', $keyword);
	$this->db->or_like('Avatar', $keyword);
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
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_users_block($limit = null, $start = null)
    {
        $this->db->select('tbl_user.*,tbl_userinfo.*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_userinfo', 'tbl_user.ID = tbl_userinfo.IdUser', 'inner');
		$this->db->where('tbl_user.Is_block = 1');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
}

/* End of file Usermodel.php */
/* Location: ./application/models/Usermodel.php */