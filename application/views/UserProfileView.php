<br><br>

<?php
var_dump($countryList);

var_dump($currentUser);
?>

<div>
    ProfileView
</div>

<script>
    $.ajaxSetup({
        scriptCharset: "iso-8859-1",
        cache: false
    });
    
    
    $(function()
    {
        $('#menuContext').html("<div class=\"regloContextMenuLabel\">Profile</div><div id=\"articleHeaderHolder\" class=\"artHeaderHolder\"><div id=\"articleListHandle\" class=\"regloMenuItem artListHandle\"></div><div id=\"articleEditHandle\" class=\"regloMenuItem artEditHandle\"></div></div>");
        
        //$('#article01').hide(1000);
        //$('#articleList').animate({left: '-=200'}, 2000);
        
        
        
        //usr.getSubscriberList();
    });
    
    
</script>

<div id="userProfile">
    <div id="userCreation">
    </div>
</div>
