<div class='main'>
        <h2 style="margin-top:0px">Tbl_identity_user <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">IdUser <?php echo form_error('IdUser') ?></label>
                <input type="text" class="form-control" name="IdUser" id="IdUser" placeholder="IdUser" value="<?php echo $IdUser; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Pic <?php echo form_error('Pic') ?></label>
                <input type="text" class="form-control" name="Pic" id="Pic" placeholder="Pic" value="<?php echo $Pic; ?>" />
            </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('identityusercontroller') ?>" class="btn btn-default">انصراف</a>
	</form>
    </div>