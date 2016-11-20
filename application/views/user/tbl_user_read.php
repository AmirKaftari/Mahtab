<div class='main'>
        <h2 style="margin-top:0px">Tbl_user اطلاعات</h2>
        <table class="table">
	    <tr><td>Username</td><td><?php echo $Username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $Password; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $Email; ?></td></tr>
	    <tr><td>Age</td><td><?php echo $Age; ?></td></tr>
	    <tr><td>Subject_self</td><td><?php echo $Subject_self; ?></td></tr>
	    <tr><td>Avatar</td><td><?php echo $Avatar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('usercontroller') ?>" class="btn btn-default">بازگشت</button></td></tr>
	</table>
    </div>