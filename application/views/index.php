<?php require_once(APPPATH.'views/include/header.php'); ?>
<div class="banner">
  <div class="container">
	  <br>
	  <h1 align="center" style="font-size: 72px;color: #0075b0">پرتال همسریابی مهتاب</h1>
<img  width="150" height="150" src="<?php echo base_url('assets/images/agha.jpg') ?>" class="img-thumbnail" alt="Cinque Terre">
		<h4 style="color: #FF2D00">در ازدواج، اصل قضيه محبت است. دخترها و پسرها اين را بدانند. اين محبتي كه خدا در دل شما قرار داده حفظ كنيد.</h4>
                <h4 style="color: #FF2D00">ثبت نام در وب سایت مهتاب رایگان است!</h4>
  </div>
  <div class="profile_search">
  	<div class="container wrap_1">
		<div class="submit inline-block">
		   <a href="<?php echo base_url('Welcome/register') ?>"><input  class="hvr-wobble-vertical btn btn-primary" value="ثبت نام"></a>
		   <a href="<?php echo base_url('Welcome/login') ?>"><input     class="hvr-wobble-vertical btn btn-primary" value="ورود"></a>
		   <a href="<?php echo base_url('Welcome/forget_password') ?>"><input     class="hvr-wobble-vertical btn btn-primary" value="فراموشی رمز عبور"></a>
		</div>
    </div>
  </div> 
</div> 
<div class="grid_1">
      <div class="container">
      	<h1>پروفایل های ویژه</h1>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
        <ul id="flexiselDemo3">
			<?php
			foreach($users_index as $users)
			{
				$userinfo =  instance('usermodel','get_by_id',$users['IdUser']);
				$city_info = instance('provincemodel','get_by_id',$users['State'])
			?>
			  <li><div class="col_1"><a href="#">
				<img  src="<?php echo base_url('uploads/users/'.$users['Pic']) ?>" width="300" height="250" alt="" />
				 <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
					<div class="center-middle">آشنام کن</div>
				 </div>
				 <h3><span class="m_3"><?php echo $userinfo->Name ?></span><br><?php echo $city_info->name ?><br><?php echo $users['FieldEducation'] ?></h3></a></div>
			  </li>
			<?php } ?>
	    </ul>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay:false,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	   </script>
	   <script type="text/javascript" src="<?php echo base_url('') ?>assets/js/jquery.flexisel.js"></script>
    </div>
</div>
<div class="grid_2">
	
</div>
    
    <div class="bg">
		<div class="container"> 
			<h3>پیام های دوستان</h3>
			<div class="heart-divider">
				<span class="grey-line"></span>
				<i class="fa fa-heart pink-heart"></i>
				<i class="fa fa-heart grey-heart"></i>
				<span class="grey-line"></span>
            </div>
            <div class="col-xs-6">
            	<div class="bg_left">
            		<h4>تشکر و قدردانی</h4>
            		<h5>دوست عروس</h5>
            		<p>از تمامی دست اندرکاران و مسئولین این سایت که باعث شدند ، دو جوان در آستانه آشنایی با یکدیگر قرار بگیرند و روزگار خوبی و خوشی رو در کنار هم شروع کنند ، کمال تشکر و قدردانی را دارم.</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="col-xs-6">
            	<div class="bg_left">
            		<h4>تشکر و قدردانی</h4>
            		<h5>دوست عروس</h5>
            		<p>از تمامی دست اندرکاران و مسئولین این سایت که باعث شدند ، دو جوان در آستانه آشنایی با یکدیگر قرار بگیرند و روزگار خوبی و خوشی رو در کنار هم شروع کنند ، کمال تشکر و قدردانی را دارم.</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="clearfix"> </div>
		</div>
	</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>