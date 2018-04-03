<title>企业招聘</title>
</head>
<body>

    <div class="container-fluid" id ='job' style="min-height: 667px;"  >

        <div class="nr">
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $k => $v): ?>
                    <div class='jobtab' >
                        <div class="fb" ><a style="font-size: 16px; color: #111;" href="<?php echo U('job/info', array('token' => $token, 'pid' => $v['CompanyId'])) ?>"><?php echo $v['CompanyName'] ?></a></div>
                        <?php foreach ($v['BulletinList'] as $kk => $vv): ?>
                            <div class="jobcla" ><a style="color: #0196f2;" href="<?php echo U('job/info', array('token' => $token, 'pid' => $v['CompanyId'], 'name' => $vv['Bulletin'])) ?>"><?php echo $vv['Bulletin'] ?></a></div> 
                            <?php endforeach; ?>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
