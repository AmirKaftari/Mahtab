<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">گزارش کاربر به پليس سايت</li>
     </ul>
   </div>
   <div class="grid_5">
           <p>پلیس سایت پاسدار حقوق اعضای محترم سایت است. چنانچه تخلفی از این شخص مشاهده کرده اید و یا اطلاعات مندرج در پروفایل وی را غیر واقعی یافته اید ، مراتب را به صورت دقیق به پلیس سایت اطلاع دهید تا پس از بررسی های لازم اقدام مقتضی صورت پذیرد.</p>
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
              <form action="<?php echo base_url('Reortpolicecontroller/create_action') ?>" id="contact-form" class="contact-form parsley-validate" method="post">
                <fieldset>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon2">گزارش شونده</span>
                        <input disabled="disabled" type="text" class="text" value="<?php echo urldecode($Offending_name); ?>" aria-describedby="basic-addon2">
                    </div>

                  <input value="<?php echo $Offending_id ?>" type="hidden" name="Offending_id" class="text" >
                  <input value="<?php echo $reporter ?>" type="hidden" name="idSender" class="text" >
                  <input value="<?php echo urldecode($Offending_name); ?>" type="hidden" name="Offending_name" class="text" >

                  <textarea data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" name="txtMessage" placeholder="پیام شما"></textarea>
                  <input name="submit_contact" type="submit" id="submit_contact" value="ارسال">
                </fieldset>
              </form>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>