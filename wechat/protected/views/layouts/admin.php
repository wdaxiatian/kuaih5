<!DOCTYPE html>
<html lang="en">
<head>
<title>城西港区微信公众号后台管理</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/matrix-media.css" />
<link href="<?php echo STATICS?>/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/jquery.gritter.css" />
<script src="<?php echo STATICS?>/admin/js/excanvas.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.ui.custom.js"></script> 
<script src="<?php echo STATICS?>/admin/js/bootstrap.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.flot.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.flot.resize.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.peity.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/fullcalendar.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/matrix.js"></script> 
<script src="<?php echo STATICS?>/admin/js/matrix.dashboard.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.gritter.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/matrix.interface.js"></script> 
<script src="<?php echo STATICS?>/admin/js/matrix.chat.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.validate.js"></script> 
<script src="<?php echo STATICS?>/admin/js/matrix.form_validation.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.wizard.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.uniform.js"></script> 
<script src="<?php echo STATICS?>/admin/js/select2.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/matrix.popover.js"></script> 
<script src="<?php echo STATICS?>/admin/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo STATICS?>/admin/js/matrix.tables.js"></script> 
<script src="<?php echo STATICS?>/ueditor/ueditor.config.js"></script> 
<script src="<?php echo STATICS?>/ueditor/ueditor.all.min.js"></script> 
<script src="<?php echo STATICS?>/ueditor/lang/zh-cn/zh-cn.js"></script> 

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="">城西港区微信公众号后台管理</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎你，<?php echo Yii::app()->session['admin']['name']?></span></a>
    </li>

    <li class=""><a title="" href="javascript:;" onclick ="logout()"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
  <ul>
    <li <?php if(Yii::app()->controller->id =='site'):?> class="active" <?php endif;?>><a href="<?php echo U('site/index')?>"><i class="icon icon-home"></i> <span>我的主页</span></a></li>
    <li <?php if(Yii::app()->controller->id =='rand'):?> class="active" <?php endif;?>><a href="<?php echo U('rand/list')?>"><i class="icon icon-home"></i> <span>订单列表</span></a></li>

  </ul>
</div>
<!--sidebar-menu-->


	<?php echo $content;?>





<!--end-Footer-part-->

<script type="text/javascript">
	function logout(){
			if(confirm('您确定要退出吗？')){
				window.location.href = '<?php echo U('admin/login/loginout')?>';
			}else{
				return false;
			}
	}

  function goPage (newURL) {

      if (newURL != "") {

          if (newURL == "-" ) {
              resetMenu();            
          } 
       
          else {  
            document.location.href = newURL;
          }
      }
  }


function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
