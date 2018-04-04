
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>设置</h2>

        </div>
        <div class="box-content">
            <form class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">需要授权的地址</label>
                        <div class="controls">
                            <input class="input-xlarge focused" name="url" type="text" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label  label-left" for="selectError3">授权类型</label>
                        <div class="controls">
                            <select id="selectError3">
                                <option value="base">静默授权</option>
                                <option value="userinfo">同意授权</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-primary">生成</button>

                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->

<div class="box span5" >
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white list"></i><span class="break"></span>授权地址</h2>
    </div>
    <div class="box-content">
        <dl>
            <dt id="code" style="word-break:break-all; "></dt>
          
        </dl>            
    </div>
</div><!--/span-->
<div class="box span3" >
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white list"></i><span class="break"></span>授权地址二维码</h2>
    </div>
    <div class="box-content">
        <dl>
            <dt ><img></dt>
          
        </dl>            
    </div>
</div><!--/span-->

<script>
    $(function () {
        $('.userinfo').hide();
        $('.btn-primary').on('click', function () {
            var url = $('input[name=url]').val();
            var type = $('select').val();
            $.ajax({
                type: "POST",
                url: "<?php echo U('openid/IndexList') ?>",
                data: "url=" + url + "&type=" + type,
                dataType: "json",
                success: function (msg) { 
                   $('#code').html(msg);
                   $('.box-content dt img').attr('src','<?php echo U('admin/userinfo/qrcode')?>'+'&url='+msg);

                }
            })
        })
                ;
    })


</script>
