<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">ارسال پیام علاقه مندی</li>
     </ul>
   </div>
   <div class="grid_5">
       <label class="checkbox-inline">
           <input name="FarzandDarad" type="checkbox" value="1">پیام من از طریق پیامک (SMS) به ایشان اطلاع رسانی شود
           <p>در صورتی میتوانید از این امکان استفاده نمایید که دارای اعتبار پیامک کافی باشید.
               با هر ارسال پیامک یک واحد از اعتبار شما کاسته خواهد شد.</p>
       </label>
    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
  <div class="text-center">
        <div>
		   <div style="margin-top: 8px" id="message">
			   <?php
			   if($this->session->userdata('favorite_message') != null)
			   {
				   echo '<div class="alert alert-success" role="alert">';
				   echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				   echo	$this->session->userdata('favorite_message') <> '' ? $this->session->userdata('favorite_message') : '';
				   echo '</div>';
			   }
			   ?>
		   </div>
	   </div>
  </div>
              <form action="<?php echo base_url('Favoritemessagecontroller/create_action') ?>" id="contact-form" class="contact-form parsley-validate" method="post">
                <fieldset>
                  <input disabled="disabled" value="<?php echo 'گیرنده' .' : '.urldecode($to); ?>" type="text" name="txtTo" class="text" >
                  <input disabled="disabled" value="موضوع : پیام علاقه مندی" type="text" name="txtSubject" class="text" >
                  <input value="<?php echo $idReceiver ?>" type="hidden" name="idReciever" class="text" >
                  <input value="<?php echo $sender ?>" type="hidden" name="idSender" class="text" >
                  <input value="<?php echo $to ?>" type="hidden" name="To" class="text" >
                  <input value="پیام علاقه مندی" type="hidden" name="Message" class="text" >
                  <textarea disabled="disabled"  name="txtMessage" >
                           با سلام
پروفایل شما را دیدم و با دقت مطالعه کردم. با توجه به  شناخت کلی که از اطلاعات مطرح در پروفایل شما بدست آوردم، شما را تا حدودی به معیارهای خودم نزدیک میبینم.
از آنجا که بدنبال ازدواج دایم و تشکیل خانواده هستم، در صورتی که مایل باشید دوست دارم  در طی تماسهای آتی بیشتر با شما آشنا بشوم.
با آرزوی موفقیت و  خوشبختی برای شما
                  </textarea>
                  <input name="submit_contact" type="submit" id="submit_contact" value="ارسال">
                </fieldset>
              </form>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>