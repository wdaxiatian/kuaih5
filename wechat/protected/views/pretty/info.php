<title>详情</title>
</head>
<body>
       <style>
        #site{
            background-size: 100% 100%;
        }
    </style>
    
    <div class="container-fluid" id ='site' >
        <div class="fb" style="font-size: 16px; text-align: center; padding-top: 20px;"><?php echo $data['title']?></div>
    <?php if($data['paths']):?>
    <div class="back">
        <!--<img src="<?php echo STATICS_IMG . $data['paths'][0]['path'] ?>">-->
        <img src="<?php echo  str_replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics',STATICS_IMG . $data['paths'][0]['path']) ?>">
    </div>
   <?php endif;?>
    <div class='text'>
        <?php echo $data['description']?>
    </div>
</div>