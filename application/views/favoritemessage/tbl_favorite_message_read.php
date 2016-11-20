<div class='main'>
        <h2 style="margin-top:0px">Tbl_favorite_message اطلاعات</h2>
        <table class="table">
	    <tr><td>idSender</td><td><?php echo $idSender; ?></td></tr>
	    <tr><td>idReciever</td><td><?php echo $idReciever; ?></td></tr>
	    <tr><td>Message</td><td><?php echo $Message; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('favoritemessagecontroller') ?>" class="btn btn-default">بازگشت</button></td></tr>
	</table>
    </div>