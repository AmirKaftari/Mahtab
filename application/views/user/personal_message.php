<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">ارسال پیام شخصی</li>
     </ul>
   </div>
   <div class="grid_5">
      <?php

         $current_user = $this->session->userdata('IDuser');
         $GLOBALS['idSender'] = $current_user;
         $has_vip = instance('Uservipmodel','get_by_idUser',$current_user);

         if(count($has_vip) > 0)
         {
             if($has_vip->Status = 1)
                $GLOBALS['uservip'] = true;
             else
                 $GLOBALS['uservip'] = false;
         }
         else
         {
             $GLOBALS['uservip'] = false;
             echo '<p>چگونه پیام شخصی ارسال کنم؟ برای ارسال پیام شخصی باید عضو ویژه باشید. برای درخواست عضویت ویژه روی لینک زیر کلیک کنید.</p>';
             echo "<a href=". base_url('Users/Dashboard/upgrade/'.$idUser)."><div class='vertical'>درخواست عضویت ویژه</div></a>" ;
         }
      ?>

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
      <?php if($GLOBALS['uservip'])
        {   ?>
             <h2>لطفا تمامی فیلدها را کامل نمایید!</h2>
              <form action="<?php echo base_url('Personalmessagecontroller/create_action') ?>" id="contact-form" class="contact-form parsley-validate" method="post">
                <fieldset>
                  <input type="hidden" name="idSender" class="text" value="<?php echo $GLOBALS['idSender'] ?>">
                  <input type="hidden" name="idReciever" class="text" value="<?php echo $idUser; ?>">
                  <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" name="Subject" class="text" placeholder="موضوع">
                  <textarea data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" placeholder="پیام شما"  name="Message" ></textarea>
                  <input name="submit_contact" type="submit" id="submit_contact" value="ارسال">
                </fieldset>
              </form>
        <?php } ?>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>