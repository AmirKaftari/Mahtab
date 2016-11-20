<?php
/**
 * Created by PhpStorm.
 * User: Programmer
 * Date: 11/08/2016
 * Time: 11:07 PM
 */
        echo "<br>";
         $msgError = $this->session->userdata('Error');
		 $msgSuccess =  $this->session->userdata('Success');

		 if(isset($msgError))
         {
             echo '<div class="alert alert-danger fade in">';
             echo '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
             echo  '<strong>پیام سیستم !</strong>'.$msgError;
             echo '</div>';
             $this->session->unset_userdata('Error');
         }
         else if(isset($msgSuccess))
         {
             echo '<div class="alert alert-success fade in">';
             echo '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
             echo  '<strong>پیام سیستم !</strong>'.$msgSuccess;
             echo '</div>';
             $this->session->unset_userdata('Success');
         }

	 ?>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">پروفایل کاربری</h3>
    </div>

    <div class="panel-body">
        <form class="form-horizontal parsley-validate"  action="<?php echo base_url('Usercontroller/showProfile') ?>" method="post">

            <div class="input-group">
                <input  type="hidden" name="txtIdStudent" class="form-control"  value="<?php echo $this->session->userdata('IDadmin'); ?>" >
            </div>

            <div class="input-group">
                <span class="input-group-addon">عنوان مدیریت</span>
                <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text" 
				name="txtTitle" id="txtTitle" class="form-control"  value="<?php echo $Title; ?>" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-right"></span></span>
            </div>
            <br />

            <div class="input-group">
                <span class="input-group-addon">نام کاربری</span>
                <input data-parsley-required-message="درج این فیلد اجباری است!"  data-parsley-required="true" type="text"
				name="txtUserName" id="txtUserName" class="form-control"  value="<?php echo $this->session->userdata('usernameAdmin'); ?>" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
            </div>
            <br />

            <div class="input-group">
                <span class="input-group-addon">پست الکترونیکی</span>
                <input type="text" name="txtEmail" id="txtEmail" class="form-control"  value="<?php echo $Email; ?>" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-send"></span></span>
            </div>
            <br />
			
			<div class="input-group">
                <span class="input-group-addon">شماره همراه</span>
                <input type="text" name="txtcellPhone" id="txtcellPhone" class="form-control"  value="<?php echo $cellPhone; ?>" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-send"></span></span>
            </div>
            <br />
			
<!--			<div class="input-group">-->
<!--                   <div class="fileupload fileupload-new" data-provides="fileupload">-->
<!--                       <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="--><?php //echo $Pic; ?><!--" alt="" /></div>-->
<!--                       <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>-->
<!--                       <div>-->
<!--                           <span class="btn btn-file btn-primary"><span class="fileupload-new">انتخاب عکس</span><span class="fileupload-exists">تغییر</span><input name="Pic" type="file" /></span>-->
<!--                           <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حذف</a>-->
<!--                       </div>-->
<!--                   </div>-->
<!--            </div>-->

            <input type="submit" class="btn btn-primary" name="btn_Edit" id="btn_Edit" value="ویرایش">
            <input type="button" class="btn btn-primary" value="تغییر رمز عبور" data-toggle="modal" data-target="#model_pass">


        </form>

        <div class="modal fade" id="model_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">لطفا فرم را به صورت کامل تکميل نماييد.</h4>
                    </div>
                    <div class="modal-body">
                        <div id="msg"></div>
                        <form class="form-horizontal" id="Frm_Editpass"  action="<?php echo base_url('Usercontroller/showProfile') ?>" method="post">

                            <div class="input-group">
                                <input type="hidden" name="idU" class="form-control"  value="<?php echo $this->session->userdata('IDuser'); ?> ?>" >
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >رمز عبور جدید</label>
                                <div class="col-xs-9">
                                    <?php
                                    $attributes = array("name"=>"txtPass","id"=>"txtPass","class" => "form-control",);
                                    echo form_password($attributes);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" >تکرار رمز عبور</label>
                                <div class="col-xs-9">
                                    <?php
                                    $attributes = array("name"=>"txtConPass","id"=>"txtConPass","class" => "form-control");
                                    echo form_password($attributes);
                                    ?>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <input name="btn_Edit_Password" type="submit" class="btn btn-primary" value="ذخيره اطلاعات" >
                                    <input type="reset" class="btn btn-default" value="ورود مجدد اطلاعات">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
