<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
<p><strong>注册</strong></p>
</div>
<div>
<form method="post" action="/account/register" id="registerForm">
<div class="item">
    <label>邮箱</label>
    <input id="account" class="basic-input" type="text" value="" tabindex="1" maxlength="60" name="account">
</div>
<div class="item">
    <label>密码</label>
    <input id="password" class="basic-input" type="password" value="" tabindex="2" maxlength="40" name="password">
</div>
<div class="item">
    <label>确认密码</label>
    <input id="confirm_password" class="basic-input" type="password" value="" tabindex="3" maxlength="40" name="confirm_password">
</div>
<div class="item">
    <label>&nbsp;</label>
    <p class="agreement">
    <input type="checkbox" tabindex="4" name="agree" id="agree" checked>
    <label class="agreement-label" for="agree">我已经认真阅读并同意《<a href="/agreement" target="_blank">使用协议</a>》。</label>
    </p>
</div>
<div class="item">
    <label>&nbsp;</label>
    <input id="btn-submit" type="submit" class="btn_submit" value="注册" title="阅读并同意《使用协议》方可注册" tabindex="5">
</div>
<input type="hidden" name="<?php echo $name;?>" value="<?php echo $hash;?>" />
</form>

<p class="p4lr">已经拥有帐号？ &nbsp;<a href="/account/login">直接登录 »</a></p>
</div>
</div>
<script type="text/javascript">
if ($("#agree").is(':checked')) {
$("#btn-submit").attr('disabled', false).removeClass('disabled');
} else {
$("#btn-submit").attr('disabled', true).addClass('disabled');
}

$("#agree").click(function() {
if ($("#agree").is(':checked')) {
$("#btn-submit").attr('disabled', false).removeClass('disabled');
} else {
$("#btn-submit").attr('disabled', true).addClass('disabled');
}

});

jQuery.validator.addMethod("regex", function(value, element, params) {
return this.optional(element) || params.test(value);
}, "Please enter a valid value");

$("#registerForm").validate({
rules: {
account: {
    required: true,
    email: true
},
password: {
    required: true,
    minlength: 6,
    regex: /^\w+$/
},
confirm_password: {
    required: true,
    equalTo: "#password"
}
},
messages: {
account: {
    required: "Email不能为空",
    email: "Email格式不正确"
},
password: {
    required: "密码不能为空",
    minlength: "密码长度不足6个字符",
    regex: "请使用英文字母、数字或下划线"
},
confirm_password: {
    required: "确认密码不能为空",
    equalTo: "密码与确认密码不一致"
}
},
tips: {
account: "用来登录，接收到激活邮件才能完成注册",
password: "字母、数字或下划线，最短6个字符，区分大小写"
},
onkeyup: false,
highlight: false,
unhighlight: false,
focusInvalid: false
});
</script>
</td>
<td id="ads_td" style='vertical-align:top;;'>
</td>
</tr>
</table>
</div>