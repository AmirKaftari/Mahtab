<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url('Users/Dashboard') ?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">مشاهده پروفایل</li>
     </ul>
   </div>
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
   <div class="profile">
   	 <div class="col-md-8 profile_left">
   	 	<h2><?php echo $userInfo['Name']?></h2>
   	 	<div class="col_3">
   	        <div class="col-sm-4 row_2">
				<div class="flexslider">
					 <ul class="slides">
						 <img src="
						 	<?php if(!is_null($userInfo['Pic']) && $userInfo['Pic'] != '')
						 {
							 echo base_url('uploads/users/'.$userInfo['Pic']);
						 }
						 elseif($userInfo['Jender'] == 0)
						 {
							 echo base_url('assets/images/female.png');
						 }
						 elseif($userInfo['Jender'] == 1)
						 {
							 echo base_url('assets/images/men.png');
						 }
						 ?>
						 " />
					 </ul>
				  </div>
			</div>
			<div class="col-sm-8 row_1">
				<table class="table_working_hours">
					<tbody>
					<tr class="opened_1">
						<td class="day_label1">سن :</td>
						<td class="day_value">
							<?php
							$birthday = jalali_to_gregorian($userInfo['Birthday']) ;
							$diff = (date('Y') - date('Y',strtotime($birthday)));
							echo $diff;
							?>
						</td>
					</tr>
					<tr class="opened">
						<td class="day_label1">وضعیت :</td>
						<td class="day_value">آفلاین</td>
					</tr>
					<tr class="opened">
						<td class="day_label1">مذهب : </td>
						<td class="day_value"><?php echo $userInfo['Religion'] ?></td>
					</tr>
					<tr class="opened">
						<td class="day_label1">وضعیت ازدواج :</td>
						<td class="day_value"><?php echo $userInfo['MaridgeState'] ?></td>
					</tr>
					<tr class="opened">
						<td class="day_label1">استان : </td>
						<td class="day_value"><?php $State = instance('provincemodel','get_by_id',$userInfo['State']); echo $State->name; ?></td>
					</tr>
					<tr class="closed">
						<td class="day_label1">تحصیلات :</td>
						<td class="day_value closed"><span><?php echo $userInfo['Education'] ?></span></td>
					</tr>
					<tr class="closed">
						<td class="day_label1">رشته :</td>
						<td class="day_value closed"><span><?php echo $userInfo['FieldEducation'] ?></span></td>
					</tr>
					</tbody>
				</table>
				<div class="buttons">
					<a href="<?php echo base_url('Users/Dashboard/favorite_message/'.$userInfo['IdUser'].'/'.$userInfo['Name']) ?>"><div class="vertical">پیام علاقه مندی</div></a>
					<a href="<?php echo base_url('Users/Dashboard/personal_message/'.$userInfo['IdUser']) ?>"><div class="vertical">پیام شخصی</div></a>
					<a href="<?php echo base_url('Users/Dashboard/intro_friends') ?>"><div class="vertical">معرفی به دوستان</div></a>
				</div>
				<div class="buttons">
					<a href="<?php echo base_url('Users/Dashboard/report_police/'.$userInfo['IdUser'].'/'.$userInfo['Name']) ?>"><div class="vertical">گزارش به پلیس سایت</div></a>
					<a href="<?php echo base_url('Favoritepersoncontroller/create_action/'.$userInfo['IdUser']) ?>"><div class="vertical">اضافه کردن به لیست علاقه مندیها</div></a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">درباره من</a></li>
				  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">آشنایی با خونوادم</a></li>
				  <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">معیارهای ازدواج</a></li>
			   </ul>
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">

				    <div class="basic_1">
				    	<h3>مبانی و شیوه زندگی</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">وضعیت مسکن :</td>
									<td class="day_value"><?php echo $userInfo['HomeState'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">درآمد :</td>
									<td class="day_value"><?php echo $userInfo['Income'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">رنگ پوست :</td>
									<td class="day_value"><?php echo $userInfo['SkinColor'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">قد : </td>
									<td class="day_value"><?php echo $userInfo['Height'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">وضعیت اشتغال :</td>
									<td class="day_value closed"><span><?php echo $userInfo['JobState'] ?></span></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">شغل :</td>
									<td class="day_value closed"><span><?php echo $userInfo['JobTitle'] ?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">مصرف الکل : </td>
									<td class="day_value closed"><span><?php echo $userInfo['UseAlcohol'] ?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">مصرف سیگار : </td>
									<td class="day_value"><?php echo $userInfo['UseCigaret'] ?></td>
								</tr>
						    </tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">وضعیت ماشین :</td>
									<td class="day_value"><?php echo $userInfo['CarState'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">وضعیت حجاب :</td>
									<td class="day_value"><?php echo $userInfo['Hijab'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">اعتقادات : </td>
									<td class="day_value"><?php echo $userInfo['Belief'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">شخصیت : </td>
									<td class="day_value"><?php echo $userInfo['TypePerson'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">معیار ازدواج : </td>
									<td class="day_value"><?php echo $userInfo['MaridgeScale'] ?></td>
								</tr>
							    <tr class="closed">
									<td class="day_label">تعداد دوستان صمیمی :</td>
									<td class="day_value closed"><?php echo $userInfo['CountFriends'] ?>
								</tr>
							    <tr class="closed">
									<td class="day_label">روحیات من :</td>
									<td class="day_value closed"><?php echo $userInfo['Iam'] ?></td>
								</tr>
								<tr class="closed">
									<td class="day_label">روحیات همسر :</td>
									<td class="day_value closed"><?php echo $userInfo['WifeIs'] ?></td>
								</tr>
						    </tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1">
				    	<h3>اطلاعات تکمیلی :</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">تاریخ تولد : </td>
									<td class="day_value"><?php echo $userInfo['Birthday'] ?></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">محل تولد : </td>
									<td class="day_value"><?php  $city_info =  instance('Citymodel','get_by_id',$userInfo['City']); echo $city_info->name; ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">محل زندگی مشترک : </td>
									<td class="day_value closed">
										<?php echo $userInfo['LocationLife'] ?>
									</td>
								</tr>
							    <tr class="opened">
									<td class="day_label">قصد مهاجرت : </td>
									<td class="day_value closed"><span><?php echo $userInfo['Emigration'] ?></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">مهریه : </td>
									<td class="day_value"><?php echo $userInfo['Dowry'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">سنت خاص ازدواج :‌</td>
									<td class="day_value"><?php echo $userInfo['Ofmarriage'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">تمایل به اشتغال : </td>
									<td class="day_value"><?php echo $userInfo['MyOccupation'] ?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">تمایل به تحصیل : </td>
									<td class="day_value"><?php echo $userInfo['MyEducation'] ?></td>
								</tr>
							</tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1 basic_2">
						<h3>اطلاعات بیشتر : </h3>
						<div class="col-md-6 basic_1-left">
							<table class="table_working_hours">
								<tbody>
								<tr class="opened">
									<td class="day_label">اهل مطالعه :</td>
									<td class="day_value"><?php echo $userInfo['StudyScale'] ?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">اهل ورزش : </td>
									<td class="day_value"><?php echo $userInfo['SportScale'] ?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">فرزند چندمم : </td>
									<td class="day_value closed">
										<?php echo $userInfo['AtSon'] ?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">تعداد برادر :</td>
									<td class="day_value closed"><span><?php echo $userInfo['CountBrother'] ?></span></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6 basic_1-left">
							<table class="table_working_hours">
								<tbody>
								<tr class="opened_1">
									<td class="day_label">تعداد خواهر : </td>
									<td class="day_value"><?php echo $userInfo['CountSister'] ?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">سنت خاص ازدواج :‌</td>
									<td class="day_value"><?php echo $userInfo['Ofmarriage'] ?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">خواهر و برادر ازدواج کرده : </td>
									<td class="day_value"><?php echo $userInfo['MarridgeBroSis'] ?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">تعداد فرزندانم : </td>
									<td class="day_value"><?php echo $userInfo['CountChildren'] ?></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="clearfix"> </div>
				    </div>
				  </div>
				  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
				    <div class="basic_3">
<!--				    	<h4></h4>-->
				    	<div class="basic_1 basic_2">
<!--				    	<h3>Basics</h3>-->
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">تحصیلات پدرم : </td>
									<td class="day_value"><?php echo $userInfo['FatherEducation'] ?></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">تحصیلات مادرم : </td>
									<td class="day_value"><?php echo $userInfo['MatherEducation'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">قومیت پدرم : </td>
									<td class="day_value closed"><span><?php echo $userInfo['FatherNationality'] ?></span></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">قومیت مادرم : </td>
									<td class="day_value closed"><span><?php echo $userInfo['MatherNationality'] ?></span></td>
								</tr>
								<tr class="opened">
									<td class="day_label">درآمد خونوادم : </td>
									<td class="day_value closed"><span><?php echo $userInfo['FamilyIncome'] ?></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				       </div>
				    </div>
				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
				    <div class="basic_1 basic_2">
						<div class="col-md-6 basic_1-left">
							<table class="table_working_hours">
								<tbody>
								<tr class="opened_1">
									<td class="day_label">سن : </td>
									<td class="day_value"><?php echo ' از ' .$userInfo['MateAge']. ' تا ' .$userInfo['MateAgeTo']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">تحصیلات : </td>
									<td class="day_value"><?php echo ' از ' .$userInfo['MateEducation']. ' تا ' .$userInfo['MateEducationTo']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">تحصیلات پدر : </td>
									<td class="day_value"><?php echo ' از ' .$userInfo['MateFatherEducation']. ' تا ' .$userInfo['MateFatherEducationTo']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">تحصیلات مادر : </td>
									<td class="day_value"><?php echo ' از ' .$userInfo['MateMotherEducation']. ' تا ' .$userInfo['MateMotherEducationTo']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">وضعیت ازدواج : </td>
									<td class="day_value closed">
										<?php
											$status = 0;
											if(!is_null($userInfo['MojaradWife']))
											{
												echo $userInfo['MojaradWife'];
												echo '-';
												$status = 1;
											}
											if(!is_null($userInfo['TalaghWife']))
											{
												echo $userInfo['TalaghWife'];
												echo '-';
												$status = 1;
											}
											if(!is_null($userInfo['DeadWife']))
											{
												echo $userInfo['DeadWife'];
												echo '-';
												$status = 1;
											}
											elseif(!$status)
											{
												echo 'مهم نیست';
											}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">موقعیت : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['Hamshahri']))
										{
											echo $userInfo['Hamshahri'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['HamOstani']))
										{
											echo $userInfo['HamOstani'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['HamVatan']))
										{
											echo $userInfo['HamVatan'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Kharej']))
										{
											echo $userInfo['Kharej'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">قد : </td>
									<td class="day_value closed"><?php echo ' از ' .$userInfo['GhadAs']. ' تا ' .$userInfo['GhadTa']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">وزن : </td>
									<td class="day_value"><?php echo ' از ' .$userInfo['VaznAs']. ' تا ' .$userInfo['VaznTa']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">رنگ پوست : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['Sefid']))
										{
											echo $userInfo['Sefid'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['SabzeRoshan']))
										{
											echo $userInfo['SabzeRoshan '];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['SabzeTire']))
										{
											echo $userInfo['SabzeTire'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">درآمد خانواده : </td>
									<td class="day_value"><?php echo $userInfo['DarAmadFamilyAs']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">درآمد همسر : </td>
									<td class="day_value"><?php echo $userInfo['DaramadHamsarAs']?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">وضعیت مسکن : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['HomeDarad']))
										{
											echo $userInfo['HomeDarad'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['HomeNadarad']))
										{
											echo $userInfo['HomeNadarad '];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6 basic_1-left">
							<table class="table_working_hours">
								<tbody>
								<tr class="opened_1">
									<td class="day_label">وضعیت ماشین :</td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['CarDarad']))
										{
											echo $userInfo['CarDarad'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['CarNadarad']))
										{
											echo $userInfo['CarNadarad '];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">مذهب : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['Sheea']))
										{
											echo $userInfo['Sheea'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Soni']))
										{
											echo $userInfo['Soni'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['DinMasih']))
										{
											echo $userInfo['DinMasih'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['DinYahod']))
										{
											echo $userInfo['DinYahod'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">نوع شخصیت : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['Daroongara']))
										{
											echo $userInfo['Daroongara'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Boroongara']))
										{
											echo $userInfo['Boroongara'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">وضعیت جسمانی : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['Salem']))
										{
											echo $userInfo['Salem'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['BimarKhas']))
										{
											echo $userInfo['BimarKhas'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['NaghsOzv']))
										{
											echo $userInfo['NaghsOzv'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">وضعیت حجاب :</td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['MohajabeChadori']))
										{
											echo $userInfo['MohajabeChadori'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['BadHejab']))
										{
											echo $userInfo['BadHejab'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Bihejab']))
										{
											echo $userInfo['Bihejab'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">اعتقادات : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['MazhabiMoghayad']))
										{
											echo $userInfo['MazhabiMoghayad'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Mazhabi']))
										{
											echo $userInfo['Mazhabi'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['UnMazhabi']))
										{
											echo $userInfo['UnMazhabi'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">قومیت : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['Fars']))
										{
											echo $userInfo['Fars'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Tork']))
										{
											echo $userInfo['Tork'];
											echo '-';
										}
										if(!is_null($userInfo['Kord']))
										{
											echo $userInfo['Kord'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Lor']))
										{
											echo $userInfo['Lor'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Balooch']))
										{
											echo $userInfo['Balooch'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Mazandaran']))
										{
											echo $userInfo['Mazandaran'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Gilak']))
										{
											echo $userInfo['Gilak'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Arab']))
										{
											echo $userInfo['Arab'];
											echo '-';
											$status = 1;
										}
										if(!is_null($userInfo['Sayer']))
										{
											echo $userInfo['Sayer'];
											echo '-';
											$status = 1;
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">وضعیت فرزند : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['FarzandNadarad']))
										{
											$status = 1;
											echo $userInfo['FarzandNadarad'];
											echo '-';
										}
										if(!is_null($userInfo['FarzandDarad']))
										{
											$status = 1;
											echo $userInfo['FarzandDarad'];
											echo '-';
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="closed">
									<td class="day_label">مصرف سیگار : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['SigarNadrad']))
										{
											$status = 1;
											echo $userInfo['SigarNadrad'];
											echo '-';
										}
										if(!is_null($userInfo['SigarDarad']))
										{
											$status = 1;
											echo $userInfo['SigarDarad'];
											echo '-';
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="closed">
									<td class="day_label">مصرف الکل : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['AlcolNadarad']))
										{
											$status = 1;
											echo $userInfo['AlcolNadarad'];
											echo '-';
										}
										if(!is_null($userInfo['AlcolDarad']))
										{
											$status = 1;
											echo $userInfo['AlcolDarad'];
											echo '-';
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								<tr class="closed">
									<td class="day_label">قصد مهاجرت : </td>
									<td class="day_value closed">
									<?php
									$status = 0;
									if(!is_null($userInfo['MohajeratDarad']))
									{
										$status = 1;
										echo $userInfo['MohajeratDarad'];
										echo '-';
									}
									if(!is_null($userInfo['MohajeratNadarad']))
									{
										$status = 1;
										echo $userInfo['MohajeratNadarad'];
										echo '-';
									}
									elseif(!$status)
									{
										echo 'مهم نیست';
									}
									?>
									</td>
								</tr>
								<tr class="closed">
									<td class="day_label">تعداد خواهر و برادر : </td>
									<td class="day_value closed">
										<?php echo $userInfo['TedadBaraKha']; ?>
									</td>
								</tr>
								<tr class="closed">
									<td class="day_label">وضعیت اشتغال : </td>
									<td class="day_value closed">
										<?php
										$status = 0;
										if(!is_null($userInfo['Bikar']))
										{
											$status = 1;
											echo $userInfo['Bikar'];
											echo '-';
										}
										if(!is_null($userInfo['Shaghel']))
										{
											$status = 1;
											echo $userInfo['Shaghel'];
											echo '-';
										}
										if(!is_null($userInfo['Daneshjoo']))
										{
											$status = 1;
											echo $userInfo['Daneshjoo'];
											echo '-';
										}
										elseif(!$status)
										{
											echo 'مهم نیست';
										}
										?>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="clearfix"> </div>
				     </div>
				 </div>
		     </div>
		  </div>
	   </div>
   	 </div>
	   <div class="col-md-3 match_right">
		   <div class="view_profile view_profile2">
			   <h3>جدیدترین پروفایل ها</h3>
			   <ul class="profile_item">
				   <?php
				   foreach($new_user as $user)
				   {
					   ?>
					   <a href="<?php echo base_url('Users/Dashboard/view_profile/'.$user['IdUser']) ?>">
						   <li class="profile_item-img">
							   <img width="80" height="100" src="
						<?php if(!is_null($user['Pic']) && $user['Pic'] != '')
							   {
								   echo base_url('uploads/users/'.$user['Pic']);
							   }
							   elseif($user['Jender'] == 0)
							   {
								   echo base_url('assets/images/female.png');
							   }
							   elseif($user['Jender'] == 1)
							   {
								   echo base_url('assets/images/men.png');
							   }
							   ?>" class="img-rounded" alt=""/>
						   </li>
						   <li class="profile_item-desc">
							   <h4><?php echo $user['Name']?></h4>
							   <h5>مشاهده پروفایل</h5>
						   </li>
						   <div class="clearfix"> </div>
					   </a>
					   <br/>
				   <?php } ?>
			   </ul>
		   </div>
	   </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>