/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Article()
{
    var articleID;
    var articleViewState; // supports states: list, detail, edit
    var currTargetState;
    var toSelf;
    
    return Article;
}

Article.setSelf = function (article)
{
    this.toSelf = article;
}

Article.changeViewState = function (targetState, isCallback)
{
    if (art.articleViewState != targetState && targetState != "")
    {
        art.currTargetState = targetState;
        
        if (art.articleViewState == "list" && targetState == "detail")
        {
            if (isCallback)
            {
                art.articleViewState = targetState;
                art.currTargetState = "";
                art.showArticleDetail();
            }
            else
            {
                art.hideArticleList();
            }
        }
        else if (art.articleViewState == "list" && targetState == "edit")
        {
            if (isCallback)
            {
                art.articleViewState = targetState;
                art.currTargetState = "";
                art.showArticleEdit();
            }
            else
            {
                art.hideArticleList();
            }
        }
        else if (art.articleViewState == "detail" && targetState == "list")
        {
            if (isCallback)
            {
                art.articleViewState = targetState;
                art.currTargetState = "";
                art.showArticleList();
            }
            else
            {
                art.hideArticleDetail();
            }
        }
        else if (art.articleViewState == "detail" && targetState == "edit")
        {
            if (isCallback)
            {
                art.articleViewState = targetState;
                art.currTargetState = "";
                art.showArticleEdit();
            }
            else
            {
                art.hideArticleDetail();
            }
        }
        else if (art.articleViewState == "edit" && targetState == "list")
        {
            if (isCallback)
            {
                art.articleViewState = targetState;
                art.currTargetState = "";
                art.showArticleList();
            }
            else
            {
                art.hideArticleEdit();
            }
        }
        else
        {
            art.articleViewState = "list";
            art.currTargetState = "";
        }
    }
}



Article.bindEvent = function()
{
    $('.artListItemArr').click(function(){
        art.getArticleDetail(this.id.substr(10));
    });
}
   
Article.showArticleList = function ()
{
    $('.artListItem').show("slide", {}, 1000);
}

Article.hideArticleList = function()
{
    $('.artListItem').hide("slide", {}, 1000, art.hideArticleListCallback);
}

Article.hideArticleListCallback = function()
{
    art.changeViewState(art.currTargetState, true)
}

Article.showArticleDetail = function()
{
    $('#articleContainer').show("fade", {}, 200);

    $('#articleMenuComments').unbind("click");
    $('#articleMenuComments').click(function(){
       art.getArticleComments(); 
    });
}

Article.hideArticleDetail = function()
{
    $('#articleCommentHolder').hide("fade", {}, 200);
    $('#articleContainer').hide("fade", {}, 200, art.hideArticleDetailCallback);

    $('#articleMenuComments').unbind("click");
    $('#articleCommentHolder').html("");
    
}

Article.hideArticleDetailCallback = function()
{
    art.changeViewState(art.currTargetState, true)
}

Article.showArticleEdit = function()
{
    $('#articleEditHolder').show("fade", {}, 200);
}

Article.hideArticleEdit = function()
{
    $('#articleEditHolder').hide("fade", {}, 200, art.hideArticleEditCallback);
}

Article.hideArticleEditCallback = function()
{
    art.changeViewState(art.currTargetState, true);
}

Article.getArticleList = function (page)
{   
    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getarticlelist/" + page + "/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleList').html(data);
        //$('#articleContainer').append(data);
        art.bindEvent();
        
        art.changeViewState("list", false);
    });
}
    
Article.getArticleDetail = function (articleID)
{
    this.articleID = articleID;

    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getarticle/" + articleID + "/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleContainer').html(data);
        art.changeViewState("detail", false);
        //$('#articleContainer').append(data);
    });

    //showArticleDetailMenu(articleID);
    // http://reglo.local/ajax.php/article/getarticle/

}
    
Article.getArticleDetailMenu = function()
{
    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getarticlemenu/" + this.articleID + "/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleContainer').html(data);
        //$('#articleContainer').append(data);
    })
}
    
Article.getArticleComments = function()
{
    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getarticlecomments/" + this.articleID + "/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleCommentHolder').html(data);
        $('#articleCommentHolder').show("fade", {}, 100);
        $('#articleCommentorBtn').unbind("click");
        $('#articleCommentorBtn').click(function(){
           art.postArticleComment();
        });
    });
}
    
Article.postArticleComment = function()
{
    formData = "articleID="+this.articleID+"&commentText="+ escape($('#articleCommentorText').val());
    $('#debug').append(formData);

    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/addcomment/",
        type: "post",
        data: formData,
        context: document.body,
        dataType: "html",
        success: function(data){
            $('#debug').append(data);
            art.showArticleComments();
            //$('#articleContainer').append(data);
        }
    });
}

Article.getEditArticleForm = function()
{
    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getEditArticleForm/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleEditHolder').html(data);
        art.changeViewState("edit", false);
        
        $('#frmArticlePost').unbind("click");
        $('#frmArticlePost').click(function(){
           art.postArticle(); 
        });
    });
}

Article.postArticle = function()
{
    formData = "articleTitle="+escape($('#frmArticleTitle').val())+"&articleText="+escape($('#frmArticleContent').val());
    $('#debug').append(formData);
    
    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/addarticle/",
        type: "post",
        data: formData,
        context: document.body,
        dataType: "html",
        success: function(data){
            $('#debug').append(data);
            //TODO: show success message.
            //$('#articleContainer').append(data);
        }
    });
}


var art = new Article();
