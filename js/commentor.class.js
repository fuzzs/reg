/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function Commentor()
{
    this.buildCommentBox();
    
}

Commentor.prototype.showCommentBox = function()
{
    
}

Commentor.prototype.buildCommentBox = function()
{
    $("#comments").append("<div id=\"artComment\">comment!</div>");
}