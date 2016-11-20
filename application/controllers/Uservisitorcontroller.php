<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uservisitorcontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('uservisitormodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'uservisitorcontroller/index/';
        $config['total_rows'] = $this->uservisitormodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'uservisitorcontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $uservisitorcontroller = $this->uservisitormodel->index_limit($config['per_page'], $start);

        $data = array(
            'uservisitorcontroller_data' => $uservisitorcontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('uservisitorcontroller/tbl_user_visitor_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'uservisitorcontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'uservisitorcontroller/index/';
        }

        $config['total_rows'] = $this->uservisitormodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'uservisitorcontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $uservisitorcontroller = $this->uservisitormodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'uservisitorcontroller_data' => $uservisitorcontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('uservisitorcontroller/tbl_user_visitor_list', $data);
    }

    public function read($id) 
    {
        $row = $this->uservisitormodel->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'IdViewer' => $row->IdViewer,
		'IdVisitor' => $row->IdVisitor,
		'Date_View' => $row->Date_View,
	    );
            $this->template->load('uservisitorcontroller/tbl_user_visitor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('uservisitorcontroller'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('uservisitorcontroller/create_action'),
	    'ID' => set_value('ID'),
	    'IdViewer' => set_value('IdViewer'),
	    'IdVisitor' => set_value('IdVisitor'),
	    'Date_View' => set_value('Date_View'),
	);
        $this->template->load('tbl_user_visitor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'IdViewer' => $this->input->post('IdViewer',TRUE),
		'IdVisitor' => $this->input->post('IdVisitor',TRUE),
		'Date_View' => $this->input->post('Date_View',TRUE),
	    );

            $this->uservisitormodel->insert($data);
            $this->session->set_flashdata('message', 'رکورد با موفقیت ثبت شد');
            redirect(site_url('uservisitorcontroller'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->uservisitormodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('uservisitorcontroller/update_action'),
		'ID' => set_value('ID', $row->ID),
		'IdViewer' => set_value('IdViewer', $row->IdViewer),
		'IdVisitor' => set_value('IdVisitor', $row->IdVisitor),
		'Date_View' => set_value('Date_View', $row->Date_View),
	    );
            $this->template->load('tbl_user_visitor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('uservisitorcontroller'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'IdViewer' => $this->input->post('IdViewer',TRUE),
		'IdVisitor' => $this->input->post('IdVisitor',TRUE),
		'Date_View' => $this->input->post('Date_View',TRUE),
	    );

            $this->uservisitormodel->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('uservisitorcontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->uservisitormodel->get_by_id($id);

        if ($row) {
            $this->uservisitormodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('uservisitorcontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('uservisitorcontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('IdViewer', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('IdVisitor', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Date_View', ' ', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Uservisitorcontroller.php */
/* Location: ./application/controllers/Uservisitorcontroller.php */