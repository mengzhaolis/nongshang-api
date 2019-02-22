@include('common._meta')
<title>新增图片</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="/H-ui.admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
<form action="" method="post" class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="goods_name">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="type_id" class="select">
                    @foreach($type as $type)
					    <option value="{{$type->id}}">{{$type->type_name}}</option>
                    @endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="goods_type" class="select">
                    
					<option value="0">全部</option>
					<option value="1">最新单品</option>
					<option value="2">旺季热销</option>
                    
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="0" placeholder="" id="" name="asc">
			</div>
		</div>
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产地：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="" id="" placeholder="" value="" class="input-text">
			</div>
		</div> -->
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属供应商：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="" id="" placeholder="" value="" class="input-text">
			</div>
		</div> -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品重量：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="zhongliang" id="" placeholder="" value="" class="input-text" style="width:90%">
				kg</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品展示价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="price" id="" placeholder="" value="" class="input-text" style="width:90%">
				元</div>
		</div>		
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">销售开始时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:180px;">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">销售结束时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{$dp.$D(\'datemin\')}' })" id="datemax" class="input-text Wdate" style="width:180px;">
			</div>
		</div> -->	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="zhaiyao" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
            <div style="width:80px;height:80px;float:left;">
                <img src="" alt="" class="ing" style="width:80px;height:80px;margin-left:15px;">
            
                <input type="file" multiple id="fil" style="float:left;margin-left:100px;margin-top:-43px;">
                <input type="hidden" id="face" name="goods_path" value="">
            
            </div>
		</div>

		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div> -->
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-secondary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

<!-- 公共js -->
@include('common._footer');

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript">
function article_save(){
	alert("刷新父级的时候会自动关闭弹层。")
	window.parent.location.reload();
}
    //封面图-添加
    var img_url = $('.ing').attr('src');
    //  alert(img_url)
    if (img_url == false) {
        $(".ing").attr({ 'src': '/avatar.jpg', 'width': 80 + 'px', 'heigth': 80 + 'px' });
    }
    var fil = $("#fil");
    $("<img>").insertBefore("#fil");
    fil.bind('change', function () {
        var fordate = new FormData();  //得到一个FormData对象：
        var fils = $("#fil").get(0).files[0];  //得到file对象
        // var filss = $("#fil").val();  //得到file对象
        //  console.log(fils);
        // var id = $("#a_id").val();
        fordate.append('image', fils);  //用append方法添加键值对
        // fordate.append('path',filss);  //用append方法添加键值对

        var srcc = window.URL.createObjectURL(fils);
        $(".ing").attr({ 'src': srcc, 'width': 80 + 'px', 'heigth': 80 + 'px' });
        $.ajax({  //发送ajax请求
            url: "/trade/trade-image",
            type: "post",
            data: fordate,
            processData: false,
            contentType: false,
            success: function (data) {
                if(data.src.length > 0)
				{
					$("#face").val(data.src);
					layer.msg('上传成功', { icon: 1 });
				}
            },
            'error': function (data) {
                var result = JSON.parse(data.responseText);
				// console.log(result)
                // 非200请求，获取错误消息
                layer.msg(result.message, { icon: data.status });
            }
        });
    });
	// 商品信息提交
	$("#form-article-add").validate({
    	rules:
			{
				goods_name: {
					required: true,
				},
				asc: {
					required: true,
				},
				drive:
				{
					required: true,
				},
			},
			onkeyup: false,
			focusCleanup: true,
			success: "valid",
			submitHandler: function (form) {
				$(form).ajaxSubmit({
					'type': 'post',
					'url': '/trade/trade-add',
					'success': function (data) {
						// console.log(data)
						if (data != '') {
							layer.msg('添加成功!', { icon: 1, time: 3000 });
							window.parent.location.reload();
							// window.close(); 
							// window.location.href = '{{url("/case/ca_list")}}';
						} else {
							layer.msg('添加失败!', { icon: 1, time: 3000 });
						}
					}
				});
			}
		});
</script>
</body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</html>