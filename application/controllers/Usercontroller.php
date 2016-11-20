<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usercontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
        $this->load->model('useradminmodel');
        $this->load->model('userinfomodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'usercontroller/index/';
        $config['total_rows'] = $this->usermodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'usercontroller/index/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $usercontroller = $this->usermodel->index_limit($config['per_page'], $start);

        $data = array(
            'usercontroller_data' => $usercontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('usercontroller/tbl_user_list', $data);
    }

    public function index_block()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'usercontroller/index_block/';
        $config['total_rows'] = $this->usermodel->total_rows('block');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'usercontroller/index_block/';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $usercontroller = $this->usermodel->get_users_block($config['per_page'], $start);

        $data = array(
            'userinfocontroller_data' => $usercontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('_layout_admin','admin/user/tbl_userinfo_list', $data);
    }

    public function search()
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');

        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'usercontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'usercontroller/index/';
        }

        $config['total_rows'] = $this->usermodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'usercontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $usercontroller = $this->usermodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'usercontroller_data' => $usercontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('usercontroller/tbl_user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->usermodel->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'Username' => $row->Username,
		'Password' => $row->Password,
		'Email' => $row->Email,
		'Age' => $row->Age,
		'Subject_self' => $row->Subject_self,
		'Avatar' => $row->Avatar,
	    );
            $this->template->load('usercontroller/tbl_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('usercontroller'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('usercontroller/create_action'),
	    'ID' => set_value('ID'),
	    'Username' => set_value('Username'),
	    'Password' => set_value('Password'),
	    'Email' => set_value('Email'),
	    'Age' => set_value('Age'),
	    'Subject_self' => set_value('Subject_self'),
	    'Avatar' => set_value('Avatar'),
	);
        $this->template->load('tbl_user_form', $data);
    }
    
    public function create_action() 
    {
//        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        }
//        else
//        {
            $data = array(
                'Name' => $this->input->post('Name',TRUE),
                'Lastname' => $this->input->post('Lastname',TRUE),
                'Username' => $this->input->post('Username',TRUE),
                'Password' => $this->input->post('Password',TRUE),
                'Email' => $this->input->post('Email',TRUE),
                'Jender' => $this->input->post('Jender',TRUE),
                'Subject_self' => $this->input->post('Subject_self',TRUE),
                'Date_register' => gregorian_to_jalali(date('Y-m-d')),
		//'Avatar' => $this->input->post('Avatar',TRUE),
	            );

            $this->usermodel->insert($data);
            $this->session->set_flashdata('message', 'تبریک ! ثبت نام اولیه شما با موفقیت انجام شد.');
            redirect(site_url('welcome/register'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->usermodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('usercontroller/update_action'),
		'ID' => set_value('ID', $row->ID),
		'Username' => set_value('Username', $row->Username),
		'Password' => set_value('Password', $row->Password),
		'Email' => set_value('Email', $row->Email),
		'Age' => set_value('Age', $row->Age),
		'Subject_self' => set_value('Subject_self', $row->Subject_self),
		'Avatar' => set_value('Avatar', $row->Avatar),
	    );
            $this->template->load('tbl_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('usercontroller'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'Username' => $this->input->post('Username',TRUE),
		'Password' => $this->input->post('Password',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'Age' => $this->input->post('Age',TRUE),
		'Subject_self' => $this->input->post('Subject_self',TRUE),
		'Avatar' => $this->input->post('Avatar',TRUE),
	    );

            $this->usermodel->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
            redirect(site_url('usercontroller'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->usermodel->get_by_id($id);

        if ($row) {
            $this->usermodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('Userinfocontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('Userinfocontroller'));
        }
    }

    public function block($id)
    {
        if(!is_null($id))
        {
            $data = array('Is_block'=>1);
            $this->usermodel->update($id,$data);
            $this->session->set_flashdata('message','کاربر بلاک شد!');
            redirect(site_url('Userinfocontroller'));
        }
        else
        {
            $this->session->set_flashdata('message','مشکلی در عملیات بلاک به وجود آمد!');
            redirect(site_url('Userinfocontroller'));
        }
    }

    public function Un_block($id)
    {
        if(!is_null($id))
        {
            $data = array('Is_block'=>0);
            $this->usermodel->update($id,$data);
            $this->session->set_flashdata('message','کاربر از بلاک خارج شد!');
            redirect(site_url('Userinfocontroller'));
        }
        else
        {
            $this->session->set_flashdata('message','مشکلی در عملیات بلاک به وجود آمد!');
            redirect(site_url('Userinfocontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Username', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Password', ' ', 'trim|required|numeric');
	//$this->form_validation->set_rules('Email', ' ', 'trim|required|numeric');
//	$this->form_validation->set_rules('Jender', ' ', 'trim|required|numeric');
	//$this->form_validation->set_rules('Subject_self', ' ', 'trim|required|numeric');
	//$this->form_validation->set_rules('Avatar', ' ', 'trim|required');
	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
	public function showProfile()
    {
        $id = $this->session->userdata('IDuser');
        $idAdmin = $this->session->userdata('IDadmin');

        if($this->input->post('btn_Edit'))
        {
            if(isset($id) && !is_null($id))
            {
                $this->form_validation->set_rules('txtName','نام','required');
                $this->form_validation->set_rules('txtFamily','نام خانوادگی','required');
                $this->form_validation->set_rules('txtUserName','نام کاربری','required');

                if($this->form_validation->run()==FALSE)
                {
                    $msgError = array('Error'=>validation_errors()) ;
                    $this->session->set_userdata($msgError);
                    redirect('Usercontroller/showProfile');
                }
                else
                {
                    $arraydata = array(
                        'Name'=>$this->input->post('txtName'),
                        'Lastname'=>$this->input->post('txtFamily'),
                        'Username'=>$this->input->post('txtUserName'),
                        'Email'=>$this->input->post('txtEmail'),
                        'Subject_self'=>$this->input->post('txtAddress'),
                    );
                    $this->usermodel->update($id,$arraydata);
                    $msgSuccess =array('Success'=>"اطلاعات شما آپدیت شد." ) ;
                    $arrayName = array(
                        'Name' => $this->input->post('txtName'),
                        'Lastname' => $this->input->post('txtFamily'),
                        'Username' => $this->input->post('txtUserName'),
                        'Email' => $this->input->post('txtEmail'),
                        'Subject_self' => $this->input->post('txtAddress'),
                    );
                    $this->session->set_userdata($msgSuccess);
                    $this->session->set_userdata($arrayName);
                    redirect('Usercontroller/showProfile');
                }
            }
            elseif(!is_null($idAdmin))
            {
                $this->form_validation->set_rules('txtTitle','نام','required');
                $this->form_validation->set_rules('txtUserName','نام کاربری','required');

                if($this->form_validation->run()==FALSE)
                {
                    $msgError = array('Error'=>validation_errors()) ;
                    $this->session->set_userdata($msgError);
                    redirect('Usercontroller/showProfile');
                }
                else
                {
                    $path_upload = 'uploads/admin';
                    $picPath = upload($path_upload);

                    $arraydata = array(
                        'Title'=>$this->input->post('txtTitle'),
                        'userName'=>$this->input->post('txtUserName'),
                        'Email'=>$this->input->post('txtEmail'),
                        'cellPhone'=>$this->input->post('txtcellPhone'),
                        'Pic'=>$picPath,
                    );
                    $this->useradminmodel->update($idAdmin,$arraydata);
                    $msgSuccessAdmin =array('Success'=>"اطلاعات شما آپدیت شد." ) ;
                    $arrayNameAdmin = array(
                        'Title' => $this->input->post('txtTitle'),
                        'userName' => $this->input->post('txtUserName'),
                        'Email' => $this->input->post('txtEmail'),
                        'cellPhone' => $this->input->post('txtcellPhone'),
                    );
                    $this->session->set_userdata($msgSuccessAdmin);
                    $this->session->set_userdata($arrayNameAdmin);
                    redirect('Usercontroller/showProfile');
                }
            }
        }
        elseif($this->input->post('btn_Edit_Password'))
        {
            $this->form_validation->set_rules('txtPass','پسورد','trim|required');
            $this->form_validation->set_rules('txtConPass','تکرار  پسورد','trim|required|matches[txtPass]');

            if($this->form_validation->run()==FALSE)
            {
                $msgError = array('Error'=>validation_errors()) ;
                $this->session->set_userdata($msgError);
                redirect('Usercontroller/showProfile');
            }
            elseif(!is_null($id))
            {
                $arraydata = array(
                    'Password'=>$this->input->post('txtPass'),
                );

                $this->usermodel->update($id,$arraydata);
                $msgSuccess =array('Success'=>"ارمز عبور تغییر داده شد." );
                $this->session->set_userdata($msgSuccess);
                redirect('Usercontroller/showProfile');
            }
            elseif(!is_null($idAdmin))
            {
                $arraydata = array(
                    'Password'=>$this->input->post('txtPass'),
                );

                $this->useradminmodel->update($idAdmin,$arraydata);
                $msgSuccess =array('Success'=>"ارمز عبور تغییر داده شد." );
                $this->session->set_userdata($msgSuccess);
                redirect('Usercontroller/showProfile');
            }
        }
        else
        {
            if($id != null)
            {
                $User_info = $this->usermodel->get_by_id($id);
                $data = array(
                    'Subject_self'=> $User_info->Subject_self,
                    'Email'=> $User_info->Email,
                    'Name' => $User_info->Name,
                    'Lastname' => $User_info->Lastname,
                    'Username' => $User_info->Username,
                );
                $this->template->load('_layout_user','user/edit_profile',$data);
            }
            elseif(!is_null($idAdmin))
            {
                $User_info = $this->useradminmodel->get_by_id($idAdmin);
                $data = array(
                    'Title'=> $User_info->Title,
                    'Email'=> $User_info->Email,
                    'Pic' => $User_info->Pic,
                    'cellPhone' => $User_info->cellPhone,
                    'userName' => $User_info->userName,
                );
                $this->template->load('_layout_admin','admin/edit_profile',$data);
            }
        }
    }



};

/* End of file Usercontroller.php */
/* Location: ./application/controllers/Usercontroller.php */