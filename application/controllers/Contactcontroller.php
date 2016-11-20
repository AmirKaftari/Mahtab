<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactcontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('contactmodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'contactcontroller/index/';
        $config['total_rows'] = $this->contactmodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'contactcontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $contactcontroller = $this->contactmodel->index_limit($config['per_page'], $start);

        $data = array(
            'contactcontroller_data' => $contactcontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('contactcontroller/tbl_contact_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'contactcontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'contactcontroller/index/';
        }

        $config['total_rows'] = $this->contactmodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'contactcontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $contactcontroller = $this->contactmodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'contactcontroller_data' => $contactcontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('contactcontroller/tbl_contact_list', $data);
    }

    public function read($id) 
    {
        $row = $this->contactmodel->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'fullname' => $row->fullname,
		'phone' => $row->phone,
		'email' => $row->email,
		'message' => $row->message,
	    );
            $this->template->load('contactcontroller/tbl_contact_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('contactcontroller'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('contactcontroller/create_action'),
	    'id' => set_value('id'),
	    'fullname' => set_value('fullname'),
	    'phone' => set_value('phone'),
	    'email' => set_value('email'),
	    'message' => set_value('message'),
	);
        $this->template->load('tbl_contact_form', $data);
    }
    
    public function create_action() 
    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
        $data = array(
            'fullname' => $this->input->post('txtFullname',TRUE),
            'phone' => $this->input->post('txtPhone',TRUE),
            'email' => $this->input->post('txtEmail',TRUE),
            'message' => $this->input->post('txtMessage',TRUE),
            );
            $this->contactmodel->insert($data);
            $this->session->set_flashdata('message', 'پیام شما با موفقیت برای مدیر ارسال شد!');
            redirect(site_url('Welcome/contact'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->contactmodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('contactcontroller/update_action'),
		'id' => set_value('id', $row->id),
		'fullname' => set_value('fullname', $row->fullname),
		'phone' => set_value('phone', $row->phone),
		'email' => set_value('email', $row->email),
		'message' => set_value('message', $row->message),
	    );
            $this->template->load('tbl_contact_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('contactcontroller'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'fullname' => $this->input->post('fullname',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'message' => $this->input->post('message',TRUE),
	    );

            $this->contactmodel->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('contactcontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->contactmodel->get_by_id($id);

        if ($row) {
            $this->contactmodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('contactcontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('contactcontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('fullname', ' ', 'trim|required');
	$this->form_validation->set_rules('phone', ' ', 'trim|required');
	$this->form_validation->set_rules('email', ' ', 'trim|required');
	$this->form_validation->set_rules('message', ' ', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Contactcontroller.php */
/* Location: ./application/controllers/Contactcontroller.php */