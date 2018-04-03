<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1, maximum=1,minimum=1, user-scalable=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo STATICS ?>/site/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo STATICS ?>/site/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo STATICS ?>/site/css/fullcalendar.css" />

        <link href="<?php echo STATICS ?>/site/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo STATICS ?>/site/css/jquery.gritter.css" />
        <script src="<?php echo STATICS ?>/site/js/excanvas.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.ui.custom.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/bootstrap.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.flot.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.flot.resize.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.peity.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/fullcalendar.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/matrix.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/matrix.dashboard.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.gritter.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/matrix.interface.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/matrix.chat.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.validate.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/matrix.form_validation.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.wizard.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.uniform.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/select2.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/matrix.popover.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/jquery.dataTables.min.js"></script> 
        <script src="<?php echo STATICS ?>/site/js/matrix.tables.js"></script> 
        <script src="<?php echo STATICS ?>/ueditor/ueditor.config.js"></script> 
        <script src="<?php echo STATICS ?>/ueditor/ueditor.all.min.js"></script> 
        <script src="<?php echo STATICS ?>/ueditor/lang/zh-cn/zh-cn.js"></script> 
        <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script> 
        <link rel="stylesheet" href="<?php echo STATICS ?>/site/css/home.css" />
        <!--end-Footer-part-->

        <script type="text/javascript">

            var latitude = '';
            var longitude = '';
            function goPage(newURL) {

                if (newURL != "") {

                    if (newURL == "-") {
                        resetMenu();
                    } else {
                        document.location.href = newURL;
                    }
                }
            }


            function resetMenu() {
                document.gomenu.selector.selectedIndex = 2;
            }

            wx.config({
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                appId: '<?php echo Yii::app()->params['appId'] ?>', // 必填，企业号的唯一标识，此处填写企业号corpid
                timestamp: <?php echo Yii::app()->params['timestamp'] ?>, // 必填，生成签名的时间戳
                nonceStr: '<?php echo Yii::app()->params['nonceStr'] ?>', // 必填，生成签名的随机串
                signature: '<?php echo Yii::app()->params['signature'] ?>', // 必填，签名，见附录1
                jsApiList: [
                    // 所有要调用的 API 都要加到这个列表中
                    'checkJsApi',
                    'openLocation',
                    'getLocation',
                    'onMenuShareTimeline',
                    'onMenuShareAppMessage',
                    'chooseImage',
                    'previewImage',
                    'uploadImage',
                    'downloadImage',
                    'getLocalImgData'
                ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
            });

            wx.ready(function () {



                wx.checkJsApi({
                    jsApiList: [
                        'getLocation',
                        'onMenuShareTimeline',
                        'onMenuShareAppMessage'
                    ],
                    success: function (res) {
                        //  alert(JSON.stringify(res));
                    }
                });


                wx.onMenuShareAppMessage({
                    title: '九江城西港首页',
                    desc: '九江城西港首页',
                    link: 'http://ltwxtest.mynatapp.cc/cxg/index-test.php?r=index/index',
                    imgUrl: '<?php echo STATICS ?>/site/img/fximg.jpg',
                    trigger: function (res) {
                        // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                        // alert('用户点击发送给朋友');
                    },
                    success: function (res) {
                        // alert('已分享');
                    },
                    cancel: function (res) {
                        // alert('已取消');
                    },
                    fail: function (res) {
                        // alert(JSON.stringify(res));
                    }
                });

                wx.onMenuShareTimeline({
                    title: '九江城西港首页',
                    link: 'http://ltwxtest.mynatapp.cc/cxg/index-test.php?r=index/index',
                    imgUrl: '<?php echo STATICS ?>/site/img/fximg.jpg',
                    trigger: function (res) {
                        // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                        // alert('用户点击分享到朋友圈');
                    },
                    success: function (res) {
                        // alert('已分享');
                    },
                    cancel: function (res) {
                        // alert('已取消');
                    },
                    fail: function (res) {
                        // alert(JSON.stringify(res));
                    }
                });
                wx.getLocation({
                    type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
                    success: function (res) {
                        latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                        longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                        // var speed = res.speed; // 速度，以米/每秒计
                        //var accuracy = res.accuracy; // 位置精度
                        //   alert(res.latitude);
                    }
                });


            });
        </script>

        <?php echo $content; ?>






    </body>
</html>
