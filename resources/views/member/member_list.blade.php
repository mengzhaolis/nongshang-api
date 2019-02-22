@include('common._meta')
<title>资讯列表</title>
</head>

<body>
  <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span>
    资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
      title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
  <div class="page-container">
    <div class="text-c">
      <button onclick="chec()" class="btn btn-primary radius">人员分配</button>
      <span class="select-box inline">
        <select name="" class="select">
          <option value="">请选择人员</option>
          @foreach($sell as $sell)
            <option value="{{$sell['id']}}">{{$sell['user_name']}}</option>
          @endforeach
        </select>
      </span> 日期范围：
      <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate"
        style="width:120px;"> -
      <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate"
        style="width:120px;">
      <input type="text" name="" id="" placeholder=" 资讯名称" style="width:250px" class="input-text">
      <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i
            class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加资讯" data-href="article-add.html"
          onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></span> 
          </span>
          <span class="r">共有数据：<strong>54</strong>
        条</span> </div>
    <div class="mt-20">
      <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
        <input type="hidden" id="token" value="{{csrf_token()}}">
        <thead>
          <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="80">ID</th>
            <th width="120">标题</th>
            <th width="80">分类</th>
            <th>来源</th>
            <th width="60">发布状态</th>
            <th width="120">操作</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $data)
          <tr class="text-c">
            <td><input type="checkbox" value="{{$data['id']}}" name="check"></td>
            <td>{{$data['id']}}</td>
            <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')"
                title="查看">{{$data['member_name']}}</u></td>
            <td>{{$data['member_phone']}}</td>
            <td>{{$data['member_address']}}</td>
            <td class="td-status"><span class="label label-success radius">已发布</span></td>
            <td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;"
                title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')"
                href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5"
                onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
// 复选
function chec()
{
  var array = new Array();
  $('input[name="check"]:checked').each(function () {
    array.push($(this).val());//向数组中添加元素
  });
  // console.log(array.length)
  if(array.length==0)
  {
    layer.msg('请选择被分配对象!', { icon: 5, time: 5000 });
    return;
  }
  var idstr = array.join(',');
  var user_id = $('.select').val();
  if(user_id=='')
  {
    layer.msg('请选择负责人员!', { icon: 5, time: 5000 });
    return;
  }
  var token = $('#token').val();
  // console.log(user_id);
  layer.confirm('确定进行如下分配吗?', function(index){
    $.ajax({
      type: 'POST',
      url: '/member/user_member',
      data: {'_token':token,'user_id':user_id,'news':idstr},
      success: function (data) {
        console.log(data)
        // layer.msg('已删除!', { icon: 1, time: 1000 });
      },
      error: function (data) {
        console.log(data.msg);
      },
    });
  })
}
    /*资讯-添加*/
    function article_add(title, url, w, h) {
      var index = layer.open({
        type: 2,
        title: title,
        content: url
      });
      layer.full(index);
    }
    /*资讯-编辑*/
    function article_edit(title, url, id, w, h) {
      var index = layer.open({
        type: 2,
        title: title,
        content: url
      });
      layer.full(index);
    }
    /*资讯-删除*/
    function article_del(obj, id) {
      layer.confirm('确认要删除吗？', function (index) {
        $.ajax({
          type: 'POST',
          url: '',
          dataType: 'json',
          success: function (data) {
            $(obj).parents("tr").remove();
            layer.msg('已删除!', { icon: 1, time: 1000 });
          },
          error: function (data) {
            console.log(data.msg);
          },
        });
      });
    }

    /*资讯-审核*/
    function article_shenhe(obj, id) {
      layer.confirm('审核文章？', {
        btn: ['通过', '不通过', '取消'],
        shade: false,
        closeBtn: 0
      },
        function () {
          $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
          $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
          $(obj).remove();
          layer.msg('已发布', { icon: 6, time: 1000 });
        },
        function () {
          $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
          $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
          $(obj).remove();
          layer.msg('未通过', { icon: 5, time: 1000 });
        });
    }
    /*资讯-下架*/
    function article_stop(obj, id) {
      layer.confirm('确认要下架吗？', function (index) {
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
        $(obj).remove();
        layer.msg('已下架!', { icon: 5, time: 1000 });
      });
    }

    /*资讯-发布*/
    function article_start(obj, id) {
      layer.confirm('确认要发布吗？', function (index) {
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
        $(obj).remove();
        layer.msg('已发布!', { icon: 6, time: 1000 });
      });
    }
    /*资讯-申请上线*/
    function article_shenqing(obj, id) {
      $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
      $(obj).parents("tr").find(".td-manage").html("");
      layer.msg('已提交申请，耐心等待审核!', { icon: 1, time: 2000 });
    }

  </script>
</body>

</html>