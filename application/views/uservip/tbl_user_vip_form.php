<div class='main'>
        <h2 style="margin-top:0px">Tbl_user_vip <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">IdUser <?php echo form_error('IdUser') ?></label>
                <input type="text" class="form-control" name="IdUser" id="IdUser" placeholder="IdUser" value="<?php echo $IdUser; ?>" />
            </div>
	    <div class="form-group">
                <label for="date">Start_date <?php echo form_error('Start_date') ?></label>
                <input type="text" class="form-control" name="Start_date" id="Start_date" placeholder="Start_date" value="<?php echo $Start_date; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">length <?php echo form_error('length') ?></label>
                <input type="text" class="form-control" name="length" id="length" placeholder="length" value="<?php echo $length; ?>" />
            </div>
	    <div class="form-group">
                <label for="date">End_date <?php echo form_error('End_date') ?></label>
                <input type="text" class="form-control" name="End_date" id="End_date" placeholder="End_date" value="<?php echo $End_date; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">Status <?php echo form_error('Status') ?></label>
                <input type="text" class="form-control" name="Status" id="Status" placeholder="Status" value="<?php echo $Status; ?>" />
            </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('uservipcontroller') ?>" class="btn btn-default">انصراف</a>
	</form>
    </div>