<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="#">微信公众号设置</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">修改设置</a></li>
</ul>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>设置</h2>

        </div>
        <div class="box-content">
            <form class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">appId</label>
                        <div class="controls">
                            <input class="input-xlarge focused" name="appId" type="text" value="<?php foreach ($data as $v){if($v['name']=='appId')echo $v['content'];}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">AppSecret</label>
                        <div class="controls">
                            <input class="input-xlarge focused" name="AppSecret" type="text" value="<?php foreach ($data as $v){if($v['name']=='AppSecret')echo $v['content'];}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">获取access_token的IP白名单</label>
                        <div class="controls">
                            <textarea name="ip"><?php foreach ($data as $v){if($v['name']=='ip')echo $v['content'];}?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">服务器地址(URL)</label>
                        <div class="controls">
                            <input class="input-xlarge focused" name="url"  type="text" value="<?php foreach ($data as $v){if($v['name']=='url')echo $v['content'];}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">令牌(Token)</label>
                        <div class="controls">
                            <input class="input-xlarge focused"  name="token" type="text" value="<?php foreach ($data as $v){if($v['name']=='token')echo $v['content'];}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">消息加解密密钥(EncodingAESKey)</label>
                        <div class="controls">
                            <input class="input-xlarge focused"  name="AESKey" type="text" value="<?php foreach ($data as $v){if($v['name']=='AESKey')echo $v['content'];}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">消息加解密方式</label>
                        <div class="controls">
                            <input class="input-xlarge focused"  name="AESKeytype" type="text" value="<?php foreach ($data as $v){if($v['name']=='AESKeytype')echo $v['content'];}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left"  for="focusedInput">业务域名(3)</label>
                        <div class="controls">
                            <textarea name="path"><?php foreach ($data as $v){if($v['name']=='path')echo $v['content'];}?></textarea>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label label-left"  for="focusedInput">JS接口安全域名(3)</label>
                        <div class="controls">
                            <textarea name="jspath"><?php foreach ($data as $v){if($v['name']=='jspath')echo $v['content'];}?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label label-left" for="focusedInput">网页授权域名</label>
                        <div class="controls">
                            <input class="input-xlarge focused" name="trustpath"  type="text" value="<?php foreach ($data as $v){if($v['name']=='trustpath')echo $v['content'];}?>">
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-primary">保存</button>

                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->

<script>
    $(function () {
        $('.btn-primary').on('click', function () {
            var appId = $('input[name=appId]').val();
            var AppSecret = $('input[name=AppSecret]').val();
            var ip = $('textarea[name=ip]').val();
            var url = $('input[name=url]').val();
            var token = $('input[name=token]').val();
            var AESKey = $('input[name=AESKey]').val();
            var AESKeytype = $('input[name=AESKeytype]').val();
            var path = $('textarea[name=path]').val();
            var jspath = $('textarea[name=jspath]').val();
            var trustpath = $('input[name=trustpath]').val();
            $.ajax({
                type: "POST",
                url: "<?php echo U('admin/wsetting/edit') ?>",
                data: "appId=" + appId + "&AppSecret=" + AppSecret + "&ip=" + ip + "&url=" + url + "&token=" + token + "&AESKey=" + AESKey + "&AESKeytype=" + AESKeytype + "&path=" + path + "&jspath=" + jspath + "&trustpath=" + trustpath,
                dataType: "json",
                success: function (msg) {
                    alert('保存成功');

                }
            });
        })
    })
</script>