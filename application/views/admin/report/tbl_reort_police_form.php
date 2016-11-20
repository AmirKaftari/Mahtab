<div class='main'>
        <h2 style="margin-top:0px">Tbl_reort_police <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">idSender <?php echo form_error('idSender') ?></label>
                <input type="text" class="form-control" name="idSender" id="idSender" placeholder="idSender" value="<?php echo $idSender; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">Offending_id <?php echo form_error('Offending_id') ?></label>
                <input type="text" class="form-control" name="Offending_id" id="Offending_id" placeholder="Offending_id" value="<?php echo $Offending_id; ?>" />
            </div>
	    <div class="form-group">
                <label for="date">Date_Report <?php echo form_error('Date_Report') ?></label>
                <input type="text" class="form-control" name="Date_Report" id="Date_Report" placeholder="Date_Report" value="<?php echo $Date_Report; ?>" />
            </div>
	    <div class="form-group">
                <label for="message">message <?php echo form_error('message') ?></label>
                <textarea class="form-control" rows="3" name="message" id="message" placeholder="message"><?php echo $message; ?></textarea>
            </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('reort_police') ?>" class="btn btn-default">انصراف</a>
	</form>
    </div>