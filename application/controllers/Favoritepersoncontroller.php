<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Favoritepersoncontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('favoritepersonmodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'favoritepersoncontroller/index/';
        $config['total_rows'] = $this->favoritepersonmodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'favoritepersoncontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $favoritepersoncontroller = $this->favoritepersonmodel->index_limit($config['per_page'], $start);

        $data = array(
            'favoritepersoncontroller_data' => $favoritepersoncontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('_layout_user','user/tbl_favorite_person_list', $data);
    }
    
//    public function search()
//    {
//        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
//        $this->load->library('pagination');
//
//        if ($this->uri->segment(2)=='search') {
//            $config['base_url'] = base_url() . 'favoritepersoncontroller/search/' . $keyword;
//        } else {
//            $config['base_url'] = base_url() . 'favoritepersoncontroller/index/';
//        }
//
//        $config['total_rows'] = $this->favoritepersonmodel->search_total_rows($keyword);
//        $config['per_page'] = 10;
//        $config['uri_segment'] = 4;
//        $config['suffix'] = '.html';
//        $config['first_url'] = base_url() . 'favoritepersoncontroller/search/'.$keyword.'.html';
//        $this->pagination->initialize($config);
//
//        $start = $this->uri->segment(4, 0);
//        $favoritepersoncontroller = $this->favoritepersonmodel->search_index_limit($config['per_page'], $start, $keyword);
//
//        $data = array(
//            'favoritepersoncontroller_data' => $favoritepersoncontroller,
//            'keyword' => $keyword,
//            'pagination' => $this->pagination->create_links(),
//            'total_rows' => $config['total_rows'],
//            'start' => $start,
//        );
//        $this->template->load('favoritepersoncontroller/tbl_favorite_person_list', $data);
//    }

//    public function read($id)
//    {
//        $row = $this->favoritepersonmodel->get_by_id($id);
//        if ($row) {
//            $data = array(
//		'ID' => $row->ID,
//		'person' => $row->person,
//		'favorite_to' => $row->favorite_to,
//	    );
//            $this->template->load('favoritepersoncontroller/tbl_favorite_person_read', $data);
//        } else {
//            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
//            redirect(site_url('favoritepersoncontroller'));
//        }
//    }
    
//    public function create()
//    {
//        $data = array(
//            'button' => 'ایجاد',
//            'action' => site_url('favoritepersoncontroller/create_action'),
//	    'ID' => set_value('ID'),
//	    'person' => set_value('person'),
//	    'favorite_to' => set_value('favorite_to'),
//	);
//        $this->template->load('tbl_favorite_person_form', $data);
//    }
    
    public function create_action($favorite_to)
    {
        $person = $this->session->userdata('IDuser');
        $data = array(
		'person' => $person,
		'favorite_to' => $favorite_to,
	    );

        $this->favoritepersonmodel->insert($data);
        $this->session->set_flashdata('message', 'این شخص به لیست علاقه مندی های شما اضافه شد !');
        redirect(site_url('Users/Dashboard/view_profile/'.$favorite_to));

    }
    
//    public function update($id)
//    {
//        $row = $this->favoritepersonmodel->get_by_id($id);
//
//        if ($row) {
//            $data = array(
//                'button' => 'ویرایش',
//                'action' => site_url('favoritepersoncontroller/update_action'),
//		'ID' => set_value('ID', $row->ID),
//		'person' => set_value('person', $row->person),
//		'favorite_to' => set_value('favorite_to', $row->favorite_to),
//	    );
//            $this->template->load('tbl_favorite_person_form', $data);
//        } else {
//            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
//            redirect(site_url('favoritepersoncontroller'));
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
//		'person' => $this->input->post('person',TRUE),
//		'favorite_to' => $this->input->post('favorite_to',TRUE),
//	    );
//
//            $this->favoritepersonmodel->update($this->input->post('ID', TRUE), $data);
//            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
//            redirect(site_url('favoritepersoncontroller'));
//        }
//    }
    
//    public function delete($id)
//    {
//        $row = $this->favoritepersonmodel->get_by_id($id);
//
//        if ($row) {
//            $this->favoritepersonmodel->delete($id);
//            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
//            redirect(site_url('favoritepersoncontroller'));
//        } else {
//            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
//            redirect(site_url('favoritepersoncontroller'));
//        }
//    }

//    public function _rules()
//    {
//	$this->form_validation->set_rules('person', ' ', 'trim|required|numeric');
//	$this->form_validation->set_rules('favorite_to', ' ', 'trim|required|numeric');
//
//	$this->form_validation->set_rules('ID', 'ID', 'trim');
//	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
//    }

};

/* End of file Favoritepersoncontroller.php */
/* Location: ./application/controllers/Favoritepersoncontroller.php */