<title>活动投票</title>
</head>
<body>

    <div class="container-fluid" id ='actinfo' >
        <div class="back">
<!--            <img style="width: 380px; height: 100px;"src="<?php echo STATICS_IMG . $data['ACTIONIMG'] ?>">    -->
            <img style="width: 380px; height: 100px;"src="<?php echo  str_replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics',STATICS_IMG . $data['ACTIONIMG']) ?>">
        </div>
        <div class="back">
            <div class="title fb"><?php echo $data['NAME'] ?></div> 
        </div>

        <div class="back nub">
            <div>参与人数</br><?php echo $data['PARTICIPANTS'] ?></div> 
            <div class="line"></div> 
            <div >累计投票</br><?php echo $data['ACCUMULATEDVOTES'] ?></div> 
            <div class="line" ></div> 
            <div style="padding-left: 10px;">累计访问</br><?php echo $data['VISITS'] ?></div> 
        </div>

        <div class="back xx">
            <div style="background:url('<?php echo STATICS ?>/site/img/gz.jpg');  background-repeat:no-repeat; ">投票规则：<?php echo $data['VOTINGRULES'] ?></div> 
            <div style="background:url('<?php echo STATICS ?>/site/img/time.jpg');  background-repeat:no-repeat; ">报名时间：<?php echo $data['STARTDATE'] ?></div> 
            <div style="background:url('<?php echo STATICS ?>/site/img/time.jpg'); background-repeat:no-repeat;">截止时间：<?php echo $data['ENDDATE'] ?></div> 

        </div>

        <div class="back js "><a class="closed">
                活动介绍
            </a>
        </div>     
        <div class="back jsnr" style="display:none;">
            <?php echo $data['INTRODUCE'] ?>        
        </div>  
<!--        <div class="back fx"><img style="padding-left: 40px;" src="<?php echo STATICS ?>/site/img/fx.jpg">

        </div>-->

        <div class="ss">
            <div style=" float: left;"> <input name="t" type="text" style="color:#888;width: 230px;" value="请输入编号" onfocus="if (value == '请输入编号') {
                        value = ''
                    }" onblur="if (value == '') {
                                value = '请输入编号'
                            }" /></div>
            <div class="anstijiao">搜索</div>
        </div>
        <div class="back px"><a class="on">时间排序</a> <a class="">人气排序</a>
        </div> 

        <div class="nrlist">
        </div>


        <div class="xuanfu">

            <a href="<?php echo U('activ/apply', array('id' => $pid, 'token' => $token, 'actname' => $data['NAME'])) ?>"><div class="wytp">我要报名</div></a>
        </div>

    </div>

    <script>


        $('.js a').on('click', function () {
            if ($(this).hasClass('open')) {

                $(this).parent().next().hide();
                $(this).removeClass('open');
                $(this).addClass('closed');

            } else {

                $(this).removeClass('closed');
                $(this).addClass('open');
                $(this).parent().next().show();

            }
        })

        $('.px a').on('click', function () {
            if (!$(this).hasClass('on')) {
                $('.px a').removeClass('on');
                $(this).addClass('on');


            }
        })


        //投票
        function vote() {
            $('.lotp a').on('click', function () {

                var token = '<?php echo $token ?>';
                 var id = '<?php echo $pid ?>';
                var nb = $(this).parent().parent().attr('nb');
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('activ/addvote') ?>",
                    data:"id="+id+"&token=" + token + "&nb=" + nb,
                    dataType: "json",
                    success: function (msg) {

                        alert(msg.msg)

                    }


                });
            })
        }

        //列表方法
        function actlist(type = '', jid = '', sorttype = '') {  
            var data = '';
            var token = '<?php echo $token ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo U('activ/list') ?>",
                data: "token="+token+"&actionid=" +<?php echo $pid; ?> + "&jid=" + jid + "&sorttype=" + sorttype,
                dataType: "json",
                success: function (msg) { 
                    var nr = '';
                    for (var i = 0; i < msg.length; i++) {
//                        nr += "<div nb=" + msg[i].JOINERID + " class='one'><div ><img style='width: 150px;height: 80px;' src='" + msg[i].ACTIONIMG + "'>"
                         nr += "<div nb=" + msg[i].JOINERID + " class='one'><div ><img style='width: 150px;height: 80px;' src='" + msg[i].ACTIONIMG.replace('192.168.100.102:5678','ltwxtest.mynatapp.cc/cxg/statics') + "'>"
                        nr +="</div><div class='fb' style='padding-top:3px;padding-left:5px;'>" + msg[i].NAME + "</div><div style='padding-top:3px;padding-left:5px;'>编号：" + msg[i].NUMBERING + " </div><div style='padding-top:3px;padding-left:5px;'>当前票数：" + msg[i].CURRENTVOTES + "</div><div class='lotp'><a>投票</a></div> </div>";
                    }
                    $('.nrlist').html();
                    $('.nrlist').html(nr);
                    vote();
                }
            });

        }
        //初始化数据

        actlist('all');

        //排序规则
        $('.px a').on('click', function () {
            if ($(this).html() == '人气排序') {
                actlist('all', '', '9');
            } else {
                actlist('all');
            }
        })

        //编号搜索
        $('.anstijiao').on('click', function () {
            var nb = $('.ss input[name = t]').val();
            actlist('all', nb, '');
        })




    </script>