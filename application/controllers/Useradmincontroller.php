<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Useradmincontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('useradminmodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'useradmincontroller/index/';
        $config['total_rows'] = $this->useradminmodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'useradmincontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $useradmincontroller = $this->useradminmodel->index_limit($config['per_page'], $start);

        $data = array(
            'useradmincontroller_data' => $useradmincontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('useradmincontroller/tbl_user_admin_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'useradmincontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'useradmincontroller/index/';
        }

        $config['total_rows'] = $this->useradminmodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'useradmincontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $useradmincontroller = $this->useradminmodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'useradmincontroller_data' => $useradmincontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('useradmincontroller/tbl_user_admin_list', $data);
    }

    public function read($id) 
    {
        $row = $this->useradminmodel->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'Title' => $row->Title,
		'userName' => $row->userName,
		'Password' => $row->Password,
		'Email' => $row->Email,
		'cellPhone' => $row->cellPhone,
		'Pic' => $row->Pic,
	    );
            $this->template->load('useradmincontroller/tbl_user_admin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('useradmincontroller'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('useradmincontroller/create_action'),
	    'ID' => set_value('ID'),
	    'Title' => set_value('Title'),
	    'userName' => set_value('userName'),
	    'Password' => set_value('Password'),
	    'Email' => set_value('Email'),
	    'cellPhone' => set_value('cellPhone'),
	    'Pic' => set_value('Pic'),
	);
        $this->template->load('tbl_user_admin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Title' => $this->input->post('Title',TRUE),
		'userName' => $this->input->post('userName',TRUE),
		'Password' => $this->input->post('Password',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'cellPhone' => $this->input->post('cellPhone',TRUE),
		'Pic' => $this->input->post('Pic',TRUE),
	    );

            $this->useradminmodel->insert($data);
            $this->session->set_flashdata('message', 'رکورد با موفقیت ثبت شد');
            redirect(site_url('useradmincontroller'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->useradminmodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('useradmincontroller/update_action'),
		'ID' => set_value('ID', $row->ID),
		'Title' => set_value('Title', $row->Title),
		'userName' => set_value('userName', $row->userName),
		'Password' => set_value('Password', $row->Password),
		'Email' => set_value('Email', $row->Email),
		'cellPhone' => set_value('cellPhone', $row->cellPhone),
		'Pic' => set_value('Pic', $row->Pic),
	    );
            $this->template->load('tbl_user_admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('useradmincontroller'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'Title' => $this->input->post('Title',TRUE),
		'userName' => $this->input->post('userName',TRUE),
		'Password' => $this->input->post('Password',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'cellPhone' => $this->input->post('cellPhone',TRUE),
		'Pic' => $this->input->post('Pic',TRUE),
	    );

            $this->useradminmodel->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('useradmincontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->useradminmodel->get_by_id($id);

        if ($row) {
            $this->useradminmodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('useradmincontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('useradmincontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Title', ' ', 'trim|required');
	$this->form_validation->set_rules('userName', ' ', 'trim|required');
	$this->form_validation->set_rules('Password', ' ', 'trim|required');
	$this->form_validation->set_rules('Email', ' ', 'trim|required');
	$this->form_validation->set_rules('cellPhone', ' ', 'trim|required');
	$this->form_validation->set_rules('Pic', ' ', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Useradmincontroller.php */
/* Location: ./application/controllers/Useradmincontroller.php */