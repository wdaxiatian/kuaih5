<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>微信管理后台</title>

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="<?php echo STATICS ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo STATICS ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="<?php echo STATICS ?>css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="<?php echo STATICS ?>css/style-responsive.css" rel="stylesheet">


        <!-- start: Favicon -->
        <link rel="shortcut icon" href="<?php echo STATICS ?>img/favicon.ico">
        <!-- end: Favicon -->




        <!-- start: JavaScript-->

        <script src="<?php echo STATICS ?>js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo STATICS ?>js/jquery-migrate-1.0.0.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.ui.touch-punch.js"></script>

        <script src="<?php echo STATICS ?>js/modernizr.js"></script>

        <script src="<?php echo STATICS ?>js/bootstrap.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.cookie.js"></script>

        <script src='<?php echo STATICS ?>js/fullcalendar.min.js'></script>

        <script src='<?php echo STATICS ?>js/jquery.dataTables.min.js'></script>

        <script src="<?php echo STATICS ?>js/excanvas.js"></script>
        <script src="<?php echo STATICS ?>js/jquery.flot.js"></script>
        <script src="<?php echo STATICS ?>js/jquery.flot.pie.js"></script>
        <script src="<?php echo STATICS ?>js/jquery.flot.stack.js"></script>
        <script src="<?php echo STATICS ?>js/jquery.flot.resize.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.chosen.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.uniform.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.cleditor.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.noty.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.elfinder.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.raty.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.iphone.toggle.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.uploadify-3.1.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.gritter.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.imagesloaded.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.masonry.min.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.knob.modified.js"></script>

        <script src="<?php echo STATICS ?>js/jquery.sparkline.min.js"></script>

        <script src="<?php echo STATICS ?>js/counter.js"></script>

        <script src="<?php echo STATICS ?>js/retina.js"></script>

        <script src="<?php echo STATICS ?>js/custom.js"></script>
        <!-- end: JavaScript-->
        <link  href="<?php echo STATICS ?>css/enjoy.css" rel="stylesheet">
    </head>

    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><span>欢迎</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                            <li class="dropdown hidden-phone">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-bell"></i>
                                    <span class="badge red">
                                        2</span>
                                </a>
                                <ul class="dropdown-menu notifications">
                                    <li class="dropdown-menu-title">
                                        <span>You have 11 notifications</span>
                                        <a href="#refresh"><i class="icon-repeat"></i></a>
                                    </li>	


                                    <li>
                                        <a href="#">
                                            <span class="icon blue"><i class="icon-user"></i></span>
                                            <span class="message">New user registration</span>
                                            <span class="time">yesterday</span> 
                                        </a>
                                    </li>
                                    <li class="dropdown-menu-sub-footer">
                                        <a>View all notifications</a>
                                    </li>	
                                </ul>
                            </li>


                            <!-- start: User Dropdown -->
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo Yii::app()->session['admin']['username'] ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>设置</span>
                                    </li>
                                    <li><a href="#"><i class="halflings-icon user"></i> 个人设置</a></li>
                                    <li><a href="#" onclick ="logout()"><i class="halflings-icon off"></i> 退出登录</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>


        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="<?php echo U('admin/index/index') ?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> 主页</span></a></li>	
                            <li><a href="<?php echo U('admin/admin/list') ?>"><i class="icon-group"></i><span class="hidden-tablet"> 管理员设置</span></a></li>
                            <li><a href="<?php echo U('admin/wsetting/list') ?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> 微信公众号设置</span></a></li>
                            <li><a href="<?php echo U('admin/userinfo/index') ?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> 获取授权地址</span></a></li>
                            <!--                            <li>
                                                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>
                                                            <ul>
                                                                <li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
                                                                <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
                                                                <li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
                                                            </ul>	
                                                        </li>-->

                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <!-- start: Content -->
                <div id="content" class="span10">

                    <?php echo $content; ?>


                </div><!--/.fluid-container-->

                <!-- end: Content -->
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <footer>

        </footer>


    </body>
</html>

<script type="text/javascript">
    function logout() {
        if (confirm('您确定要退出吗？')) {
            window.location.href = '<?php echo U('admin/login/loginout') ?>';
        } else {
            return false;
        }
    }

</script>