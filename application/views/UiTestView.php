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
        <script src="/js/artselector.class.js"></script>
        <script src="/js/commentor.class.js"></script>
        <style>
            
        </style>
    </head>
    <script>
        
        
        
        $(function()
        {
            //lastLetterPosition = artSelector.getLastLetterPosition();
            
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
            var currCar = artSelector.findLetterOver(event.clientX, event.clientY);
           
           
            var article =  $("#artTextBoxContent");
            var text = article.text().trim();
            var newText = "<span class=\"selection\">" + text.substring(0, currCar) + "</span>" + text.substring(currCar);
            article.html(newText);
            
            artSelector.setHandlePosition();
        }
        
        
        
        
        
        
        
    </script>
    <body>
        <div id="artBox" style="width: 500px; height: 300px; border: #fa0 solid 1px; padding: 1px;">
            <div id="artTitleBox" style="width: 100%; height: 35px; background-color: #fa0; border: #ffffff solid 0px;">
                <div id="artDate" style="font: 10px Arial; vertical-align: middle; margin-left: 5px">jeudi à 18:50</div>
                <div id="artTitle" style="font: 16px Arial; vertical-align: middle; margin-left: 5px">Titre de l'article</div>
            </div>
            <div id="artTextBox" style="width: content-box; height: content-box; margin: 10px; border: #fa0 solid 1px;">
                <span id="artTextBoxContent">Bacon ipsum dolor sit amet beef ribs filet mignon tail, pork belly beef short ribs boudin pancetta. Frankfurter pork chop meatball pork filet mignon shoulder sausage boudin turkey prosciutto kielbasa beef biltong salami doner. Pork chop flank pork loin drumstick. Pastrami hamburger brisket tri-tip tail. Brisket hamburger pork chop corned beef.<p />
Salami kielbasa tri-tip tail, tenderloin beef ribs spare ribs capicola jowl jerky chicken pork chop pork belly. Turkey tail t-bone biltong, jerky flank swine hamburger shank bacon pancetta pork chop ham hock. Beef ribs jerky ball tip ham, salami jowl ribeye pork leberkas flank. Drumstick tail prosciutto ground round ham. Frankfurter flank shank, shankle pork loin pork sausage. Jowl tenderloin kielbasa capicola, frankfurter andouille ham hock ground round.</span>
                
            </div>
        </div>
        
        
        <div id="artSelectBox" class="selectBox"></div>
        
        <div class="commentorFrame">
            <div class="commentorTitle">
                <span>Add a comment...</span>
            </div>
            <div class="commentorText">
                <textarea class="commentorX" id="commentorx"></textarea>
            </div>
        </div>
        
        <div id="debug">test</div>
        <div id="handles"></div>
        <div id="comments"></div>
    
        
        <script>
            artSelector = new ArtSelector();
            commentor = new Commentor();
            artSelector.initArticle($("#artTextBoxContent"));
    </script>
    </body>
</html>