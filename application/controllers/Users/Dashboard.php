<?php
/**
 * created By : Amir Kaftari
 */
class Dashboard extends CI_Controller 
{
	protected $valid_user = true;

	function __construct() 
	{
	    parent::__construct();
		$this->load->model('Userinfomodel');
		$this->load->model('Usermodel');
        $this->load->model('useronlinemodel');
        $this->load->model('Uservisitormodel');
        $this->load->model('Favoritepersonmodel');
        $this->load->library('pagination');
        $this->load->library('zarinpal');
        $this->load->library('notifications');
        $this->load->model('Uservipmodel');
        $this->valid_session();
        $this->complate_profile();
    }

    public function complate_profile()
    {
        $iduser = $this->session->userdata('IDuser');
        $user_info =  $this->Userinfomodel->get_by_id_user($iduser);
        if(count($user_info) == 0)
        {
            $this->valid_user = false;
            if(is_null($this->session->set_flashdata('message_create')))
                $this->session->set_flashdata('message_create', 'لطفا اطلاعات خود را به صورت کامل تکمیل نمایید , تا بتوانید از امکانات پروفایل استفاده نمایید !');
            $data = array('action'=> base_url('Userinfocontroller/create_action'),'button'=>'ثبت اطلاعات');
            $this->template->load('_layout_user','include/index_users',$data);
        }
    }
    
    public function valid_session()
    {
        $iduser = $this->session->userdata('IDuser');
        if(is_null($iduser))
        {
            redirect(base_url('Welcome/logout'));
        }
        else
        {
            $tm=date("Y-m-d H:i:s");
            $data = array(
                'time'=>$tm
            );
            $this->useronlinemodel->update($iduser,$data);
        }
    }

    public function edit_info()
    {
        $iduser = $this->session->userdata('IDuser');
        $user_info = $this->Userinfomodel->get_by_id_user($iduser);
        $data = array('User_info' => $user_info, 'action' => base_url('Userinfocontroller/update_action'), 'button' => 'ویرایش اطلاعات');
        if( $this->valid_user === true)
            $this->template->load('_layout_user', 'include/index_users', $data);
    }
    
    public function index($id = null, $type = null)
    {
        $iduser = $this->session->userdata('IDuser');
        $user_info =  $this->Userinfomodel->get_by_id_user($iduser);

        if($type == 'panel' && isset($user_info->Complete_Profile) && is_null($user_info->Complete_Profile))
        {
            $data = array('action'=> base_url('Userinfocontroller/create_action'),'button'=>'ثبت اطلاعات');
            $this->template->load('_layout_user','include/index_users',$data);
        }
        else
        {
            $userGender = $this->session->userdata('Jender');
            $user_info =  $this->Userinfomodel->get_user_profile($iduser);
            $new_user_info = $this->Userinfomodel->get_new_users($userGender,'ALL',4);
            $last_visitor_user = $this->Uservisitormodel->check_visit($iduser,null,'show');
            $favorite_in_user = $this->Favoritepersonmodel->get_by_favorite_to($iduser);
            $data = array(
                'user_info'=>$user_info,
                'new_user_info'=>$new_user_info,
                'last_visitor'=>$last_visitor_user,
                'favorite_list'=>$favorite_in_user
            );

            if( $this->valid_user === true)
                $this->template->load('_layout_user','user/index',$data);
        }
    }

    public function profiles()
    {
        $userGender = $this->session->userdata('Jender');
        $config['base_url'] = base_url() . 'Users/Dashboard/profiles/';
        $config['total_rows'] = $this->Userinfomodel->total_rows($userGender);
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'Users/Dashboard/profiles/';
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4, 0);

        $user_info = $this->Userinfomodel->get_users_index_random('ALL', $userGender, $config['per_page'], $start);
        $data = array(
            'User_info' => $user_info,
            'pagination' => $this->pagination->create_links(),
            'start' => $start,
        );
        if($this->valid_user === TRUE)
           $this->template->load('_layout_user', 'user/new_profiles', $data);
    }

    public function view_profile($idUser)
    {
        $userGender = $this->session->userdata('Jender');
        $currentUser =  $this->session->userdata('IDuser');
        $user_info = $this->Userinfomodel->get_user_profile($idUser);
        $new_user_info = $this->Userinfomodel->get_new_users($userGender,'ALL');
        $data = array(
            'userInfo'=>$user_info,
            'new_user'=>$new_user_info

        );

        if($idUser != $currentUser)
            $this->create_view_profile($idUser,$currentUser);

        if($this->valid_user)
            $this->load->view('user/view_profile',$data);
    }

    public function personal_message($idUser)
    {
        $data = array('idUser'=>$idUser);
        if($this->valid_user)
            $this->load->view('user/personal_message',$data);
    }

    public function favorite_message($idReciever,$to)
    {
        $idSender = $this->session->userdata('IDuser');
        $data = array('idReceiver'=>$idReciever,'to'=>$to,'sender'=>$idSender);
        if($this->valid_user)
            $this->load->view('user/favorite_message',$data);
    }

    public function upgrade($idUser = null)
    {
        if(is_null($idUser))
            $idUser = $this->session->userdata('IDuser');

        $data = array('idUser'=>$idUser);
        if($this->valid_user)
            $this->load->view('user/upgrade',$data);
    }

    public function identity()
    {
        if($this->valid_user)
            $this->load->view('user/identity');
    }

    public function intro_friends()
    {
        $idSender = $this->session->userdata('IDuser');
        $from = $this->session->userdata('Email');

        $data = array(
            'id_sender'=>$idSender,
            'from'=>$from,
        );
        if($this->valid_user)
            $this->load->view('user/intro_friend',$data);
    }

    public function report_police($Offending_ids,$Offending_names)
    {
        $idSender = $this->session->userdata('IDuser');
        $Offending_name = $Offending_names;
        $Offending_id = $Offending_ids;

        $data = array(
            'Offending_name'=>$Offending_name,
            'Offending_id'=>$Offending_id,
            'reporter'=>$idSender
        );

        $this->load->view('user/report_police',$data);
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

    public function verify()
    {
        $merchant_id = '77e95914-5bde-11e6-83a2-005056a205be';
        if($_GET['Status'] == 'OK')
        {
        
            $idUser = $this->session->userdata('IDuser');
            $info_pay = $this->Uservipmodel->get_by_idUser($idUser);
            $len = 0;
            
            if($info_pay->Amount == 190000)
            	$len = 1;
            elseif($info_pay->Amount == 310000)	
            	$len = 3;
            elseif($info_pay->Amount == 420000)	
            	$len = 6;
            elseif($info_pay->Amount == 570000)	
            	$len = 12;		
            
            if($this->zarinpal->verify($merchant_id , $info_pay->Amount, $info_pay->Authority))
            {
                $refid = $this->zarinpal->getRefId();
                $end_date = gregorian_to_jalali(date('Y-m-d', strtotime('+1 month')));
                $start_date = gregorian_to_jalali(date('Y-m-d'));
                $data = array('Start_date'=>$start_date,'End_date'=>$end_date,'RefId'=>$refid,'length'=>$len,'Status'=>'1');
                $this->Uservipmodel->update($info_pay->ID,$data);
                
                $this->session->set_flashdata('message','پرداخت شما با موفقیت انجام شد !');
                $this->load->view('user/verify');
                // do database
            }
            else
            {
            echo 'دوم خطا';
            exit;
                $error = $this->zarinpal->getError();
                $this->session->set_flashdata('message',$error);
                $this->load->view('user/verify');
                //echo $error;
            }
        }
        else
        {
            //use cancel payment
        }
    }

    public function create_view_profile($idUser,$currentUser)
    {
//        echo $idUser.' '.$currentUser;

        if(!is_null($idUser) && !is_null($currentUser))
        {
            $state_visit = $this->Uservisitormodel->check_visit($idUser,$currentUser);
            if(count($state_visit) > 0)
            {
                $data_update = array(
                    'Date_View' => gregorian_to_jalali(date('Y-m-d')),
                );
                $this->Uservisitormodel->update($state_visit->ID,$data_update);
            }
            else
            {
                $data_insert = array(
                    'IdViewer' => $idUser,
                    'IdVisitor' => $currentUser,
                    'Date_View' => gregorian_to_jalali(date('Y-m-d'))
                );
                $this->Uservisitormodel->insert($data_insert);
            }
        }
    }
    
    public function connect_zarinpal()
    {
        $merchant_id = '77e95914-5bde-11e6-83a2-005056a205be';
        $amount = $this->input->post('Amount');
        $userId = $this->input->post('CodeId');
        $desc = 'حق عضویت ویژه پنل 1 ماهه';
        $call_back = base_url('Users/Dashboard/verify');
        $mobile = '09039048741';
        $email = 'amirkaftari9070@gmail.com';

        if($this->zarinpal->request($merchant_id ,$amount, $desc, $call_back, $mobile, $email)){
            $authority = $this->zarinpal->getAuthority();
            // do database
            $data = array('IdUser'=>$userId,'Authority'=>$authority,'Amount'=>$amount);
            $this->Uservipmodel->insert($data);
            
            $this->zarinpal->redirect();
        }
        else
        {
            $error = $this->zarinpal->getError();
        }

    }

    public function loadComingMessage()
    {
        $usermessage = instance('Favoritemessagemodel','get_unread_message_favorite','noty');
        if(count($usermessage))
        {
            $data = array('Noty'=>1);
            $this->Favoritemessagemodel->update($usermessage->ID,$data);
            $message = 'شما '.' '.count($usermessage).' '.'پیام  علاقه مندی جدید دارید!';
            $this->notifications->notify($message);
            $myAudioFile = base_url('assets/sound/notify.wav');
            echo '<audio hidden="true" autoplay="true" src="'.$myAudioFile.'" controls></audio>';
            echo $this->notifications->display_js();
        }
    }

    public function search()
    {
        $userGender = $this->session->userdata('Jender');
        $config['base_url'] = base_url() . 'Users/Dashboard/profiles/';
        $config['total_rows'] = $this->Userinfomodel->total_rows($userGender);
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'Users/Dashboard/profiles/';
        $this->pagination->initialize($config);
        $start = $this->uri->segment(4, 0);

        $user_info = $this->Userinfomodel->get_users_index_random('ALL', $userGender, $config['per_page'], $start);
        $data = array(
            'User_info' => $user_info,
            'pagination' => $this->pagination->create_links(),
            'start' => $start,
        );
        if($this->valid_user === TRUE)
            $this->template->load('_layout_search', 'user/new_profiles', $data);
    }
}
?>