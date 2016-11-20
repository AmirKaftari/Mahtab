<div class='main'>
        <h2 style="margin-top:0px">Tbl_user List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('usercontroller/create'),'ایجاد', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('usercontroller/search'); ?>" class="form-inline" method="post">
                    <input name="keyword" class="form-control" value="<?php echo $keyword; ?>" />
                    <?php 
                    if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('usercontroller'); ?>" class="btn btn-default">انصراف</a>
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
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Age</th>
		<th>Subject_self</th>
		<th>Avatar</th>
		<th>Action</th>
            </tr><?php
            foreach ($usercontroller_data as $usercontroller)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $usercontroller->Username ?></td>
			<td><?php echo $usercontroller->Password ?></td>
			<td><?php echo $usercontroller->Email ?></td>
			<td><?php echo $usercontroller->Age ?></td>
			<td><?php echo $usercontroller->Subject_self ?></td>
			<td><?php echo $usercontroller->Avatar ?></td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('usercontroller/read/'.$usercontroller->ID),'نمایش'); 
				echo ' | '; 
				echo anchor(site_url('usercontroller/update/'.$usercontroller->ID),'ویرایش'); 
				echo ' | '; 
				echo anchor(site_url('usercontroller/delete/'.$usercontroller->ID),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"'); 
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