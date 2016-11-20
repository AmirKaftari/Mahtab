<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userinfomodel extends CI_Model
{

    public $table = 'tbl_userinfo';
    public $id = 'ID';
    public $id_user = 'idUser';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

	//get_userinfo_by_idUser
	function get_by_id_user($id)
    {
        $this->db->where('IdUser', $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($userGender=null)
	{
		if(is_null($userGender))
		{
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}
		else
		{
			//        $this->db->from($this->table);
			$this->db->select('tbl_user.*,tbl_userinfo.*');
			$this->db->from('tbl_user');
			$this->db->join('tbl_userinfo', 'tbl_user.ID = tbl_userinfo.IdUser', 'inner');
			$this->db->where('tbl_user.Jender != ',$userGender);
			return $this->db->count_all_results();
		}
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('ID', $keyword);
	$this->db->or_like('IdUser', $keyword);
	$this->db->or_like('Birthday', $keyword);
	$this->db->or_like('State', $keyword);
	$this->db->or_like('City', $keyword);
	$this->db->or_like('MaridgeState', $keyword);
	$this->db->or_like('Education', $keyword);
	$this->db->or_like('FieldEducation', $keyword);
	$this->db->or_like('JobState', $keyword);
	$this->db->or_like('JobTitle', $keyword);
	$this->db->or_like('FamilyIncome', $keyword);
	$this->db->or_like('Income', $keyword);
	$this->db->or_like('HomeState', $keyword);
	$this->db->or_like('CarState', $keyword);
	$this->db->or_like('Height', $keyword);
	$this->db->or_like('Weight', $keyword);
	$this->db->or_like('SkinColor', $keyword);
	$this->db->or_like('Religion', $keyword);
	$this->db->or_like('Belief', $keyword);
	$this->db->or_like('Hijab', $keyword);
	$this->db->or_like('HealthState', $keyword);
	$this->db->or_like('HealthInfo', $keyword);
	$this->db->or_like('Iam', $keyword);
	$this->db->or_like('WifeIs', $keyword);
	$this->db->or_like('TypePerson', $keyword);
	$this->db->or_like('MaridgeScale', $keyword);
	$this->db->or_like('CountFriends', $keyword);
	$this->db->or_like('LocationLife', $keyword);
	$this->db->or_like('Pretty', $keyword);
	$this->db->or_like('Tip', $keyword);
	$this->db->or_like('LifeStyle', $keyword);
	$this->db->or_like('LocationSelfLife', $keyword);
	$this->db->or_like('UseCigaret', $keyword);
	$this->db->or_like('UseAlcohol', $keyword);
	$this->db->or_like('Emigration', $keyword);
	$this->db->or_like('Dowry', $keyword);
	$this->db->or_like('Of marriage', $keyword);
	$this->db->or_like('MyOccupation', $keyword);
	$this->db->or_like('MyEducation', $keyword);
	$this->db->or_like('WifeOccupation', $keyword);
	$this->db->or_like('WifeEducation', $keyword);
	$this->db->or_like('StudyScale', $keyword);
	$this->db->or_like('SportScale', $keyword);
	$this->db->or_like('MateAge', $keyword);
	$this->db->or_like('MateMarridge', $keyword);
	$this->db->or_like('MateLocation', $keyword);
	$this->db->or_like('MateEducation', $keyword);
	$this->db->or_like('MateFatherEducation', $keyword);
	$this->db->or_like('MateMotherEducation', $keyword);
	$this->db->or_like('FatherEducation', $keyword);
	$this->db->or_like('MatherEducation', $keyword);
	$this->db->or_like('FatherNationality', $keyword);
	$this->db->or_like('MatherNationality', $keyword);
	$this->db->or_like('AtSon', $keyword);
	$this->db->or_like('CountBrother', $keyword);
	$this->db->or_like('CountSister', $keyword);
	$this->db->or_like('MarridgeBroSis', $keyword);
	$this->db->or_like('CountChildren', $keyword);
	$this->db->or_like('AgeBigChild', $keyword);
	$this->db->or_like('CellPhone', $keyword);
	$this->db->or_like('Pic', $keyword);
	$this->db->or_like('MojaradWife', $keyword);
	$this->db->or_like('TalaghWife', $keyword);
	$this->db->or_like('DeadWife', $keyword);
	$this->db->or_like('Hamshahri', $keyword);
	$this->db->or_like('HamOstani', $keyword);
	$this->db->or_like('HamVatan', $keyword);
	$this->db->or_like('Kharej', $keyword);
	$this->db->or_like('MateAgeTo', $keyword);
	$this->db->or_like('MateEducationTo', $keyword);
	$this->db->or_like('MateFatherEducationTo', $keyword);
	$this->db->or_like('MateMotherEducationTo', $keyword);
	$this->db->or_like('GhadAs', $keyword);
	$this->db->or_like('GhadTa', $keyword);
	$this->db->or_like('VaznAs', $keyword);
	$this->db->or_like('VaznTa', $keyword);
	$this->db->or_like('Sefid', $keyword);
	$this->db->or_like('SabzeRoshan', $keyword);
	$this->db->or_like('SabzeTire', $keyword);
	$this->db->or_like('DarAmadFamilyAs', $keyword);
	$this->db->or_like('DarAmadFamilyTa', $keyword);
	$this->db->or_like('DaramadHamsarAs', $keyword);
	$this->db->or_like('DaramadHamsarTa', $keyword);
	$this->db->or_like('HomeNadarad', $keyword);
	$this->db->or_like('HomeDarad', $keyword);
	$this->db->or_like('CarDarad', $keyword);
	$this->db->or_like('CarNadarad', $keyword);
	$this->db->or_like('Sheea', $keyword);
	$this->db->or_like('Soni', $keyword);
	$this->db->or_like('DinMasih', $keyword);
	$this->db->or_like('DinYahod', $keyword);
	$this->db->or_like('MazhabiMoghayad', $keyword);
	$this->db->or_like('Mazhabi', $keyword);
	$this->db->or_like('UnMazhabi', $keyword);
	$this->db->or_like('MohajabeChadori', $keyword);
	$this->db->or_like('BadHejab', $keyword);
	$this->db->or_like('Bihejab', $keyword);
	$this->db->or_like('Salem', $keyword);
	$this->db->or_like('BimarKhas', $keyword);
	$this->db->or_like('NaghsOzv', $keyword);
	$this->db->or_like('Daroongara', $keyword);
	$this->db->or_like('Boroongara', $keyword);
	$this->db->or_like('Fars', $keyword);
	$this->db->or_like('Tork', $keyword);
	$this->db->or_like('Kord', $keyword);
	$this->db->or_like('Lor', $keyword);
	$this->db->or_like('Balooch', $keyword);
	$this->db->or_like('Mazandaran', $keyword);
	$this->db->or_like('Gilak', $keyword);
	$this->db->or_like('Arab', $keyword);
	$this->db->or_like('Sayer', $keyword);
	$this->db->or_like('FarzandNadarad', $keyword);
	$this->db->or_like('FarzandDarad', $keyword);
	$this->db->or_like('SigarNadrad', $keyword);
	$this->db->or_like('SigarDarad', $keyword);
	$this->db->or_like('AlcolNadarad', $keyword);
	$this->db->or_like('AlcolDarad', $keyword);
	$this->db->or_like('MohajeratDarad', $keyword);
	$this->db->or_like('MohajeratNadarad', $keyword);
	$this->db->or_like('TedadBaraKha', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $keyword);
		$this->db->or_like('IdUser', $keyword);
		$this->db->or_like('Birthday', $keyword);
		$this->db->or_like('State', $keyword);
		$this->db->or_like('City', $keyword);
		$this->db->or_like('MaridgeState', $keyword);
		$this->db->or_like('Education', $keyword);
		$this->db->or_like('FieldEducation', $keyword);
		$this->db->or_like('JobState', $keyword);
		$this->db->or_like('JobTitle', $keyword);
		$this->db->or_like('FamilyIncome', $keyword);
		$this->db->or_like('Income', $keyword);
		$this->db->or_like('HomeState', $keyword);
		$this->db->or_like('CarState', $keyword);
		$this->db->or_like('Height', $keyword);
		$this->db->or_like('Weight', $keyword);
		$this->db->or_like('SkinColor', $keyword);
		$this->db->or_like('Religion', $keyword);
		$this->db->or_like('Belief', $keyword);
		$this->db->or_like('Hijab', $keyword);
		$this->db->or_like('HealthState', $keyword);
		$this->db->or_like('HealthInfo', $keyword);
		$this->db->or_like('Iam', $keyword);
		$this->db->or_like('WifeIs', $keyword);
		$this->db->or_like('TypePerson', $keyword);
		$this->db->or_like('MaridgeScale', $keyword);
		$this->db->or_like('CountFriends', $keyword);
		$this->db->or_like('LocationLife', $keyword);
		$this->db->or_like('Pretty', $keyword);
		$this->db->or_like('Tip', $keyword);
		$this->db->or_like('LifeStyle', $keyword);
		$this->db->or_like('LocationSelfLife', $keyword);
		$this->db->or_like('UseCigaret', $keyword);
		$this->db->or_like('UseAlcohol', $keyword);
		$this->db->or_like('Emigration', $keyword);
		$this->db->or_like('Dowry', $keyword);
		$this->db->or_like('Of marriage', $keyword);
		$this->db->or_like('MyOccupation', $keyword);
		$this->db->or_like('MyEducation', $keyword);
		$this->db->or_like('WifeOccupation', $keyword);
		$this->db->or_like('WifeEducation', $keyword);
		$this->db->or_like('StudyScale', $keyword);
		$this->db->or_like('SportScale', $keyword);
		$this->db->or_like('MateAge', $keyword);
		$this->db->or_like('MateMarridge', $keyword);
		$this->db->or_like('MateLocation', $keyword);
		$this->db->or_like('MateEducation', $keyword);
		$this->db->or_like('MateFatherEducation', $keyword);
		$this->db->or_like('MateMotherEducation', $keyword);
		$this->db->or_like('FatherEducation', $keyword);
		$this->db->or_like('MatherEducation', $keyword);
		$this->db->or_like('FatherNationality', $keyword);
		$this->db->or_like('MatherNationality', $keyword);
		$this->db->or_like('AtSon', $keyword);
		$this->db->or_like('CountBrother', $keyword);
		$this->db->or_like('CountSister', $keyword);
		$this->db->or_like('MarridgeBroSis', $keyword);
		$this->db->or_like('CountChildren', $keyword);
		$this->db->or_like('AgeBigChild', $keyword);
		$this->db->or_like('CellPhone', $keyword);
		$this->db->or_like('Pic', $keyword);
		$this->db->or_like('MojaradWife', $keyword);
		$this->db->or_like('TalaghWife', $keyword);
		$this->db->or_like('DeadWife', $keyword);
		$this->db->or_like('Hamshahri', $keyword);
		$this->db->or_like('HamOstani', $keyword);
		$this->db->or_like('HamVatan', $keyword);
		$this->db->or_like('Kharej', $keyword);
		$this->db->or_like('MateAgeTo', $keyword);
		$this->db->or_like('MateEducationTo', $keyword);
		$this->db->or_like('MateFatherEducationTo', $keyword);
		$this->db->or_like('MateMotherEducationTo', $keyword);
		$this->db->or_like('GhadAs', $keyword);
		$this->db->or_like('GhadTa', $keyword);
		$this->db->or_like('VaznAs', $keyword);
		$this->db->or_like('VaznTa', $keyword);
		$this->db->or_like('Sefid', $keyword);
		$this->db->or_like('SabzeRoshan', $keyword);
		$this->db->or_like('SabzeTire', $keyword);
		$this->db->or_like('DarAmadFamilyAs', $keyword);
		$this->db->or_like('DarAmadFamilyTa', $keyword);
		$this->db->or_like('DaramadHamsarAs', $keyword);
		$this->db->or_like('DaramadHamsarTa', $keyword);
		$this->db->or_like('HomeNadarad', $keyword);
		$this->db->or_like('HomeDarad', $keyword);
		$this->db->or_like('CarDarad', $keyword);
		$this->db->or_like('CarNadarad', $keyword);
		$this->db->or_like('Sheea', $keyword);
		$this->db->or_like('Soni', $keyword);
		$this->db->or_like('DinMasih', $keyword);
		$this->db->or_like('DinYahod', $keyword);
		$this->db->or_like('MazhabiMoghayad', $keyword);
		$this->db->or_like('Mazhabi', $keyword);
		$this->db->or_like('UnMazhabi', $keyword);
		$this->db->or_like('MohajabeChadori', $keyword);
		$this->db->or_like('BadHejab', $keyword);
		$this->db->or_like('Bihejab', $keyword);
		$this->db->or_like('Salem', $keyword);
		$this->db->or_like('BimarKhas', $keyword);
		$this->db->or_like('NaghsOzv', $keyword);
		$this->db->or_like('Daroongara', $keyword);
		$this->db->or_like('Boroongara', $keyword);
		$this->db->or_like('Fars', $keyword);
		$this->db->or_like('Tork', $keyword);
		$this->db->or_like('Kord', $keyword);
		$this->db->or_like('Lor', $keyword);
		$this->db->or_like('Balooch', $keyword);
		$this->db->or_like('Mazandaran', $keyword);
		$this->db->or_like('Gilak', $keyword);
		$this->db->or_like('Arab', $keyword);
		$this->db->or_like('Sayer', $keyword);
		$this->db->or_like('FarzandNadarad', $keyword);
		$this->db->or_like('FarzandDarad', $keyword);
		$this->db->or_like('SigarNadrad', $keyword);
		$this->db->or_like('SigarDarad', $keyword);
		$this->db->or_like('AlcolNadarad', $keyword);
		$this->db->or_like('AlcolDarad', $keyword);
		$this->db->or_like('MohajeratDarad', $keyword);
		$this->db->or_like('MohajeratNadarad', $keyword);
		$this->db->or_like('TedadBaraKha', $keyword);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

	function update_pic($id, $data)
	{
		$this->db->where('IdUser', $id);
		$this->db->update($this->table, $data);
	}

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

	//get random users for index.php
	function get_users_index_random($type = null,$GenderUser = null, $limit = null, $start = null)
	{
		$this->db->select('tbl_user.*,tbl_userinfo.*');
//		$this->db->order_by('ID', 'RANDOM');
		$this->db->from('tbl_user');
		$this->db->join('tbl_userinfo', 'tbl_user.ID = tbl_userinfo.IdUser', 'inner');
		$this->db->where('tbl_user.Jender != ',$GenderUser);
		$this->db->limit($limit, $start);
		$this->db->order_by('ID', 'RANDOM');
		if(is_null($type))
		{
			$st =  '';
			$this->db->where('tbl_userinfo.Pic != ',$st);

		}
		return $this->db->get()->result_array();
	}

	//get users for show admin
	function get_users_index($limit = null, $start = null)
	{
		$this->db->select('tbl_user.*,tbl_userinfo.*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_userinfo', 'tbl_user.ID = tbl_userinfo.IdUser', 'inner');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	function get_new_users($GenderUser = null, $type = 'ALL', $limit = 10, $start = 0)
	{
		$this->db->select('tbl_user.*,tbl_userinfo.*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_userinfo', 'tbl_user.ID = tbl_userinfo.IdUser', 'inner');
		$this->db->where('tbl_user.Jender != ',$GenderUser);
		$this->db->limit($limit, $start);
		$this->db->order_by('tbl_user.ID');
		if(is_null($type))
		{
			$st =  '';
			$this->db->where('tbl_userinfo.Pic != ',$st);

		}
		return $this->db->get()->result_array();
	}

	function get_user_profile($idUser)
	{
		$this->db->select('tbl_user.*,tbl_userinfo.*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_userinfo', 'tbl_user.ID = tbl_userinfo.IdUser', 'inner');
		$this->db->where('IdUser',$idUser);
		return $this->db->get()->row_array();
	}

}

/* End of file Userinfomodel.php */
/* Location: ./application/models/Userinfomodel.php */