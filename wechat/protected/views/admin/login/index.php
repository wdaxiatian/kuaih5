<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>西港城微信后台登录</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo STATICS?>/admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo STATICS?>/admin/css/matrix-login.css" />
        <link href="<?php echo STATICS?>/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<script src="<?php echo STATICS?>/admin/js/jquery.min.js"></script>  
        <script src="<?php echo STATICS?>/admin/js/matrix.login.js"></script> 
</head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="" method="post">
				 <div class="control-group normal_text"> <h3>西港城微信后台登录</h3><span id="tip"></span></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="用户名"  name="username"  id="username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"  placeholder="密码" name="password" id="password" />
                        </div>
                    </div>
                </div>
<!--				 <div class="control-group">-->
<!--                    <div class="controls">-->
<!--                        <div class="main_input_box"> -->
<!--							<input type="text"  name="vcod"  id="vcod"  placeholder="验证码"  style="width:80px; margin-bottom:0px;"/>-->
<!--							<img  title="点击刷新" src="-->
							<?php //echo U('common/ValidateCod/index')?>
<!--							" align="absbottom" onclick="this.src='-->
							<?php //echo U('common/ValidateCod/index')?>
<!--								&'+Math.random();"></img>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-actions" style="text-align: center;">
<!--                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码</a></span>-->
                    <span ><a id="login" class="btn btn-success" >登录</a></span>
                </div>
            </form>
<!--           <form id="recoverform" action="" class="form-vertical">
				<p class="normal_text">请输入你的帐号和你的邮箱</p>
					<div class="control-group">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="用户名" name="username"/>
                        </div>
                    </div>             
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; 返回登录</a></span>
                    <span class="pull-right"><a class="btn btn-info" id="send"/>发送邮件</a></span>
                </div>
            </form>-->
        </div>
    </body>

</html>
<script>
	
	$(function(){
		//回车提交
		document.onkeydown = function(e){
			if(!e) e = window.event;//火狐中是 window.event
			if((e.keyCode || e.which) == 13){
				document.getElementById("login").click();
			}
		}
		$("#login").click(function(){
			var username = $("#username").val();
			var password = $("#password").val();
			var vcod = $("#vcod").val(); 
			$.ajax({
				   type: "POST",
				   url: "<?php echo U('admin/login/index')?>",
				   data: "username="+username+"&password="+password+"&vcod="+vcod,
				   dataType:"json",
				   success: function(msg){
					   $("#tip").html(msg.content); 
						if(msg.type ==1){window.location.href=msg.url};
					}
				});
			})
		
			
		})
</script>
