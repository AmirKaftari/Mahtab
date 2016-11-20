<?php require_once(APPPATH.'views/include/header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">راه های ارتباطی</li>
     </ul>
   </div>
   <div class="grid_5">
      <p>دوستان می توانند پیام های خود را از طریق سایت ایمیل بزنند یا به شماره 30007650004880 پیامک دهند 
با تشکر </p>

    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
  <div class="text-center">
        <div>
		   <div style="margin-top: 8px" id="message">
			   <?php
			   if($this->session->userdata('message') != null)
			   {
				   echo '<div class="alert alert-success" role="alert">';
				   echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				   echo	$this->session->userdata('message') <> '' ? $this->session->userdata('message') : '';
				   echo '</div>';
			   }
			   ?>
		   </div>
	   </div>
  </div>
	 <h2>لطفا تمامی فیلدها را کامل نمایید!</h2>
	  <form action="<?php echo base_url('Contactcontroller/create_action') ?>" id="contact-form" class="contact-form parsley-validate" method="post">
        <fieldset>
          <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" name="txtFullname" class="text" placeholder="نام و نام خانوادگی">
          <input type="text" name="txtPhone" class="text" placeholder="شماره تماس" >
          <input type="text" name="txtEmail" class="text" placeholder="پست الکترونیکی" >
          <textarea data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" placeholder="پیام شما"  name="txtMessage" ></textarea>
          <input name="submit_contact" type="submit" id="submit_contact" value="ارسال">
        </fieldset>
      </form>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>