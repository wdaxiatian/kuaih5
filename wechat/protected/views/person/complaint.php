<title>我的投诉</title>
</head>
<body>


    <div class="container-fluid" id ='complaint' >
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $k => $v): ?>
                <div class='text'>
                    <div class="title">
                        <div class="bt"><?php echo $v['TYPE'] ?></div>
                        <div  class="zt" style="color: #666666"><?php echo $v['STATUS'] ?></div>
                    </div>

                    <div class="nr">
                        <?php if ($v['STATUS'] == '未受理'): ?>

                            <div class="nrok">
                                接到您的投诉 <br> <span style="font-size:12px; color: #999999"> <?php echo $v['CREATETIME'] ?></span>
                            </div>
                        <?php elseif ($v['STATUS'] == '处理中'): ?>
                            <div class="nrtj">您提交的案件已经交给相关部门处理！</div>
                            <div class="nrok">
                                接到您的投诉 <br> <span style="font-size:12px; color: #999999"> <?php echo $v['CREATETIME'] ?></span>
                            </div>
                        <?php elseif ($v['STATUS'] == '已办结'): ?>
                            <div class="nrtj">已办结</div>
                            <div class="nrtj">您提交的案件已经交给相关部门处理！</div>
                            <div class="nrok">
                                接到您的投诉 <br> <span style="font-size:12px; color: #999999"> <?php echo $v['CREATETIME'] ?></span>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="xq"><a style=" color: #08c;" href="<?php echo U('person/complaintinfo', array('token' => $token, 'id' => $v['ID'])) ?>">查看投诉详情<img style="float: right;" src="<?php echo STATICS ?>/site/img/tsnext.jpg"></a></div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>


    </div>
