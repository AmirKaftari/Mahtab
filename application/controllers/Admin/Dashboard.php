<?php
/**
 * created By : Amir Kaftari
 */
class Dashboard extends CI_Controller 
{
	function __construct() 
	{
	    parent::__construct();
		$this->load->model('Userinfomodel');
		$this->load->model('Usermodel');
        $this->load->model('useronlinemodel');
        $this->load->model('Uservisitormodel');
        $this->load->model('Favoritepersonmodel');
        $this->load->library('pagination');
        $this->valid_session();
    }
	
    public function valid_session()
    {
        $idadmin = $this->session->userdata('IDadmin');
        if(is_null($idadmin))
        {
            redirect(base_url('Welcome/logout'));
        }
    }

    public function edit_info($IdUser)
    {
//        $iduser = $this->session->userdata('IDuser');
        $user_info =  $this->Userinfomodel->get_by_id_user($IdUser);

        $data = array('User_info' => $user_info, 'action' => base_url('Userinfocontroller/update_action/admin/'.$IdUser), 'button' => 'ویرایش اطلاعات');
        $this->template->load('_layout_admin','admin/user/index_users',$data);

    }
    
    public function index()
    {
        $this->template->load('_layout_admin','admin/index');
    }

    public function send_email()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'heravi@time-gr.com',
            'smtp_pass' => 'korleone2226997',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email',$config);

        $to = $this->input->post('txtTo');
        $from = $this->input->post('txtFrom');
        $subject = 'شما به وب سایت همسریابی و همسان گزینی مهتاب دعوت شده اید!';
        $message = $this->input->post('txtMessage');

        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);


        if($this->email->send())
        {
            $this->session->set_flashdata('message','ارسال ایمیل با موفقت انجام شد!');
            redirect(site_url('Users/Dashboard/intro_friends'));
        }
        else
        {
            $this->session->set_flashdata('message','ارسال ایمیل موفقیت آمیز نبود!');
            redirect(site_url('Users/Dashboard/intro_friends'));
        }
    }

 
}
?>