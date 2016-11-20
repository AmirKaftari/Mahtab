<div class='main'>
        <h2 style="margin-top:0px">Tbl_contact اطلاعات</h2>
        <table class="table">
	    <tr><td>fullname</td><td><?php echo $fullname; ?></td></tr>
	    <tr><td>phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>message</td><td><?php echo $message; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('contactcontroller') ?>" class="btn btn-default">بازگشت</button></td></tr>
	</table>
    </div>