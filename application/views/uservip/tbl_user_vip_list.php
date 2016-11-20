<div class='main'>
        <h2 style="margin-top:0px">Tbl_user_vip List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('uservipcontroller/create'),'ایجاد', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('uservipcontroller/search'); ?>" class="form-inline" method="post">
                    <input name="keyword" class="form-control" value="<?php echo $keyword; ?>" />
                    <?php 
                    if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('uservipcontroller'); ?>" class="btn btn-default">انصراف</a>
                        <?php
                    }
                    ?>
                    <input type="submit" value="جستجو" class="btn btn-primary" />
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>ردیف</th>
		<th>IdUser</th>
		<th>Start_date</th>
		<th>length</th>
		<th>End_date</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($uservipcontroller_data as $uservipcontroller)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $uservipcontroller->IdUser ?></td>
			<td><?php echo $uservipcontroller->Start_date ?></td>
			<td><?php echo $uservipcontroller->length ?></td>
			<td><?php echo $uservipcontroller->End_date ?></td>
			<td><?php echo $uservipcontroller->Status ?></td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('uservipcontroller/read/'.$uservipcontroller->ID),'نمایش'); 
				echo ' | '; 
				echo anchor(site_url('uservipcontroller/update/'.$uservipcontroller->ID),'ویرایش'); 
				echo ' | '; 
				echo anchor(site_url('uservipcontroller/delete/'.$uservipcontroller->ID),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"'); 
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