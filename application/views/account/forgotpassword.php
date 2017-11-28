<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p><strong>重设密码</strong></p>
</div>
<div>
<form method="post" action="/account/forgotpassword" id="fpForm">
<div class="item">
        <label>邮箱</label>
        <input id="account" class="basic-input" type="text" value="" tabindex="1" maxlength="60" name="account">
</div>
<div class="item">
        <label>&nbsp;</label>
        <input id="btn-submit" type="submit" class="btn_submit" value="重设密码" tabindex="2">
</div>
<input type="hidden" name="<?=$name;?>" value="<?=$hash;?>" />
</form>
<p class="p4lr"><a href="/account/login">« 返回登录</a></p>
<script type="text/javascript">
$("#fpForm").validate({
rules: {
        account: {
        required: true,
        email: true
        }
},
messages: {
account: {
        required: "Email不能为空",
        email: "Email格式不正确"
        }
},
tips: {
        account: "请输入你的Email地址"
},
onkeyup: false,
highlight: false,
unhighlight: false,
focusInvalid: false
});
</script>
</div>
</div>
</td>
<td id="ads_td" style='vertical-align:top;;'>
<div id="ads"></div>
</td>
</tr>
</table>
</div>