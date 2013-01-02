<?php


?>
<script>
    $.ajaxSetup({
        scriptCharset: "iso-8859-1",
        cache: false
    });
    
    
    $(function()
    {
        $('#menuContext').html("<div id=\"articleHeaderHolder\" class=\"artHeaderHolder\"><div id=\"articleListHandle\" class=\"regloMenuItem artListHandle\"></div><div id=\"articleEditHandle\" class=\"regloMenuItem artEditHandle\"></div></div>");
        
        //$('#article01').hide(1000);
        //$('#articleList').animate({left: '-=200'}, 2000);
        
        
        $('#articleListHandle').click(function(){
            art.changeViewState("list", false);
        });
        
        $('#articleEditHandle').click(function(){
            art.getEditArticleForm();
        });
        
        art.getArticleList(1);
    });
    
    
    
</script>


<div class="artBase">

    <div id="articleList" class="artList">
<!--        <div id="article01" class="artListItem">
            <div id="articleArr01" class="artListItemArr"></div>
            <div class="artListItemTitle">CEci est un titre d'article test</div>
            <div class="artListItemAuthor">Auteur Nom</div>
            <div class="artListItemDate">mercredi, 24 janvier 2013</div>
        </div>
        <div id="article02" class="artListItem">
            <div id="articleArr02" class="artListItemArr"></div>
            <div class="artListItemTitle">CEci est un titre d'article test 2</div>
            <div class="artListItemAuthor">Auteur Nom</div>
            <div class="artListItemDate">mercredi, 26 janvier 2013</div>
        </div>-->
    </div>

    <div id="articleContainer" class="artContainer">

    </div>
    <div id="articleCommentHolder" class="artCommentHolders">
        
    </div>
    
    <div id="articleEditHolder" class="">
        
    </div>
</div>


<div id="debug"></div>



<!--<div id="mm01" class="menuItemSmall">Account</div>
    <div id="mm02" class="menuItemLarge">Articles</div>
    <div id="mm03" class="menuItemSmall">Dossiers</div>
    <div id="mm04" class="menuItemSmall">ETc.</div>-->