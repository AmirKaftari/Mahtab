<?php
header('Access-Control-Allow-Origin: *');
class Ajaxcallcontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Custommodel');
	}
	/*
		This function load cities of state when user select StateId
	*/
	public function loadCityByStateId()
	{
		$loadId = $_POST['loadId'];

		$result = $this ->Custommodel->getCityByStateId($loadId);
		$HTML = "";

		if ($result -> num_rows() > 0) 
		{
			foreach ($result->result() as $city) 
			{
				$HTML .= "<option value='" . $city -> id . "'>" . $city -> name . "</option>";
			}
		}
		echo $HTML;
	}
}
/* End of file Ajaxcallcontroller .php */
/* Location: ./application/controllers/Ajax/Ajaxcallcontroller .php */