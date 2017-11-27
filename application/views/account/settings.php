<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p><strong>管理&nbsp;&gt;&nbsp;设置</strong></p>
</div>
<div id="manage-tab">
<div class="Gq">
<div class="d6"><span class="en"><span class="Jw e"><a href="/account/track">追踪</a></span></span><span class="en"><span class="Jw e"><a href="/account/message">消息</a></span></span><span class="en"><span class="Jw e"><a href="/account/report">报告</a></span></span><span class="en"><span class="Jw e"><a href="/account/photo">自定义图片</a></span></span><span class="en zl"><span class="Jw e">设置</span></span><span class="en"><span class="Jw e"><a href="/account/profile">账户</a></span></span>
</div>
</div>
</div>
<div style="overflow-x:hidden">
</div>
<div>
<form method="post" action="/account/settings" id="settingsForm">
<table width="100%" cellPadding="8" class="odtt">
<tr>
<td class="label" align="right" valign="top">邮件已阅通知：</td>
<td class="value">
<div class="setting-item">最多给我发送
    <select id="max_send" name="max_send" tabindex="1" onchange="" ondblclick="" class="">
        <option value="1">1</option>
        <option value="2">2</option>
        <option selected="selected" value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>次我的邮件被阅读的通知。</div>
<div class="vtips">超过发送次数后，对方再打开您的邮件，我们不会给你发送通知。</div>
</td>
</tr>
<tr>
<td class="label" align="right" valign="top">我的追踪记录：</td>
<td class="value">
<div class="setting-item">
    <input type="radio" name="auto_delete" value="1" id="auto_delete_yes" tabindex="2" checked="checked">
    <label for="auto_delete_yes">在</label>
    <select id="max_save" name="max_save" tabindex="3" onchange="" ondblclick="" class="">
        <option selected="selected" value="30">30</option>
        <option value="20">20</option>
        <option value="15">15</option>
        <option value="10">10</option>
        <option value="9">9</option>
        <option value="8">8</option>
        <option value="7">7</option>
        <option value="6">6</option>
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1</option>
    </select>
    <label for="auto_delete_yes">天之后自动删除我的邮件追踪记录。</label>
</div>
<div class="setting-item">
    <input type="hidden" name="max_save" value="0" id="max_save_0" disabled="true">
    <input type="radio" name="auto_delete" value="0" id="auto_delete_no" tabindex="4">
    <label for="auto_delete_no">不要自动删除，我将自行删除。</label>
</div>
</td>
</tr>
<tr>
<td class="label" align="right" valign="top">时区：</td>
<td class="value">
<select id="time_zone" name="time_zone" tabindex="5" onchange="" ondblclick="" class="">
    <option value=""></option>
    <option value="-11">GMT-11:00</option>
    <option value="-10">GMT-10:00</option>
    <option value="-9.5">GMT-09:30</option>
    <option value="-9">GMT-09:00</option>
    <option value="-8">GMT-08:00</option>
    <option value="-7">GMT-07:00</option>
    <option value="-6">GMT-06:00</option>
    <option value="-5">GMT-05:00</option>
    <option value="-4.5">GMT-04:30</option>
    <option value="-4">GMT-04:00</option>
    <option value="-3.5">GMT-03:30</option>
    <option value="-3">GMT-03:00</option>
    <option value="-2">GMT-02:00</option>
    <option value="-1">GMT-01:00</option>
    <option value="0">GMT+00:00</option>
    <option value="1">GMT+01:00</option>
    <option value="2">GMT+02:00</option>
    <option value="3">GMT+03:00</option>
    <option value="3.5">GMT+03:30</option>
    <option value="4">GMT+04:00</option>
    <option value="4.5">GMT+04:30</option>
    <option value="5">GMT+05:00</option>
    <option value="5.5">GMT+05:30</option>
    <option value="6">GMT+06:00</option>
    <option value="6.5">GMT+06:30</option>
    <option value="7">GMT+07:00</option>
    <option value="8">GMT+08:00</option>
    <option value="9">GMT+09:00</option>
    <option value="9.5">GMT+09:30</option>
    <option value="10">GMT+10:00</option>
    <option value="11">GMT+11:00</option>
    <option value="11.5">GMT+11:30</option>
    <option value="12">GMT+12:00</option>
    <option value="13">GMT+13:00</option>
    <option value="14">GMT+14:00</option>
</select>
</td>
</tr>
<tr>
<td>
<input type="hidden" name="action" value="save">
</td>
<td class="value">
<input id="btn-submit" type="submit" class="btn_submit" value="保存设置" tabindex="6">
</td>
</tr>
</table>
<input type="hidden" name="__csrf__" value="11fcec211817204067d026c4c87c5e94_bc1cf8a374044eed39021e53c123ebe8" />
</form>
</div>
</div>
<script type="text/javascript">
if ($("#auto_delete_yes").is(':checked')) {
$("#max_save").attr('disabled', false);
$("#max_save_0").attr('disabled', true);
} else {
$("#max_save").attr('disabled', true);
$("#max_save_0").attr('disabled', false);
}

$("input[name='auto_delete']").click(function() {
if ($("#auto_delete_yes").is(':checked')) {
$("#max_save").attr('disabled', false);
$("#max_save_0").attr('disabled', true);
} else {
$("#max_save").attr('disabled', true);
$("#max_save_0").attr('disabled', false);
}

});
var tz = (new Date().getTimezoneOffset() / 60) * (-1);
$("#time_zone").val(tz);
</script>
</td>
<td id="ads_td" style='vertical-align:top;padding-top:80px;'>
<div id="ads">
<div style="margin-bottom:20px;margin-left:20px;text-align:left;">
</div>
</div>
</td>
</tr>
</table>
</div>