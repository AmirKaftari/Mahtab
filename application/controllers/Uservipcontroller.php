<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uservipcontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('uservipmodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'uservipcontroller/index/';
        $config['total_rows'] = $this->uservipmodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'uservipcontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $uservipcontroller = $this->uservipmodel->index_limit($config['per_page'], $start);

        $data = array(
            'uservipcontroller_data' => $uservipcontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('_layout_admin','admin/vip_user/tbl_user_vip_list', $data);
    }
    
//    public function search()
//    {
//        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
//        $this->load->library('pagination');
//
//        if ($this->uri->segment(2)=='search') {
//            $config['base_url'] = base_url() . 'uservipcontroller/search/' . $keyword;
//        } else {
//            $config['base_url'] = base_url() . 'uservipcontroller/index/';
//        }
//
//        $config['total_rows'] = $this->uservipmodel->search_total_rows($keyword);
//        $config['per_page'] = 10;
//        $config['uri_segment'] = 4;
//        $config['suffix'] = '.html';
//        $config['first_url'] = base_url() . 'uservipcontroller/search/'.$keyword.'.html';
//        $this->pagination->initialize($config);
//
//        $start = $this->uri->segment(4, 0);
//        $uservipcontroller = $this->uservipmodel->search_index_limit($config['per_page'], $start, $keyword);
//
//        $data = array(
//            'uservipcontroller_data' => $uservipcontroller,
//            'keyword' => $keyword,
//            'pagination' => $this->pagination->create_links(),
//            'total_rows' => $config['total_rows'],
//            'start' => $start,
//        );
//        $this->template->load('uservipcontroller/tbl_user_vip_list', $data);
//    }

//    public function read($id)
//    {
//        $row = $this->uservipmodel->get_by_id($id);
//        if ($row) {
//            $data = array(
//		'ID' => $row->ID,
//		'IdUser' => $row->IdUser,
//		'Start_date' => $row->Start_date,
//		'length' => $row->length,
//		'End_date' => $row->End_date,
//		'Status' => $row->Status,
//	    );
//            $this->template->load('uservipcontroller/tbl_user_vip_read', $data);
//        } else {
//            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
//            redirect(site_url('uservipcontroller'));
//        }
//    }
    
//    public function create()
//    {
//        $data = array(
//            'button' => 'ایجاد',
//            'action' => site_url('uservipcontroller/create_action'),
//	    'ID' => set_value('ID'),
//	    'IdUser' => set_value('IdUser'),
//	    'Start_date' => set_value('Start_date'),
//	    'length' => set_value('length'),
//	    'End_date' => set_value('End_date'),
//	    'Status' => set_value('Status'),
//	);
//        $this->template->load('tbl_user_vip_form', $data);
//    }
    
//    public function create_action()
//    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
//            $data = array(
//		'IdUser' => $this->input->post('IdUser',TRUE),
//		'Start_date' => $this->input->post('Start_date',TRUE),
//		'length' => $this->input->post('length',TRUE),
//		'End_date' => $this->input->post('End_date',TRUE),
//		'Status' => $this->input->post('Status',TRUE),
//	    );
//
//            $this->uservipmodel->insert($data);
//            $this->session->set_flashdata('message', 'رکورد با موفقیت ثبت شد');
//            redirect(site_url('uservipcontroller'));
//        }
//    }
    
//    public function update($id)
//    {
//        $row = $this->uservipmodel->get_by_id($id);
//
//        if ($row) {
//            $data = array(
//                'button' => 'ویرایش',
//                'action' => site_url('uservipcontroller/update_action'),
//		'ID' => set_value('ID', $row->ID),
//		'IdUser' => set_value('IdUser', $row->IdUser),
//		'Start_date' => set_value('Start_date', $row->Start_date),
//		'length' => set_value('length', $row->length),
//		'End_date' => set_value('End_date', $row->End_date),
//		'Status' => set_value('Status', $row->Status),
//	    );
//            $this->template->load('tbl_user_vip_form', $data);
//        } else {
//            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
//            redirect(site_url('uservipcontroller'));
//        }
//    }
    
//    public function update_action()
//    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('ID', TRUE));
//        } else {
//            $data = array(
//		'IdUser' => $this->input->post('IdUser',TRUE),
//		'Start_date' => $this->input->post('Start_date',TRUE),
//		'length' => $this->input->post('length',TRUE),
//		'End_date' => $this->input->post('End_date',TRUE),
//		'Status' => $this->input->post('Status',TRUE),
//	    );
//
//            $this->uservipmodel->update($this->input->post('ID', TRUE), $data);
//            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
//            redirect(site_url('uservipcontroller'));
//        }
//    }
    
    public function delete($id) 
    {
        $row = $this->uservipmodel->get_by_id($id);

        if ($row) {
            $this->uservipmodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('uservipcontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('uservipcontroller'));
        }
    }

//    public function _rules()
//    {
//	$this->form_validation->set_rules('IdUser', ' ', 'trim|required|numeric');
//	$this->form_validation->set_rules('Start_date', ' ', 'trim|required');
//	$this->form_validation->set_rules('length', ' ', 'trim|required|numeric');
//	$this->form_validation->set_rules('End_date', ' ', 'trim|required');
//	$this->form_validation->set_rules('Status', ' ', 'trim|required|numeric');
//
//	$this->form_validation->set_rules('ID', 'ID', 'trim');
//	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
//    }

};

/* End of file Uservipcontroller.php */
/* Location: ./application/controllers/Uservipcontroller.php */