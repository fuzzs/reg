<?php


?>
<script>
    $.ajaxSetup({
        scriptCharset: "iso-8859-1",
        cache: false
    });
    
    var art = new Article();
    
    $(function()
    {
        
        $('#slider').movingBoxes({
            startPanel: 2,
            wrap: false
        })
        
        
        //$('#article01').hide(1000);
        //$('#articleList').animate({left: '-=200'}, 2000);
        
        
        
        $('#articleListHandle').click(function(){
            art.showArticleList();
        });
        
        art.getArticleList(1);
   
    });
    
    
    
</script>

<div class="menuContainer" >
    <ul id="slider" >
        <li>Account</li>
        <li>Articles</li>
        <li>Dossiers</li>
        <li>ETc.</li>
    </ul>
   
</div> 

<div class="artBase">
    <div id="articleHeaderHolder" class="artHeaderHolder">
        <div id="articleListHandle" class="artListHandle"></div>
    </div>

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
</div>


<div id="debug"></div>



<!--<div id="mm01" class="menuItemSmall">Account</div>
    <div id="mm02" class="menuItemLarge">Articles</div>
    <div id="mm03" class="menuItemSmall">Dossiers</div>
    <div id="mm04" class="menuItemSmall">ETc.</div>-->