/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Article()
{
    var articleID;
    
}

Article.prototype.setArticleID = function (articleID)
{
    this.articleID = articleID;
}

Article.prototype.getArticleList = function (page)
{
    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getarticlelist/" + page + "/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleList').html(data);
        //$('#articleContainer').append(data);
        Article.prototype.bindEvent();
    });
}

Article.prototype.bindEvent = function()
{
    $('.artListItemArr').click(function(){
        Article.prototype.showArticleDetail(this.id.substr(10));
    });
}
   
Article.prototype.showArticleList = function ()
{
    $('#articleContainer').hide("fade", {}, 200, function(){
        $('.artListItem').show("slide", {}, 1000);
    });        
}
    
Article.prototype.showArticleDetail = function (articleID)
{
    $('.artListItem').hide("slide", {}, 1000, Article.prototype.showArticleDetailCallback);
    
    this.articleID = articleID;

    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getarticle/" + articleID + "/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleContainer').html(data);
        //$('#articleContainer').append(data);
    });

    //showArticleDetailMenu(articleID);
    // http://reglo.local/ajax.php/article/getarticle/

}
    
Article.prototype.showArticleDetailCallback = function()
    {
        $('#articleContainer').show("fade", {}, 200);
        
        $('#articleMenuComments').unbind("click");
        $('#articleMenuComments').click(function(){
           Article.prototype.showArticleComments(); 
        });
        
        $('#articleCommentorBtn').unbind("click");
        $('#articleCommentorBtn').click(function(){
           Article.prototype.postArticleComment();
        });
    }
    
Article.prototype.showArticleDetailMenu = function()
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
    
Article.prototype.showArticleComments = function()
{
    $('#articleCommentHolder').show();

    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/getarticlecomments/" + this.articleID + "/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#articleCommentHolder').html(data);
    });
}
    
Article.prototype.postArticleComment = function()
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
            this.showArticleComments(this.articleID);
            //$('#articleContainer').append(data);
        }
    });
}