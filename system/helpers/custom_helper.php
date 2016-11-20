<?php
/**
 * Created By Amir Kaftari <amirkaftari9070@gmail.com>
 * This helper includes some function that usefull for any project of codeigniter.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//-----------------------------------------------

function create_instance_access()
{
    $CI = &get_instance();
    return $CI;
}

function instance($model, $function, $variables = null,$twoVariable = null)
{
    $my_this = create_instance_access();
    $my_this->load->model($model);
    $result = $my_this->$model->$function($variables,$twoVariable);
    return $result;
}

function upload($path,$filename = 'Pic', $type=null)
{
    $my_this = create_instance_access();
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']	= '500';
    $config['max_width']  = '2048';
    $config['max_height']  = '1600';

    $my_this->load->library('upload', $config);


    if($my_this->upload->do_upload($filename))
    {
        $data = $my_this->upload->data();
        $picPath = $data['file_name'];
        return $picPath;
    }
    elseif(is_null($type))
    {
        echo $my_this->upload->display_errors();
        exit;
    }
    return null;
}

function tr_num($str,$mod='en',$mf='?'){
    $num_a=array('0','1','2','3','4','5','6','7','8','9','.');
    $key_a=array('?','?','?','?','?','?','?','?','?','?',$mf);
    return($mod=='fa')?str_replace($num_a,$key_a,$str):str_replace($key_a,$num_a,$str);
}

function gregorian_to_jalali($date , $mod = '-')
{
    list($g_y, $g_m, $g_d) = explode('-', $date);
    $g_y= tr_num($g_y); $g_m=tr_num($g_m); $g_d= tr_num($g_d);
    $d_4=$g_y%4;
    $g_a=array(0,0,31,59,90,120,151,181,212,243,273,304,334);
    $doy_g=$g_a[(int)$g_m]+$g_d;
    if($d_4==0 and $g_m>2)$doy_g++;
    $d_33=(int)((($g_y-16)%132)*.0305);
    $a=($d_33==3 or $d_33<($d_4-1) or $d_4==0)?286:287;
    $b=(($d_33==1 or $d_33==2) and ($d_33==$d_4 or $d_4==1))?78:(($d_33==3 and $d_4==0)?80:79);
    if((int)(($g_y-10)/63)==30){$a--;$b++;}
    if($doy_g>$b)
    {
        $jy=$g_y-621; $doy_j=$doy_g-$b;
    }
    else
    {
        $jy=$g_y-622; $doy_j=$doy_g+$a;
    }
    if($doy_j<187)
    {
        $jm=(int)(($doy_j-1)/31); $jd=$doy_j-(31*$jm++);
    }
    else
    {
        $jm=(int)(($doy_j-187)/30); $jd=$doy_j-186-($jm*30); $jm+=7;
    }
    return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
}

function jalali_to_gregorian($date , $mod = '-')
{
    list($j_y, $j_m, $j_d) = explode('-', $date);
    $j_y= tr_num($j_y); $j_m=tr_num($j_m); $j_d=tr_num($j_d);
    $d_4=($j_y+1)%4;
    $doy_j=($j_m<7)?(($j_m-1)*31)+$j_d:(($j_m-7)*30)+$j_d+186;
    $d_33=(int)((($j_y-55)%132)*.0305);
    $a=($d_33!=3 and $d_4<=$d_33)?287:286;
    $b=(($d_33==1 or $d_33==2) and ($d_33==$d_4 or $d_4==1))?78:(($d_33==3 and $d_4==0)?80:79);
    if((int)(($j_y-19)/63)==20){$a--;$b++;}
    if($doy_j<=$a){
        $gy=$j_y+621; $gd=$doy_j+$b;
    }else{
        $gy=$j_y+622; $gd=$doy_j-$a;
    }
    foreach(array(0,31,($gy%4==0)?29:28,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
        if($gd<=$v)break;
        $gd-=$v;
    }
    return($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd;
}