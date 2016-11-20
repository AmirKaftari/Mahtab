<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">بارگذاری مدارک هویتی</li>
     </ul>
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
   </div>
   <div class="grid_5">
       <ul class="feature_list">
           <li>1- ما برچسبی بر روی پروفایل شما میزنیم که نشان میدهد پروفایل شما احراز هویت شده است. طبیعی است که این مساله حس اطمینان بیشتر ی را برای بازدیدکننده بوجود خواهد آورد.</li>
           <li>2- 5 روز عضویت ویژه رایگان به شما تعلق خواهد گرفت.</a></li>
           <li>3- در صورتی که دسترسی به پروفایل خود را به هر دلیلی از دست دهید، با استفاده از کد ملی و سایر اطلاعات براحتی برای شما بازیابی خواهد شد.</li>
           <li>4- میتوانید از کاربر مقابل خود، که مایل به آشنایی با شماست، بخواهید تا ابتدا احراز هویت شود.</li>
           <li>5- مهمتر از همه اینکه شما نیز یک گام در جهت بالابردن امنیت سایت برداشته اید.</li>
       </ul>
       <form action="<?php echo base_url('Identityusercontroller/create_action') ?>" id="contact-form" class="contact-form" method="post" enctype="multipart/form-data">
               <div class="form-group">
                   <div class="fileupload fileupload-new" data-provides="fileupload">
                       <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url('assets/images/demoUpload.jpg'); ?>" alt="" /></div>
                       <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                       <div>
                           <span class="btn btn-file btn-primary"><span class="fileupload-new">انتخاب عکس</span><span class="fileupload-exists">تغییر</span><input name="Pic" type="file" /></span>
                           <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حذف</a>
                       </div>
                   </div>
               </div>
               <input name="submit_contact" type="submit" id="submit_contact" value="ارسال">
       </form>
    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">

  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>