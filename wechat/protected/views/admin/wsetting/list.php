<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="#">微信公众号设置</a> 

    </li>

</ul>

<div class="row-fluid sortable">	

    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white user"></i><span class="break"></span></h2>
            <div class="box-icon">
                <a href="<?php echo U('admin/wsetting/edit') ?>" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>

            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable ">
                <thead>
                    <tr>
                        <th>名字</th>
                        <th>数据</th>

                    </tr>
                </thead>   
                <tbody>
                    <tr>
                        <td>appId</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'appId')
                                    echo $v['content'];
                            }
                            ?></td>


                    </tr>
                    <tr>
                        <td>AppSecret</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'AppSecret')
                                    echo $v['content'];
                            }
                            ?></td>


                    </tr>
                    <tr>
                        <td>获取access_token的IP白名单</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'ip')
                                    echo $v['content'];
                            }
                            ?></td>


                    </tr>
                    <tr>
                        <td>服务器地址(URL)</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'url')
                                    echo $v['content'];
                            }
                            ?></td>


                    </tr>
                    <tr>
                        <td>令牌(Token)</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'token')
                                    echo $v['content'];
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>消息加解密密钥(EncodingAESKey)</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'AESKey')
                                    echo $v['content'];
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>消息加解密方式</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'AESKeytype')
                                    echo $v['content'];
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>业务域名(3)</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'path')
                                    echo $v['content'];
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>JS接口安全域名(3)</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'jspath')
                                    echo $v['content'];
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>网页授权域名</td>
                        <td class="center"><?php
                            foreach ($data as $v) {
                                if ($v['name'] == 'trustpath')
                                    echo $v['content'];
                            }
                            ?></td>

                    </tr>




                </tbody>
            </table>            
        </div>
    </div><!--/span-->

<div class="box span11">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white list"></i><span class="break"></span>access_token</h2>
    </div>
    <div class="box-content">
        <dl>
            <dt><?php echo $accesstoken ?></dt>
          
        </dl>            
    </div>
</div><!--/span-->
<div class="box span11">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white list"></i><span class="break"></span>jsapi_ticket</h2>
    </div>
    <div class="box-content">
        <dl>
            <dt><?php echo $jsticket ?></dt>
          
        </dl>            
    </div>
</div><!--/span-->

