<title>物业服务</title>
</head>
<body>


    <div class="container-fluid" id ='perser' >
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $k => $v): ?>
                <div class='text'>
                    <div class="" style="font-size:16px; color: #333333;"><?php echo $v['CONTENT'] ?></div>
                    <div class="stime" ><?php echo $v['CREATEDATE'] ?></div>
                    <div>
                        <?php if ($v['REPLYCONTENT'] != null): ?>
                            <div  class="perinfo">
                                管理员<span class="stime" style="font-size:10px; float: right;"><?php echo $v['REPLYDATE'] ?></span>
                            </div>
                            <div style="margin-left: 50px;"><?php echo $v['REPLYCONTENT'] ?></div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
