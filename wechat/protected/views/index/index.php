<title>港城首页</title>
</head>
<body>
    <style>
        html,body {
            background-image:url('<?php echo STATICS ?>/site/img/syback.jpg') ;
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-position:top;
            background-size: 100% 100%;

        }


        img{
            width:300px;
            height:200px;
            max-width:100%;
            max-height:100%;

        }

        ul li {
            list-style: none;
        }
        *{margin:0;padding:0;}

        .slide {

            position: relative;
        }
        .slide ul {
            height: 100%;
            width:350px;
            height:180px;
            margin: 0 auto 0 auto;
        }
        .slide li {
            height:180px;
            position: absolute;

            top:0;
        }
        .slide li img{
            width: 350px;

        }
    </style>
    <div class="container-fluid" id ='men' >
        <div class="back">

            <div id="box">
                <div class="slide">
                    <!-- 插入轮播的图片们 -->           
                    <ul>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data as $k => $v): ?>
                                                                <!--<li><a ><img  style=" position: relative;" src="<?php echo $v['url'] ?>" ><span style=" line-height: 2;position: absolute; height:30px;width:100%;  left:0; bottom:0; background-color:#666; color:#fff; text-align:center; background: rgba(0, 0, 0, 0.5);"><?php echo $v['title'] ?></span></a></li>-->
                                <li><a ><img  style=" position: relative;" src="<?php echo str_replace('192.168.100.102:5678', 'ltwxtest.mynatapp.cc/cxg/statics', $v['url']) ?>" ><span style=" line-height: 2;position: absolute; height:30px;width:100%;  left:0; bottom:0; background-color:#666; color:#fff; text-align:center; background: rgba(0, 0, 0, 0.5);"><?php echo $v['title'] ?></span></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>


        </div>
        <div class='textgc'>
            <div class="duoge">
                <a href="<?php echo U('site/index', array('token' => $token)) ?>" ><div class='jj'><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/jj.jpg">港城简介</div></a>
                <a href="<?php echo U('resource/index', array('token' => $token)) ?>"><div class='hj'><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/hj.jpg">资源汇聚</div></a>
                <a href="<?php echo U('news/index', array('token' => $token)) ?>"><div class='xw'><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/xw.jpg">港城新闻</div></a>
                <a href="<?php echo U('pretty/index', array('token' => $token)) ?>"><div class="qyfc"><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/fc.jpg">企业风采</div></a>
                <a href="<?php echo U('contact/index', array('token' => $token)) ?>"><div class="wm"><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/wm.jpg">联系我们</div></a>
            </div>
        </div>
        <div class='textfw'>
            <a href="<?php echo U('job/index', array('token' => $token)) ?>"><div class='zp'><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/zp.jpg">企业招聘</div></a>
            <a href="<?php echo U('complaint/index', array('token' => $token)) ?>"><div class='ts'><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/ts.jpg">我要投诉</div></a>
            <a href="<?php echo U('estate/index', array('token' => $token)) ?>"><div class='fw'><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/fw.jpg">物业服务</div></a>
            <a href="<?php echo U('activ/index', array('token' => $token)) ?>"><div class="tp"><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/tp.jpg">全民投票</div></a>
            <a href="<?php echo U('ansqus/index', array('token' => $token)) ?>"><div class="wd"><img style="height:55px; width: 55px;" src="<?php echo STATICS ?>/site/img/wd.jpg">问答献策</div></a>

        </div>
    </div>

    <script>
        var n = 2;
        setInterval(function () {
            if (!$("ul li").eq(n).is(":hidden")) {
                $("ul li").eq(n).fadeOut("slow")
            } else {
                $("ul li").eq(n).fadeIn("slow")
            }
            n--;
            if (n == 0) {
                n = 2;
            }
            ;
        }, 10000);


    </script>

