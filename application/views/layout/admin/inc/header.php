
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <title>VinaTAB EDU - Admin template</title>
            <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL_ADMIN ?>/css/styles.css" media="screen" />
            <script type="text/javascript" src="<?php echo TEMPLATE_URL_ADMIN?>/js/jquery/jquery-2.2.1.min.js"></script>
            <script type="text/javascript" src="<?php echo TEMPLATE_URL_ADMIN?>/js/jquery/jquery.validate.min.js"></script>
            <script type="text/javascript" src="<?php echo TEMPLATE_URL_ADMIN?>/js/ckeditor/ckeditor.js"></script>
            
        </head>

        <body>
            <!-- Header -->
            <div id="header">
                <!-- Header. Status part -->
                <div id="header-status">
                    <div class="container_12">
                        <div class="grid_4">
                          <ul class="user-pro">
                          <?php
                              $fullname = 'Khách';
                              if($this->session->userdata('User_Info')){
                              	$fullname = $this->session->userdata('User_Info')['fullname'];
                            ?>
                           
                                <li><a href="<?php echo base_url()?>login/logout">Logout</a></li>
                                <li>Chào, <a href=""><?php echo $fullname ?></a></li>
                                <?php }else { ?>
                           
                                 <li><a href="<?php echo base_url()?>login/dologin">Login</a></li>
                                <li>Chào, <?php echo $fullname ?></li>
                           		<?php }?>
                            </ul>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <!-- End #header-status -->

                <!-- Header. Main part -->
                <div id="header-main">
                    <div class="container_12">
                        <div class="grid_12">
                            <div id="logo">
                                <ul id="nav">
                                    <li id="current"><a href="index.php">Quản trị</a></li>
                                    <li><a href="profile.php?id_user=">Tài khoản</a></li>
                                </ul>
                            </div>
                            <!-- End. #Logo -->
                        </div>
                        <!-- End. .grid_12-->
                        <div style="clear: both;"></div>
                    </div>
                    <!-- End. .container_12 -->
                </div>
                <!-- End #header-main -->
                <div style="clear: both;"></div>
                <!-- Sub navigation -->
                <div id="subnav">
                    <div class="container_12">
                        <div class="grid_12">
                            <ul>
                                <li><a href="<?php echo base_url()?>admin/admin_news/index">Tin tức</a></li>
                                <li><a href="<?php echo base_url()?>admin/admin_cat/index">Danh mục</a></li>
                                <li><a href="<?php echo base_url()?>admin/admin_user/index">User</a></li>
                            </ul>

                        </div>
                        <!-- End. .grid_12-->
                    </div>
                    <!-- End. .container_12 -->
                    <div style="clear: both;"></div>
                </div>
                <!-- End #subnav -->
            </div>
            <!-- End #header -->

            <div class="container_12">