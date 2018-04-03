<title>港城新闻</title>
</head>
<body>

    <div class="container-fluid" id ='news' >
        <div class="text">

            <div class='pt'>
                <div class="ntab on" sid="yw" style="border-top-left-radius:3px;">港城要闻
                </div>
                <div class="ntab" sid="zc">实时政策
                </div>
                <div class="ntab" sid="dt"> 发展动态
                </div>
                <div class="ntab" sid="bd"  style="border-top-right-radius:3px;"> 专题报道
                </div>
            </div>
            <div class="nr">

            </div>
        </div>
    </div>
    <script>
        $(".ntab").on('click', function () {
            $('.nr').html();
            var type = $(this).attr('sid');
            var token = '<?php echo $token ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo U('news/ajax') ?>",
                data: "token="+token+"&type=" + type,
                dataType: "json",
                success: function (msg) {
                    var nr = '';
                    for (var i = 0; i < msg.length; i++) {
                        // nr += "<div nb=" + msg[i].JOINERID + " class='one'><div ><img style='width: 150px;height: 80px;' src='" + msg[i].ACTIONIMG + "'></div><div class='fb'>名称" + msg[i].NAME + "</div><div >编号：" + msg[i].NUMBERING + " </div><div>当前票数：" + msg[i].CURRENTVOTES + "</div><div class='lotp'><a>投票</a></div> </div>";
                        nr += "  <div class='nrtab'><a href='<?php echo U('news/info', array('token' => $token)) ?>&type=" + type + "&pid=" + msg[i].ARTICLEID + "'>";
                        if (msg[i].ImgHttpAddress == null) {
                            nr += "<div class ='nimg'><img src='<?php echo STATICS ?>/site/img/newsimg.jpg'></div>";
                        } else {
                            nr += "<div class ='nimg'><img src='"+msg[i].ImgHttpAddress+"'></div>";
                        }

                        nr += " <div class='ntext'><span class='' style='font-size: 16px;  color:#333333;'>" + msg[i].TITLE.substring(0, 12) + "</span><span style='height: 40px;margin-top: 5px; font-size: 12px; color:#666666;'>" + msg[i].CONTENT.substring(0, 32) + "</span ><span style='color:#999999; font-size: 12px;'>" + msg[i].RELEASEDATE + "</span></div> </a></div>"
                    }
                    
                    $('.nr').html(nr);
                }
            });
            $('.ntab').removeClass('on');
            $(this).addClass('on');
        })
        $(".on").click();

    </script>