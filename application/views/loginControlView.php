<?php

?>

<script language="javascript">
$(function()
{
    $('#frmLoginBtn').click(function(){
        loginPost($('#frmLoginEmail').val(), $('#frmLoginPassword').val());
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

    <div class="landingLoginFrame">
        <div style="height: 60px; background-color: #ffffff;"></div>
        <div class="landingLoginFrameHeader">
            <div class="landingLoginFrameAM">Already a member</div>
            <div class="landingLoginFrameRG">Register</div>
        </div>
        
        <div class="landingLoginFrameFB">
            <div class="landingLoginFBBtn">
                Login with Facebook
            </div>
        </div>
        <div class="landingLoginOR">
            OR
        </div>
        <div class="" style="">
            <label class="fieldAndLabel">
                <span class="formLabelInField">Email address</span>
                <input class="landing loginemail" id="frmLoginEmail" type="text" size="30" />
            </label>
            <label class="fieldAndLabel">
                <span class="formLabelInField">Password</span>
                <input class="landing loginpassword" id="frmLoginPassword" type="text" size="30" />
            </label>
        </div>
        <div class="fieldSeparator">
            <input class="loginButton" id="frmLoginBtn" type="button" value="Log in">
            
        </div>
        <div id="frmLoginMessage"></div>
        <div style="height: 100%; bottom: 0px; background-color: #ffffff; padding-top: 100%"> </div>
        <div class="landingLoginFrameShadow"></div>
    </div>
    
    