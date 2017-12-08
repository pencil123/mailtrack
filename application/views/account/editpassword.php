<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" style="vertical-align:top;">
<div id="content">
    <div id="intro">
        <p><strong>管理&nbsp;&gt;&nbsp;账户&nbsp;&gt;&nbsp;更改密码</strong></p>
    </div>
    <div id="manage-tab">
        <div class="Gq">
            <div class="d6">
            <span class="en"><span class="Jw e"><a href="/account/track">追踪</a></span></span>
<!--             <span class="en"><span class="Jw e"><a href="/account/message">消息</a></span></span> -->
            <span class="en"><span class="Jw e"><a href="/account/report">报告</a></span></span>
<!--             <span class="en"><span class="Jw e"><a href="/account/photo">自定义图片</a></span></span>
            <span class="en"><span class="Jw e"><a href="/account/settings">设置</a></span></span> -->
            <span class="en zl"><span class="Jw e">账户</span></span>
            </div>
        </div>
    </div>
    <div style="overflow-x:hidden">
    </div>
    <div>
        <form method="post" action="/account/editpassword" id="epForm">
        <?php if($wrongpasswd):?>
            <div class='item'>
                <lable> </lable>
                <p class="error-message">当前密码不正确，请重新输入。</p>
            </div>
        <?php endif;?>
            <div class="item">
                <label>当前密码</label>
                <input id="oldpassword" class="basic-input" type="password" value="" tabindex="1" maxlength="40" name="oldpassword">
            </div>
            <div class="item">
                <label>新密码</label>
                <input id="password" class="basic-input" type="password" value="" tabindex="2" maxlength="40" name="password">
            </div>
            <div class="item">
                <label>确认新密码</label>
                <input id="confirm_password" class="basic-input" type="password" value="" tabindex="3" maxlength="40" name="confirm_password">
            </div>
            <div class="item">
                <label>&nbsp;</label>
                <input id="btn-submit" type="submit" class="btn_submit" value="更改密码" tabindex="4">
                <input id="btn-cancel" type="button" class="btn_cancel" value="取消" tabindex="5" onclick="window.location.href='/account/profile';">
            </div>
            <input type="hidden" name="<?php echo $name;?>" value="<?php echo $hash;?>" />
        </form>
    </div>
</div>
<script type="text/javascript">
jQuery.validator.addMethod("regex", function(value, element, params) {
    return this.optional(element) || params.test(value);
}, "Please enter a valid value");

$("#epForm").validate({
    rules: {
        oldpassword: 'required',
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
        oldpassword: "当前密码不能为空",
        password: {
            required: "密码不能为空",
            minlength: "密码长度不足6个字符",
            regex: "请使用英文字母、数字或下划线"
        },
        confirm_password: {
            required: "确认新密码不能为空",
            equalTo: "新密码与确认新密码不一致"
        }
    },
    tips: {
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
<div id="ads"></div>
</td>
</tr>
</table>
</div>