<?php
/**
 * Created by PhpStorm.
 * User: Programmer
 * Date: 01/29/2016
 * Time: 01:56 PM
 */
class Date
{
    function __construct()
    {
//        parent::__construct();
        $this->load->library('jdf');
    }

    public function convert_jalali_to_georgian($jalali_date = null)
    {
        echo "gholi";
        list($y, $m, $d) = explode('/',$jalali_date);
        $miladi_date =  $this->jdf->jalali_to_georgian($y, $m, $d, '-');
        return $miladi_date;

    }

    public static function convert_georgian_to_jalali()
    {

    }

}