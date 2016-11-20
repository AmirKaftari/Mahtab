<?php require_once(APPPATH.'views/include/header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">فراموشی رمز عبور</li>
     </ul>
   </div>
   <div class="grid_5">
      <p>
			در صورت تایید ایمیل شما , رمز عبور به ایمیل تایید شده ی شما ارسال خواهد شد !
	  </p>

    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
  <div class="text-center">
        <div>
		   <div style="margin-top: 8px" id="message">
			   <?php
			   if($this->session->userdata('message_email_restore') != null)
			   {
				   echo '<div class="alert alert-success" role="alert">';
				   echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				   echo	$this->session->userdata('message_email_restore') <> '' ? $this->session->userdata('message_email_restore') : '';
				   echo '</div>';
			   }
			   ?>
		   </div>
	   </div>
  </div>
	 <h2>لطفا این فیلد را خالی نگذارید!</h2>
	  <form action="<?php echo base_url('Welcome/email_restore') ?>" id="contact-form" class="contact-form parsley-validate" method="post">
        <fieldset>
          <input data-parsley-type="email" data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" name="txtEmail" class="text" placeholder="پست الکترونیکی" >
          <input name="submit_contact" type="submit" id="submit_contact" value="ارسال">
        </fieldset>
      </form>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>