<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/3/31
 * Time: 11:28
 */

 ?>
<script src="<?php echo STATICS?>/admin/My97DatePicker/WdatePicker.js"></script>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="javascript:;" title="" class="tip-bottom"><i class="icon-home"></i>首页</a>
            <a href="javascript:;" class="tip-bottom">列表</a>
        </div>
        <h2>列表</h2>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>

                        <h5>详细信息</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form id="form-wizard" class="form-horizontal">
                            <div id="form-wizard-1" class="step">
                                <div class="form-actions">
                                    <input  type="hidden" name="_token" value="56d6b488a48e5" />
                                    <input id="next" class="btn btn-success" type="button" onclick="javascript:location.href='http://res.moneplus.cn/index.php?r=list/xysnd'" value="返回" />
                                    <div id="status"></div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">openid</label>
                                    <div class="controls">
                                        <label id="screen_name" name="screen_name" >
                                            <?php if(isset($rs['openid'])) echo $rs['openid'];?>
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">姓名</label>
                                    <div class="controls">
                                        <label id="profile_image_url" name="profile_image_url" >
                                            <?php if(isset($rs['name'])) echo $rs['name'];?>
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">年龄</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['age'])) echo $rs['age'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">性别</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['sex'])) echo $rs['sex'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">身高</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['height'])) echo $rs['height'].'CM';?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">体重</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['weight'])) echo $rs['weight'].'KG';?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">上衣尺码</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['jacket_size'])) echo $rs['jacket_size'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">裤子尺码</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['pants_size'])) echo $rs['pants_size'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">家长最希望解决的习惯性问题</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['problem'])) echo $rs['problem'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">其他问题</label>
                                    <div class="controls">
                                        <textarea style="width: 600px;; height: 100px;"><?php if(isset($rs['problem_other'])) echo $rs['problem_other'];?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">图片</label>
                                    <div class="controls">
                                        <?php
                                        if(isset($rs['img'])){
                                                ?>
                                                <img style="width: 300px; height: 300px;" src="<?= $rs['img'] ?>"/>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">监护人</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['guardian'])) echo $rs['guardian'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">与监护人的关系</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['relation'])) echo $rs['relation'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">电话</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['tel'])) echo $rs['tel'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">订单编号</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['order_sn'])) echo $rs['order_sn'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">价格</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['price'])) echo $rs['price'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">状态</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['status'])) echo $rs['status'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">邀请成功的人</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['invite'])) echo $rs['invite'];?></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">添加时间</label>
                                    <div class="controls">
                                        <label><?php if(isset($rs['addtime'])) echo $rs['addtime'];?></label>
                                    </div>
                                </div>

                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function changeStatus(type, id) {

        if(!confirm('确定要修改吗?')) {
            return false;
        }

        $.ajax({
            type: "POST",
            url : 'index.php?r=snowbeer/changestatus',
            data: {
                "type":type,
                "id" : id
            },
            dataType: "json",
            success: function (result) {
                //console.log(result.code);
                if (result.code = 200) {
                    alert(result.message);
                } else {
                    alert(result.message);
                }
                location.reload();

            }
        });

    }


</script>