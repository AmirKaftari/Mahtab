</br>
<div class='main'>
        
        <div class="row" style="margin-bottom: 10px">
<!--            <div class="col-md-4">-->
<!--                --><?php //echo anchor(site_url('reort_police/create'),'ایجاد', 'class="btn btn-primary"'); ?>
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
<!--                <form action="--><?php //echo site_url('reort_police/search'); ?><!--" class="form-inline" method="post">-->
<!--                    <input name="keyword" class="form-control" value="--><?php //echo $keyword; ?><!--" />-->
<!--                    --><?php //
//                    if ($keyword <> '')
//                    {
//                        ?>
<!--                        <a href="--><?php //echo site_url('reort_police'); ?><!--" class="btn btn-default">انصراف</a>-->
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
				<th style="text-align:center">گزارش دهنده</th>
				<th style="text-align:center">متخلف</th>
				<th style="text-align:center">تاریخ گزارش</th>
				<th style="text-align:center">متن گزارش</th>
				<th style="text-align:center">عملیات</th>
            </tr><?php
            foreach ($reortpolicecontroller_data as $reort_police)
            {
                ?>
                <tr>
			<td style="text-align:center"><?php echo ++$start ?></td>
			<td style="text-align:center">
                <?php $sender_info = instance('usermodel','get_by_id',$reort_police->idSender);
                echo $sender_info->Name.' '.$sender_info->Lastname;
                ?>
            </td>
			<td style="text-align:center">
                <?php $offend_info = instance('usermodel','get_by_id',$reort_police->Offending_id);
                echo $offend_info->Name.' '.$offend_info->Lastname;
                ?>
            </td>
			<td style="text-align:center"><?php echo gregorian_to_jalali($reort_police->Date_Report) ?></td>
			<td style="text-align:center"><?php echo $reort_police->message ?></td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('Admin/Dashboard/edit_info/'.$reort_police->Offending_id),'پروفایل متخلف');
				echo ' | ';
                echo anchor(site_url('Admin/Dashboard/edit_info/'.$reort_police->idSender),'پروفایل گزارش دهنده');
                echo ' | ';
                echo anchor(site_url('Usercontroller/block/'.$reort_police->Offending_id),'بلاک متخلف');
				echo ' | '; 
				echo anchor(site_url('reort_police/delete/'.$reort_police->ID),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"'); 
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