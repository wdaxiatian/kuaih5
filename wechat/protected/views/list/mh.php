<script src="<?php echo STATICS?>/admin/My97DatePicker/WdatePicker.js"></script> 
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="javascript:;" title="" class="tip-bottom"><i class="icon-home"></i>首页</a> <a href="javascript:;" class="tip-bottom">订单列表</a></div>
  <h2>订单列表</h2>
	<a class="btn btn-info" href="<?php echo U('list/Getexcel15',array('star'=>$star,'end'=>$end))?>"  style="float:right; margin-right:100px;">导出当前表</a>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
		<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
		  <form id="tform" action="<?php echo U('list/mh')?>" method="post">
			<span style="float:left;  height: 35px;" >
				<h5>开始时间:</h5>
				<input type="text" value="<?php echo $star?>" name="star" onClick="WdatePicker()" style="margin-top: 5px; width:150px; padding: 2px 6px; "/>
				
			</span>
			<span style="float:left;  height: 35px;" >
				<h5>结束时间:</h5>
				<input type="text" value="<?php echo $end?>" name="end" onClick="WdatePicker()" style="margin-top: 5px; width:150px; padding: 2px 6px; "/>
			</span>
			<!--<span >
				<h5>排序:</h5>
				<select name="status" id="status"style="margin-top:6px;width:120px;height:25px;font-size: 12px" >
                  <option value="0" <?php if($status == 0):echo 'selected'?><?php endif;?>>全部</option>
                  <option value="1" <?php if($status == 1):echo 'selected'?><?php endif;?>>自提</option>
                  <option value="2" <?php if($status == 2):echo 'selected'?><?php endif;?>>邮递</option>
                </select>
			</span>-->
			<input class="btn btn-success" type="button" onClick='ck()'; style="padding: 4px 10px;margin:2px 0 0 10px;" value="查询">
			</form>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
			   <thead>
                <tr>
                  <th>姓名</th>
                  <th>电话</th>
					<th>地址</th>
					<th>上传头像</th>
                  <th>添加时间</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
			<div class="pages"> <?php $this->widget('application.widgets.pages.ListPagesDWidget', array('pages'=>$pages,'params'=>array('star'=>$star,'end'=>$end,'status'=>$status)))?>
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
	var status =0;
	$("tbody").load("<?php echo U('list/listajax15')?>",{'page':page,'star':star,'end':end,'status':status},function() {
		});
	function ck(){
		var status = 0;
		var url = $("#tform").attr("action")+'&star='+star+'&end='+end+'&status='+status;
		$("#tform").attr("action",url);
		$("#tform").submit();
	}


</script>