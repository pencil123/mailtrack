<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
<div id="intro">
                <p><strong>登录Alien</strong></p>
</div>
<div>
<form method="post" action="/account/login" id="loginForm">
<div class="item">
        <label>帐号</label>
        <input id="account" class="basic-input" type="text" value="" tabindex="1" maxlength="60" name="account" placeholder="邮箱">
</div>
<div class="item">
        <label>密码</label>
        <input id="password" class="basic-input" type="password" value="" tabindex="2" maxlength="40" name="password">
</div>
<div class="item">
        <label>&nbsp;</label>
        <p class="remember">
        <input type="checkbox" tabindex="3" name="remember" id="remember">
        <label class="remember-label" for="remember">下次自动登录</label>&nbsp;|&nbsp;<a href="/account/forgotpassword">忘记密码了</a></p>
</div>
<div class="item">
        <label>&nbsp;</label>
        <input id="btn-submit" type="submit" class="btn_submit" value="登录" tabindex="4">
</div>
        <input type="hidden" name="__csrf__" value="d15a5de428595f63358a6d37f4dc0c38_203c653851378a25ebb0bb2b814fcc10" />
                </form>
        <p class="p4lr">还没有阅否帐号？&nbsp;<a href="/account/register">立即注册 »</a></p>
</div>
</div>
<script type="text/javascript">
$("#loginForm").validate({
rules: {
        account: {
        required: true,
        email: true
        },
        password: "required"
},
messages: {
        account: {
        required: "帐号不能为空",
        email: "帐号格式不正确，应为Email地址"
        },
        password: "密码不能为空"
},
tips: {
        account: "您注册阅否时所用的邮箱"
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