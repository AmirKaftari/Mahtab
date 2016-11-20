<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reortpolicecontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('reortpolicemodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'reortpolicecontroller/index/';
        $config['total_rows'] = $this->reortpolicemodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'reortpolicecontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $reortpolicecontroller = $this->reortpolicemodel->index_limit($config['per_page'], $start);

        $data = array(
            'reortpolicecontroller_data' => $reortpolicecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('_layout_admin','admin/report/tbl_reort_police_list', $data);
    }
    
//    public function search()
//    {
//        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
//        $this->load->library('pagination');
//
//        if ($this->uri->segment(2)=='search') {
//            $config['base_url'] = base_url() . 'reortpolicecontroller/search/' . $keyword;
//        } else {
//            $config['base_url'] = base_url() . 'reortpolicecontroller/index/';
//        }
//
//        $config['total_rows'] = $this->reortpolicemodel->search_total_rows($keyword);
//        $config['per_page'] = 10;
//        $config['uri_segment'] = 4;
//        $config['suffix'] = '.html';
//        $config['first_url'] = base_url() . 'reortpolicecontroller/search/'.$keyword.'.html';
//        $this->pagination->initialize($config);
//
//        $start = $this->uri->segment(4, 0);
//        $reortpolicecontroller = $this->reortpolicemodel->search_index_limit($config['per_page'], $start, $keyword);
//
//        $data = array(
//            'reortpolicecontroller_data' => $reortpolicecontroller,
//            'keyword' => $keyword,
//            'pagination' => $this->pagination->create_links(),
//            'total_rows' => $config['total_rows'],
//            'start' => $start,
//        );
//        $this->template->load('reortpolicecontroller/tbl_reort_police_list', $data);
//    }

//    public function read($id)
//    {
//        $row = $this->reortpolicemodel->get_by_id($id);
//        if ($row) {
//            $data = array(
//		'ID' => $row->ID,
//		'idSender' => $row->idSender,
//		'Offending_id' => $row->Offending_id,
//		'Date_Report' => $row->Date_Report,
//	    );
//            $this->template->load('reortpolicecontroller/tbl_reort_police_read', $data);
//        } else {
//            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
//            redirect(site_url('reortpolicecontroller'));
//        }
//    }
    
//    public function create()
//    {
//        $data = array(
//            'button' => 'ایجاد',
//            'action' => site_url('reortpolicecontroller/create_action'),
//	    'ID' => set_value('ID'),
//	    'idSender' => set_value('idSender'),
//	    'Offending_id' => set_value('Offending_id'),
//	    'Date_Report' => set_value('Date_Report'),
//	);
//        $this->template->load('tbl_reort_police_form', $data);
//    }
    
    public function create_action() 
    {
        $Offending_name =  $this->input->post('Offending_name',TRUE);
        $Offending_id =  $this->input->post('Offending_id',TRUE);
        $data = array(
            'idSender' => $this->input->post('idSender',TRUE),
            'Offending_id' => $this->input->post('Offending_id',TRUE),
            'message'=>$this->input->post('txtMessage',TRUE),
            'Date_Report' => date('Y-m-d'),
            );

        $this->reortpolicemodel->insert($data);
        $this->session->set_flashdata('message', 'گزارش شما با موفقیت ارسال شد!');
        redirect(site_url('Users/Dashboard/report_police/'.$Offending_id.'/'.$Offending_name));
    }

    
//    public function update($id)
//    {
//        $row = $this->reortpolicemodel->get_by_id($id);
//
//        if ($row) {
//            $data = array(
//                'button' => 'ویرایش',
//                'action' => site_url('reortpolicecontroller/update_action'),
//		'ID' => set_value('ID', $row->ID),
//		'idSender' => set_value('idSender', $row->idSender),
//		'Offending_id' => set_value('Offending_id', $row->Offending_id),
//		'Date_Report' => set_value('Date_Report', $row->Date_Report),
//	    );
//            $this->template->load('tbl_reort_police_form', $data);
//        } else {
//            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
//            redirect(site_url('reortpolicecontroller'));
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
//		'idSender' => $this->input->post('idSender',TRUE),
//		'Offending_id' => $this->input->post('Offending_id',TRUE),
//		'Date_Report' => $this->input->post('Date_Report',TRUE),
//	    );
//
//            $this->reortpolicemodel->update($this->input->post('ID', TRUE), $data);
//            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
//            redirect(site_url('reortpolicecontroller'));
//        }
//    }
    
//    public function delete($id)
//    {
//        $row = $this->reortpolicemodel->get_by_id($id);
//
//        if ($row) {
//            $this->reortpolicemodel->delete($id);
//            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
//            redirect(site_url('reortpolicecontroller'));
//        } else {
//            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
//            redirect(site_url('reortpolicecontroller'));
//        }
//    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idSender', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Offending_id', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Date_Report', ' ', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Reortpolicecontroller.php */
/* Location: ./application/controllers/Reortpolicecontroller.php */