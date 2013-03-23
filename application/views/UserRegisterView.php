<?php

?>
<script language="javascript">
$(function()
{
    $('#frmLoginBtn').click(function(){
        loginPost($('#frmRegisterName').val(), $('#frmRegisterEmail').val());
        //this.disabled = true;
    });

    $('.landing').focus(function(){
        this.parentElement.children[0].style.display = "none";
    });

    $('.landing').blur(function(){
        this.parentElement.children[0].style.display = "";
                
    });
});
</script>

<div>
    Register
    
    <div>
        <div class="" style="">
            <label class="fieldAndLabel">
                <span class="formLabelInField">Screen name</span>
                <input class="landing loginemail" id="frmRegisterName" type="text" size="30" />
            </label>
            <label class="fieldAndLabel">
                <span class="formLabelInField">Email address</span>
                <input class="landing" id="frmRegisterEmail" type="text" size="30" />
            </label>
            <label class="fieldAndLabel">
                <span class="formLabelInField">Password</span>
                <input class="landing loginpassword" id="frmRegisterPassword" type="text" size="30" />
            </label>
        </div>
        <div class="fieldSeparator">
            <input class="loginButton" id="frmLoginBtn" type="button" value="Register">
            
        </div>
        <div id="frmLoginMessage"></div>
        <div style="height: 100%; bottom: 0px; background-color: #ffffff; padding-top: 100%"> </div>
        <div class="landingLoginFrameShadow"></div>
    </div>
</div>