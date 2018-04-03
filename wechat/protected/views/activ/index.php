<title>全民活动</title>
</head>
<body>
    <style>
        .actclass{
            background-image:url("<?php echo STATICS ?>/site/img/background.jpg") ;
            background-repeat:no-repeat;  
            background-position:top;
            background-size: 100% ;
        }
    </style>

    <div class="container-fluid actclass" id ='act' style="min-height: 667px;"  >
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $k => $v): ?>
                <div class="back">

                    <a href="<?php echo U('activ/info', array('id' => $v['ACTIONID'], 'token' => $token)) ?>">
<!--                        <img style="width: 320px; height: 100px;"src="<?php echo STATICS_IMG . $v['ACTIONIMG'] ?>">-->
                         <img style="width: 320px; height: 100px;"src="<?php echo str_replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics',STATICS_IMG . $v['ACTIONIMG']) ?>">
                        <div class="fb"><?php echo $v['NAME'] ?></div>
                    </a>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>
