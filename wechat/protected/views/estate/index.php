<title>物业问答</title>
</head>
<body>

    <div class="container-fluid" id ='ansqus' >
        <div class="ansbj">
            <div class="back">
                <img src="<?php echo STATICS ?>/site/img/wy.jpg"></img>
            </div>
            <div class='text'>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $k => $v): ?>
                        <div class='anstab'>
                            <div style="padding-bottom: 5px; color: #666;"><img class="imgyj" src="<?php echo $v['HEADIMGURL'] ?>" style="width: 30px;height: 30px;">&nbsp;&nbsp;&nbsp;
                                <?php echo $v['NICKNAME'] ?>
                                <div class="anstime"><?php echo $v['CREATEDATE'] ?></div>
                            </div>
                            <div class="" style="font-size: 16px;"><?php echo $v['CONTENT'] ?></div>
                            <?php if ($v['REPLYCONTENT']): ?>
                                <div class="cl closed"></div>
                                <div class="ans" style="display: none;">回答：<?php echo $v['REPLYCONTENT'] ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>      
                <?php endif; ?>
            </div>

            <div class="xuanfu">
                <div>
                    <input name="t" type="text" style="color:#888;border:none; height: 40px; width: 250px; margin-bottom: 0px;" value="请输入您的问题" onfocus="if (value == '请输入您的问题') {
                                value = ''
                            }" onblur="if (value == '') {
                                        value = '请输入您的问题'
                                    }" /></div><div class="anstijiao">提交</div>
            </div>
        </div>
    </div>
    <script>
        $('.cl').on('click', function () {
            if ($(this).hasClass('open')) {

                $(this).next().hide();
                $(this).removeClass('open');
                $(this).addClass('closed');
            } else {

                $(this).removeClass('closed');
                $(this).addClass('open');
                $(this).next().show();
            }
        })

        $('.anstijiao').on('click', function () {
            var nr = $('input[ name="t"]').val();
            var token = '<?php echo!empty($_REQUEST['token']) ? $_REQUEST['token'] : ''; ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo U('ansqus/add') ?>",
                data: "token=" + token + "&nr=" + nr + "&status=" + 1,
                dataType: "json",
                success: function (msg) {
                    if (msg.code == 0) {
                        alert('提交成功');
                        $('input[ name="t"]').val('');
                    } else {
                        alert('提交失败');
                    }
                }
            });
        })
    </script>