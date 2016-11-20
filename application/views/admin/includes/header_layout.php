<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>پرتال مدیریت وب سایت همسر</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
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
            <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                <i class="icon-align-justify"></i>
            </a>
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
                <!--                    <li class="dropdown">-->
                <!--                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
                <!--                            <span class="label label-success">2</span>    <i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>-->
                <!--                        </a>-->
                <!---->
                <!--                        <ul class="dropdown-menu dropdown-messages">-->
                <!--                            <li>-->
                <!--                                <a href="#">-->
                <!--                                    <div>-->
                <!--                                       <strong>محمدرضا</strong>-->
                <!--                                        <span class="pull-left text-muted">-->
                <!--                                            <em>امروز</em>-->
                <!--                                        </span>-->
                <!--                                    </div>-->
                <!--                                    <div>متن پیغام برای تست پیغام تستی-->
                <!--                                        <br />-->
                <!--                                        <span class="label label-primary">مهم</span>-->
                <!---->
                <!--                                    </div>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="divider"></li>-->
                <!--                            <li>-->
                <!--                                <a href="#">-->
                <!--                                    <div>-->
                <!--                                        <strong>علیرضا</strong>-->
                <!--                                        <span class="pull-left text-muted">-->
                <!--                                            <em>دیروز</em>-->
                <!--                                        </span>-->
                <!--                                    </div>-->
                <!--                                    <div>متن پیغام برای تست پیغام تستی-->
                <!--                                         <br />-->
                <!--                                        <span class="label label-success"> متوسط </span>-->
                <!--                                    </div>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="divider"></li>-->
                <!--                            <li>-->
                <!--                                <a href="#">-->
                <!--                                    <div>-->
                <!--                                        <strong>مهدی</strong>-->
                <!--                                        <span class="pull-left text-muted">-->
                <!--                                            <em>31 خرداد 93</em>-->
                <!--                                        </span>-->
                <!--                                    </div>-->
                <!--                                    <div>متن پیغام برای تست پیغام تستی تست تست پیغام-->
                <!--                                         <br />-->
                <!--                                        <span class="label label-danger"> کم </span>-->
                <!--                                    </div>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="divider"></li>-->
                <!--                            <li>-->
                <!--                                <a class="text-center" href="#">-->
                <!--                                    <i class="icon-angle-left"></i>-->
                <!--                                    <strong>خواندن همه پیغام ها</strong>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!---->
                <!--                    </li>-->
                <!--END MESSAGES SECTION -->

                <!--TASK SECTION -->

                <!--END TASK SECTION -->

                <!--ALERTS SECTION -->
                <!--                    <li class="chat-panel dropdown">-->
                <!--                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
                <!--                            <span class="label label-info">8</span>   <i class="icon-comments"></i>&nbsp; <i class="icon-chevron-down"></i>-->
                <!--                        </a>-->
                <!---->
                <!--                        <ul class="dropdown-menu dropdown-alerts">-->
                <!---->
                <!--                            <li>-->
                <!--                                <a href="#">-->
                <!--                                    <div>-->
                <!--                                    <span class="pull-left text-muted small"> 4 دقیقه پیش</span>-->
                <!--                                        <i class="icon-comment" ></i> کامنت جدید-->
                <!--                                    </div>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="divider"></li>-->
                <!--                            <li>-->
                <!--                                <a href="#">-->
                <!--                                    <div>-->
                <!--                                    <span class="pull-left text-muted small">9 دقیقه پیش</span>-->
                <!--                                        <i class="icon-twitter info"></i> 3 دنبال کننده جدید-->
                <!--                                    </div>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="divider"></li>-->
                <!--                            <li>-->
                <!--                                <a href="#">-->
                <!--                                    <div>-->
                <!--                                    <span class="pull-left text-muted small" > 20 دقیقه پیش</span>-->
                <!--                                        <i class="icon-envelope"></i> ارسال پیغام-->
                <!--                                    </div>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!---->
                <!--                            <li class="divider"></li>-->
                <!--                            <li>-->
                <!--                                <a href="#">-->
                <!--                                    <div>-->
                <!--                                    <span class="pull-left text-muted small"> 2 ساعت پیش</span>-->
                <!--                                        <i class="icon-upload"></i> ورود به سایت-->
                <!--                                    </div>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="divider"></li>-->
                <!--                            <li>-->
                <!--                                <a class="text-center" href="#">-->
                <!--                                    <i class="icon-angle-left"></i>-->
                <!--                                    <strong>مشاهده همه اعلان ها</strong>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!---->
                <!--                    </li>-->
                <!-- END ALERTS SECTION -->

                <!--ADMIN SETTINGS SECTIONS -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
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