<!--A Design by Mr.Code Team
Author: Amir Kaftari
Author URL: http://OstadSho.ir
License: Creative Commons Mr.Code Team
License URL: http://OstadSho.ir
-->
<!DOCTYPE HTML>
<html>
<head>
<title>بزرگترین و جامع ترین وب سایت ازدواج اینترنتی</title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url('') ?>assets/css/bootstrap.rtl.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('') ?>assets/css/parsley.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('') ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('') ?>assets/js/parsley.js"></script>
<script src="<?php echo base_url('') ?>assets/js/parsley.messages.fa.js"></script>
<!-- Custom Theme files -->
<link href="<?php echo base_url('') ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="<?php echo base_url('') ?>assets/css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
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
<body>
<!-- ============================  Navigation Start =========================== -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
			   <ul>
				<li class="green">
					<a href="<?php echo base_url('welcome'); ?>" class="icon-home"></a>
					<ul>
						<?php
						if($this->session->userdata('IDuser') != null || !is_null($this->session->userdata('ID')))
						{ ?>
							<li><a href="<?php echo base_url('Users/Dashboard/index/null/panel') ?>">پنل کاربری</a></li>
							<li><a href="<?php echo base_url('Users/Dashboard') ?>">مشاهده پروفایل ها</a></li>
							<li><a href="<?php echo base_url('Welcome/logout') ?>">خروج</a></li>
							<?php
						}
						else
						{ ?>
							<li><a href="<?php echo base_url('Welcome/login') ?>">ورود</a></li>
							<li><a href="<?php echo base_url('Welcome/register') ?>">عضویت</a></li>

						<?php } ?>
					</ul>
				</li>
			   </ul>
             </nav>
           </div>
           
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
<!--		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu-->
<!--		        <span class="sr-only">Toggle navigation</span>-->
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="navbar" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="<?php echo base_url('') ?>">صفحه اصلی</a></li>
		            
<!--		    		<li class="dropdown">-->
<!--		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">گزینه ها<span class="caret"></span></a>-->
<!--		              <ul class="dropdown-menu" role="menu">-->
<!--		                <li><a href="#">افراد جدید</a></li>-->
<!--		                <li><a href="#">دنبال کننده های من</a></li>-->
<!--		                <li><a href="#">مشاهده کننده & تماس نگرفته</a></li>-->
<!--		                <li><a href="#">افراد ویژه</a></li>-->
<!--		                <li><a href="#">پروفایل های کوتاه</a></li>-->
<!--		              </ul>-->
<!--		            </li>-->
<!--					<li class="dropdown">-->
<!--		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">جستجو<span class="caret"></span></a>-->
<!--		              <ul class="dropdown-menu" role="menu">-->
<!--		                <li><a href="#">جستجوی پیشرفته</a></li>-->
<!--		              </ul>-->
<!--		            </li>-->
<!--		            <li class="dropdown">-->
<!--		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">پیام های من<span class="caret"></span></a>-->
<!--		              <ul class="dropdown-menu" role="menu">-->
<!--		                <li><a href="#">صندوق</a></li>-->
<!--		                <li><a href="#">جدید</a></li>-->
<!--		                <li><a href="#">پذیرفته شده</a></li>-->
<!--		                <li><a href="#">ارسال شده</a></li>-->
<!--		              </ul>-->
<!--		            </li>-->
<!--					<li><a href="#">ارتقاء حساب کاربری</a></li>-->
					<li><a href="<?php echo base_url('Welcome/condation') ?>">شیوه استفاده از سایت</a></li>
					<li><a href="<?php echo base_url('Welcome/terms') ?>">قوانین</a></li>
					<li><a href="<?php echo base_url('Welcome/aboutUs') ?>">درباره ما</a></li>
					<li><a href="#">مقالات ازدواج</a></li>
		            <li class="last"><a href="<?php echo base_url('Welcome/contact') ?>">تماس با مدیریت</a></li>
					
		        </ul>
		     </div><!-- /.navbar-collapse
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->