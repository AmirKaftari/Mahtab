<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userinfocontroller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userinfomodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'Userinfocontroller/index/';
        $config['total_rows'] = $this->userinfomodel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = base_url() . 'Userinfocontroller/index/';
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3, 0);
        $userinfocontroller = $this->userinfomodel->get_users_index($config['per_page'], $start);

        $data = array(
            'userinfocontroller_data' => $userinfocontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('_layout_admin','admin/user/tbl_userinfo_list', $data);
    }

    /*public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'userinfocontroller/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'userinfocontroller/index/';
        }

        $config['total_rows'] = $this->userinfomodel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'userinfocontroller/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $userinfocontroller = $this->userinfomodel->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'userinfocontroller_data' => $userinfocontroller,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('userinfocontroller/tbl_userinfo_list', $data);
    }
*/
    
	/*public function read($id) 
    {
        $row = $this->userinfomodel->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'IdUser' => $row->IdUser,
		'Birthday' => $row->Birthday,
		'State' => $row->State,
		'City' => $row->City,
		'MaridgeState' => $row->MaridgeState,
		'Education' => $row->Education,
		'FieldEducation' => $row->FieldEducation,
		'JobState' => $row->JobState,
		'JobTitle' => $row->JobTitle,
		'FamilyIncome' => $row->FamilyIncome,
		'Income' => $row->Income,
		'HomeState' => $row->HomeState,
		'CarState' => $row->CarState,
		'Height' => $row->Height,
		'Weight' => $row->Weight,
		'SkinColor' => $row->SkinColor,
		'Religion' => $row->Religion,
		'Belief' => $row->Belief,
		'Hijab' => $row->Hijab,
		'HealthState' => $row->HealthState,
		'HealthInfo' => $row->HealthInfo,
		'Iam' => $row->Iam,
		'WifeIs' => $row->WifeIs,
		'TypePerson' => $row->TypePerson,
		'MaridgeScale' => $row->MaridgeScale,
		'CountFriends' => $row->CountFriends,
		'LocationLife' => $row->LocationLife,
		'Pretty' => $row->Pretty,
		'Tip' => $row->Tip,
		'LifeStyle' => $row->LifeStyle,
		'LocationSelfLife' => $row->LocationSelfLife,
		'UseCigaret' => $row->UseCigaret,
		'UseAlcohol' => $row->UseAlcohol,
		'Emigration' => $row->Emigration,
		'Dowry' => $row->Dowry,
		'Of marriage' => $row->Of marriage,
		'MyOccupation' => $row->MyOccupation,
		'MyEducation' => $row->MyEducation,
		'WifeOccupation' => $row->WifeOccupation,
		'WifeEducation' => $row->WifeEducation,
		'StudyScale' => $row->StudyScale,
		'SportScale' => $row->SportScale,
		'MateAge' => $row->MateAge,
		'MateMarridge' => $row->MateMarridge,
		'MateLocation' => $row->MateLocation,
		'MateEducation' => $row->MateEducation,
		'MateFatherEducation' => $row->MateFatherEducation,
		'MateMotherEducation' => $row->MateMotherEducation,
		'FatherEducation' => $row->FatherEducation,
		'MatherEducation' => $row->MatherEducation,
		'FatherNationality' => $row->FatherNationality,
		'MatherNationality' => $row->MatherNationality,
		'AtSon' => $row->AtSon,
		'CountBrother' => $row->CountBrother,
		'CountSister' => $row->CountSister,
		'MarridgeBroSis' => $row->MarridgeBroSis,
		'CountChildren' => $row->CountChildren,
		'AgeBigChild' => $row->AgeBigChild,
		'CellPhone' => $row->CellPhone,
		'Pic' => $row->Pic,
		'MojaradWife' => $row->MojaradWife,
		'TalaghWife' => $row->TalaghWife,
		'DeadWife' => $row->DeadWife,
		'Hamshahri' => $row->Hamshahri,
		'HamOstani' => $row->HamOstani,
		'HamVatan' => $row->HamVatan,
		'Kharej' => $row->Kharej,
		'MateAgeTo' => $row->MateAgeTo,
		'MateEducationTo' => $row->MateEducationTo,
		'MateFatherEducationTo' => $row->MateFatherEducationTo,
		'MateMotherEducationTo' => $row->MateMotherEducationTo,
		'GhadAs' => $row->GhadAs,
		'GhadTa' => $row->GhadTa,
		'VaznAs' => $row->VaznAs,
		'VaznTa' => $row->VaznTa,
		'Sefid' => $row->Sefid,
		'SabzeRoshan' => $row->SabzeRoshan,
		'SabzeTire' => $row->SabzeTire,
		'DarAmadFamilyAs' => $row->DarAmadFamilyAs,
		'DarAmadFamilyTa' => $row->DarAmadFamilyTa,
		'DaramadHamsarAs' => $row->DaramadHamsarAs,
		'DaramadHamsarTa' => $row->DaramadHamsarTa,
		'HomeNadarad' => $row->HomeNadarad,
		'HomeDarad' => $row->HomeDarad,
		'CarDarad' => $row->CarDarad,
		'CarNadarad' => $row->CarNadarad,
		'Sheea' => $row->Sheea,
		'Soni' => $row->Soni,
		'DinMasih' => $row->DinMasih,
		'DinYahod' => $row->DinYahod,
		'MazhabiMoghayad' => $row->MazhabiMoghayad,
		'Mazhabi' => $row->Mazhabi,
		'UnMazhabi' => $row->UnMazhabi,
		'MohajabeChadori' => $row->MohajabeChadori,
		'BadHejab' => $row->BadHejab,
		'Bihejab' => $row->Bihejab,
                 MahojabeKamel' => $row->MahojabeKamel,
		'Salem' => $row->Salem,
		'BimarKhas' => $row->BimarKhas,
		'NaghsOzv' => $row->NaghsOzv,
		'Daroongara' => $row->Daroongara,
		'Boroongara' => $row->Boroongara,
		'Fars' => $row->Fars,
		'Tork' => $row->Tork,
		'Kord' => $row->Kord,
		'Lor' => $row->Lor,
		'Balooch' => $row->Balooch,
		'Mazandaran' => $row->Mazandaran,
		'Gilak' => $row->Gilak,
		'Arab' => $row->Arab,
		'Sayer' => $row->Sayer,
		'FarzandNadarad' => $row->FarzandNadarad,
		'FarzandDarad' => $row->FarzandDarad,
		'SigarNadrad' => $row->SigarNadrad,
		'SigarDarad' => $row->SigarDarad,
		'AlcolNadarad' => $row->AlcolNadarad,
		'AlcolDarad' => $row->AlcolDarad,
		'MohajeratDarad' => $row->MohajeratDarad,
		'MohajeratNadarad' => $row->MohajeratNadarad,
		'TedadBaraKha' => $row->TedadBaraKha,
	    );
            $this->template->load('userinfocontroller/tbl_userinfo_read', $data);
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('userinfocontroller'));
        }
    }
    */
    /*public function create() 
    {
		
        $data = array(
            'button' => 'ایجاد',
            'action' => site_url('userinfocontroller/create_action'),
	    'ID' => set_value('ID'),
	    'IdUser' => set_value('IdUser'),
	    'Birthday' => set_value('Birthday'),
	    'State' => set_value('State'),
	    'City' => set_value('City'),
	    'MaridgeState' => set_value('MaridgeState'),
	    'Education' => set_value('Education'),
	    'FieldEducation' => set_value('FieldEducation'),
	    'JobState' => set_value('JobState'),
	    'JobTitle' => set_value('JobTitle'),
	    'FamilyIncome' => set_value('FamilyIncome'),
	    'Income' => set_value('Income'),
	    'HomeState' => set_value('HomeState'),
	    'CarState' => set_value('CarState'),
	    'Height' => set_value('Height'),
	    'Weight' => set_value('Weight'),
	    'SkinColor' => set_value('SkinColor'),
	    'Religion' => set_value('Religion'),
	    'Belief' => set_value('Belief'),
	    'Hijab' => set_value('Hijab'),
	    'HealthState' => set_value('HealthState'),
	    'HealthInfo' => set_value('HealthInfo'),
	    'Iam' => set_value('Iam'),
	    'WifeIs' => set_value('WifeIs'),
	    'TypePerson' => set_value('TypePerson'),
	    'MaridgeScale' => set_value('MaridgeScale'),
	    'CountFriends' => set_value('CountFriends'),
	    'LocationLife' => set_value('LocationLife'),
	    'Pretty' => set_value('Pretty'),
	    'Tip' => set_value('Tip'),
	    'LifeStyle' => set_value('LifeStyle'),
	    'LocationSelfLife' => set_value('LocationSelfLife'),
	    'UseCigaret' => set_value('UseCigaret'),
	    'UseAlcohol' => set_value('UseAlcohol'),
	    'Emigration' => set_value('Emigration'),
	    'Dowry' => set_value('Dowry'),
	    'Of marriage' => set_value('Of marriage'),
	    'MyOccupation' => set_value('MyOccupation'),
	    'MyEducation' => set_value('MyEducation'),
	    'WifeOccupation' => set_value('WifeOccupation'),
	    'WifeEducation' => set_value('WifeEducation'),
	    'StudyScale' => set_value('StudyScale'),
	    'SportScale' => set_value('SportScale'),
	    'MateAge' => set_value('MateAge'),
	    'MateMarridge' => set_value('MateMarridge'),
	    'MateLocation' => set_value('MateLocation'),
	    'MateEducation' => set_value('MateEducation'),
	    'MateFatherEducation' => set_value('MateFatherEducation'),
	    'MateMotherEducation' => set_value('MateMotherEducation'),
	    'FatherEducation' => set_value('FatherEducation'),
	    'MatherEducation' => set_value('MatherEducation'),
	    'FatherNationality' => set_value('FatherNationality'),
	    'MatherNationality' => set_value('MatherNationality'),
	    'AtSon' => set_value('AtSon'),
	    'CountBrother' => set_value('CountBrother'),
	    'CountSister' => set_value('CountSister'),
	    'MarridgeBroSis' => set_value('MarridgeBroSis'),
	    'CountChildren' => set_value('CountChildren'),
	    'AgeBigChild' => set_value('AgeBigChild'),
	    'CellPhone' => set_value('CellPhone'),
	    'Pic' => set_value('Pic'),
	    'MojaradWife' => set_value('MojaradWife'),
	    'TalaghWife' => set_value('TalaghWife'),
	    'DeadWife' => set_value('DeadWife'),
	    'Hamshahri' => set_value('Hamshahri'),
	    'HamOstani' => set_value('HamOstani'),
	    'HamVatan' => set_value('HamVatan'),
	    'Kharej' => set_value('Kharej'),
	    'MateAgeTo' => set_value('MateAgeTo'),
	    'MateEducationTo' => set_value('MateEducationTo'),
	    'MateFatherEducationTo' => set_value('MateFatherEducationTo'),
	    'MateMotherEducationTo' => set_value('MateMotherEducationTo'),
	    'GhadAs' => set_value('GhadAs'),
	    'GhadTa' => set_value('GhadTa'),
	    'VaznAs' => set_value('VaznAs'),
	    'VaznTa' => set_value('VaznTa'),
	    'Sefid' => set_value('Sefid'),
	    'SabzeRoshan' => set_value('SabzeRoshan'),
	    'SabzeTire' => set_value('SabzeTire'),
	    'DarAmadFamilyAs' => set_value('DarAmadFamilyAs'),
	    'DarAmadFamilyTa' => set_value('DarAmadFamilyTa'),
	    'DaramadHamsarAs' => set_value('DaramadHamsarAs'),
	    'DaramadHamsarTa' => set_value('DaramadHamsarTa'),
	    'HomeNadarad' => set_value('HomeNadarad'),
	    'HomeDarad' => set_value('HomeDarad'),
	    'CarDarad' => set_value('CarDarad'),
	    'CarNadarad' => set_value('CarNadarad'),
	    'Sheea' => set_value('Sheea'),
	    'Soni' => set_value('Soni'),
	    'DinMasih' => set_value('DinMasih'),
	    'DinYahod' => set_value('DinYahod'),
	    'MazhabiMoghayad' => set_value('MazhabiMoghayad'),
	    'Mazhabi' => set_value('Mazhabi'),
	    'UnMazhabi' => set_value('UnMazhabi'),
	    'MohajabeChadori' => set_value('MohajabeChadori'),
	    'BadHejab' => set_value('BadHejab'),
	    'Bihejab' => set_value('Bihejab'),
	    'Salem' => set_value('Salem'),
	    'BimarKhas' => set_value('BimarKhas'),
	    'NaghsOzv' => set_value('NaghsOzv'),
	    'Daroongara' => set_value('Daroongara'),
	    'Boroongara' => set_value('Boroongara'),
	    'Fars' => set_value('Fars'),
	    'Tork' => set_value('Tork'),
	    'Kord' => set_value('Kord'),
	    'Lor' => set_value('Lor'),
	    'Balooch' => set_value('Balooch'),
	    'Mazandaran' => set_value('Mazandaran'),
	    'Gilak' => set_value('Gilak'),
	    'Arab' => set_value('Arab'),
	    'Sayer' => set_value('Sayer'),
	    'FarzandNadarad' => set_value('FarzandNadarad'),
	    'FarzandDarad' => set_value('FarzandDarad'),
	    'SigarNadrad' => set_value('SigarNadrad'),
	    'SigarDarad' => set_value('SigarDarad'),
	    'AlcolNadarad' => set_value('AlcolNadarad'),
	    'AlcolDarad' => set_value('AlcolDarad'),
	    'MohajeratDarad' => set_value('MohajeratDarad'),
	    'MohajeratNadarad' => set_value('MohajeratNadarad'),
	    'TedadBaraKha' => set_value('TedadBaraKha'),
	);
        $this->template->load('tbl_userinfo_form', $data);
    }
    */
    
	public function create_action() 
    {
		$idUser = $this->input->post('userId');

		$path_upload = 'uploads/users';
		$picPath = upload($path_upload);

		if(is_null($picPath))
		{
			$this->session->set_flashdata('message_create', 'در آپلود تصویر شما مشکلی پیش آمده است !');
			redirect(site_url('Users/Dashboard/index/'.$idUser.'/panel'));
		}

        $data = array(
			'IdUser' => $this->input->post('userId',TRUE),
			'Birthday' => $this->input->post('Birthday',TRUE),
			'State' => $this->input->post('_IDState',TRUE),
			'City' => $this->input->post('city_dropdown',TRUE),
			'MaridgeState' => $this->input->post('MaridgeState',TRUE),
			'Education' => $this->input->post('Education',TRUE),
			'FieldEducation' => $this->input->post('FieldEducation',TRUE),
			'JobState' => $this->input->post('JobState',TRUE),
			'JobTitle' => $this->input->post('JobTitle',TRUE),
			'FamilyIncome' => $this->input->post('FamilyIncome',TRUE),
			'Income' => $this->input->post('Income',TRUE),
			'HomeState' => $this->input->post('HomeState',TRUE),
			'CarState' => $this->input->post('CarState',TRUE),
			'Height' => $this->input->post('Height',TRUE),
			'Weight' => $this->input->post('Weight',TRUE),
			'SkinColor' => $this->input->post('SkinColor',TRUE),
			'Religion' => $this->input->post('Religion',TRUE),
			'Belief' => $this->input->post('Belief',TRUE),
			'Hijab' => $this->input->post('Hijab',TRUE),
			'HealthState' => $this->input->post('HealthState',TRUE),
			'HealthInfo' => $this->input->post('HealthInfo',TRUE),
			'Iam' => $this->input->post('Iam',TRUE),
			'WifeIs' => $this->input->post('WifeIs',TRUE),
			'TypePerson' => $this->input->post('TypePerson',TRUE),
			'MaridgeScale' => $this->input->post('MaridgeScale',TRUE),
			'CountFriends' => $this->input->post('CountFriends',TRUE),
			'LocationLife' => $this->input->post('LocationLife',TRUE),
			'Pretty' => $this->input->post('Pretty',TRUE),
			'Tip' => $this->input->post('Tip',TRUE),
			'LifeStyle' => $this->input->post('LifeStyle',TRUE),
			'LocationSelfLife' => $this->input->post('LocationSelfLife',TRUE),
			'UseCigaret' => $this->input->post('UseCigaret',TRUE),
			'UseAlcohol' => $this->input->post('UseAlcohol',TRUE),
			'Emigration' => $this->input->post('Emigration',TRUE),
			'Dowry' => $this->input->post('Dowry',TRUE),
			'Ofmarriage' => $this->input->post('Ofmarriage',TRUE),
			'MyOccupation' => $this->input->post('MyOccupation',TRUE),
			'MyEducation' => $this->input->post('MyEducation',TRUE),
			'WifeOccupation' => $this->input->post('WifeOccupation',TRUE),
			'WifeEducation' => $this->input->post('WifeEducation',TRUE),
			'StudyScale' => $this->input->post('StudyScale',TRUE),
			'SportScale' => $this->input->post('SportScale',TRUE),
			'MateAge' => $this->input->post('MateAge',TRUE),
			'MateMarridge' => $this->input->post('MateMarridge',TRUE),
			'MateLocation' => $this->input->post('MateLocation',TRUE),
			'MateEducation' => $this->input->post('MateEducation',TRUE),
			'MateFatherEducation' => $this->input->post('MateFatherEducation',TRUE),
			'MateMotherEducation' => $this->input->post('MateMotherEducation',TRUE),
			'FatherEducation' => $this->input->post('FatherEducation',TRUE),
			'MatherEducation' => $this->input->post('MatherEducation',TRUE),
			'FatherNationality' => $this->input->post('FatherNationality',TRUE),
			'MatherNationality' => $this->input->post('MatherNationality',TRUE),
			'AtSon' => $this->input->post('AtSon',TRUE),
			'CountBrother' => $this->input->post('CountBrother',TRUE),
			'CountSister' => $this->input->post('CountSister',TRUE),
			'MarridgeBroSis' => $this->input->post('MarridgeBroSis',TRUE),
			'CountChildren' => $this->input->post('CountChildren',TRUE),
			'AgeBigChild' => $this->input->post('AgeBigChild',TRUE),
			'CellPhone' => $this->input->post('CellPhone',TRUE),
			'Pic' => $picPath,
			'StatusPic' => $this->input->post('StatusPic',TRUE),
			'Bikar' => $this->input->post('Bikar',TRUE),
			'Shaghel' => $this->input->post('Shaghel',TRUE),
			'Daneshjoo' => $this->input->post('Daneshjoo',TRUE),
			'MojaradWife' => $this->input->post('MojaradWife',TRUE),
			'TalaghWife' => $this->input->post('TalaghWife',TRUE),
			'DeadWife' => $this->input->post('DeadWife',TRUE),
			'Hamshahri' => $this->input->post('Hamshahri',TRUE),
			'HamOstani' => $this->input->post('HamOstani',TRUE),
			'HamVatan' => $this->input->post('HamVatan',TRUE),
			'Kharej' => $this->input->post('Kharej',TRUE),
			'MateAgeTo' => $this->input->post('MateAgeTo',TRUE),
			'MateEducationTo' => $this->input->post('MateEducationTo',TRUE),
			'MateFatherEducationTo' => $this->input->post('MateFatherEducationTo',TRUE),
			'MateMotherEducationTo' => $this->input->post('MateMotherEducationTo',TRUE),
			'GhadAs' => $this->input->post('GhadAs',TRUE),
			'GhadTa' => $this->input->post('GhadTa',TRUE),
			'VaznAs' => $this->input->post('VaznAs',TRUE),
			'VaznTa' => $this->input->post('VaznTa',TRUE),
			'Sefid' => $this->input->post('Sefid',TRUE),
			'SabzeRoshan' => $this->input->post('SabzeRoshan',TRUE),
			'SabzeTire' => $this->input->post('SabzeTire',TRUE),
			'DarAmadFamilyAs' => $this->input->post('DarAmadFamilyAs',TRUE),
			'DarAmadFamilyTa' => $this->input->post('DarAmadFamilyTa',TRUE),
			'DaramadHamsarAs' => $this->input->post('DaramadHamsarAs',TRUE),
			'DaramadHamsarTa' => $this->input->post('DaramadHamsarTa',TRUE),
			'HomeNadarad' => $this->input->post('HomeNadarad',TRUE),
			'HomeDarad' => $this->input->post('HomeDarad',TRUE),
			'CarDarad' => $this->input->post('CarDarad',TRUE),
			'CarNadarad' => $this->input->post('CarNadarad',TRUE),
			'Sheea' => $this->input->post('Sheea',TRUE),
			'Soni' => $this->input->post('Soni',TRUE),
			'DinMasih' => $this->input->post('DinMasih',TRUE),
			'DinYahod' => $this->input->post('DinYahod',TRUE),
			'MazhabiMoghayad' => $this->input->post('MazhabiMoghayad',TRUE),
			'Mazhabi' => $this->input->post('Mazhabi',TRUE),
			'UnMazhabi' => $this->input->post('UnMazhabi',TRUE),
			'MohajabeChadori' => $this->input->post('MohajabeChadori',TRUE),
			'BadHejab' => $this->input->post('BadHejab',TRUE),
			'Bihejab' => $this->input->post('Bihejab',TRUE),
			'MahojabeKamel' => $this->input->post('MahojabeKamel',TRUE),
			'Salem' => $this->input->post('Salem',TRUE),
			'BimarKhas' => $this->input->post('BimarKhas',TRUE),
			'NaghsOzv' => $this->input->post('NaghsOzv',TRUE),
			'Daroongara' => $this->input->post('Daroongara',TRUE),
			'Boroongara' => $this->input->post('Boroongara',TRUE),
			'Fars' => $this->input->post('Fars',TRUE),
			'Tork' => $this->input->post('Tork',TRUE),
			'Kord' => $this->input->post('Kord',TRUE),
			'Lor' => $this->input->post('Lor',TRUE),
			'Balooch' => $this->input->post('Balooch',TRUE),
			'Mazandaran' => $this->input->post('Mazandaran',TRUE),
			'Gilak' => $this->input->post('Gilak',TRUE),
			'Arab' => $this->input->post('Arab',TRUE),
			'Sayer' => $this->input->post('Sayer',TRUE),
			'FarzandNadarad' => $this->input->post('FarzandNadarad',TRUE),
			'FarzandDarad' => $this->input->post('FarzandDarad',TRUE),
			'SigarNadrad' => $this->input->post('SigarNadrad',TRUE),
			'SigarDarad' => $this->input->post('SigarDarad',TRUE),
			'AlcolNadarad' => $this->input->post('AlcolNadarad',TRUE),
			'AlcolDarad' => $this->input->post('AlcolDarad',TRUE),
			'MohajeratDarad' => $this->input->post('MohajeratDarad',TRUE),
			'MohajeratNadarad' => $this->input->post('MohajeratNadarad',TRUE),
			'TedadBaraKha' => $this->input->post('TedadBaraKha',TRUE),
			'Complete_Profile' => 1,
	    );

            $this->userinfomodel->insert($data);
            $this->session->set_flashdata('message', 'اطلاعات شما با موفقیت ثبت شد!');
			$this->session->set_userdata('Avatar', $picPath);
            redirect(site_url('Users/Dashboard/index/'.$idUser.'/panel'));
        //}
    }

	public function update_action($type = null,$id = null)
	{

		$idUser = $this->input->post('userId');
		if(is_null($idUser) || $idUser == '')
			$idUser = $id;

		if(!is_null($idUser) && $idUser != '')
			$hasPic = $this->userinfomodel->get_by_id_user($idUser);

		$path_upload = 'uploads/users';

		$picPath = upload($path_upload,'Pic','upload');

		if(is_null($picPath) && is_null($hasPic->Pic))
		{
			$this->session->set_flashdata('message', 'در آپلود تصویر شما مشکلی پیش آمده است !');
			if(is_null($type))
				redirect(site_url('Users/Dashboard/index/'.$idUser.'/panel'));
			elseif($type = 'admin')
				redirect(site_url('Admin/Dashboard/edit_info/'.$idUser));
		}
		elseif(!is_null($hasPic->Pic) && $hasPic->Pic != '' && is_null($picPath))
		{
			$picPath = $hasPic->Pic;
		}

               /*if(!is_null($hasPic->Pic) && is_null($picPath))
                      $picPath = $hasPic->Pic;*/



		$data = array(
				'IdUser' => $idUser,
				'Birthday' => $this->input->post('Birthday',TRUE),
				'State' => $this->input->post('_IDState',TRUE),
				'City' => $this->input->post('city_dropdown',TRUE),
				'MaridgeState' => $this->input->post('MaridgeState',TRUE),
				'Education' => $this->input->post('Education',TRUE),
				'FieldEducation' => $this->input->post('FieldEducation',TRUE),
				'JobState' => $this->input->post('JobState',TRUE),
				'JobTitle' => $this->input->post('JobTitle',TRUE),
				'FamilyIncome' => $this->input->post('FamilyIncome',TRUE),
				'Income' => $this->input->post('Income',TRUE),
				'HomeState' => $this->input->post('HomeState',TRUE),
				'CarState' => $this->input->post('CarState',TRUE),
				'Height' => $this->input->post('Height',TRUE),
				'Weight' => $this->input->post('Weight',TRUE),
				'SkinColor' => $this->input->post('SkinColor',TRUE),
				'Religion' => $this->input->post('Religion',TRUE),
				'Belief' => $this->input->post('Belief',TRUE),
				'Hijab' => $this->input->post('Hijab',TRUE),
				'HealthState' => $this->input->post('HealthState',TRUE),
				'HealthInfo' => $this->input->post('HealthInfo',TRUE),
				'Iam' => $this->input->post('Iam',TRUE),
				'WifeIs' => $this->input->post('WifeIs',TRUE),
				'TypePerson' => $this->input->post('TypePerson',TRUE),
				'MaridgeScale' => $this->input->post('MaridgeScale',TRUE),
				'CountFriends' => $this->input->post('CountFriends',TRUE),
				'LocationLife' => $this->input->post('LocationLife',TRUE),
				'Pretty' => $this->input->post('Pretty',TRUE),
				'Tip' => $this->input->post('Tip',TRUE),
				'LifeStyle' => $this->input->post('LifeStyle',TRUE),
				'LocationSelfLife' => $this->input->post('LocationSelfLife',TRUE),
				'UseCigaret' => $this->input->post('UseCigaret',TRUE),
				'UseAlcohol' => $this->input->post('UseAlcohol',TRUE),
				'Emigration' => $this->input->post('Emigration',TRUE),
				'Dowry' => $this->input->post('Dowry',TRUE),
				'Ofmarriage' => $this->input->post('Ofmarriage',TRUE),
				'MyOccupation' => $this->input->post('MyOccupation',TRUE),
				'MyEducation' => $this->input->post('MyEducation',TRUE),
				'WifeOccupation' => $this->input->post('WifeOccupation',TRUE),
				'WifeEducation' => $this->input->post('WifeEducation',TRUE),
				'StudyScale' => $this->input->post('StudyScale',TRUE),
				'SportScale' => $this->input->post('SportScale',TRUE),
				'MateAge' => $this->input->post('MateAge',TRUE),
				'MateMarridge' => $this->input->post('MateMarridge',TRUE),
				'MateLocation' => $this->input->post('MateLocation',TRUE),
				'MateEducation' => $this->input->post('MateEducation',TRUE),
				'MateFatherEducation' => $this->input->post('MateFatherEducation',TRUE),
				'MateMotherEducation' => $this->input->post('MateMotherEducation',TRUE),
				'FatherEducation' => $this->input->post('FatherEducation',TRUE),
				'MatherEducation' => $this->input->post('MatherEducation',TRUE),
				'FatherNationality' => $this->input->post('FatherNationality',TRUE),
				'MatherNationality' => $this->input->post('MatherNationality',TRUE),
				'AtSon' => $this->input->post('AtSon',TRUE),
				'CountBrother' => $this->input->post('CountBrother',TRUE),
				'CountSister' => $this->input->post('CountSister',TRUE),
				'MarridgeBroSis' => $this->input->post('MarridgeBroSis',TRUE),
				'CountChildren' => $this->input->post('CountChildren',TRUE),
				'AgeBigChild' => $this->input->post('AgeBigChild',TRUE),
				'CellPhone' => $this->input->post('CellPhone',TRUE),
				'Pic' => $picPath,
				'StatusPic' => $this->input->post('StatusPic',TRUE),
				'Bikar' => $this->input->post('Bikar',TRUE),
				'Shaghel' => $this->input->post('Shaghel',TRUE),
				'Daneshjoo' => $this->input->post('Daneshjoo',TRUE),
				'MojaradWife' => $this->input->post('MojaradWife',TRUE),
				'TalaghWife' => $this->input->post('TalaghWife',TRUE),
				'DeadWife' => $this->input->post('DeadWife',TRUE),
				'Hamshahri' => $this->input->post('Hamshahri',TRUE),
				'HamOstani' => $this->input->post('HamOstani',TRUE),
				'HamVatan' => $this->input->post('HamVatan',TRUE),
				'Kharej' => $this->input->post('Kharej',TRUE),
				'MateAgeTo' => $this->input->post('MateAgeTo',TRUE),
				'MateEducationTo' => $this->input->post('MateEducationTo',TRUE),
				'MateFatherEducationTo' => $this->input->post('MateFatherEducationTo',TRUE),
				'MateMotherEducationTo' => $this->input->post('MateMotherEducationTo',TRUE),
				'GhadAs' => $this->input->post('GhadAs',TRUE),
				'GhadTa' => $this->input->post('GhadTa',TRUE),
				'VaznAs' => $this->input->post('VaznAs',TRUE),
				'VaznTa' => $this->input->post('VaznTa',TRUE),
				'Sefid' => $this->input->post('Sefid',TRUE),
				'SabzeRoshan' => $this->input->post('SabzeRoshan',TRUE),
				'SabzeTire' => $this->input->post('SabzeTire',TRUE),
				'DarAmadFamilyAs' => $this->input->post('DarAmadFamilyAs',TRUE),
				'DarAmadFamilyTa' => $this->input->post('DarAmadFamilyTa',TRUE),
				'DaramadHamsarAs' => $this->input->post('DaramadHamsarAs',TRUE),
				'DaramadHamsarTa' => $this->input->post('DaramadHamsarTa',TRUE),
				'HomeNadarad' => $this->input->post('HomeNadarad',TRUE),
				'HomeDarad' => $this->input->post('HomeDarad',TRUE),
				'CarDarad' => $this->input->post('CarDarad',TRUE),
				'CarNadarad' => $this->input->post('CarNadarad',TRUE),
				'Sheea' => $this->input->post('Sheea',TRUE),
				'Soni' => $this->input->post('Soni',TRUE),
				'DinMasih' => $this->input->post('DinMasih',TRUE),
				'DinYahod' => $this->input->post('DinYahod',TRUE),
				'MazhabiMoghayad' => $this->input->post('MazhabiMoghayad',TRUE),
				'Mazhabi' => $this->input->post('Mazhabi',TRUE),
				'UnMazhabi' => $this->input->post('UnMazhabi',TRUE),
				'MohajabeChadori' => $this->input->post('MohajabeChadori',TRUE),
				'BadHejab' => $this->input->post('BadHejab',TRUE),
				'Bihejab' => $this->input->post('Bihejab',TRUE),
				'MahojabeKamel' => $this->input->post('MahojabeKamel',TRUE),
				'Salem' => $this->input->post('Salem',TRUE),
				'BimarKhas' => $this->input->post('BimarKhas',TRUE),
				'NaghsOzv' => $this->input->post('NaghsOzv',TRUE),
				'Daroongara' => $this->input->post('Daroongara',TRUE),
				'Boroongara' => $this->input->post('Boroongara',TRUE),
				'Fars' => $this->input->post('Fars',TRUE),
				'Tork' => $this->input->post('Tork',TRUE),
				'Kord' => $this->input->post('Kord',TRUE),
				'Lor' => $this->input->post('Lor',TRUE),
				'Balooch' => $this->input->post('Balooch',TRUE),
				'Mazandaran' => $this->input->post('Mazandaran',TRUE),
				'Gilak' => $this->input->post('Gilak',TRUE),
				'Arab' => $this->input->post('Arab',TRUE),
				'Sayer' => $this->input->post('Sayer',TRUE),
				'FarzandNadarad' => $this->input->post('FarzandNadarad',TRUE),
				'FarzandDarad' => $this->input->post('FarzandDarad',TRUE),
				'SigarNadrad' => $this->input->post('SigarNadrad',TRUE),
				'SigarDarad' => $this->input->post('SigarDarad',TRUE),
				'AlcolNadarad' => $this->input->post('AlcolNadarad',TRUE),
				'AlcolDarad' => $this->input->post('AlcolDarad',TRUE),
				'MohajeratDarad' => $this->input->post('MohajeratDarad',TRUE),
				'MohajeratNadarad' => $this->input->post('MohajeratNadarad',TRUE),
				'TedadBaraKha' => $this->input->post('TedadBaraKha',TRUE),
				'Complete_Profile' => 1,
		);

		$this->userinfomodel->update($idUser, $data);
		$this->session->set_flashdata('message', 'ویرایش رکورد با موفقیت انجام شد');
		if(is_null($type))
			redirect(site_url('Users/Dashboard/index/'.$idUser.'/panel'));
		elseif($type = 'admin')
			redirect(site_url('Admin/Dashboard/edit_info/'.$idUser));
//		}
	}

	public function delete_pic()
	{
		$idUser = $this->session->userdata('IDuser');
		$data = array(
			'Pic'=>null
		);
		$this->userinfomodel->update_pic($idUser,$data);
		$this->session->set_flashdata('message', 'حذف تصویر شما با موفقیت انجام شد!');
		redirect(site_url('Users/Dashboard/index/null/panel'));
	}

    
    /*public function update($id) 
    {
        $row = $this->userinfomodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'ویرایش',
                'action' => site_url('userinfocontroller/update_action'),
		'ID' => set_value('ID', $row->ID),
		'IdUser' => set_value('IdUser', $row->IdUser),
		'Birthday' => set_value('Birthday', $row->Birthday),
		'State' => set_value('State', $row->State),
		'City' => set_value('City', $row->City),
		'MaridgeState' => set_value('MaridgeState', $row->MaridgeState),
		'Education' => set_value('Education', $row->Education),
		'FieldEducation' => set_value('FieldEducation', $row->FieldEducation),
		'JobState' => set_value('JobState', $row->JobState),
		'JobTitle' => set_value('JobTitle', $row->JobTitle),
		'FamilyIncome' => set_value('FamilyIncome', $row->FamilyIncome),
		'Income' => set_value('Income', $row->Income),
		'HomeState' => set_value('HomeState', $row->HomeState),
		'CarState' => set_value('CarState', $row->CarState),
		'Height' => set_value('Height', $row->Height),
		'Weight' => set_value('Weight', $row->Weight),
		'SkinColor' => set_value('SkinColor', $row->SkinColor),
		'Religion' => set_value('Religion', $row->Religion),
		'Belief' => set_value('Belief', $row->Belief),
		'Hijab' => set_value('Hijab', $row->Hijab),
		'HealthState' => set_value('HealthState', $row->HealthState),
		'HealthInfo' => set_value('HealthInfo', $row->HealthInfo),
		'Iam' => set_value('Iam', $row->Iam),
		'WifeIs' => set_value('WifeIs', $row->WifeIs),
		'TypePerson' => set_value('TypePerson', $row->TypePerson),
		'MaridgeScale' => set_value('MaridgeScale', $row->MaridgeScale),
		'CountFriends' => set_value('CountFriends', $row->CountFriends),
		'LocationLife' => set_value('LocationLife', $row->LocationLife),
		'Pretty' => set_value('Pretty', $row->Pretty),
		'Tip' => set_value('Tip', $row->Tip),
		'LifeStyle' => set_value('LifeStyle', $row->LifeStyle),
		'LocationSelfLife' => set_value('LocationSelfLife', $row->LocationSelfLife),
		'UseCigaret' => set_value('UseCigaret', $row->UseCigaret),
		'UseAlcohol' => set_value('UseAlcohol', $row->UseAlcohol),
		'Emigration' => set_value('Emigration', $row->Emigration),
		'Dowry' => set_value('Dowry', $row->Dowry),
		'Of marriage' => set_value('Of marriage', $row->Of marriage),
		'MyOccupation' => set_value('MyOccupation', $row->MyOccupation),
		'MyEducation' => set_value('MyEducation', $row->MyEducation),
		'WifeOccupation' => set_value('WifeOccupation', $row->WifeOccupation),
		'WifeEducation' => set_value('WifeEducation', $row->WifeEducation),
		'StudyScale' => set_value('StudyScale', $row->StudyScale),
		'SportScale' => set_value('SportScale', $row->SportScale),
		'MateAge' => set_value('MateAge', $row->MateAge),
		'MateMarridge' => set_value('MateMarridge', $row->MateMarridge),
		'MateLocation' => set_value('MateLocation', $row->MateLocation),
		'MateEducation' => set_value('MateEducation', $row->MateEducation),
		'MateFatherEducation' => set_value('MateFatherEducation', $row->MateFatherEducation),
		'MateMotherEducation' => set_value('MateMotherEducation', $row->MateMotherEducation),
		'FatherEducation' => set_value('FatherEducation', $row->FatherEducation),
		'MatherEducation' => set_value('MatherEducation', $row->MatherEducation),
		'FatherNationality' => set_value('FatherNationality', $row->FatherNationality),
		'MatherNationality' => set_value('MatherNationality', $row->MatherNationality),
		'AtSon' => set_value('AtSon', $row->AtSon),
		'CountBrother' => set_value('CountBrother', $row->CountBrother),
		'CountSister' => set_value('CountSister', $row->CountSister),
		'MarridgeBroSis' => set_value('MarridgeBroSis', $row->MarridgeBroSis),
		'CountChildren' => set_value('CountChildren', $row->CountChildren),
		'AgeBigChild' => set_value('AgeBigChild', $row->AgeBigChild),
		'CellPhone' => set_value('CellPhone', $row->CellPhone),
		'Pic' => set_value('Pic', $row->Pic),
		'MojaradWife' => set_value('MojaradWife', $row->MojaradWife),
		'TalaghWife' => set_value('TalaghWife', $row->TalaghWife),
		'DeadWife' => set_value('DeadWife', $row->DeadWife),
		'Hamshahri' => set_value('Hamshahri', $row->Hamshahri),
		'HamOstani' => set_value('HamOstani', $row->HamOstani),
		'HamVatan' => set_value('HamVatan', $row->HamVatan),
		'Kharej' => set_value('Kharej', $row->Kharej),
		'MateAgeTo' => set_value('MateAgeTo', $row->MateAgeTo),
		'MateEducationTo' => set_value('MateEducationTo', $row->MateEducationTo),
		'MateFatherEducationTo' => set_value('MateFatherEducationTo', $row->MateFatherEducationTo),
		'MateMotherEducationTo' => set_value('MateMotherEducationTo', $row->MateMotherEducationTo),
		'GhadAs' => set_value('GhadAs', $row->GhadAs),
		'GhadTa' => set_value('GhadTa', $row->GhadTa),
		'VaznAs' => set_value('VaznAs', $row->VaznAs),
		'VaznTa' => set_value('VaznTa', $row->VaznTa),
		'Sefid' => set_value('Sefid', $row->Sefid),
		'SabzeRoshan' => set_value('SabzeRoshan', $row->SabzeRoshan),
		'SabzeTire' => set_value('SabzeTire', $row->SabzeTire),
		'DarAmadFamilyAs' => set_value('DarAmadFamilyAs', $row->DarAmadFamilyAs),
		'DarAmadFamilyTa' => set_value('DarAmadFamilyTa', $row->DarAmadFamilyTa),
		'DaramadHamsarAs' => set_value('DaramadHamsarAs', $row->DaramadHamsarAs),
		'DaramadHamsarTa' => set_value('DaramadHamsarTa', $row->DaramadHamsarTa),
		'HomeNadarad' => set_value('HomeNadarad', $row->HomeNadarad),
		'HomeDarad' => set_value('HomeDarad', $row->HomeDarad),
		'CarDarad' => set_value('CarDarad', $row->CarDarad),
		'CarNadarad' => set_value('CarNadarad', $row->CarNadarad),
		'Sheea' => set_value('Sheea', $row->Sheea),
		'Soni' => set_value('Soni', $row->Soni),
		'DinMasih' => set_value('DinMasih', $row->DinMasih),
		'DinYahod' => set_value('DinYahod', $row->DinYahod),
		'MazhabiMoghayad' => set_value('MazhabiMoghayad', $row->MazhabiMoghayad),
		'Mazhabi' => set_value('Mazhabi', $row->Mazhabi),
		'UnMazhabi' => set_value('UnMazhabi', $row->UnMazhabi),
		'MohajabeChadori' => set_value('MohajabeChadori', $row->MohajabeChadori),
		'BadHejab' => set_value('BadHejab', $row->BadHejab),
		'Bihejab' => set_value('Bihejab', $row->Bihejab),
		'Salem' => set_value('Salem', $row->Salem),
		'BimarKhas' => set_value('BimarKhas', $row->BimarKhas),
		'NaghsOzv' => set_value('NaghsOzv', $row->NaghsOzv),
		'Daroongara' => set_value('Daroongara', $row->Daroongara),
		'Boroongara' => set_value('Boroongara', $row->Boroongara),
		'Fars' => set_value('Fars', $row->Fars),
		'Tork' => set_value('Tork', $row->Tork),
		'Kord' => set_value('Kord', $row->Kord),
		'Lor' => set_value('Lor', $row->Lor),
		'Balooch' => set_value('Balooch', $row->Balooch),
		'Mazandaran' => set_value('Mazandaran', $row->Mazandaran),
		'Gilak' => set_value('Gilak', $row->Gilak),
		'Arab' => set_value('Arab', $row->Arab),
		'Sayer' => set_value('Sayer', $row->Sayer),
		'FarzandNadarad' => set_value('FarzandNadarad', $row->FarzandNadarad),
		'FarzandDarad' => set_value('FarzandDarad', $row->FarzandDarad),
		'SigarNadrad' => set_value('SigarNadrad', $row->SigarNadrad),
		'SigarDarad' => set_value('SigarDarad', $row->SigarDarad),
		'AlcolNadarad' => set_value('AlcolNadarad', $row->AlcolNadarad),
		'AlcolDarad' => set_value('AlcolDarad', $row->AlcolDarad),
		'MohajeratDarad' => set_value('MohajeratDarad', $row->MohajeratDarad),
		'MohajeratNadarad' => set_value('MohajeratNadarad', $row->MohajeratNadarad),
		'TedadBaraKha' => set_value('TedadBaraKha', $row->TedadBaraKha),
	    );
            $this->template->load('tbl_userinfo_form', $data);
        } else {
            $this->session->set_flashdata('message', 'اطلاعات پیدا نشد');
            redirect(site_url('userinfocontroller'));
        }
    }

    public function delete($id) 
    {
        $row = $this->userinfomodel->get_by_id($id);

        if ($row) {
            $this->userinfomodel->delete($id);
            $this->session->set_flashdata('message', 'حذف رکورد با موفقیت انجام شد');
            redirect(site_url('userinfocontroller'));
        } else {
            $this->session->set_flashdata('message', 'رکورد مورد نظر پیدا نشد');
            redirect(site_url('userinfocontroller'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('IdUser', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Birthday', ' ', 'trim|required');
	$this->form_validation->set_rules('State', ' ', 'trim|required');
	$this->form_validation->set_rules('City', ' ', 'trim|required');
	$this->form_validation->set_rules('MaridgeState', ' ', 'trim|required');
	$this->form_validation->set_rules('Education', ' ', 'trim|required');
	$this->form_validation->set_rules('FieldEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('JobState', ' ', 'trim|required');
	$this->form_validation->set_rules('JobTitle', ' ', 'trim|required');
	$this->form_validation->set_rules('FamilyIncome', ' ', 'trim|required');
	$this->form_validation->set_rules('Income', ' ', 'trim|required');
	$this->form_validation->set_rules('HomeState', ' ', 'trim|required');
	$this->form_validation->set_rules('CarState', ' ', 'trim|required');
	$this->form_validation->set_rules('Height', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Weight', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('SkinColor', ' ', 'trim|required');
	$this->form_validation->set_rules('Religion', ' ', 'trim|required');
	$this->form_validation->set_rules('Belief', ' ', 'trim|required');
	$this->form_validation->set_rules('Hijab', ' ', 'trim|required');
	$this->form_validation->set_rules('HealthState', ' ', 'trim|required');
	$this->form_validation->set_rules('HealthInfo', ' ', 'trim|required');
	$this->form_validation->set_rules('Iam', ' ', 'trim|required');
	$this->form_validation->set_rules('WifeIs', ' ', 'trim|required');
	$this->form_validation->set_rules('TypePerson', ' ', 'trim|required');
	$this->form_validation->set_rules('MaridgeScale', ' ', 'trim|required');
	$this->form_validation->set_rules('CountFriends', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('LocationLife', ' ', 'trim|required');
	$this->form_validation->set_rules('Pretty', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Tip', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('LifeStyle', ' ', 'trim|required');
	$this->form_validation->set_rules('LocationSelfLife', ' ', 'trim|required');
	$this->form_validation->set_rules('UseCigaret', ' ', 'trim|required');
	$this->form_validation->set_rules('UseAlcohol', ' ', 'trim|required');
	$this->form_validation->set_rules('Emigration', ' ', 'trim|required');
	$this->form_validation->set_rules('Dowry', ' ', 'trim|required');
	$this->form_validation->set_rules('Of marriage', ' ', 'trim|required');
	$this->form_validation->set_rules('MyOccupation', ' ', 'trim|required');
	$this->form_validation->set_rules('MyEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('WifeOccupation', ' ', 'trim|required');
	$this->form_validation->set_rules('WifeEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('StudyScale', ' ', 'trim|required');
	$this->form_validation->set_rules('SportScale', ' ', 'trim|required');
	$this->form_validation->set_rules('MateAge', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MateMarridge', ' ', 'trim|required');
	$this->form_validation->set_rules('MateLocation', ' ', 'trim|required');
	$this->form_validation->set_rules('MateEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('MateFatherEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('MateMotherEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('FatherEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('MatherEducation', ' ', 'trim|required');
	$this->form_validation->set_rules('FatherNationality', ' ', 'trim|required');
	$this->form_validation->set_rules('MatherNationality', ' ', 'trim|required');
	$this->form_validation->set_rules('AtSon', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('CountBrother', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('CountSister', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MarridgeBroSis', ' ', 'trim|required');
	$this->form_validation->set_rules('CountChildren', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('AgeBigChild', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('CellPhone', ' ', 'trim|required');
	$this->form_validation->set_rules('Pic', ' ', 'trim|required');
	$this->form_validation->set_rules('MojaradWife', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('TalaghWife', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('DeadWife', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Hamshahri', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('HamOstani', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('HamVatan', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Kharej', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MateAgeTo', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MateEducationTo', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MateFatherEducationTo', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MateMotherEducationTo', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('GhadAs', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('GhadTa', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('VaznAs', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('VaznTa', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Sefid', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('SabzeRoshan', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('SabzeTire', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('DarAmadFamilyAs', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('DarAmadFamilyTa', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('DaramadHamsarAs', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('DaramadHamsarTa', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('HomeNadarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('HomeDarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('CarDarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('CarNadarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Sheea', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Soni', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('DinMasih', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('DinYahod', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MazhabiMoghayad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Mazhabi', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('UnMazhabi', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MohajabeChadori', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('BadHejab', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Bihejab', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Salem', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('BimarKhas', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('NaghsOzv', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Daroongara', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Boroongara', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Fars', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Tork', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Kord', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Lor', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Balooch', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Mazandaran', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Gilak', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Arab', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('Sayer', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('FarzandNadarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('FarzandDarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('SigarNadrad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('SigarDarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('AlcolNadarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('AlcolDarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MohajeratDarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('MohajeratNadarad', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('TedadBaraKha', ' ', 'trim|required|numeric');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
*/
};

/* End of file Userinfocontroller.php */
/* Location: ./application/controllers/Userinfocontroller.php */