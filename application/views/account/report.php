<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p><strong>管理&nbsp;&gt;&nbsp;报告</strong></p>
</div>
<div id="manage-tab">
<div class="Gq">
    <div class="d6">
    <span class="en"><span class="Jw e"><a href="/account/track">追踪</a></span></span>
    <span class="en"><span class="Jw e"><a href="/account/message">消息</a></span></span>
    <span class="en zl"><span class="Jw e">报告</span></span>
    <span class="en"><span class="Jw e"><a href="/account/photo">自定义图片</a></span></span>
    <span class="en"><span class="Jw e"><a href="/account/settings">设置</a></span></span>
    <span class="en"><span class="Jw e"><a href="/account/profile">账户</a></span></span>
    </div>
</div>
</div>
<p class="success-message-box" id="s_m_b" style="display:none;"><span class="success-message"></span></p>
<div class="grid-section">

<div style="margin-top:10px;">
    <form action="/account/report" method="get">
                    <input class="basic-input" type="text" value="" name="q" style="width:50%;background-image:url(http://static.ifread.com/images/search.png);background-repeat:no-repeat;padding-left:18px;background-position:center left;" placeholder="搜索...">
    </form>
</div>

<form action="" id="actform" method="post">

<table class="grid">
<thead>
    <tr>
    <th class="check-box">
    <input id="_checkall_" type="checkbox" onclick="checkall(this)">
    </th>
    <th class="subject">邮件主题</th>
    <th class='send-date'>追踪开始日期</th>
    <th class='read-count'>阅读次数</th>
    <th class='action'></th>
    </tr>
</thead>
<tbody>
<?php foreach ($records as $item):?>
    <tr class="t-r">
    <td><input type="checkbox" name="id[]" value="<?php echo $item['id']; ?>"></td>
    <td class="subject" onclick="trackdetail('<?php echo $item['id']; ?>')"><a href="/account/report?action=viewdetail&id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></td>
    <td class='send-date' onclick="trackdetail('<?php echo $item['id']; ?>')"><?php echo $item['create_time']; ?></td>
    <td class='read-count' onclick="trackdetail('<?php echo $item['id']; ?>')"><?php echo $item['count']; ?></td>
    <td class='action'><a href="/account/report?action=pause&id=<?php echo $item['id']; ?>" title="暂停追踪">
    <img src="/images/pause.png" alt="暂停追踪" border='0'></a></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>

<div class="grid-footer">
<div class="grid-actionbar">
<input type="button" id="btn_del_2" value="删除" class="action-button btn-disabled" onclick="deleterp()" disabled="true">
</div>
<div class="grid-pagination">共 <span class="pagination-total-row">1</span> 条记录 1/1 页 </div>
</div>
</form>

<p style="text-align:center;">您目前没有邮件追踪记录。只有在登录状态下生成追踪图片才会在此显示您的记录。</p>
</form>
</div>
</div>
<script type="text/javascript">
$(':checkbox[name="id[]"]').click(function() {
if ($(this).attr('checked')) {
$("#btn_del_1").attr('disabled', false).removeClass('btn-disabled');
$("#btn_del_2").attr('disabled', false).removeClass('btn-disabled');
} else {
$("#_checkall_").attr('checked', false);
var n = $(':checkbox[name="id[]"]:checked').length;
if (n > 0) {
    $("#btn_del_1").attr('disabled', false).removeClass('btn-disabled');
    $("#btn_del_2").attr('disabled', false).removeClass('btn-disabled');
} else {
    $("#btn_del_1").attr('disabled', true).addClass('btn-disabled');
    $("#btn_del_2").attr('disabled', true).addClass('btn-disabled');
}
}
});

var tid = 0;

function hideMessageAfter30s() {
if (tid != 0) {
clearTimeout(tid);
}
tid = setTimeout(function() { jQuery('#s_m_b').hide(); }, 30000);
}

function checkall(elem) {
$(":checkbox[name='id[]']").each(function(i, e) {
e.checked = elem.checked;
});
if (elem.checked) {
$("#btn_del_1").attr('disabled', false).removeClass('btn-disabled');
$("#btn_del_2").attr('disabled', false).removeClass('btn-disabled');
} else {
$("#btn_del_1").attr('disabled', true).addClass('btn-disabled');
$("#btn_del_2").attr('disabled', true).addClass('btn-disabled');
}
}

function trackdetail(id) {
window.location.href = '/account/report?action=viewdetail&id=' + id;
}

var dlg = dui.Dialog();
dlg.set({
title: "确定删除吗？",
content: "删除之后，您所发的邮件不再被追踪。原先邮件中插入的追踪图片会被1×1像素的透明图片取代，收件人不会再看到。",
buttons: [{ text: "确定", method: function() { dlg.close();
    delete_submit(); } }, { text: "取消", method: function() { dlg.close(); } }],
width: 400
});

$('.c-tooltip').tooltip({
showURL: false,
showBody: "^"
});

function deleterp() {
dlg.open();
dlg.update();
}

function delete_submit() {
var options = {
dataType: 'json',
success: function(data) {
    $("#btn_del_1").attr('disabled', true).addClass('btn-disabled');
    $("#btn_del_2").attr('disabled', true).addClass('btn-disabled');
    $(":checkbox[name='id[]']:checked").each(function() {
                    $(this).parents('tr.t-r').remove();
    });
    if (data.data == '1') {
                    $('#s_m_b span').html('该记录已被删除。');
    } else {
                    $('#s_m_b span').html(data.data + '条记录已被删除。');
    }
    $('#s_m_b').show();
    hideMessageAfter30s();
},
url: '/account/report?action=delete&ajax=1'
};
$('#actform').ajaxSubmit(options);
}
</script>
</td>
<td id="ads_td" style='vertical-align:top;padding-top:80px;'>
</td>
</tr>
</table>
</div>