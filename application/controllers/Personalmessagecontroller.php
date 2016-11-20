<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personalmessagecontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('personalmessagemodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'personalmessagecontroller/index/';
        $config['total_rows'] = $this->personalmessagemodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'personalmessagecontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $personalmessagecontroller = $this->personalmessagemodel->index_limit($config['per_page'], $start);

        $data = array(
            'personalmessagecontroller_data' => $personalmessagecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('personalmessage/tbl_personal_message_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'personalmessagecontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'personalmessagecontroller/index/';
        }

        $config['total_rows'] = $this->personalmessagemodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'personalmessagecontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $personalmessagecontroller = $this->personalmessagemodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'personalmessagecontroller_data' => $personalmessagecontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('_layout_user','personalmessage/tbl_personal_message_list', $data);
    }

    public function read($id) 
    {
        $row = $this->personalmessagemodel->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'idSender' => $row->idSender,
		'idReciever' => $row->idReciever,
		'Subject' => $row->Subject,
		'Message' => $row->Message,
		'dateSend' => $row->dateSend,
	    );
            $this->template->load('_layout_user','personalmessage/tbl_personal_message_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('personalmessagecontroller'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('personalmessagecontroller/create_action'),
	    'ID' => set_value('ID'),
	    'idSender' => set_value('idSender'),
	    'idReciever' => set_value('idReciever'),
	    'Subject' => set_value('Subject'),
	    'Message' => set_value('Message'),
	    'dateSend' => set_value('dateSend'),
	);
        $this->template->load('_layout_user','personalmessage/tbl_personal_message_form', $data);
    }
    
    public function create_action() 
    {
//        $this->_rules();

//        if ($this->form_validation->run() == FALSE)
//        {
//            $this->create();
//        }
//        else
//        {
            $data = array(
                'idSender' => $this->input->post('idSender',TRUE),
                'idReciever' => $this->input->post('idReciever',TRUE),
                'Subject' => $this->input->post('Subject',TRUE),
                'Message' => $this->input->post('Message',TRUE),
                'dateSend' => gregorian_to_jalali(date('Y-m-d')),
                );

            $this->personalmessagemodel->insert($data);
            $this->session->set_flashdata('message', 'پیام شما ارسال شد!');
            redirect(site_url('Users/Dashboard/personal_message/'.$this->input->post('idReciever')));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->personalmessagemodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('personalmessagecontroller/update_action'),
		'ID' => set_value('ID', $row->ID),
		'idSender' => set_value('idSender', $row->idSender),
		'idReciever' => set_value('idReciever', $row->idReciever),
		'Subject' => set_value('Subject', $row->Subject),
		'Message' => set_value('Message', $row->Message),
		'dateSend' => set_value('dateSend', $row->dateSend),
	    );
            $this->template->load('_layout_user','personalmessage/tbl_personal_message_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('personalmessagecontroller'));
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
		'Subject' => $this->input->post('Subject',TRUE),
		'Message' => $this->input->post('Message',TRUE),
		'dateSend' => $this->input->post('dateSend',TRUE),
	    );

            $this->personalmessagemodel->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('personalmessagecontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->personalmessagemodel->get_by_id($id);

        if ($row) {
            $this->personalmessagemodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('personalmessagecontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('personalmessagecontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idSender', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('idReciever', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Subject', ' ', 'trim|required');
	$this->form_validation->set_rules('Message', ' ', 'trim|required');
	$this->form_validation->set_rules('dateSend', ' ', 'trim|required|numeric');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Personalmessagecontroller.php */
/* Location: ./application/controllers/Personalmessagecontroller.php */