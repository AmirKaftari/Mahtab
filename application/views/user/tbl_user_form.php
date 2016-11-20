<div class='main'>
        <h2 style="margin-top:0px">Tbl_user <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">Username <?php echo form_error('Username') ?></label>
                <input type="text" class="form-control" name="Username" id="Username" placeholder="Username" value="<?php echo $Username; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">Password <?php echo form_error('Password') ?></label>
                <input type="text" class="form-control" name="Password" id="Password" placeholder="Password" value="<?php echo $Password; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">Email <?php echo form_error('Email') ?></label>
                <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="<?php echo $Email; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">Age <?php echo form_error('Jender') ?></label>
                <input type="text" class="form-control" name="Jender" id="Jender" placeholder="Age" value="<?php echo $Age; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">Subject_self <?php echo form_error('Subject_self') ?></label>
                <input type="text" class="form-control" name="Subject_self" id="Subject_self" placeholder="Subject_self" value="<?php echo $Subject_self; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Avatar <?php echo form_error('Avatar') ?></label>
                <input type="text" class="form-control" name="Avatar" id="Avatar" placeholder="Avatar" value="<?php echo $Avatar; ?>" />
            </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usercontroller') ?>" class="btn btn-default">انصراف</a>
	</form>
    </div>