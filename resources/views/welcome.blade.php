@include('common._meta')
<title>中研世纪-后台首页</title>
<meta name="keywords" content="中研世纪-后台首页">
<meta name="description" content="中研世纪-后台首页">
</head>
<body>
@include('common._header')
@include('common._menu')

<audio style="display:none" controls="controls" id="player">
    <source src="/ling.mp3" type="audio/ogg" />
    Your browser does not support the audio element.
</audio>

<div class="dislpayArrow hidden-xs">
    <a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                    <em></em>
                </li>
            </ul>
            <input type="hidden" id="token" value="{{csrf_token()}}">
            
        </div>
        <div class="Hui-tabNav-more btn-group">
            <a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d4;</i>
            </a>
            <a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d7;</i>
            </a>
        </div>
        
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <input type="hidden" id="email" value="<?php echo session('email') ?>">
            <iframe scrolling="yes" frameborder="0" src="{{url('/welcome')}}"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>
@include('common._footer');
</body>
<script>
$(function(){

    nums()

})
var ref ='';
ref = setInterval(function(){
    nums();
},60*60*1000);
function nums()
{
    var email = $("#email").val();
    // alert(email)
    var token = $("#token").val();
    var url ="/nums";
    var data ={'_token':token,'email':email};
    $.post(url,data,function(data){
        if(data['nums']!=0)
        {
            // alert(1)
            var player = $("#player")[0]; /*jquery对象转换成js对象*/
            
                player.play(); /*播放*/
           
            // $('#player').attr('autoplay','autoplay');
            $('.nums').html(data['nums']);
            $('.role_name').html(data['role_name']);
            $('.name').html(data['name']);
        }else
        {
            $('.role_name').html(data['role_name']);
            $('.name').html(data['name']);
        }
        
        
    })
}
</script>
</html>