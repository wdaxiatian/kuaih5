<title>活动报名</title>
</head>
<body>

    <div class="container-fluid" id ='apply' >
        <div class="back">


            <div class="fb" style="font-size: 16px; height: 30px;"><?php echo $actname ?></div>
            <div><input type="text" style="color:#888" name='xm'  value="请填写姓名"  onfocus="if (value == '请填写姓名') {
                        value = ''
                    }" onblur="if (value == '') {
                                value = '请填写姓名'
                            }" ></div>
            <div><textarea  style="color:#888"  name='js'  onfocus="if (value == '介绍') {
                        value = ''
                    }" onblur="if (value == '') {
                                value = '介绍'
                            }">介绍</textarea></div>
                                        <div class="appimg" style="height: 100px;">



                <input type="file" id="file" class="doc-file"  style="display: none;" value=""/>
                <div class="doc-head-btn" style="padding-top: 10px;" ><img src="<?php echo STATICS ?>/site/img/bmtj.jpg"> </div>
            </div>
            <div><input type="text" style="color:#888" name='dh'  value="请填写联系电话" onfocus="if (value == '请填写联系电话') {
                        value = ''
                    }" onblur="if (value == '') {
                                value = '请填写联系电话'
                            }"  maxlength="11" onkeyup="this.value = this.value.replace(/\D/g, '')">

            </div>


            <div class="xuanfu">
                <div>
                    <div class="anstijiao">立即上传</div>
                </div>

            </div>

        </div>

        <script>

            var serverId = '';
            //上传图片
            $('.doc-head-btn').on('click', function () {
                wx.chooseImage({
                    count: 1, // 默认9
                    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                    success: function (res) {
                        localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片

                        uploadImage(localIds);
                        var nr = '<div><img class="doc-img" style="padding-top:5px;" src="' + localIds + '"></div>';
                        $('.appimg').prepend(nr);
                        if ($('.appimg div').length >= 2) {
                            $('.appimg div').eq(-1).remove();
                        }
                    }
                });
            });
            function uploadImage(e) {
                wx.uploadImage({
                    localId: e.toString(), // 需要上传的图片的本地ID，由chooseImage接口获得
                    isShowProgressTips: 1, // 默认为1，显示进度提示
                    success: function (res) {
                        serverId = res.serverId; // 返回图片的服务器端ID

                    }, fail: function (res) {
                        alert(JSON.stringify(res));
                    }
                });
            }

            //提交
            $('.anstijiao').on('click', function () {
                var token = '<?php echo $token ?>';
                var id = '<?php echo $id ?>';
                var name = $('input[name = xm]').val();
                var js = $('textarea[name = js]').val();
                var dh = $('input[name = dh]').val();
                var img = serverId;

                $.ajax({
                    type: "POST",
                    url: "<?php echo U('activ/addact') ?>",
                    data: "token=" + token + "&id=" + id + '&name=' + name + '&js=' + js + '&dh=' + dh + '&img=' + img,
                    dataType: "json",
                    success: function (msg) {
                        if (msg.code == 0) {
                            alert('报名成功');
                            window.location.reload();
                        } else
                            alert('报名失败');
                    }
                });


            })
        </script>
