<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">معرفي به دوستان</li>
     </ul>
   </div>
   <div class="grid_5">
       
           <p>شما می توانید از دوستان خود دعوت کنید تا به مهتاب بپیوندند  و شما امتیاز کسب کنید.</p>
       
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
              <form action="<?php echo base_url('Users/Dashboard/send_email') ?>" id="contact-form" class="contact-form parsley-validate" method="post">
                <fieldset>
                  <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" value="<?php echo $from; ?>" type="text" name="txtFrom" class="text" >
                  <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" placeholder="به ایمیل" type="text" name="txtTo" class="text" >
                  <input value="<?php echo $id_sender ?>" type="hidden" name="idSender" class="text" >

                  <textarea data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" name="txtMessage" placeholder="پیام شما"></textarea>
                  <input name="submit_contact" type="submit" id="submit_contact" value="ارسال">
                </fieldset>
              </form>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>