
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="#"><i class="halflings-icon home"></i></a>
                    
                </div>
                <h2>微信后台登录</h2>
                <form class="form-horizontal" action="#" method="post">
                    <fieldset>

                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="username" id="username" type="text" placeholder="用户名"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="密码"/>
                        </div>
                        <div class="clearfix"></div>

                        <label class="remember" for="remember"><input type="checkbox" id="remember" />记住我</label>

                        <div class="button-login">	
                            <button type="button" id="login" class="btn btn-primary">登录</button>
                        </div>
                        <div class="clearfix"></div>
                </form>
                <hr>

            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->

</div><!--/fluid-row-->

<script>

    $(function () {
        //回车提交
        document.onkeydown = function (e) {
            if (!e)
                e = window.event;//火狐中是 window.event
            if ((e.keyCode || e.which) == 13) {
                document.getElementById("login").click();
            }
        }
        $("#login").click(function () {
            var username = $("#username").val();
            var password = $("#password").val();
            var remember = $("input[type='checkbox']").is(':checked');
            $.ajax({
                type: "POST",
                url: "<?php echo U('admin/login/index') ?>",
                data: "username=" + username + "&password=" + password + "&remember=" + remember,
                dataType: "json",
                success: function (msg) {
                    $("#tip").html(msg.content);
                    if (msg.type == 1) {
                        window.location.href = msg.url
                    }
                    ;
                }
            });
        })

    })
</script>