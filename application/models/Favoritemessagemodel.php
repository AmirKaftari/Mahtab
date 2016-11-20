<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Favoritemessagemodel extends CI_Model
{

    public $table = 'tbl_favorite_message';
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
    function get_unread_message_favorite($type = null)
    {
        $idReciever = $this->session->userdata('IDuser');
        $this->db->where('idReciever',$idReciever);
        if($type == 'noty')
        {
            $this->db->where('Noty','0');
            return $this->db->get($this->table)->row();
        }
        else
        {
            $this->db->where('Is_read','0');
            return $this->db->get($this->table)->result();
        }

    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0,$idUser=null,$type=null)
    {
        $this->db->order_by($this->id, $this->order);
        if(is_null($type))
            $this->db->where('idReciever',$idUser);
        elseif($type == 'send')
            $this->db->where('idSender',$idUser);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('ID', $keyword);
        $this->db->or_like('idSender', $keyword);
        $this->db->or_like('idReciever', $keyword);
        $this->db->or_like('Message', $keyword);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $keyword);
	$this->db->or_like('idSender', $keyword);
	$this->db->or_like('idReciever', $keyword);
	$this->db->or_like('Message', $keyword);
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

}

/* End of file Favoritemessagemodel.php */
/* Location: ./application/models/Favoritemessagemodel.php */