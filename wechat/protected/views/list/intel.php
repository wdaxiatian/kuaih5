
<script src="<?php echo STATICS?>/admin/My97DatePicker/WdatePicker.js"></script>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="javascript:;" title="" class="tip-bottom"><i class="icon-home"></i>首页</a> <a href="javascript:;" class="tip-bottom">列表</a></div>
        <h2>列表</h2>
        <a class="btn btn-info" href="<?php echo U('list/Getexcel23',array('star'=>$star,'end'=>$end))?>"  style="float:right; margin-right:100px;">导出当前表</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Data table</h5>
                        <form id="tform" action="<?php echo U('list/intel')?>" method="post">
			<span style="float:left;  height: 35px;" >
				<h5>开始时间:</h5>
				<input type="text" value="<?php echo $star?>" name="star" onClick="WdatePicker()" style="margin-top: 5px; width:150px; padding: 2px 6px; "/>

			</span>
			<span style="float:left;  height: 35px;" >
				<h5>结束时间:</h5>
				<input type="text" value="<?php echo $end?>" name="end" onClick="WdatePicker()" style="margin-top: 5px; width:150px; padding: 2px 6px; "/>
			</span>
                            <input class="btn btn-success" type="button" onClick='ck()'; style="padding: 4px 10px;margin:2px 0 0 10px;" value="查询">
                        </form>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
								
                              
                                <th>名称</th>
                               
                                <th>添加时间</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="pages"> <?php $this->widget('application.widgets.pages.ListPagesDWidget', array('pages'=>$pages,'params'=>array('star'=>$star,'end'=>$end)))?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
<script>
    var page = <?php if(empty($_GET['page'])){echo 1;}else{echo $_GET['page'];}?>;
    var star = $("input[name=star]").val();
    var end = $("input[name=end]").val();
    $("tbody").load("<?php echo U('list/listajax23')?>",{'page':page,'star':star,'end':end},function() {
    });
    function ck(){
        var star = $("input[name=star]").val();
        var end = $("input[name=end]").val();
        var url = $("#tform").attr("action")+'&star='+star+'&end='+end;
        $("#tform").attr("action",url);
        $("#tform").submit();
    }


</script>