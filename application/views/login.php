<?php require_once(APPPATH.'views/include/header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
	   <div>
		   <div style="margin-top: 8px" id="message">
			   <?php
			   if($this->session->userdata('message') != null)
			   {
				   echo '<div class="alert alert-danger" role="alert">';
				   echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				   echo	$this->session->userdata('message') <> '' ? $this->session->userdata('message') : '';
				   echo '</div>';
			   }
			   ?>
		   </div>
	   </div>
     <ul>
        <a href="<?php echo base_url(''); ?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">ورود</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
	   <form action="<?php echo base_url('Welcome/validate_user') ?>" method="post" class="parsley-validate">
  	    <div class="form-item form-type-textfield form-item-name">
	      <label for="edit-name">نام کاربری <span class="form-required" title="This field is required.">*</span></label>
	      <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" id="Username" name="Username" value="" size="60" maxlength="60" class="form-text">
	    </div>
	    <div class="form-item form-type-password form-item-pass">
	      <label for="edit-pass">گذرواژه <span class="form-required" title="This field is required.">*</span></label>
	      <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="password" id="Password" name="Password" size="60" maxlength="128" class="form-text">
	    </div>
	    <div class="form-actions">
	    	<input type="submit" id="btn_login" name="btn_login" value="وارد شوید" class="btn_1 submit">
			<a href="<?php echo base_url('Welcome/forget_password') ?>"><input     class="hvr-wobble-vertical btn btn-primary" value="فراموشی رمز عبور"></a>
	   </form>
	  </div>

	  <div class="clearfix"> </div>
   </div>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>