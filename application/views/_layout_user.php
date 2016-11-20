<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>پرتال کاربران وب سایت مهتاب</title>
    <!--     <meta content="width=device-width, initial-scale=1.0" name="viewport" />-->
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.rtl.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/dashboard/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/dashboard/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/dashboard/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/dashboard/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/chosen.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/parsley.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap-fileupload.min.css" />
    <link href="<?php echo base_url('assets/datePicker/css/persian-datepicker.css') ?>" rel="stylesheet" type="text/css"/>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="<?php echo base_url('') ?>assets/dashboard/assets/css/layout2.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/dashboard/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/dashboard/assets/plugins/timeline/timeline.css" />

    <!-- END PAGE LEVEL  STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>


    <![endif]-->


    <!--<link href="<?php echo base_url('') ?>assets/date/csspersian-datepicker-blue.css" rel="stylesheet" type="text/css"/>-->

    <script>
        $(document).ready(function(){
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53 " >

<div style="margin-top: 8px" class="messagefavorite">

</div>
<!-- MAIN WRAPPER -->
<div id="wrap" >


    <!-- HEADER SECTION -->
    <div id="top">

        <nav class="navbar navbar-inverse navbar-fixed-top " style="padding: 10px;">
<!--            <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">-->
<!--                <i class="icon-align-justify"></i>-->
<!--            </a>-->
            <!-- LOGO SECTION -->
            <header class="navbar-header">

                <a href="<?php echo base_url('Users/dashboard'); ?>" class="navbar-brand">
                    <img src="<?php echo base_url('') ?>assets/dashboard/assets/img/logo.png" alt="" height="30" />
                    <h1 class="site-title">وب سایت همسریابی و همسان گزینی مهتاب</h1>
                </a>
            </header>
            <!-- END LOGO SECTION -->
            <ul class="nav navbar-top-links navbar-left">

                <!-- MESSAGES SECTION -->
                <div id="message_comming">

                </div>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('Users/Dashboard/edit_info'); ?>"><i class="icon-user"></i> مشاهده پروفایل </a>
                        </li>
                        <li class="divider"></li>
						<li><a href="<?php echo base_url('Usercontroller/showProfile'); ?>"><i class="icon-user"></i> ویرایش اطلاعات </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('welcome/logout') ?>"><i class="icon-signout"></i> خروج </a>
                        </li>
                    </ul>

                </li>
                <!--END ADMIN SETTINGS -->
            </ul>

        </nav>

    </div>
    <!-- END HEADER SECTION -->



    <!-- MENU SECTION -->
    <div id="right">
        <div class="media user-media well-small">
            <a class="user-link" href="#">
                <img width="100" height="100" class="media-object img-thumbnail user-img" alt="User Picture" src="
					<?php
                $iduser = $this->session->userdata('IDuser');
                $user_info =  instance('Userinfomodel','get_by_id_user',$iduser);

                if(isset($user_info->Pic) && !is_null($user_info->Pic) && $user_info->Pic != '')
                {
                    //$pic_path2 = $user_info->Pic;
                    echo base_url('uploads/users/'.$user_info->Pic);
                }
                else
                {
                    echo base_url('assets/dashboard/assets/img/unknown.png');
                }
                ?>"
                    />
            </a>
            <br />
            <div class="media-body">
                <h5 class="media-heading"><?php $fullname = $this->session->userdata('Name').' '.$this->session->userdata('Lastname'); echo $fullname ; ?></h5>
                <ul class="list-unstyled user-info">

                    <li>
                        <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> آنلاین

                    </li>

                </ul>
            </div>
            <br />
        </div>

        <ul id="menu" class="collapse">


            <li class="panel active">
                <a href="<?php echo base_url('Users/dashboard') ?>" >
                    <i class="icon-table"></i> داشبورد
                </a>
            </li>

            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#nav-profile">
                    <i class="icon-male"></i>  مدیریت مشخصات و هویت

                        <span class="pull-left">
                            <i class="icon-angle-right"></i>
                        </span>
                </a>
                <ul class="collapse" id="nav-profile">
                    <li><a href="<?php echo base_url('Users/Dashboard/identity') ?>"><i class="icon-male"></i> احراز هویت</a></li>
                    <li><a href="<?php echo base_url('Userinfocontroller/delete_pic') ?>"><i class="icon-male"></i> حذف تصویر</a></li>
                </ul>
            </li>

            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#nav-message">
                    <i class="icon-envelope-alt"></i>  مدیریت پیام ها

                        <span class="pull-left">
                            <i class="icon-angle-right"></i>
                        </span>
                </a>
                <ul class="collapse" id="nav-message">
                    <li><a href="<?php echo base_url('Favoritemessagecontroller'); ?>"><i class="icon-envelope-alt"></i> پیام های علاقه مندی</a></li>
                    <li><a href="<?php echo base_url('Favoritemessagecontroller/index/null/send'); ?>"><i class="icon-envelope-alt"></i> پیام های ارسالی </a></li>
                    <li><a href="<?php echo base_url('Users/Dashboard/intro_friends') ?>"><i class="icon-envelope-alt"></i> ارسال دعوت نامه </a></li>
                </ul>
            </li>

            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#nav-vip">
                    <i class="icon-gift"></i>  عضویت ویژه

                        <span class="pull-left">
                            <i class="icon-angle-right"></i>
                        </span>
                </a>
                <ul class="collapse" id="nav-vip">
                    <li><a href="#"><i class="icon-gift"></i> پرداخت ها</a></li>
                    <li><a href="<?php echo base_url('Users/Dashboard/upgrade') ?>"><i class="icon-gift"></i> خرید عضویت ویژه</a></li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="icon-gift"></i> راهنمای عضویت ویژه</a></li>
                </ul>
            </li>

            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#nav-persons">
                    <i class="icon-group"></i>  مدیریت اشخاص

                        <span class="pull-left">
                            <i class="icon-angle-right"></i>
                        </span>
                </a>
                <ul class="collapse" id="nav-persons">
                    <li><a href="<?php echo base_url('Favoritepersoncontroller') ?>"><i class="icon-group"></i>علاقه مندیها </a></li>
                    <li><a href=""><i class="icon-group"></i>بلاک شده ها </a></li>
                </ul>
            </li>
            <li><a href=""><i class="icon-female"></i> ثبت ازدواج / انصراف </a></li>
            <li><a href="<?php echo base_url('Users/Dashboard/search') ?>"><i class="icon-search"></i> جستجو </a></li>
        </ul>


    </div>

    <!--END MENU SECTION -->

    <!--PAGE CONTENT -->
    <div id="content">
        <div class="inner" style="min-height: 700px;">
            <div > <?php echo $contents ?> </div>
        </div>
    </div>
    <!--END PAGE CONTENT -->

    <!-- RIGHT STRIP  SECTION -->
    <br />
    <div id="right">
        <div class="well well-small">
            <p>کاربران آنلاین :</p>
            <ul class="list-unstyled">
                <?php
                $user_online = instance('useronlinemodel','get_all_online_user',null);
                $idUser = $this->session->userdata('IDuser');
                foreach ($user_online as $user)
                {
                    $user_online_info = instance('userinfomodel','get_user_profile',$user['IdUser']);
                    if(!isset($user_online_info['State']) || $user['IdUser'] == $idUser)
                        continue;
                    $user_state = instance('provincemodel','get_by_id',$user_online_info['State']);
//                    else
//                        $user_state->name = 'نامشخص';
//                    ?>
                    <a href="<?php echo base_url('Users/Dashboard/view_profile/'.$user['IdUser']) ?>"><li><?php echo $user_online_info['Name'] ?><span><?php echo ' '.$user_state->name ?></span></li></a>
                <?php } ?>
                <br />
                <a href="<?php echo base_url('Users/Dashboard/profiles') ?>"><li style="font-size: small">مشاهده همه کاربران<?php /*echo ' ( '.count($user_online).' ) ' */?></li></a>
            </ul>
        </div>

        <div class="well well-small">
            <p>جدیدترین کاربران : </p>
            <ul class="list-unstyled">
                <?php
                $userGender = $this->session->userdata('Jender');
                $user_new = instance('Userinfomodel','get_new_users',$userGender);
                $idUser = $this->session->userdata('IDuser');
                foreach ($user_new as $user)
                {
                    $user_online_info = instance('userinfomodel','get_user_profile',$user['IdUser']);
                    if(!isset($user_online_info['State']) || $user['IdUser'] == $idUser)
                        continue;
                    $user_state = instance('provincemodel','get_by_id',$user_online_info['State']);
//                    else
//                        $user_state->name = 'نامشخص';
//                    ?>
                    <a href="<?php echo base_url('Users/Dashboard/view_profile/'.$user['IdUser']) ?>"><li style="font-size: small"><?php echo $user_online_info['Name'] ?><span><?php echo ' '.$user_state->name ?></span></li></a>
                <?php } ?>

            </ul>
        </div>

        <div class="well well-small">
            <?php
            $iduser = $this->session->userdata('IDuser');
            $profile = 0;
            $user_info =  instance('Userinfomodel','get_by_id_user',$iduser);
            if(isset($user_info->Complete_Profile) && !is_null($user_info->Complete_Profile))
            {
                $profile = '100%';
            }

            ?>
            <span>درباره من</span><span class="pull-left"><small><?php echo $profile ?></small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-info" style="width: <?php echo $profile ?>"></div>
            </div>
            <span>مشخصات من</span><span class="pull-left"><small><?php echo $profile ?></small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-success" style="width: <?php echo $profile ?>"></div>
            </div>
            <span>مشخصات تکمیلی</span><span class="pull-left"><small><?php echo $profile ?></small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-warning" style="width: <?php echo $profile ?>"></div>
            </div>
            <span>معیارهای ازدواج</span><span class="pull-left"><small><?php echo $profile ?></small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-danger" style="width: <?php echo $profile ?>"></div>
            </div>
            <span>معیارهای همسر</span><span class="pull-left"><small><?php echo $profile ?></small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-success" style="width: <?php echo $profile ?>"></div>
            </div>
            <span>مشخصات نهایی</span><span class="pull-left"><small><?php echo $profile ?></small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-info" style="width: <?php echo $profile ?>"></div>
            </div>
        </div>

    </div>
    <!-- END RIGHT STRIP  SECTION -->
</div>
<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">راهنمای خرید عضویت ویژه</h4>
            </div>
            <div class="modal-body">
                <p>نحوه خرید:

                    از قسمت سمت راست صفحه پروفایلتان گزینه " خرید عضویت ویژه "
                    را کلیک نمائید که صفحه زیر نمایان میشود :
                </p>
                <p>
                    با انتخاب یکی از تعرفه های مشخص شده میتوانید عضویت ویژه خود را در پرتال خود ثبت نمایید!
                </p>
                <p>
                    <img width="550" src="<?php echo base_url('assets/images/upgrade.png') ?>" />
                </p>
                <p>با تشکر مدیریت وب سایت مهتاب</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>

<!--END MAIN WRAPPER -->

<!-- FOOTER -->
<div id="footer">
    <p>کلیه حقوق سایت متعلق به <a href="http://www.eb24.xyz">وب سایت همسریابی و همسان گزینی مهتاب</a> می باشد.</p>
</div>
<!--END FOOTER -->

<!-- GLOBAL SCRIPTS -->
<script src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/bootstrap/js/bootstrap.rtl.js"></script>
<script src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datePicker/js/persian-datepicker.js') ?>"></script>
<script src="<?php echo base_url('') ?>assets/js/custom.js"></script>
<script src="<?php echo base_url('') ?>assets/js/chosen.jquery.js"></script>

<script type="text/javascript" src="<?php echo base_url('') ?>assets/date/js/state.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/js/parsley.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/js/parsley.messages.fa.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/js/jquery.flexslider.js"></script>

<script>
    $('.parsley-validate').parsley();
</script>

<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>

<script>
	$(document).ready(function(e)
	{
		$.ajaxSetup({cache:false});
		setInterval(function()
        {
            $('#message_comming').load("<?php echo base_url('Users/Dashboard/loadComingMessage') ?>");
        },2000);
	});
</script>

<!-- END GLOBAL SCRIPTS -->

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/flot/jquery.flot.time.js"></script>
<script  src="<?php echo base_url('') ?>assets/dashboard/assets/plugins/flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url('') ?>assets/dashboard/assets/js/for_index.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<audio id="audio" src="http://dev.interactive-creation-works.net/1/1.ogg" ></audio>
</body>

<!-- END BODY -->
</html>
