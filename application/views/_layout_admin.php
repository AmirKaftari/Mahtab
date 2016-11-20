<?php require_once('admin/includes/header_layout.php') ?>
       <div id="right">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img width="100" height="100" class="media-object img-thumbnail user-img" alt="User Picture" src="
					<?php
						$iduser = $this->session->userdata('IDuser');
						$user_info =  instance('Userinfomodel','get_by_id_user',$iduser);
						$pic_path = 'assets/dashboard/assets/img/unknown.png';
						if(isset($user_info->Pic) && !is_null($user_info->Pic))
						{
							$pic_path = $user_info->Pic;
							echo base_url('uploads/users/'.$pic_path);
						}
						else
						{
							echo base_url('assets/images/businessman.png');
						}
						?>"
					/>
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"><?php echo $this->session->userdata('Titleadmin'); ?></h5>
                    <ul class="list-unstyled user-info">

                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> آنلاین

                        </li>

                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">


                <li class="panel active">
                    <a href="<?php echo base_url('Admin/Dashboard') ?>" >
                        <i class="icon-table"></i> داشبورد
                    </a>
                </li>

                <li >
                    <a href="<?php echo base_url('Userinfocontroller/index') ?>" >
                        <i class="icon-table"></i> مدیریت کاربران
                    </a>
                </li>

                <li >
                    <a href="<?php echo base_url('Uservipcontroller') ?>" >
                        <i class="icon-table"></i> مدیریت کاربران ویژه
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('Usercontroller/index_block') ?>" >
                        <i class="icon-table"></i> مدیریت بلاک شده ها
                    </a>
                </li>

                <li >
                    <a href="<?php echo base_url('Reortpolicecontroller') ?>" >
                        <i class="icon-table"></i> مدیریت متخلفین
                    </a>
                </li>

                <li >
                    <a href="#" >
                        <i class="icon-table"></i> مدیریت پرداختی ها
                    </a>
                </li>

                 <li >
                    <a href="<?php echo base_url('Identityusercontroller') ?>" >
                        <i class="icon-table"></i> مدیریت احراز هویت
                    </a>
                </li>


<!--                <li class="panel">-->
<!--                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#nav-vip">-->
<!--                        <i class="icon-gift"></i> مدیریت محتوا-->
<!---->
<!--                        <span class="pull-left">-->
<!--                            <i class="icon-angle-right"></i>-->
<!--                        </span>-->
<!--                    </a>-->
<!--                    <ul class="collapse" id="nav-vip">-->
<!--                        <li><a href="#"><i class="icon-gift"></i> صفحه درباره ما</a></li>-->
<!--                        <li><a href="--><?php //echo base_url('Users/Dashboard/upgrade') ?><!--"><i class="icon-gift"></i> مقالات ازدواج</a></li>-->
<!--                        <li><a href="#"><i class="icon-gift"></i> قوانین سایت</a></li>-->
<!--                        <li><a href="#"><i class="icon-gift"></i>شیوه استفاده از سایت </a></li>-->
<!--                    </ul>-->
<!--                </li>-->

            </ul>

        </div>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <div id="content">
			<div class="inner" style="min-height: 700px;">
				<div > <?php echo $contents ?> </div>
			</div>
		</div>
        <!--END PAGE CONTENT -->

          <!-- RIGHT STRIP  SECTION -->
        <div id="left">
            <div class="well well-small">
                <p>جدیدترین کاربران : </p>
                <ul class="list-unstyled">
                    <?php
                    $userGender = $this->session->userdata('Jender');
                    $user_new = instance('Userinfomodel','get_new_users',$userGender);
                    $idUser = $this->session->userdata('IDuser');
                    foreach ($user_new as $user)
                    {
                        $user_online_info = instance('userinfomodel','get_user_profile',$user['IdUser']);
                        if(!isset($user_online_info['State']) || $user['IdUser'] == $idUser)
                            continue;
                        $user_state = instance('provincemodel','get_by_id',$user_online_info['State']);
//                    else
//                        $user_state->name = 'نامشخص';
//                    ?>
                        <a href="<?php echo base_url('Users/Dashboard/view_profile/'.$user['IdUser']) ?>"><li style="font-size: small"><?php echo $user_online_info['Name'].' '.$user_online_info['Lastname'] ?><span><?php echo ' '.$user_state->name ?></span></li></a>
                    <?php } ?>

                </ul>
            </div>
        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>
<?php require_once('admin/includes/footer_layout.php') ?>