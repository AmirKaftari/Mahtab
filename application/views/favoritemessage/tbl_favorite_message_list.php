<div class='main'>
        <h2 style="margin-top:0px">Tbl_favorite_message List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('favoritemessagecontroller/create'),'ایجاد', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('favoritemessagecontroller/search'); ?>" class="form-inline" method="post">
                    <input name="keyword" class="form-control" value="<?php echo $keyword; ?>" />
                    <?php 
                    if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('favoritemessagecontroller'); ?>" class="btn btn-default">انصراف</a>
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
		<th>idSender</th>
		<th>idReciever</th>
		<th>Message</th>
		<th>Action</th>
            </tr><?php
            foreach ($favoritemessagecontroller_data as $favoritemessagecontroller)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $favoritemessagecontroller->idSender ?></td>
			<td><?php echo $favoritemessagecontroller->idReciever ?></td>
			<td><?php echo $favoritemessagecontroller->Message ?></td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('favoritemessagecontroller/read/'.$favoritemessagecontroller->ID),'نمایش'); 
				echo ' | '; 
				echo anchor(site_url('favoritemessagecontroller/update/'.$favoritemessagecontroller->ID),'ویرایش'); 
				echo ' | '; 
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