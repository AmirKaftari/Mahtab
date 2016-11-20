<br>
<div class='main'>
        <div class="row" style="margin-bottom: 10px">
<!--            <div class="col-md-4">-->
<!--                --><?php //echo anchor(site_url('identityusercontroller_data/create'),'ایجاد', 'class="btn btn-primary"'); ?>
<!--            </div>-->
            <div class="col-md-4 text-center">
<!--                <div style="margin-top: 8px" id="message">-->
<!--                    --><?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
<!--                </div>-->
            </div>
<!--            <div class="col-md-4 text-right">-->
<!--                <form action="--><?php //echo site_url('identityusercontroller_data/search'); ?><!--" class="form-inline" method="post">-->
<!--                    <input name="keyword" class="form-control" value="--><?php //echo $keyword; ?><!--" />-->
<!--                    --><?php //
//                    if ($keyword <> '')
//                    {
//                        ?>
<!--                        <a href="--><?php //echo site_url('identityusercontroller'); ?><!--" class="btn btn-default">انصراف</a>-->
<!--                        --><?php
//                    }
//                    ?>
<!--                    <input type="submit" value="جستجو" class="btn btn-primary" />-->
<!--                </form>-->
<!--            </div>-->
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php
                    if($this->session->userdata('message') != null)
                    {
                        echo '<div class="alert alert-success" role="alert">';
                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo	$this->session->userdata('message') <> '' ? $this->session->userdata('message') : '';
                        echo '</div>';
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </div>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>ردیف</th>
		<th style="text-align:center">کاربر</th>
		<th style="text-align:center">عملیات</th>
            </tr><?php
            foreach ($identityusercontroller_data as $identityusercontroller)
            {
                ?>
                <tr>
			<td style="text-align:center"><?php echo ++$start ?></td>
			<td style="text-align:center">
                <?php $user_info =  instance('usermodel','get_by_id',$identityusercontroller->IdUser);
                      echo $user_info->Name.' '.$user_info->Lastname;
                ?>
            </td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('uploads/identity/'.$identityusercontroller->Pic),'نمایش تصویر');
				echo ' | '; 
				echo anchor(site_url('Admin/Dashboard/edit_info/'.$identityusercontroller->ID),'مشاهده پروفایل');
                echo ' | ';
				echo anchor(site_url('identityusercontroller/accept/'.$identityusercontroller->ID),'تایید','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"');
                echo ' | ';
                echo anchor(site_url('identityusercontroller/reject/'.$identityusercontroller->ID),'رد تایید','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"');
                echo ' | ';
                echo anchor(site_url('identityusercontroller/delete/'.$identityusercontroller->ID),'حذف','onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"');

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