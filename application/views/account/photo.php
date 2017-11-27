<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p><strong>管理&nbsp;&gt;&nbsp;自定义图片</strong></p>
</div>
<div id="manage-tab">
<div class="Gq">
<div class="d6"><span class="en"><span class="Jw e"><a href="/account/track">追踪</a></span></span><span class="en"><span class="Jw e"><a href="/account/message">消息</a></span></span><span class="en"><span class="Jw e"><a href="/account/report">报告</a></span></span><span class="en zl"><span class="Jw e">自定义图片</span></span><span class="en"><span class="Jw e"><a href="/account/settings">设置</a></span></span><span class="en"><span class="Jw e"><a href="/account/profile">账户</a></span></span>
</div>
</div>
</div>
<div>
<p style="text-align:center;">您目前没有自定义图片。</p>
<div class="upload-section">
<p>您还可以上传 10 张图片。图片必须是jpg，jpeg， gif或png格式，大小不能超过256KB。</p>
<form method="post" action="/account/photo" enctype="multipart/form-data"><span>选择图片：</span>
<input type="file" name="photo">
<p>
<input type="submit" class="btn_submit" value="开始上传">
</p>
<input type="hidden" name="__csrf__" value="d241ac0f2cc6f9c2bdb1feab16001ac5_d43588766150ce89e051572819d0ff22" />
</form>
</div>
</div>
</div>
<script type="text/javascript">
var loc;
var dlg = dui.Dialog();
dlg.set({
title: "确定删除该图片吗？",
content: "删除之后，您不能再用该图片作为追踪图片。但不会对之前插入了该图片的邮件造成影响，收件人在邮件中仍然能看到这张图片。",
buttons: [{
text: "确定",
method: function() {
dlg.close();
window.location.href = loc;
}
}, { text: "取消", method: function() { dlg.close(); } }],
width: 400
});

$('.r-l a').click(function(e) {
e.preventDefault();
loc = $(this).attr('href');
dlg.open();
dlg.update();
});

$('.img-tooltip').tooltip({
showURL: false,
bodyHandler: function() {
return $("<img/>").attr("src", $(this).attr('id'));
}
});
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