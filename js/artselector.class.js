/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function ArtSelector()
{
    var article;
    var selHandleFrom;
    var selHandleTo;
    
    this.lastLetterPosition;
    this.lineHeight;
    
}

ArtSelector.prototype.initArticle = function (artObj)
{
    this.article = artObj;
    this.createHandles();
    this.getLastLetterPosition();
    this.getLineHeight();
}

ArtSelector.prototype.getLastLetterPosition = function()
{
    if (this.article)
    {
        text = this.article.text().trim();

        newText = text.substring(0, text.length - 1) + "<span id=\"artLastPos\">" + text.substring(text.length -1, 1) + "</span>"
        this.article.html(newText);

        artLastPosTop = $("#artLastPos").offset().top;
        artLastPosLeft = $("#artLastPos").offset().left;

        this.article.html(text); 
        this.lastLetterPosition = Object({top: artLastPosTop, left: artLastPosLeft});

        return this.lastLetterPosition;
    }
    else
    {
        return false;
    }
}

ArtSelector.prototype.createHandles = function()
{
    $("#handles").append("<div id=\"artSelectBoxHandleFrom\"><div class=\"selectHandle\"></div><div class=\"selectHandleCircle\"></div></div>");
    $("#handles").append("<div id=\"artSelectBoxHandleTo\"><div class=\"selectHandle\"></div><div class=\"selectHandleCircle\"></div></div>");
    
    this.selHandleFrom = $("#artSelectBoxHandleFrom");
    this.selHandleTo = $("#artSelectBoxHandleTo");
    
}

ArtSelector.prototype.setHandlePosition = function()
{
    this.selHandleFrom.offset({top: this.article.offset().top, left: (this.article.offset().left - 2)});

    if (this.lastLetterPosition != false)
    {
        this.selHandleTo.offset({top: this.lastLetterPosition.top, left: this.lastLetterPosition.left});
    }
}

ArtSelector.prototype.getLineHeight = function()
{
    var text = this.article.text().trim();
    var newText = "<span id=\"artHeight\">" + text.substring(0, 1) + "</span>" + text.substring(1);
    this.article.html(newText);

    this.lineHeight = $("#artHeight").height();

    this.article.html(text);

}

ArtSelector.prototype.findLetterOver = function(clientX, clientY)
{
    textWidth = this.article.width();
    textHeight = this.article.height();
    lineHeight = this.lineHeight;
    nbCar = this.article.text().length;
    nbLines = Math.floor(textHeight / lineHeight); 
    carByLine = nbCar / nbLines;

    posInStrX = clientX - this.article.offset().left;
    posInStrY = clientY - this.article.offset().top;
    currCar = (Math.ceil(posInStrY / lineHeight) - 1) * carByLine + (posInStrX / (textWidth / carByLine));
    $("#debug").text(posInStrX + " " + currCar + " " + lineHeight + " " + carByLine);

    return Math.floor(currCar);
}
