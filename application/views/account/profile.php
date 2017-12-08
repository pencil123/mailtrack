<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p><strong>管理&nbsp;&gt;&nbsp;账户</strong></p>
</div>
<div id="manage-tab">
<div class="Gq">
<div class="d6">
<span class="en"><span class="Jw e"><a href="/account/track">追踪</a></span></span>
<!-- <span class="en"><span class="Jw e"><a href="/account/message">消息</a></span></span> -->
<span class="en"><span class="Jw e"><a href="/account/report">报告</a></span></span>
<!-- <span class="en"><span class="Jw e"><a href="/account/photo">自定义图片</a></span></span>
<span class="en"><span class="Jw e"><a href="/account/settings">设置</a></span></span> -->
<span class="en zl"><span class="Jw e">账户</span></span>
</div>
</div>
</div>

<?php if($passwdchanged): ?>
<p class="success-message-box"><span class="success-message">您的密码已更改。</span></p>
<script type="text/javascript">setTimeout(function(){jQuery('.success-message-box').hide();},30000);</script>
<?php endif;?>

<div style="overflow-x:hidden">
</div>
<div>
<table width="100%" cellPadding="8" class="odtt">
<tr>
<td class="label" width="30%" align="right">邮箱：</td>
<td class="value"><?php echo $mail;?></td>
</tr>
<tr>
<td class="label" align="right">密码：</td>
<td class="value"><a href="/account/editpassword" class="ua">更改</a></td>
</tr>
<tr>
<td class="label" align="right">&nbsp;</td>
<td class="value">&nbsp;</td>
</tr>
<tr>
<td class="label" align="right"></td>
<td class="value"><a class="btn_submit" href="/account/upgrade">升级至 Pro</a></td>
</tr>
</table>
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