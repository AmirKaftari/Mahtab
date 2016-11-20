<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Favoritemessagecontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('favoritemessagemodel');
        $this->load->library('form_validation');
    }

    public function index($id=null,$type=null)
    {
        $iduser = $this->session->userdata('IDuser');
        if($type == 'notify' && !is_null($id))
        {
            $data_message = array('Is_read'=> '1');
            $this->favoritemessagemodel->update($id,$data_message);
            //$this->index();
        }

        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'favoritemessagecontroller/index/';
        $config['total_rows'] = $this->favoritemessagemodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'favoritemessagecontroller/index/';
        $this->pagination->initialize($config);

        if(is_null($type))
            $start = $this->uri->segment(3, 0);
        elseif($type == 'notify')
            $start = 0;
        elseif( $type == 'send')
            $start = 0;
//            $start = $this->uri->segment(4, 0);

        $favoritemessagecontroller = $this->favoritemessagemodel->index_limit($config['per_page'], $start,$iduser,$type);

        $data = array(
            'favoritemessagecontroller_data' => $favoritemessagecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );


        if($type=='send')
            $this->template->load('_layout_user','user/sender_message', $data);
        else
            $this->template->load('_layout_user','user/tbl_favorite_message_list', $data);

    }
//    public function search()
//    {
//        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
//        $this->load->library('pagination');
//
//        if ($this->uri->segment(2)=='search') {
//            $config['base_url'] = base_url() . 'favoritemessagecontroller/search/' . $keyword;
//        } else {
//            $config['base_url'] = base_url() . 'favoritemessagecontroller/index/';
//        }
//
//        $config['total_rows'] = $this->favoritemessagemodel->search_total_rows($keyword);
//        $config['per_page'] = 10;
//        $config['uri_segment'] = 4;
//        $config['suffix'] = '.html';
//        $config['first_url'] = base_url() . 'favoritemessagecontroller/search/'.$keyword.'.html';
//        $this->pagination->initialize($config);
//
//        $start = $this->uri->segment(4, 0);
//        $favoritemessagecontroller = $this->favoritemessagemodel->search_index_limit($config['per_page'], $start, $keyword);
//
//        $data = array(
//            'favoritemessagecontroller_data' => $favoritemessagecontroller,
//            'keyword' => $keyword,
//            'pagination' => $this->pagination->create_links(),
//            'total_rows' => $config['total_rows'],
//            'start' => $start,
//        );
//        $this->template->load('favoritemessagecontroller/tbl_favorite_message_list', $data);
//    }

//    public function read($id)
//    {
//        $row = $this->favoritemessagemodel->get_by_id($id);
//        if ($row) {
//            $data = array(
//		'ID' => $row->ID,
//		'idSender' => $row->idSender,
//		'idReciever' => $row->idReciever,
//		'Message' => $row->Message,
//	    );
//            $this->template->load('favoritemessagecontroller/tbl_favorite_message_read', $data);
//        } else {
//            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
//            redirect(site_url('favoritemessagecontroller'));
//        }
//    }
    
//    public function create()
//    {
//        $data = array(
//            'button' => 'ایجاد',
//            'action' => site_url('favoritemessagecontroller/create_action'),
//	    'ID' => set_value('ID'),
//	    'idSender' => set_value('idSender'),
//	    'idReciever' => set_value('idReciever'),
//	    'Message' => set_value('Message'),
//	);
//        $this->template->load('tbl_favorite_message_form', $data);
//    }
    
    public function create_action()
    {
//        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        }
//        else
//        {
            $data = array(
                'idSender' => $this->input->post('idSender',TRUE),
                'idReciever' => $this->input->post('idReciever',TRUE),
                'Message' => $this->input->post('Message',TRUE),
                );

            $this->favoritemessagemodel->insert($data);
            $this->session->set_flashdata('favorite_message', 'پیام شما با موفقیت ارسال شد');

                $idReceiver = $this->input->post('idReciever');
                $to = $this->input->post('To');
                $sender = $this->input->post('idSender');

            redirect(site_url('Users/Dashboard/favorite_message/'.$idReceiver.'/'.$to.'/'.$sender));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->favoritemessagemodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('favoritemessagecontroller/update_action'),
		'ID' => set_value('ID', $row->ID),
		'idSender' => set_value('idSender', $row->idSender),
		'idReciever' => set_value('idReciever', $row->idReciever),
		'Message' => set_value('Message', $row->Message),
	    );
            $this->template->load('tbl_favorite_message_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('favoritemessagecontroller'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'idSender' => $this->input->post('idSender',TRUE),
		'idReciever' => $this->input->post('idReciever',TRUE),
		'Message' => $this->input->post('Message',TRUE),
	    );

            $this->favoritemessagemodel->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('favoritemessagecontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->favoritemessagemodel->get_by_id($id);

        if ($row) {
            $this->favoritemessagemodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('favoritemessagecontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('favoritemessagecontroller'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('idSender', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('idReciever', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('Message', ' ', 'trim|required');

        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Favoritemessagecontroller.php */
/* Location: ./application/controllers/Favoritemessagecontroller.php */