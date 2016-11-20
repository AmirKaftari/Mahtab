<br>
<div class='main'>
<!--        <h2 style="margin-top:0px">Tbl_user_vip List</h2>-->
        <div class="row" style="margin-bottom: 10px">
<!--            <div class="col-md-4">-->
<!--                --><?php //echo anchor(site_url('tbl_user_vip/create'),'ایجاد', 'class="btn btn-primary"'); ?>
<!--            </div>-->
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
<!--            <div class="col-md-4 text-right">-->
<!--                <form action="--><?php //echo site_url('tbl_user_vip/search'); ?><!--" class="form-inline" method="post">-->
<!--                    <input name="keyword" class="form-control" value="--><?php //echo $keyword; ?><!--" />-->
<!--                    --><?php //
//                    if ($keyword <> '')
//                    {
//                        ?>
<!--                        <a href="--><?php //echo site_url('tbl_user_vip'); ?><!--" class="btn btn-default">انصراف</a>-->
<!--                        --><?php
//                    }
//                    ?>
<!--                    <input type="submit" value="جستجو" class="btn btn-primary" />-->
<!--                </form>-->
<!--            </div>-->
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th style="text-align:center">ردیف</th>
                <th style="text-align:center">کاربر</th>
                <th style="text-align:center">تاریخ شروع</th>
                <th style="text-align:center"style="text-align:center">تاریخ پایان</th>
                <th style="text-align:center">اعتبار</th>
                <th style="text-align:center">وضعیت</th>
                <th style="text-align:center">عملیات</th>
            </tr><?php
            foreach ($uservipcontroller_data as $tbl_user_vip)
            {
                $user_info = instance('Usermodel','get_by_id',$tbl_user_vip->IdUser);
                if(count($user_info)) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo ++$start ?></td>
                        <td style="text-align:center">
                            <?php
                            //$user_info = instance('Usermodel', 'get_by_id', $tbl_user_vip->IdUser);
                            echo $user_info->Name, ' ' . $user_info->Lastname;
                            ?>
                        </td>
                        <td style="text-align:center"><?php echo $tbl_user_vip->Start_date ?></td>
                        <td style="text-align:center"><?php echo $tbl_user_vip->End_date ?></td>
                        <td style="text-align:center"><?php echo $tbl_user_vip->length . ' ماه ' ?></td>
                        <td style="text-align:center">
                            <?php
                            if ($tbl_user_vip->Status)
                                echo 'فعال';
                            else
                                echo 'غیرفعال';
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                            echo anchor(site_url('Admin/Dashboard/edit_info/' . $tbl_user_vip->ID), 'مشاهده پروفایل');
                            echo ' | ';
                            echo anchor(site_url('Uservipcontroller/delete/' . $tbl_user_vip->ID), 'حذف', 'onclick="javasciprt: return confirm(\'آیا مطمئن هستید؟\')"');
                            ?>
                        </td>
                    </tr>
                    <?php
                }
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