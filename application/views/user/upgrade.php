<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">ارتقاء حساب کاربری</li>
     </ul>
   </div>
<form method="POST" action="<?php echo base_url('Users/Dashboard/connect_zarinpal') ?>">
        <div class="col-md-3 pricing-table">
	   <div class="pricing-table-grid">
		<h3><span class="dollar"> 19,000 </span>تومان<br><span class="month1">عضویت ویژه 1 ماهه</span></h3>
		<ul>
			<li><span>عادی</span></li>
			<li><a href="#"><i class="fa fa-envelope-o icon_3"></i> ایمیل نامحدود </a></li>
			<li><a href="#"><i class="fa fa-phone icon_3"></i> پیام شخصی نا محدود </a></li>
			<li><a href="#"><i class="fa fa-video-camera icon_3"></i> تماس تصویری </a></li>
			<li><a href="#"><i class="fa fa-eye icon_3"></i> مشاهده ایمیل </a></li>
			<li><a href="#"><i class="fa fa-user icon_3"></i> مشاهده شماره همراه </a></li>
			<li><a href="#"><i class="fa fa-smile-o icon_3"></i> مشاهده پروفایل </a></li>
			<li><a href="#"><i class="fa fa-lock icon_3"></i> مشاهده تصاویر </a></li>
			<li><a href="#"><i class="fa fa-smile-o icon_3"></i> ارسال پیامک </a></li>
		</ul>
		<input type="hidden" name="Amount" value="190000" />
		<input type="hidden" name="ApiKey" value="sOF00-VOV6Q-K2976-d3Ls7-ZQDCX" />
		<input type="hidden" name="CodeId" value="<?php echo $this->session->userdata('IDuser') ?>" />
		<input type="hidden" name="RedirectUrl" value="<?php base_url('Users/Dashboard/verify/190000') ?>" />
		<a class="popup-with-zoom-anim order-btn" href="#small-dialog"><input name="btn_submit_1" type="submit" value="پرداخت آنلاین" /></a>
	    </div>
	  </div>
</form>
<form method="POST" action="<?php echo base_url('Users/Dashboard/connect_zarinpal') ?>">
	  <div class="col-md-3 pricing-table">
		<div class="pricing-table-grid">
		  <h3><span class="dollar"> 31,000 </span>تومان<br><span class="month1">عضویت ویژه 3 ماهه</span></h3>
		  <ul>
			<li><span>نقره ای</span></li>
			  <li><a href="#"><i class="fa fa-envelope-o icon_3"></i> ایمیل نامحدود </a></li>
			  <li><a href="#"><i class="fa fa-phone icon_3"></i> پیام شخصی نا محدود </a></li>
			  <li><a href="#"><i class="fa fa-video-camera icon_3"></i> تماس تصویری </a></li>
			  <li><a href="#"><i class="fa fa-eye icon_3"></i> مشاهده ایمیل </a></li>
			  <li><a href="#"><i class="fa fa-user icon_3"></i> مشاهده شماره همراه </a></li>
			  <li><a href="#"><i class="fa fa-smile-o icon_3"></i> مشاهده پروفایل </a></li>
			  <li><a href="#"><i class="fa fa-lock icon_3"></i> مشاهده تصاویر </a></li>
			  <li><a href="#"><i class="fa fa-smile-o icon_3"></i> ارسال پیامک </a></li>

		</ul>
                <input type="hidden" name="Amount" value="310000" />
		<input type="hidden" name="ApiKey" value="sOF00-VOV6Q-K2976-d3Ls7-ZQDCX" />
		<input type="hidden" name="CodeId" value="<?php $this->session->userdata('IDuser') ?>" />
		<input type="hidden" name="RedirectUrl" value="<?php base_url('Users/Dashboard/verify/310000') ?>" />
		  <a class="popup-with-zoom-anim order-btn" href="#small-dialog"><input name="btn_submit_2" type="submit" value="پرداخت آنلاین" /></a>
		</div>
	  </div>
</form>

<form method="POST" action="<?php echo base_url('Users/Dashboard/connect_zarinpal') ?>">
	  <div class="col-md-3 pricing-table">
		<div class="pricing-table-grid">
			<h3><span class="dollar"> 42,000 </span>تومان<br><span class="month1">عضویت ویژه 6 ماهه</span></h3>
			<ul>
				<li><span>طلایی</span></li>
				<li><a href="#"><i class="fa fa-envelope-o icon_3"></i> ایمیل نامحدود </a></li>
				<li><a href="#"><i class="fa fa-phone icon_3"></i> پیام شخصی نا محدود </a></li>
				<li><a href="#"><i class="fa fa-video-camera icon_3"></i> تماس تصویری </a></li>
				<li><a href="#"><i class="fa fa-eye icon_3"></i> مشاهده ایمیل </a></li>
				<li><a href="#"><i class="fa fa-user icon_3"></i> مشاهده شماره همراه </a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i> مشاهده پروفایل </a></li>
				<li><a href="#"><i class="fa fa-lock icon_3"></i> مشاهده تصاویر </a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i> ارسال پیامک </a></li>
			</ul>
                <input type="hidden" name="Amount" value="420000" />
		<input type="hidden" name="ApiKey" value="sOF00-VOV6Q-K2976-d3Ls7-ZQDCX" />
		<input type="hidden" name="CodeId" value="<?php $this->session->userdata('IDuser') ?>" />
		<input type="hidden" name="RedirectUrl" value="<?php base_url('Users/Dashboard/verify/420000') ?>" />
		  <a class="popup-with-zoom-anim order-btn" href="#small-dialog"><input name="btn_submit_3" type="submit" value="پرداخت آنلاین" /></a>
		</div>
	  </div>

</form>
<form method="POST" action="<?php echo base_url('Users/Dashboard/connect_zarinpal') ?>">
	  <div class="col-md-3 pricing-table">
		<div class="pricing-table-grid">
			<h3><span class="dollar"> 57,000 </span>تومان<br><span class="month1">عضویت ویژه 12 ماهه</span></h3>
			<ul>
				<li><span>ویژه</span></li>
				<li><a href="#"><i class="fa fa-envelope-o icon_3"></i> ایمیل نامحدود </a></li>
				<li><a href="#"><i class="fa fa-phone icon_3"></i> پیام شخصی نا محدود </a></li>
				<li><a href="#"><i class="fa fa-video-camera icon_3"></i> تماس تصویری </a></li>
				<li><a href="#"><i class="fa fa-eye icon_3"></i> مشاهده ایمیل </a></li>
				<li><a href="#"><i class="fa fa-user icon_3"></i> مشاهده شماره همراه </a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i> مشاهده پروفایل </a></li>
				<li><a href="#"><i class="fa fa-lock icon_3"></i> مشاهده تصاویر </a></li>
				<li><a href="#"><i class="fa fa-smile-o icon_3"></i> ارسال پیامک </a></li>
		    </ul>
                <input type="hidden" name="Amount" value="570000" />
		<input type="hidden" name="ApiKey" value="sOF00-VOV6Q-K2976-d3Ls7-ZQDCX" />
		<input type="hidden" name="CodeId" value="<?php $this->session->userdata('IDuser') ?>" />
		<input type="hidden" name="RedirectUrl" value="<?php base_url('Users/Dashboard/verify/570000') ?>" />
			<a class="popup-with-zoom-anim order-btn" href="#small-dialog"><input name="btn_submit_4" type="submit" value="پرداخت آنلاین" /></a>
		</div>
	  </div>
</form>
	  <div class="clearfix"> </div>
    </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>