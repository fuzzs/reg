<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
    <head>
        <link rel="/css/humanity/jquery-ui-1.9.2.custom.css">
        <script src="/js/jquery-1.8.3.js"></script>
        <script src="/js/jquery-ui-1.9.2.custom.js"></script>
        <style>
            .selectBox {
                position: absolute;
                background-color: #9999ff;
                display: none;
                height: 30px;
                width: 100px;
                left: 1px;
                top: 1px;
                opacity: 0.5;
                filter:alpha(opacity=50);
            }
            
            .selection {
                background-color: #9999ff;
                color: #ffffff;
            }
            
        </style>
    </head>
    <script>
        $(function()
        {
            $("#artTextBox").selectable({
               start: function(event, ui){
                   startTextSelection(event, ui);
               }
            });
            
        });
        
        function startTextSelection(event, ui)
        {
            var ho = $("#artSelectBox");
            //ho.show("fast");
            var left = $("#artTextBoxContent").offset().left;
            //$(function() {window.alert("hoho")});
            //$("#artSelectBox").css("left", left)
            $("#artSelectBox").css("left", left);
            $("#artSelectBox").css("top", $("#artTextBoxContent").offset().top);
            //$("#debug").text($(event.currentTarget));
            var currCar = findLetterOver(event.clientX, event.clientY);
           
           
            var article =  $("#artTextBoxContent");
            var text = article.text().trim();
            var newText = "<span class=\"selection\">" + text.substring(0, currCar) + "</span>" + text.substring(currCar);
            article.html(newText);
        }
        
        function findLetterOver(clientX, clientY)
        {
            var artText = $("#artTextBoxContent")
            var textWidth = artText.width();
            var textHeight = artText.height();
            var nbCar = artText.text().length;
            
            var posInStr = clientX - artText.offset().left;
            var currCar = posInStr / (textWidth / nbCar);
            $("#debug").text(textWidth + " " + nbCar + " " + posInStr + " " + currCar);
            
            return Math.floor(currCar);
        }
        
    </script>
    <body>
        <div id="artBox" style="width: 500px; height: 300px; border: #fa0 solid 1px; padding: 1px">
            <div id="artTitleBox" style="width: 100%; height: 35px; background-color: #fa0; border: #ffffff solid 0px;">
                <div id="artDate" style="font: 10px Arial; vertical-align: middle; margin-left: 5px">jeudi à 18:50</div>
                <div id="artTitle" style="font: 16px Arial; vertical-align: middle; margin-left: 5px">Titre de l'article</div>
            </div>
            <div id="artTextBox" style="width: content-box; height: content-box; margin: 10px; border: #fa0 solid 1px;">
                <span id="artTextBoxContent">Bacon ipsum dolor sit amet shank chicken beef ribs short ribs tail beef pastrami t-bone ground round. Meatball pastrami pork strip steak, doner drumstick t-bone fatback. Turkey hamburger tri-tip, ball tip capicola spare ribs pork. Turkey swine filet mignon ground round hamburger, sausage shank. Shank tongue beef shankle, bacon turducken cow flank rump ham. T-bone turducken strip steak jowl ball tip, corned beef brisket boudin chuck cow shoulder ham tri-tip.</span>
                
            </div>
        </div>
        
        
        <div id="artSelectBox" class="selectBox"></div>
        
        
        <div id="debug">test</div>
    </body>
</html>