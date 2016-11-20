<div class='main'>
        <h2 style="margin-top:0px">Tbl_contact List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('contactcontroller/create'),'ایجاد', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('contactcontroller/search'); ?>" class="form-inline" method="post">
                    <input name="keyword" class="form-control" value="<?php echo $keyword; ?>" />
                    <?php 
                    if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('contactcontroller'); ?>" class="btn btn-default">انصراف</a>
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
		<th>fullname</th>
		<th>phone</th>
		<th>email</th>
		<th>message</th>
		<th>Action</th>
            </tr><?php
            foreach ($contactcontroller_data as $contactcontroller)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $contactcontroller->fullname ?></td>
			<td><?php echo $contactcontroller->phone ?></td>
			<td><?php echo $contactcontroller->email ?></td>
			<td><?php echo $contactcontroller->message ?></td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('contactcontroller/read/'.$contactcontroller->id),'نمایش'); 
				echo ' | '; 
				echo anchor(site_url('contactcontroller/update/'.$contactcontroller->id),'ویرایش'); 
				echo ' | '; 
				echo anchor(site_url('contactcontroller/delete/'.$contactcontroller->id),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"'); 
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