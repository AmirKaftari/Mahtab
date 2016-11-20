<?php require_once(APPPATH.'views/include/sub_header.php'); ?>
<div class="grid_3">
	<div class="container">
		<div class="breadcrumb1">
			<ul>
				<a href="index.html"><i class="fa fa-home home_1"></i></a>
				<span class="divider">&nbsp;|&nbsp;</span>
				<li class="current-page"></li>
			</ul>
		</div>
		<div class="col-md-9 profile_left1">
			<h1>
				<?php
					$userGender = $this->session->userdata('Jender');
					if($userGender == 1)
						$gender = 'مشاهده پروفایل های خانم';
					elseif($userGender == 0)
						$gender = 'مشاهده پروفایل های آقا';

					echo $gender;
				?>
			</h1>

				<div class="row">
					<?php
					foreach($User_info as $user)
					{
					?>
					</br>

					<div class="col-sm-3">
						<img width="200" height="250" src="
						<?php if(!is_null($user['Pic']) && $user['Pic'] != '')
						{
							echo base_url('uploads/users/'.$user['Pic']);
						}
						else
						{
							echo base_url('assets/images/female.png');
						}
						?>" class="img-rounded" alt=""/>
					</div>

				<?php } ?>

				</div>

			<div class="row">
				<div class="col-md-6 text-right">
					<?php echo $pagination ?>
				</div>
			</div>
		</div>

		<div class="clearfix"> </div>
	</div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>