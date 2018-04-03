<title>港城简介</title>
</head>
<body>
    
    <div class="container-fluid" id ='site' style="height: 667px;">
    <div class="back">
        <!--<img  style="width:350px; height:170px;" src="<?php echo $data['ImgHttpAddress']?>">-->
          <img  style="width:350px; height:170px;" src="<?php  echo  str_replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics',$data['ImgHttpAddress'])?>">
    </div>
        <div class='text' style="height: 400px; font-size: 15px; color: #333333;">
             <?php echo $data['CONTENT']?>
    </div>
</div>