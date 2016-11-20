<br />
<div class='main'>
        <h2 style="margin-top:0px">پیام های علاقه مندی</h2>
        <div class="row" style="margin-bottom: 10px">

            <div class="col-md-4 text-center">
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
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th style="text-align:center">ردیف</th>
				<th style="text-align:center">ارسال به</th>
				<th style="text-align:center">پیام</th>
				<th style="text-align:center">عملیات</th>
            </tr><?php
            foreach ($favoritemessagecontroller_data as $favoritemessagecontroller)
            {
                ?>
                <tr>
			<td style="text-align:center"><?php echo ++$start ?></td>
			<td style="text-align:center"><?php  $info_user = instance('Userinfomodel','get_user_profile',$favoritemessagecontroller->idReciever);
                            echo $info_user['Name']; ?>
            </td>
			<td style="text-align:center"><?php echo $favoritemessagecontroller->Message ?></td>
			<td style="text-align:center">
				<?php 
					echo anchor(site_url('favoritemessagecontroller/delete/'.$favoritemessagecontroller->ID),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"'); 
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