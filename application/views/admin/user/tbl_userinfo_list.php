<br>
<div class='main'>
        <div class="row" style="margin-bottom: 10px">
<!--            <div class="col-md-6">-->
<!--                --><?php //echo anchor(site_url('Userinfocontroller/create'),'کاربران ویژه', 'class="btn btn-primary"'); ?>
<!--                --><?php //echo anchor(site_url('Userinfocontroller/create'),'کاربران گزارش شده', 'class="btn btn-primary"'); ?>
<!--                --><?php //echo anchor(site_url('Userinfocontroller/create'),'کاربران بلاک شده', 'class="btn btn-primary"'); ?>
<!--            </div>-->
            <div class="col-md-6 text-center">
				<div style="margin-top: 8px" id="message">
					<?php
					if($this->session->userdata('message') != null)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
						echo	$this->session->userdata('message') <> '' ? $this->session->userdata('message') : '';
						echo '</div>';
						$this->session->unset_userdata('message');
					}
					?>
				</div>
            </div>
<!--            <div class="col-md-4 text-right">-->
<!--                <form action="--><?php //echo site_url('userinfo/search'); ?><!--" class="form-inline" method="post">-->
<!--                    <input name="keyword" class="form-control" value="--><?php //echo $keyword; ?><!--" />-->
<!--                    --><?php //
//                    if ($keyword <> '')
//                    {
//                        ?>
<!--                        <a href="--><?php //echo site_url('userinfo'); ?><!--" class="btn btn-default">انصراف</a>-->
<!--                        --><?php
//                    }
//                    ?>
<!--                    <input type="submit" value="جستجو" class="btn btn-primary" />-->
<!--                </form>-->
<!--            </div>-->
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th style="text-align:center">ردیف</th>
				<th style="text-align:center">نام و نام خانوادگی</th>
				<th style="text-align:center">تاریخ عضویت</th>
				<th style="text-align:center">نوع عضویت</th>
				<th style="text-align:center">عملیات</th>
            </tr><?php
            foreach ($userinfocontroller_data as $userinfo)
            {
                ?>
                <tr>
			<td style="text-align:center"><?php echo ++$start ?></td>
			<td style="text-align:center"><?php echo $userinfo->Name.' '.$userinfo->Lastname ?></td>
			<td style="text-align:center"><?php echo $userinfo->Date_register ?></td>
			<td style="text-align:center">
				<?php
					$hasVip = instance('Uservipmodel','get_by_idUser',$userinfo->IdUser);
					if(count($hasVip) > 0)
					{
						if(isset($hasVip->End_date))
							$endDateVip = jalali_to_gregorian($hasVip->End_date);
						if($endDateVip >= date('Y-m-d') && $hasVip->Status == 1)
						{
							echo 'ویژه';
						}
						else
							echo 'اتمام عضویت';
					}
					else
					{
						echo 'عادی';
					}
				?>
			</td>
			<td style="text-align:center">
				<?php
				echo anchor(site_url('Admin/Dashboard/edit_info/'.$userinfo->IdUser),'ویرایش');
				echo ' | ';
				if($userinfo->Is_block)
					echo anchor(site_url('Usercontroller/Un_block/'.$userinfo->ID),'لغو بلاک');
				else
					echo anchor(site_url('Usercontroller/block/'.$userinfo->ID),'بلاک');
//				echo ' | ';
//				echo anchor(site_url('Userinfocontroller/update/'.$userinfo->ID),'ارسال پیام');
//				echo ' | ';
//				echo anchor(site_url('Usercontroller/delete/'.$userinfo->IdUser),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">تعداد رکوردها : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>