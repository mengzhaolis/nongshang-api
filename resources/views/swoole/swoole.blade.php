<div id="test">
  <a href="javascript:void(0)">运行websocket</a>
</div>
<script type="text/javascript" src="/H-ui.admin/H-ui/lib/jquery/1.9.1/jquery.min.js"></script>
<script>
$('#test').click(function(){ 
  if("WebSocket" in window){ 
  console.log("您的浏览器支持websocket\n"); 
  var ws = new WebSocket("ws://127.0.0.1:9502");//创建websocket对象
  ws.onopen = function(){ 
    ws.send("连接已建立\n"); ws.send($("#content").attr("js-sid")); console.log("数据发送中"); 
  } 
    ws.onmessage= function(evt)
    { 
      var recv_msg = evt.data; console.log("接受到的数据为:"+recv_msg); 
    } 
    ws.onerror = function(evt,e)
    { 
      console.log("错误信息为"+e);
    } 
ws.onclose = function(){ 
    console.log("连接已关闭"); 
  } }else
  { 
    console.log("您的浏览器不支持websocket\n"); 
  } });
</script>