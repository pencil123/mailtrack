<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p><strong>管理&nbsp;&gt;&nbsp;追踪</strong></p>
</div>
<div id="manage-tab">
<div class="Gq">
<div class="d6"><span class="en zl"><span class="Jw e">追踪</span></span><span class="en"><span class="Jw e"><a href="/account/message">消息</a></span></span><span class="en"><span class="Jw e"><a href="/account/report">报告</a></span></span><span class="en"><span class="Jw e"><a href="/account/photo">自定义图片</a></span></span><span class="en"><span class="Jw e"><a href="/account/settings">设置</a></span></span><span class="en"><span class="Jw e"><a href="/account/profile">账户</a></span></span>
</div>
</div>
</div>
<div style="overflow-x:hidden">
</div>
<div>
<form id="trackForm" method="post" action="/track/send">
<div class="item">
<label>邮箱</label>
<input id="email" class="basic-input" type="text" value="public@publicmail.cn" tabindex="1" maxlength="60" name="email" autocomplete="off" placeholder="您的邮箱地址" style="width:260px;">
</div>
<div class="item">
<label>邮件主题</label>
<input id="subject" class="basic-input" type="text" value="" tabindex="2" maxlength="160" name="subject" autocomplete="off" style="width:260px;">
</div>
<div class="item img-item">
<label>图片<span id="image_tooltip" class="help-tooltip" title="^阅否会按您选择的图片生成追踪图片，您只需把追踪图片插入到您的邮件内容中即可。如果您不想收件人看到您在邮件中插入有图片，您可选择1×1像素透明图片。"></span></label><span class="image-select-area"><img src="/images/cleardot.gif" id="selected_image" style="display:none;"><span id="selected_image_text"></span>&nbsp;
<a href="#" class="image-select" id="imgsel">请选择</a></span>
<input type="hidden" name="image" value="" id="hidden_image">
</div>
<div class="item">
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
</div>
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
<input type="hidden" name="__csrf__" value="4d8986f9df0342662a54b5be58ef8868_b93b4cd4b8416da410a654357f92e21b" />
</form>
</div>
</div>
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