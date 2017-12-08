<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
    <td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p>外星人帮助您追踪已经发送的邮件，使用外星人您可以：</p>
<ul>
    <li style="background-position:0 0;">知道对方在何时何地查看过您的邮件。</li>
    <li style="background-position:0 -36px;">如果对方在特定时间内没有查看您的邮件，您将收到通知提醒。</li>
</ul>
    <div style="overflow-x:hidden"></div>
</div>
<div>
<form id="trackForm" method="post" action="/track/send">
<div class="item">
    <label>邮箱</label>
    <input id="email" class="basic-input" type="text" tabindex="1" maxlength="60" name="email" autocomplete="off" placeholder="您的邮箱地址" style="width:260px;">
</div>
<div class="item">
    <label>邮件主题</label>
    <input id="subject" class="basic-input" type="text" value="" tabindex="2" maxlength="160" name="subject" autocomplete="off" style="width:260px;">
</div>


<div class="item img-item">
    <label>图片<span id="image_tooltip" class="help-tooltip" title="生成追踪图片"></span></label>
    <span class="image-select-area"><img src="/images/cleardot.gif" id="selected_image" style="display:none;"><span id="selected_image_text"></span>&nbsp;
    <a href="#" class="image-select" id="imgsel">请选择</a></span>
    <input type="hidden" name="image" value="" id="hidden_image">
</div>

<!-- <div class="item">
    <label>&nbsp;</label>
    <p class="reminder-container">
    <input type="checkbox" name="reminder" id="reminder" tabindex="4" checked="checked" onclick="document.getElementById('remind_days').disabled=!this.checked;">
    <label for="reminder" class="reminder-label">如果对方在</label>&nbsp;
    <select name="remind_days" tabindex="5" id="remind_days">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected="selected">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="30">30</option>
    </select>&nbsp;
    <label for="reminder" class="reminder-label">天内没有查看邮件，通知我。</label>
    </p>
    </div> -->


<div class="item">
    <label>&nbsp;</label>
    <input type="hidden" name="time_zone" id="time_zone">
    <button id="btn-submit" type="submit" class="btn_submit" tabindex="6">开始追踪</button>
</div>


<div id="track-container">
<div id="track-help">点击上面的按钮，您会在下面看到您的邮件追踪图片。您只需复制这张图片并粘贴到邮件内容中，然后照常发送邮件即可。</div>
<div id="track-ad" style="padding-top:8px;"></div>
<p id="track-image-container"><img src="/images/cleardot.gif" id="i_f_t" style="display:none;"><span id="track-message"></span></p>
</div>

<input type="hidden" name="<?=$name;?>" value="<?=$hash;?>" />
</form>
</div>

    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/static/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/static/js/jquery.tooltip.pack.js"></script>
    <script type="text/javascript" src="/static/js/dui.dialog.js"></script>

<script type="text/javascript">
var iscleardot = false;

var tz = (new Date().getTimezoneOffset() / 60) * (-1);
$("#time_zone").val(tz);

$('#image_tooltip').tooltip({
showURL: false,
showBody: "^"
});


$('#i_f_t').tooltip({
    showURL: false,
    bodyHandler: function() {
    var t = "右键单击图片，选择“复制”（或“复制图片”），粘贴到您的邮件内容中，然后照常发送邮件即可。";
    if (iscleardot)
    return "为方便您复制图片，我们已把原本为1×1像素的透明图片放大并加上边框。复制后，您插入邮件内容中的仍然是1×1像素的透明图片。<br><br>" + t;
    else
    return t;
    }
});



//$.ajax('/track/remind', {cache: false});
$("#trackForm").validate({
ignore: "",
rules: {
    email: {required: true,email: true},
    subject: {required: true,maxlength: 100},
    image: "required"
},
messages: {
    email: {required: "Email不能为空",email: "Email格式不正确"},
    subject: {required: "邮件主题不能为空",maxlength: "邮件主题长度不能超过{0}字"},
    image: "图片不能为空"},
tips: {email: "您的邮件追踪信息将发送到此邮箱",subject: "用于标识您要追踪的邮件"},
onkeyup: false,
highlight: false,
unhighlight: false,
focusInvalid: false
});

$('#trackForm').ajaxForm({
    beforeSend: onTracking,
    success: showTrackImage,
    error: showError,
    //complete: function(xhr, status){xhr = null;},
    dataType: 'json'
});

$('#i_f_t').load(function() {
    if ($(this).is(':visible') && $(this).attr('src') != '/images/cleardot.gif') {
    $('#track-message').hide();
    $.ajax('/track/remind', { cache: false });
    }
});

function onTracking(xhr) {
    $('#track-ad').hide();
    if ($('#hidden_image').val() == 'cleardot.gif')
    iscleardot = true;
    else
    iscleardot = false;
    $('#i_f_t').attr('src', '/images/cleardot.gif').hide();
    $('#track-message').html("处理中，请稍等...").show();
}

function showTrackImage(data) {
    if (data.status == 1) {
    $('#subject').val('');
    //$('#track-message').hide();
    $('#i_f_t').attr('src', data.data).show();
    } else {
    $('#track-message').html(data.info).show();
    }
}

function showError() {
    $('#track-message').html("发生错误，请重试。").show();
}

function completeTracking() {
$.ajax('/track/remind', { cache: false });
}



var dlg = dui.Dialog();
dlg.set({
title: "选择图片",
url: '/track/selectimage',
width: 540,
cache: true,

callback: function(data, o) {
$('#l_tabs li.selected').each(function() {
    getTImages($(this));
    });

$('body').delegate('a.ti_a', 'click', function(e) {
    e.preventDefault();
    $('#l_tabs').nextAll('.loading').show();
    $("input[name='image']").val($(this).attr('name') !== undefined ? $(this).attr('name') : $(this).attr('id'));
    $('#selected_image').attr('src', '/images/t/' + $(this).attr('id')).show();
    if ($(this).attr('id') == 'cleardot.gif') {
        $('#selected_image_text').html('(1×1像素透明图片)').show();
    } else {
        $('#selected_image_text').hide();
    }
    $('#imgsel').html('重新选择');
    o.close();
    $('.img-item .validate-error').hide();
    });

$('body').delegate('#l_tabs li', 'click', function(e) {
    if ($(this).is('.selected'))
        return;
    var k = $.trim($(this).attr('id')).substring($.trim($(this).attr('id')).indexOf('_') + 1);
    var panel = '#p_' + k;
    $('#l_tabs').nextAll('.loading').show();
    getTImages($(this));
    $(this).siblings('.selected').removeClass('selected');
    $(this).addClass('selected');
    $(panel).siblings('div:not(#ads_15)').remove();
    dlg.update();
    });
}

});









function getTImages(el) {
var t = el.attr('id');
var k = $.trim(t).substring($.trim(t).indexOf('_') + 1);
var url = '/track/get' + k + 'images';
console.log(url);
var panelWrapperId = 'p_' + k;
var wrapper = $('<div></div>').insertAfter(el.parent()).attr('id', panelWrapperId);
var panel = $('<ul></ul>').appendTo(wrapper).wrapAll('<div></div>');
panel.parent().addClass('panel');

$.getJSON(url, function(r) {
    $('#l_tabs').nextAll('.loading').hide();
    if (r.status == '1') {
        $.each(r.data, function(i, timg) {
        var unit = $('<a href="#" class="ti_a"' + (timg.padding === undefined ? '' : ' style="padding:' + timg.padding + 'px;"') + (timg.title === undefined ? '' : ' title="' + timg.title + '"') + '></a>');

        if (timg.thumbname !== undefined) {
        unit.html('<img border="0" src="/images/t/' + timg.thumbname + '">').attr('id', timg.thumbname).attr('name', timg.imgname).appendTo(panel).wrapAll('<li></li>');
            if (i + 1 == r.data.length && r.data.length < 10) {
                $('<a href="/account/photo"  style="font-size:12px;vertical-align:super;"></a>').html('上传更多 »').appendTo(panel);
            }
        } else {
        var position = timg.position.split(',', 2);
        unit.html('<span class="' + timg.classname + '" style="background-position:' + position[0] + 'px ' + position[1] + 'px;">' + (timg.text === undefined ? '' : timg.text) + '</span>').attr('id', timg.imgname).appendTo(panel).wrapAll('<li></li>');
        }
        });
    } else {
    if (r.info == 'login_required') {
        $('<li class="uid-l"></li>').html('<p class="mm">要使用自定义图片，您必须先登录。</p><p class="p4lr">已经拥有外星人帐号？  &nbsp;<a  href="/account/login">直接登录 »</a></p><p class="p4lr">还没有外星人帐号？&nbsp;<a  href="/account/register">立即注册 »</a></p>').appendTo(panel);
        } else if (r.info == 'no_photo') {
            $('<li class="uid-l"></li>').html('<p class="mm">您还没有上传自定义图片。</p><p class="p4lr">您最多可以上传10张自定义图片。&nbsp;<a  href="/account/photo">马上上传 »</a></p>').appendTo(panel);
        }
    }
    dlg.update();
});
}



$('#imgsel').click(function(e) {
e.preventDefault();
$('.loading').hide();
$('#ads_15').show();
dlg.open();
console.log(dlg);
dlg.update();
});



</script>
</div>
</td>
<td id="ads_td" style="vertical-align:top">
<div id="ads">
</div>
</td>
</tr>
</table>
</div>