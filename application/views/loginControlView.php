<?php

?>

<script language="javascript">
$(function()
{
    $('#frmLoginBtn').click(function(){
        loginPost($('#frmLoginEmail').val(), $('#frmLoginPassword').val());
        this.disabled = true;
    });
});
</script>
    <div class="landingLoginFrame">
        <div class="defaultText">Already a member</div>
        <div class="fieldSeparator">
            <span class="formLabel">Email address: </span>
            <input class="landing" id="frmLoginEmail" type="text" size="20" />
        </div>
        <div class="fieldSeparator">
            <span class="formLabel">Password: </span>
            <input class="landing" id="frmLoginPassword" type="text" size="20" />
        </div>
        <div class="fieldSeparator">
            <input class="loginButton" id="frmLoginBtn" type="button" value="Log in">
            
        </div>
    </div>