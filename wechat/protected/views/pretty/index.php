<title>企业风采</title>
</head>
<body>

    <div class="container-fluid" id ='qyfc'  style="min-height: 667px;">

        <div class='pt'>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $k => $v): ?>
<!--              <a href="<?php echo U('pretty/info', array('token' => $token, 'eid' => $v['eid'])) ?>"><div class="qyt" <?php if ($v['paths']): ?> style="background-size: 150px 100px;background-image:url('<?php echo STATICS_IMG . $v['paths'][0]['path'] ?>' <?php endif; ?>)">-->
                    <a href="<?php echo U('pretty/info', array('token' => $token, 'eid' => $v['eid'])) ?>"><div class="qyt" <?php if ($v['paths']): ?> style="background-size: 150px 100px;background-image:url('<?php echo str_replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics',STATICS_IMG . $v['paths'][0]['path']) ?>' <?php endif; ?>)">
                            <div class="wz">&nbsp;&nbsp;<?php echo substr($v['title'], 0, 20) ?></div>
                            <div class="qytitle" style="display:none"><?php echo $v['title'] ?></div>
                            <div  class="qynr" style="display: none"><?php echo $v['description'] ?></div>
                        </div></a>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>

