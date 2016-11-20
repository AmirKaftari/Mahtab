<br />
<div class='main'>
        <h2 style="margin-top:0px">لیست اشخاص مورد علاقه شما</h2>
        <div class="row" style="margin-bottom: 10px">

            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>

        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th style="text-align:center">ردیف</th>
				<th style="text-align:center">علاقه مند به</th>
				<th style="text-align:center">عملیات</th>
            </tr><?php
            foreach ($favoritepersoncontroller_data as $favoritepersoncontroller)
            {
                ?>
                <tr>
			<td style="text-align:center"><?php echo ++$start ?></td>
			<td style="text-align:center"><?php
                $user_info = instance('Userinfomodel','get_user_profile',$favoritepersoncontroller->favorite_to);
                echo $user_info['Name'].' '.$user_info['Lastname'];   ?>
            </td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('Users/Dashboard/view_profile/'.$user_info['IdUser']),'نمایش پروفایل');
				echo ' | '; 
				echo anchor(site_url('favoritepersoncontroller/delete/'.$favoritepersoncontroller->ID),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"'); 
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
        </div>
    </div>