<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Useronlinecontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('useronlinemodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'useronlinecontroller/index/';
        $config['total_rows'] = $this->useronlinemodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'useronlinecontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $useronlinecontroller = $this->useronlinemodel->index_limit($config['per_page'], $start);

        $data = array(
            'useronlinecontroller_data' => $useronlinecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('useronlinecontroller/tbl_user_online_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'useronlinecontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'useronlinecontroller/index/';
        }

        $config['total_rows'] = $this->useronlinemodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'useronlinecontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $useronlinecontroller = $this->useronlinemodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'useronlinecontroller_data' => $useronlinecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('useronlinecontroller/tbl_user_online_list', $data);
    }

    public function read($id) 
    {
        $row = $this->useronlinemodel->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'IdUser' => $row->IdUser,
		'Ip' => $row->Ip,
		'time' => $row->time,
		'status' => $row->status,
	    );
            $this->template->load('useronlinecontroller/tbl_user_online_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('useronlinecontroller'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('useronlinecontroller/create_action'),
	    'ID' => set_value('ID'),
	    'IdUser' => set_value('IdUser'),
	    'Ip' => set_value('Ip'),
	    'time' => set_value('time'),
	    'status' => set_value('status'),
	);
        $this->template->load('tbl_user_online_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'IdUser' => $this->input->post('IdUser',TRUE),
		'Ip' => $this->input->post('Ip',TRUE),
		'time' => $this->input->post('time',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->useronlinemodel->insert($data);
            $this->session->set_flashdata('message', 'رکورد با موفقیت ثبت شد');
            redirect(site_url('useronlinecontroller'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->useronlinemodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('useronlinecontroller/update_action'),
		'ID' => set_value('ID', $row->ID),
		'IdUser' => set_value('IdUser', $row->IdUser),
		'Ip' => set_value('Ip', $row->Ip),
		'time' => set_value('time', $row->time),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('tbl_user_online_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('useronlinecontroller'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'IdUser' => $this->input->post('IdUser',TRUE),
		'Ip' => $this->input->post('Ip',TRUE),
		'time' => $this->input->post('time',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->useronlinemodel->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('useronlinecontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->useronlinemodel->get_by_id($id);

        if ($row) {
            $this->useronlinemodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('useronlinecontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('useronlinecontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('IdUser', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Ip', ' ', 'trim|required');
	$this->form_validation->set_rules('time', ' ', 'trim|required');
	$this->form_validation->set_rules('status', ' ', 'trim|required|numeric');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Useronlinecontroller.php */
/* Location: ./application/controllers/Useronlinecontroller.php */