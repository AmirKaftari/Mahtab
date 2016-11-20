<div class='main'>
        <h2 style="margin-top:0px">Tbl_contact <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">fullname <?php echo form_error('fullname') ?></label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="fullname" value="<?php echo $fullname; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">phone <?php echo form_error('phone') ?></label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="<?php echo $phone; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">email <?php echo form_error('email') ?></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">message <?php echo form_error('message') ?></label>
                <input type="text" class="form-control" name="message" id="message" placeholder="message" value="<?php echo $message; ?>" />
            </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('contactcontroller') ?>" class="btn btn-default">انصراف</a>
	</form>
    </div>