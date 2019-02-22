@include('common._meta')
<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-category-add">
	{{csrf_field()}}
		<div id="tab-category" class="HuiTab">
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						分类名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="type_name">
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>

		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" id="tijiao" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
@include('common._footer');

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#tab-category").Huitab({
		index:0
	});
	$("#form-category-add").validate({
		rules:{
			type_name: {
				required: true,
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				'type': 'post',
				'url' : '',
				'success': function(data)
				{
					if(data !='')
					{
						layer.msg('添加成功!',{icon:1,time:1000});
						// window.close(); 
						// window.location.href='{{url("/course/course_list")}}'; 
					}else
					{
						layer.msg('添加失败!',{icon:1,time:3000});
					}
				}
			});
			
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>