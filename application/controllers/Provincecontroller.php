<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provincecontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('provincemodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'provincecontroller/index/';
        $config['total_rows'] = $this->provincemodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'provincecontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $provincecontroller = $this->provincemodel->index_limit($config['per_page'], $start);

        $data = array(
            'provincecontroller_data' => $provincecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('provincecontroller/province_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'provincecontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'provincecontroller/index/';
        }

        $config['total_rows'] = $this->provincemodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'provincecontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $provincecontroller = $this->provincemodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'provincecontroller_data' => $provincecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('provincecontroller/province_list', $data);
    }

    public function read($id) 
    {
        $row = $this->provincemodel->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
	    );
            $this->template->load('provincecontroller/province_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('provincecontroller'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('provincecontroller/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	);
        $this->template->load('province_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
	    );

            $this->provincemodel->insert($data);
            $this->session->set_flashdata('message', 'رکورد با موفقیت ثبت شد');
            redirect(site_url('provincecontroller'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->provincemodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('provincecontroller/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
	    );
            $this->template->load('province_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('provincecontroller'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
	    );

            $this->provincemodel->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('provincecontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->provincemodel->get_by_id($id);

        if ($row) {
            $this->provincemodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('provincecontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('provincecontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', ' ', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Provincecontroller.php */
/* Location: ./application/controllers/Provincecontroller.php */