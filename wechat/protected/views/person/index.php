<title>个人中心</title>
</head>
<body>
    <div class="container-fluid" id ='person' style="min-height: 667px;" >
        <div class="back">
            <img  style="width:64px;height: 64px; margin:10px auto;border-radius:50%" src="<?php echo $data['HEADIMGURL']?>">
            <div style="color: #fff; line-height: 10px;"><?php echo $data['NICKNAME']?></div>
        </div>
        <div class='text'>
           
            <div style=" background-image:url('<?php echo STATICS ?>/site/img/wdts.jpg') ;background-repeat:no-repeat;"><a  href="<?php echo U('person/complaint',array('token'=>$token))?>">我的投诉</a></div> 
            <div style=" background-image:url('<?php echo STATICS ?>/site/img/cyhd.jpg') ;background-repeat:no-repeat;"><a href="<?php echo U('person/act',array('token'=>$token))?>">参与活动</a></div> 
            <div style=" background-image:url('<?php echo STATICS ?>/site/img/wygl.jpg') ;background-repeat:no-repeat;"><a href="<?php echo U('person/service',array('token'=>$token))?>">物业管理</a></div> 
            <div style=" background-image:url('<?php echo STATICS ?>/site/img/wdxc.jpg') ;background-repeat:no-repeat;"><a href="<?php echo U('person/ansqus',array('token'=>$token))?>">问答献策</a></div> 
        

        </div>

    </div>
   