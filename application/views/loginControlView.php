<?php

?>

<script language="javascript">
$(function()
{
    $('#frmLoginBtn').click(function(){
        loginPost($('#frmLoginEmail').val(), $('#frmLoginPassword').val());
        //this.disabled = true;
    });
});
</script>
    <div class="landingLoginFrame">
        <div class="" style="display: inline-block">
        <div class="fieldAndLabel">
            <div class="formLabel">Email address</div><input class="landing" id="frmLoginEmail" type="text" size="20" />
        </div>
        <div class="fieldAndLabel">
            <div class="formLabel">Password</div><input class="landing" id="frmLoginPassword" type="text" size="20" />
        </div>
        </div>
        <div class="fieldSeparator">
            <input class="loginButton" id="frmLoginBtn" type="button" value="Log in">
            
        </div>
        <div id="frmLoginMessage"></div>
    </div>