<div class="row"  >
    <div class="panel panel-primary col-xs-6" >
        <div class="panel-heading">
            <h3 class="panel-title">اطلاعات کاربری...</h3>
        </div>
        <div class="panel-body">
            <table style="text-align:center">
                <tbody>

                <tr style="text-align:center">
                    <td style="text-align:center">وضعيت موبايل : </td>
                    <td style="text-align:center">
                        <?php echo 'تاییده نشده'.' - '.'<a style="color:red;" href="#">برای تایید کلیک کنید</a>' ?>
                    </td>
                </tr>

                <tr style="text-align:center">
                    <td style="text-align:center">وضعيت کاربری : </td>
                    <td style="text-align:right">
                        <?php echo 'تایید شده'.'' ?>
                    </td>
                </tr>

                <tr style="text-align:center">
                    <td style="text-align:center">تاريخ ثبت نام : </td>
                    <td style="text-align:right">
                        <?php echo $user_info['Birthday']  ?>
                    </td>
                </tr>

                <tr style="text-align:center">
                    <td style="text-align:center">نوع اشتراک : </td>
                    <td style="text-align:right">
                        <?php $status = instance('Uservipmodel','get_by_idUser',$user_info['IdUser']);
                              if(count($status) > 0 && $status->Status)
                                    echo 'ویژه';
                              else
                                    echo 'عادی'.' - '.'<a style="color:red;" href="'.base_url('Users/Dashboard/upgrade').'">خرید عضویت ویژه</a>';
                        ?>
                    </td>
                </tr>

                <tr style="text-align:center">
                    <td style="text-align:center">موجودی پيامکي : </td>
                    <td style="text-align:right">
                        <?php echo  '0 پیامک'  ?>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="panel panel-primary col-xs-6" style="float: left">
        <div class="panel-heading">
            <h3 class="panel-title">نمایش تصادفی پروفایل های ویژه...</h3>
        </div>
        <div class="panel-body" align="center">
            <div class="row">
                </br>
                <?php
                foreach($new_user_info as $user)
                {
                    ?>
                    <div class="col-xs-6">
                        <a target="_blank" href="<?php echo base_url('Users/Dashboard/view_profile/'.$user['IdUser']) ?>"><img  src="
						<?php if(!is_null($user['Pic']) && $user['Pic'] != '')
                            {
                                echo base_url('uploads/users/' . $user['Pic']);
                            }
                        elseif($user['Jender'] == 0)
                            {
                                echo base_url('assets/images/female.png');
                            }
                        elseif($user['Jender'] == 1)
                            {
                                echo base_url('assets/images/men.png');
                            }
                        ?>" class="img-rounded" width="150" height="150" alt=""/></a>

                        <table style="text-align:center">
                            <tbody>
                            <tr style="text-align:center">
                                <td style="text-align:center ;font-size: small">
                                    <?php
                                    echo $user['Name'];
                                    ?>
                                </td>
                            </tr>
                            <tr style="text-align:center">
                                <td style="text-align:center;font-size: small">
                                    <?php
                                    $birthday = jalali_to_gregorian($user['Birthday']) ;
                                    $diff = (date('Y') - date('Y',strtotime($birthday)));
                                    echo $diff.' ساله ';
                                    ?>
                                </td>
                            </tr>
                            <tr style="text-align:center">
                                <td style="text-align:center;font-size: small">
                                    <?php $State = instance('provincemodel','get_by_id',$user['State']); echo $State->name; ?>
                                </td>
                            </tr>
                            <tr style="text-align:center">
                                <td style="text-align:center">فعالیت : </td>
                                <td style="text-align:center;font-size: small">
                                    <?php
                                    $state_user = instance('useronlinemodel','get_by_id_user',$user['IdUser']);
                                    if(isset($state_user->time) && $state_user->time > date("Y-m-d H:i:s",strtotime("-30 minutes")))
                                    {
                                        echo 'آنلاین';
                                    }
                                    else
                                    {
                                        echo 'آفلاین';
                                    }
                                    ?>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <div class="panel panel-primary col-xs-6">
        <div class="panel-heading">
            <h3 class="panel-title">تابلوء اعلانات مدیر سایت...</h3>
        </div>
        <div class="panel-body" align="center">

        </div>
    </div>

    <div class="panel panel-primary col-xs-6">
        <div class="panel-heading">
            <h3 class="panel-title">آخرین بازدیدکننده های شما...</h3>
        </div>
        <div class="panel-body" align="right">
            <table style="text-align:center">
                <tbody>
                <?php
                    foreach ($last_visitor as $visitor)
                     {
                         $visitor_info = instance('Userinfomodel','get_user_profile',$visitor['IdVisitor']);
                         $state_info = instance('Provincemodel','get_by_id',$visitor_info['State']);
                         if(count($visitor_info) > 0)
                         {
                ?>
                    <tr style="text-align:center">
                        <td style="text-align:center">
                           <a TARGET="_blank" href="<?php echo base_url('Users/Dashboard/view_profile/'.$visitor_info['IdUser']) ?>"><p> <?php echo $visitor_info['Name'].' از '.$state_info->name.' در تاریخ '.$visitor['Date_View']; ?> </p></a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel panel-primary col-xs-6">
        <div class="panel-heading">
            <h3 class="panel-title">شما در علاقه مندیهای دیگران...</h3>
        </div>
        <div class="panel-body" align="right">
            <table style="text-align:center">
                <tbody>
                <?php
                foreach ($favorite_list as $favorite)
                {
                    $favorite_info = instance('Userinfomodel','get_user_profile',$favorite['person']);
                    $state_info = instance('Provincemodel','get_by_id',$favorite_info['State']);
                    ?>
                    <tr style="text-align:center">
                        <td style="text-align:center">
                            <a TARGET="_blank" href="<?php echo base_url('Users/Dashboard/view_profile/'.$favorite_info['IdUser']) ?>"><p> <?php echo $favorite_info['Name'].' از '.$state_info->name; ?> </p></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<div class="panel panel-primary col-sm-6">
    <div class="panel-heading">
        <h3 class="panel-title">پیام مهتاب...</h3>
    </div>
    <div class="panel-body" align="right">
        <p>
            کاربر گرامی! کسانی که در این سایت عضو شده اند بدنبال تشکیل خانواده از طریق ازدواج دایم هستند، لذا به حقوق آنها احترام گذاشته و در ارسال پیامها دقت فرمایید.
        </p>
        <p>
            »اطلاعات پروفایل شما باید کامل و دقیق باشد و از کلی گویی بپرهیزید، در غیر اینصورت مدیریت سایت پروفایل شما را تایید نخواهد کرد.
        </p>
        <p>
            »چنانچه پروفایل شما در حالت عدم تایید قرار بگیرد، شما میتوانید وارد سایت شوید ولی پروفایل شما به هیچ کاربری نمایش داده نخواهد شد.
        </p>
        <p>
            »چنانچه پروفایل شما مورد تایید قرار نگیرد، علت را می توانید در بخش پیام مدیریت همین صفحه ملاحظه بفرمایید.
        </p>
        <p>
            وب سایت مهتاب برای شما آرزوی موفقیت و کامیابی را دارد.
        </p>
    </div>
</div>