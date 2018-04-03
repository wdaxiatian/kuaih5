<title>详情</title>
</head>
<body>
    <style>
        #site{
            background-size: 100% 100%;
        }
    </style>
    <div class="container-fluid" id ='site' style="min-height: 667px;" >
        <div class="fb" style="font-size: 16px; text-align: center; padding-top: 30px; width: 320px;margin-left: auto; margin-right: auto;"><?php echo $data['TITLE'] ?></div>
        <div style="font-size: 12px; text-align: center; color: #999;"><?php echo $data['RELEASEDATE'] ?></div>
        <?php if ($data['ImgHttpAddress']): ?>
            <div class="back">
<!--                <img src="<?php echo STATICS.$data['ImgHttpAddress']; ?>">-->
                <img src="<?php echo str_replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics',$data['ImgHttpAddress']); ?>">
            </div>
        <?php endif; ?>
        <div class='text'><?php echo $data['CONTENT'] ?></div>
    </div>