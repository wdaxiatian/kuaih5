<title>投诉详情</title>
</head>
<body>

    <div class="container-fluid" id ='complaintinfo' >
        <div class="text">
            <div class="title" ><?php echo $data['TYPE'] ?></div>
            <div class="nr"><?php echo $data['REMARK'] ?><div class="tm"><?php echo $data['CREATETIME'].' 办理进度：'.$data['STATUS'] ?></div></div>
           <?php if($data['ADDRESS']):?>
            <div class="nr"><?php echo $data['ADDRESS'] ?></div>
            <?php endif;?>
            <?php if($data['PROCESSRESULT']):?>
            <div class="nr"><?php echo $data['PROCESSRESULT'] ?></div>
            <?php endif;?>
            <?php if($data['PROCESSINGADVICE']):?>
            <div class="nr"><?php echo $data['PROCESSINGADVICE'] ?></div>
            <?php endif;?>
        </div>
    </div>