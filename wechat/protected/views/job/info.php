<title>岗位详情</title>
</head>
<body>
       <style>
        #site{
            background-size: 100% 100%;
        }
    </style>

    <div class="container-fluid" id ='site' style="min-height: 667px;"  >

        <div class="fb" style="font-size: 16px; text-align: center; padding-top: 20px;"><?php echo $data['COMPANYNAME'] ?></div>


        <div class='text' style="height: auto;">
            <div><div class="fb" style='text-align: center;'>公司简介</div>
                <div><?php echo $data['QYJJ']?$data['QYJJ']:'暂无'; ?></div></div><br>
            <div>联系人：<?php echo $data['LXR'] ?></div>
            <div>Email：<?php echo $data['EMAIL'] ?></div>
            <div>联系电话：<?php echo $data['FRDBLXFS'] ?></div>
            <div>传真：<?php echo $data['FAX'] ?></div>
            <div>公司地址：<?php echo $data['ADDRESS'] ?></div>
            <br>
          <div>岗位：</div>
            <?php if (!empty($data['bull'])): ?>
          <?php foreach ($data['bull'] as $k=>$v):?>
          <div><span class="fb"><?php echo $v['POSITIONNAME']?> </span> | 
              <?php if($v['SEX'] == 1):?>
               男 | 
               <?php else:?>
               女 | 
               <?php endif;?>
              <?php echo  $v['WAGERANGE']?$v['WAGERANGE'].' | ':''?>  <?php echo $v['CULTURE']?$v['CULTURE'].' | ':''?> 
                 <?php echo $v['AGERANGE']?$v['AGERANGE'].' | ':''?>  <?php echo $v['WORKEXPERIENCE']?$v['WORKEXPERIENCE'].' | ':''?>  其他要求： <?php echo $v['OTHERREQUIREMENTS']?$v['OTHERREQUIREMENTS'].' | ':''?></div>
          <br>
            <?php endforeach;?>
          <?php endif;?>
        </div>
    </div>