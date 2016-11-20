<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Identityusercontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('identityusermodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'identityusercontroller/index/';
        $config['total_rows'] = $this->identityusermodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'identityusercontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $identityusercontroller = $this->identityusermodel->index_limit($config['per_page'], $start);

        $data = array(
            'identityusercontroller_data' => $identityusercontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('_layout_admin','admin/identity/tbl_identity_user_list', $data);
    }
    
//    public function search()
//    {
//        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
//        $this->load->library('pagination');
//
//        if ($this->uri->segment(2)=='search') {
//            $config['base_url'] = base_url() . 'identityusercontroller/search/' . $keyword;
//        } else {
//            $config['base_url'] = base_url() . 'identityusercontroller/index/';
//        }
//
//        $config['total_rows'] = $this->identityusermodel->search_total_rows($keyword);
//        $config['per_page'] = 10;
//        $config['uri_segment'] = 4;
//        $config['suffix'] = '.html';
//        $config['first_url'] = base_url() . 'identityusercontroller/search/'.$keyword.'.html';
//        $this->pagination->initialize($config);
//
//        $start = $this->uri->segment(4, 0);
//        $identityusercontroller = $this->identityusermodel->search_index_limit($config['per_page'], $start, $keyword);
//
//        $data = array(
//            'identityusercontroller_data' => $identityusercontroller,
//            'keyword' => $keyword,
//            'pagination' => $this->pagination->create_links(),
//            'total_rows' => $config['total_rows'],
//            'start' => $start,
//        );
//        $this->template->load('identityusercontroller/tbl_identity_user_list', $data);
//    }

//    public function read($id)
//    {
//        $row = $this->identityusermodel->get_by_id($id);
//        if ($row) {
//            $data = array(
//		'ID' => $row->ID,
//		'IdUser' => $row->IdUser,
//		'Pic' => $row->Pic,
//	    );
//            $this->template->load('identityusercontroller/tbl_identity_user_read', $data);
//        } else {
//            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
//            redirect(site_url('identityusercontroller'));
//        }
//    }
    
//    public function create()
//    {
//        $data = array(
//            'button' => 'ایجاد',
//            'action' => site_url('identityusercontroller/create_action'),
//	    'ID' => set_value('ID'),
//	    'IdUser' => set_value('IdUser'),
//	    'Pic' => set_value('Pic'),
//	);
//        $this->template->load('tbl_identity_user_form', $data);
//    }
    
    public function create_action() 
    {
        $idUser = $this->session->userdata('IDuser');

        $picPath = "";
        $config['upload_path'] = 'uploads/identity';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('Pic'))
        {
            $data = $this->upload->data();
            $picPath = $data['file_name'];
        }
        $data = array(
            'IdUser' => $idUser,
            'Pic' => $picPath,
            );

            $this->identityusermodel->insert($data);
            $this->session->set_flashdata('message', 'تصویر مشخصات شما با موفقیت ارسال شد!');
            redirect(site_url('Users/Dashboard/identity'));
    }
    
//    public function update($id)
//    {
//        $row = $this->identityusermodel->get_by_id($id);
//
//        if ($row) {
//            $data = array(
//                'button' => 'ویرایش',
//                'action' => site_url('identityusercontroller/update_action'),
//		'ID' => set_value('ID', $row->ID),
//		'IdUser' => set_value('IdUser', $row->IdUser),
//		'Pic' => set_value('Pic', $row->Pic),
//	    );
//            $this->template->load('tbl_identity_user_form', $data);
//        } else {
//            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
//            redirect(site_url('identityusercontroller'));
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
//		'Pic' => $this->input->post('Pic',TRUE),
//	    );
//
//            $this->identityusermodel->update($this->input->post('ID', TRUE), $data);
//            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
//            redirect(site_url('identityusercontroller'));
//        }
//    }
    
    public function delete($id) 
    {
        $row = $this->identityusermodel->get_by_id($id);

        if ($row) {
            $this->identityusermodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('identityusercontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('identityusercontroller'));
        }
    }

    public function accept($id)
    {
        if(!is_null($id))
        {
            $data = array('Status'=>1);
            $this->identityusermodel->update($id, $data);
            $this->session->set_flashdata('message','کاربر تایید شد!');
            /*
             * Todo:Must be send message to user
             * */
            redirect(site_url('Identityusercontroller'));
        }
    }

    public function reject($id)
    {
        if(!is_null($id))
        {
            $data = array('Status'=>0);
            $this->identityusermodel->update($id, $data);
            $this->session->set_flashdata('message','تاییدیه کاربر رد شد!');
            /*
             * Todo:Must be send message to user
             * */
            redirect(site_url('Identityusercontroller'));
        }
    }

//    public function _rules()
//    {
//	$this->form_validation->set_rules('IdUser', ' ', 'trim|required|numeric');
//	$this->form_validation->set_rules('Pic', ' ', 'trim|required');
//
//	$this->form_validation->set_rules('ID', 'ID', 'trim');
//	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
//    }

};

/* End of file Identityusercontroller.php */
/* Location: ./application/controllers/Identityusercontroller.php */