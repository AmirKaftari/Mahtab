<div class='main'>
        <h2 style="margin-top:0px">Tbl_personal_message <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">idSender <?php echo form_error('idSender') ?></label>
                <input type="text" class="form-control" name="idSender" id="idSender" placeholder="idSender" value="<?php echo $idSender; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">idReciever <?php echo form_error('idReciever') ?></label>
                <input type="text" class="form-control" name="idReciever" id="idReciever" placeholder="idReciever" value="<?php echo $idReciever; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Subject <?php echo form_error('Subject') ?></label>
                <input type="text" class="form-control" name="Subject" id="Subject" placeholder="Subject" value="<?php echo $Subject; ?>" />
            </div>
	    <div class="form-group">
                <label for="Message">Message <?php echo form_error('Message') ?></label>
                <textarea class="form-control" rows="3" name="Message" id="Message" placeholder="Message"><?php echo $Message; ?></textarea>
            </div>
	    <div class="form-group">
                <label for="int">dateSend <?php echo form_error('dateSend') ?></label>
                <input type="text" class="form-control" name="dateSend" id="dateSend" placeholder="dateSend" value="<?php echo $dateSend; ?>" />
            </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('personalmessagecontroller') ?>" class="btn btn-default">انصراف</a>
	</form>
    </div>