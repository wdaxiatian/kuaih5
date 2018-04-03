<title>联系我们</title>
</head>
<body>
    
    <div class="container-fluid" id ='contact' >
    <div class="back">
        <img src="<?php echo STATICS?>/site/img/ditujj.jpg"></img>
    </div>
    <div class='text'>
        <div class="titles"><?php echo $data['TITLE']?></div>  
        <div>
            <div class="lan"><span class="">联系电话</span> <?php echo $data['TEL']?></div>  
        </div>
        <div>
             <div class="lan"><span class="">邮编</span> <?php echo $data['ZIPCODE']?></div>  
        </div>
        <div>
             <div class="lan"><span class="">Email</span> <?php echo $data['EMAIL']?></div>  
        </div>
        <div>
             <div class="lan"><span class="">官方网站</span> <?php echo $data['OFFICIALWEBSITE']?></div>  
        </div>
        <div class="textbig" >
            <div style="width:30px; float: left"><span class="">简介</span></div >  <div  style="width:280px; height: 250px; float: right"><?php echo $data['INTRODUCTION']?>  
        </div>
       
        
    </div>
</div>