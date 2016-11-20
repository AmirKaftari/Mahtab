<div id="right">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img width="100" height="80" onerror="this.src='<?php echo base_url('assets/img/unknown.png'); ?>'" class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url('uploads'); echo "/" ; echo $this->session->userdata('pic_operator') ?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"><?php echo $this->session->userdata('fullname_operator'); ?></h5>
                    <ul class="list-unstyled user-info">

                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> آنلاین

                        </li>

                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">


                <li class="panel">
                    <a href="<?php echo base_url('admin/dashboard'); ?>" >
                        <i class="icon-table"></i> داشبورد
                    </a>
                </li>



                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> مدیریت سطوح دسترسی

                        <span class="pull-left">
                          <i class="icon-angle-right"></i>
                        </span>

                    </a>
                    <ul class="collapse" id="component-nav">
                        <li class=""><a href="<?php echo base_url('Roles/create'); ?>"><i class="icon-angle-left"></i> تعریف نقش </a></li>
                        <li class=""><a href="<?php echo base_url('Permissions'); ?>"><i class="icon-angle-left"></i> سطح دسترسی به نقش </a></li>

                    </ul>
                </li>
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil"></i> مدیریت دوره و سطح

                        <span class="pull-left">
                            <i class="icon-angle-right"></i>
                        </span>

                    </a>
                    <ul class="collapse" id="form-nav">
                        <li class=""><a href="<?php echo base_url('Level'); ?>"><i class="icon-angle-left"></i> سطح ها </a></li>
                        <li class=""><a href="<?php echo base_url('Course'); ?>"><i class="icon-angle-left"></i> دوره ها </a></li>
                    </ul>
                </li>

                <li class="panel">
                    <a href="<?php echo base_url('Login'); ?>" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-table"></i> مدیریت اپراتورها
                    </a>

                </li>
                <li class="panel">
                    <a href="<?php echo base_url('Teachers') ?>" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                        <i class="icon-bar-chart"></i> مدیریت اساتید
                    </a>
                </li>

                <li class="panel">
                    <a href="<?php echo base_url('Students'); ?>" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> مدیریت زبان آموزها

                    </a>
                </li>
                <li class="panel">
                    <a href="<?php echo base_url('Klass'); ?>" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
                        <i class=" icon-folder-open-alt"></i> مدیریت کلاس ها

                    </a>

                </li>

            </ul>

        </div>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:auto">
                <div class="row">
                    <div class="col-lg-12">

						<div > <?php echo $contents ?> </div>
                    </div>
                </div>


            </div>
        </div>
       <!--END PAGE CONTENT -->
          <!-- RIGHT STRIP  SECTION -->

         <!-- END RIGHT STRIP  SECTION -->

    </div>
