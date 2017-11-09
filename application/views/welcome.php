<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
            <p>外星人可以为您提供：</p>
            <ul>
            <li style="background-position:0 0;">知道对方在何时何地查看过您的邮件。</li>
            <li style="background-position:0 -36px;">如果对方在特定时间内没有查看您的邮件，您将收到通知提醒。</li>
            </ul>
            <div style="overflow-x:hidden">
            </div>
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
                            <input type="hidden" name="__csrf__" value="6666cd76f96956469e7be39d750cc7d9_26c41c873d60354b7b962ea504dfb4e3" />
            </form>
</div>

</div>
</td>
<td id="ads_td" style="vertical-align:top">
<div id="ads">

<!-- 300*600 -->
<ins class="adsbygoogle" style="display:inline-block;width:300px;height:600px" data-ad-client="ca-pub-4787637541434336" data-ad-slot="8830150056"></ins>
</div>
</td>
</tr>
</table>
</div>