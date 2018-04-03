<title>我要投诉</title>
</head>
<body>

    <div class="container-fluid comts" id ='apply' >
        <div class="back">




            <div><textarea name="js" style="color:#888;height: 130px;"   onfocus="if (value == '输入您的投诉或建议内容') {
                        value = ''
                    }" onblur="if (value == '') {
                                value = '输入您的投诉或建议内容'
                            }">输入您的投诉或建议内容</textarea></div>


            <div class="appimg" style="height: 130px;">



                <input type="file" id="file" class="doc-file"  style="display: none;" value=""/>
                <div class="doc-head-btn" style="height: 130px; padding-top: 10px;" ><img src="<?php echo STATICS ?>/site/img/bmtj.jpg"> 添加附件信息</div>
            </div>


            <div><input type="text" style="color:#888"  name="xm" value="请填写姓名"  onfocus="if (value == '请填写姓名') {
                        value = ''
                    }" onblur="if (value == '') {
                                value = '请填写姓名'
                            }" ></div>                        

            <div><input type="text" style="color:#888" name="dh"  maxlength="11" onkeyup="this.value = this.value.replace(/\D/g, '')"  value="请填写联系电话" onfocus="if (value == '请填写联系电话') {
                        value = ''
                    }" onblur="if (value == '') {
                                value = '请填写联系电话'
                            }"  >
                <div class="lx">
<!--                <a>请选择问题类型<img style="float: right;" src="<?php echo STATICS ?>/site/img/tsnext.jpg"></a>-->
                    <select id="select" style="width: 350px; padding-top: 5px; padding-left:5px;" >
                        <option value="0" selected="selected">请选择问题类型</option>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data as $k => $v): ?>
                                <option value="<?php echo $v['DICTID'] ?>" ><?php echo $v['DICTNAME'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>                    
            </div>
            <div class="xuanfu">
                <div>
                    <div class="anstijiao">提交</div>
                </div>

            </div>

        </div>

        <script>




            var serverId = new Array();
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
                        if ($('.appimg div').length >= 4) {
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
                        serverId.push(res.serverId); // 返回图片的服务器端ID

                    }, fail: function (res) {
                        alert(JSON.stringify(res));
                    }
                });
            }

            //提交
            $('.anstijiao').on('click', function () {
                var token = '<?php echo $token ?>';
                var name = $('input[name = xm]').val();
                var js = $('textarea[name = js]').val();
                var dh = $('input[name = dh]').val();
                var type = $('#select option:selected').val();
                var img = serverId;

                $.ajax({
                    type: "POST",
                    url: "<?php echo U('complaint/addcom') ?>",
                    data: "token=" + token + "&type=" + type + '&name=' + name + '&js=' + js + '&dh=' + dh + '&img=' + img + '&latitude=' + latitude + '&longitude=' + longitude,
                    dataType: "json",
                    success: function (msg) {
                        if (msg.code == 0) {
                            alert('提交成功');
                            window.location.reload();
                        } else
                            alert('提交失败');
                    }
                });


            })


        </script>