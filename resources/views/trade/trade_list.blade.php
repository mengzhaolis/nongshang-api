@include('common._meta')
<title>栏目管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	商品管理
	<span class="c-gray en">&gt;</span>
	商品列表
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="80">ID</th>
					<!-- <th width="80">排序</th> -->
					<th>商品名称</th>
					<th>商品图片</th>
					<th>商品分类</th>
					<th>重量</th>
					<th>价格</th>
					<th>商品类型</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $data)
					<tr class="text-c">
						<td>{{$data->id}}</td>
						<input type="hidden" id="token" value="{{csrf_token()}}">
						<!-- <td>1</td> -->
						<td class="text">{{$data->goods_name}}</td>
						<td class="text"><img src="{{$data->goods_path}}" width="120px" height="90px"></td>
						@if($data->type_id == 1)
							<td class="text">精品香瓜</td>
						@endif
						@if($data->type_id == 2)
							<td class="text">羊角脆</td>
						@endif
						<td class="text">{{$data->zhongliang}}/斤</td>
						<td class="text">{{$data->price}}/元</td>
						@if($data->goods_type == 1)
							<td class="text">最新单品</td>
						@endif
						@if($data->type_id == 2)
							<td class="text">旺季热销</td>
						@endif
						@if($data->goods_type == 0)
							<td class="text">全部</td>
						@endif
						<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','system-category-add.html','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="下架" href="javascript:;" onclick="sold_out(this,'{{$data->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe641;</i></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@include('common._footer');
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-删除*/
function sold_out(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		var token = $('#token').val();
		$.ajax({
			type: 'POST',
			url: '/trade/trade-old',
			data: {'_token':token,'id':id},
			success: function(data){
				// console.log(data)
				$(obj).parents("tr").remove();
				layer.msg('已下架!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
</script>
</body>
</html>