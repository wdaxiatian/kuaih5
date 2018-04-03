<title>参加活动</title>
</head>
<body>
    <div class="container-fluid" id ='act' >
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $k => $v): ?>
                <div class='text'>
                    <div class="mc fb">
                        <?php echo $v['ActionNAME'] ?>
                    </div>
                    <div class="zt actall">
                        <span style="color: #9a9a9a">活动状态</span>&nbsp;&nbsp; <?php echo $v['Status'] ?>
                    </div>
                    <div class="bh actall">
                        <span style="color: #9a9a9a">编号</span>&nbsp;&nbsp;<?php echo $v['NUMBERING'] ?>
                    </div>
                    <div class="actall" style="width:300px;">
                        <span style="color: #9a9a9a">姓名</span>&nbsp;&nbsp; <?php echo $v['JoinerNAME'] ?>
                    </div>
                    <div class="actall" >
                        <span style="color: #9a9a9a">票数</span>&nbsp;&nbsp; <?php echo $v['CURRENTVOTES'] ?>
                    </div>
                    <div  class="actall">
                        <span style="color: #9a9a9a">排名</span>&nbsp;&nbsp; <?php echo $v['Rank'] ?>
                    </div >
                    <div  class="img actall">
<!--                        <img  style="overflow:hidden;width: 100%; height: 100%;" src="<?php echo $v['JoinerImg'] ?>">-->
                        <img  style="overflow:hidden;width: 100%; height: 100%;" src="<?php echo str_replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics',$v['JoinerImg']) ?>">
                    </div>
                    <div  class="xq actall" ><a href="<?php echo U('activ/info', array('token' => $token, 'id' => $v['ACTIONID'])) ?>">【查看详情】</a>

                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
