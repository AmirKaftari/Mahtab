<?php require_once(APPPATH.'views/include/header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
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
     <ul>
        <a href="<?php echo base_url(''); ?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">ثبت نام اولیه</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
	     <form action="<?php echo base_url('Usercontroller/create_action') ?>" method="post" class="parsley-validate">
			 <div class="form-group">
				 <label for="edit-name">نام<span class="form-required">*</span></label>
				 <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" id="Name" name="Name" value="" size="60" maxlength="60" class="form-text">
			 </div>
			 <div class="form-group">
				 <label for="edit-name">نام خانوادگی<span class="form-required">*</span></label>
				 <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" id="Lastname" name="Lastname" value="" size="60" maxlength="60" class="form-text">
			 </div>
	  	    <div class="form-group">
		      <label for="edit-name">نام کاربری <span class="form-required">*</span></label>
		      <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" id="Username" name="Username" value="" size="60" maxlength="60" class="form-text">
		    </div>
		    <div class="form-group">
		      <label for="edit-pass">گذرواژه <span class="form-required" title="This field is required.">*</span></label>
		      <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="password" id="Password" name="Password" size="60" maxlength="128" class="form-text">
		    </div>
		    <div class="form-group">
		      <label for="edit-name">پست الکترونیکی </label>
		      <input type="text" data-parsley-type="email" data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true"  id="Email" name="Email" value="" size="60" maxlength="60" class="form-text">
		    </div>
		    
            <div class="form-group form-group1">
                <label class="col-sm-7 control-lable" for="sex">جنسیت </label>
                <div class="col-sm-5">
                    <div class="radios">
						<label><input checked="" value="1" type="radio" name="Jender"> مرد</label>
						<label><input value="0" type="radio" name="Jender"> زن</label>
	                </div>
                </div>
            <div class="clearfix"> </div>
             </div>
			  <div class="form-group">
			     <label for="edit-name">توضیحی کوتاه درباره خودت <span class="form-required" title="This field is required."></span></label>
				 <textarea  name="Subject_self" class="form-control bio" placeholder="" rows="3"></textarea>
			  </div>
			  <div class="form-actions">
			    <input type="submit" id="btn_register" name="btn_register" value="ثبت نام اولیه" class="btn_1 submit">
			  </div>
		 </form>
	  </div>

	  <div class="clearfix"> </div>
   </div>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>