<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
		$this->load->model('userinfomodel');
		$this->load->model('useronlinemodel');
		$this->load->model('useradminmodel');
                $this->load->library('email');
	}
	
	public function index()
	{
		$idUser = $this->session->userdata('IDuser');
		$userGender = $this->session->userdata('Jender');
		$users_index = $this->userinfomodel->get_users_index_random(null,$userGender);
		$data = array('users_index' => $users_index);
		$this->load->view('index',$data);
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function validate_user()
	{
		$username =  $this->input->post('Username',TRUE);
		$password =  $this->input->post('Password',TRUE);
		$query_valid = null;

		if($username != null && $password != null)
		{
			$query_valid = $this->usermodel->get_by_username($username,$password);
			if(count($query_valid) == 0)
			{
				$query_valid_admin = $this->useradminmodel->validate_admin($username,$password);
			}
		}

		if(isset($query_valid) && $query_valid != null)
		{
			if($query_valid->Is_block != 1)
			{
				$arrayName = array(
					'IDuser' => $query_valid->ID ,
					'Name' => $query_valid->Name,
					'Lastname' => $query_valid->Lastname,
					'Username' => $query_valid->Username,
					'Password' => $query_valid->Password,
					'Email' => $query_valid->Email,
					'Jender' => $query_valid->Jender,
					'Subject_self' => $query_valid->Subject_self,
					'Avatar' => $query_valid->Avatar,
				);
				$this->session->set_userdata($arrayName);
				$dataInsert = array(
					'IdUser'=>$query_valid->ID,
					'Ip'=>$this->input->ip_address(),
					'time'=> date("Y-m-d H:i:s"),
					'status'=> 1

				);

				$this->useronlinemodel->delete($query_valid->ID);
				$this->useronlinemodel->insert($dataInsert);
				redirect('Users/Dashboard');
			}
			else
			{
				$dataMsg['message'] = "شما به علت تخلف توسط مدیر سیستم بلاک شده اید , لطفا از طریق فرم تماس با مدیریت علت را پیگیری نمایید!";
				$this->session->set_userdata($dataMsg);
				$this->load->view('login');
			}

		}
		elseif(isset($query_valid_admin) && $query_valid_admin != null)
		{
			$arrayName = array(
				'IDadmin' => $query_valid_admin->ID ,
				'Titleadmin' => $query_valid_admin->Title,
				'usernameAdmin' => $query_valid_admin->userName ,
				'passwordAdmin' => $query_valid_admin->Password,
				'emailAdmin' => $query_valid_admin->Email,
				'cellPhoneAdmin' => $query_valid_admin->cellPhone,
				'picAdmin' => $query_valid_admin->Pic,
			);
			$this->session->set_userdata($arrayName);

			redirect('Admin/Dashboard');
		}
		else
		{
			$dataMsg['message'] = "نام کاربری یا رمز عبور اشتباه است!";
			$this->session->set_userdata($dataMsg);
			$this->load->view('login');
		}
	}

	public function aboutUs()
	{
		$this->load->view('about');
	}

	public function terms()
	{
		$this->load->view('terms');
	}

	public function condation()
	{
		$this->load->view('condation');
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	function logout()
	{
		$this->session->userdata = array();
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	public function forget_password()
	{
		$this->load->view('forget_password');
	}

	//Todo:Create a class for use send email for all time.
	public function email_restore()
	{
		$email = $this->input->post('txtEmail');
		$email_mahtab = 'mahtab@eb24.xyz';
		$email_valid = $this->usermodel->get_by_email($email);
		if(count($email_valid))
		{
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => $email_mahtab,
				'smtp_pass' => 'korleone9070',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$to = $email;
			$from = $email_mahtab;
			$subject = 'بازیابی رمز عبور';
			$message = 'رمز انتخاب شده توسط شما'.' : '.$email_valid->Password;

			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);

			if($this->email->send())
			{
				$this->session->set_flashdata('message_email_restore','ارسال ایمیل با موفقت انجام شد!');
				redirect(site_url('Welcome/forget_password'));
			}
			else
			{
				$this->session->set_flashdata('message_email_restore','ارسال ایمیل موفقیت آمیز نبود!');
				redirect(site_url('Welcome/forget_password'));
			}
		}
		else
		{
			$this->session->set_flashdata('message_email_restore','این ایمیل در سیستم ثبت نشده است!');
			redirect(site_url('Welcome/forget_password'));
		}
	}
}
