<div class="row">

	</br>
		<?php
			foreach($User_info as $user)
			{
			?>
					<div class="col-sm-3" align="center">
						<a target="_blank" href="<?php echo base_url('Users/Dashboard/view_profile/'.$user['IdUser']) ?>"><img  src="
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
						?>" class="img-rounded" width="150" height="150" alt=""/></a>

						<table style="text-align:center">
							<tbody>
							<tr style="text-align:center">
								<td style="text-align:center">
									<?php
										echo $user['Name'];
									?>
								</td>
							</tr>
							<tr style="text-align:center">
								<td style="text-align:center">
									<?php
									$birthday = jalali_to_gregorian($user['Birthday']) ;
									$diff = (date('Y') - date('Y',strtotime($birthday)));
									echo $diff.' ساله ';
									?>
								</td>
							</tr>
							<tr style="text-align:center">
								<td style="text-align:center"><?php $State = instance('provincemodel','get_by_id',$user['State']); echo $State->name; ?></td>
							</tr>
							<tr style="text-align:center">
								<td style="text-align:center">فعالیت : </td>
								<td style="text-align:center">
									<?php
									$state_user = instance('useronlinemodel','get_by_id_user',$user['IdUser']);
									if(isset($state_user->time) && $state_user->time > date("Y-m-d H:i:s",strtotime("-30 minutes")))
									{
										echo 'آنلاین';
									}
									else
									{
										echo 'آفلاین';
									}
									?>
								</td>
							</tr>


							</tbody>
						</table>
					</div>
		<?php } ?>

</div>
<br />
<div class="row">
		<div class="col-md-6 text-right">
			<?php echo $pagination ?>
		</div>
</div>