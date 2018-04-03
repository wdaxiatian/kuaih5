<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/3/21
 * Time: 12:48
 */
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="javascript:;" title="" class="tip-bottom"><i class="icon-home"></i>首页</a> <a href="javascript:;" class="tip-bottom">列表</a></div>
        <h2>列表</h2>
        <a class="btn btn-info" href="<?php echo U('list/Getexcel20',array('yydate'=>$yydate,'yytime'=>$yytime))?>"  style="float:right; margin-right:100px;">导出当前表</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Data table</h5>
                        <form id="tform" action="<?php echo U('list/sjfyuyue')?>" method="post">
               <span style="float:left;  height: 35px;" >
				<h5>日期:</h5>
				<select name="yydate" id="yydate" style="margin-top:6px;width:120px;height:25px;font-size: 12px" >
                    <option value="0" <?php if($yydate == 0):echo 'selected'?><?php endif;?>>全部</option>
                    <option value="22" <?php if($yydate == 22):echo 'selected'?><?php endif;?>>2016-03-22</option>
                    <option value="23" <?php if($yydate == 23):echo 'selected'?><?php endif;?>>2016-03-23</option>
                    <option value="24" <?php if($yydate == 24):echo 'selected'?><?php endif;?>>2016-03-24</option>
                    <option value="25" <?php if($yydate == 25):echo 'selected'?><?php endif;?>>2016-03-25</option>
                    <option value="26" <?php if($yydate == 26):echo 'selected'?><?php endif;?>>2016-03-26</option>
                </select>
			</span>
                                           <span style="float:left;  height: 35px;" >
				<h5>时间:</h5>
				<select name="yytime" id="yytime" style="margin-top:6px;width:120px;height:25px;font-size: 12px" >
                    <option value="0" <?php if($yytime == 0):echo 'selected'?><?php endif;?>>全部</option>
                    <option value="am" <?php if($yytime == 'am'):echo 'selected'?><?php endif;?>>上午</option>
                    <option value="pm" <?php if($yytime == 'pm'):echo 'selected'?><?php endif;?>>下午</option>
                </select>
			</span>
                            <input class="btn btn-success" type="button" onClick='ck()'; style="padding: 4px 10px;margin:2px 0 0 10px;" value="查询">
                        </form>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>姓名</th>
                                <th>身份证号码</th>
                                <th>电话</th>
                                <th>日期</th>
                                <th>时间</th>
                                <th>添加时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="pages"> <?php $this->widget('application.widgets.pages.ListPagesDWidget', array('pages'=>$pages,'params'=>array('yydate'=>$yydate,'yytime'=>$yytime)))?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
<script>
    var page = <?php if(empty($_GET['page'])){echo 1;}else{echo $_GET['page'];}?>;
    var yydate =$("select[name=yydate] option:selected").val();
    var yytime =$("select[name=yytime] option:selected").val();
    $("tbody").load("<?php echo U('list/listajax20')?>",{'page':page,'yydate':yydate,'yytime':yytime},function() {
    });
    function ck(){
        var yydate =$("select[name=yydate] option:selected").val();
        var yytime =$("select[name=yytime] option:selected").val();
        var url = $("#tform").attr("action")+'&yydate='+yydate+'&yytime='+yytime;
        $("#tform").attr("action",url);
        $("#tform").submit();
    }


</script>
 