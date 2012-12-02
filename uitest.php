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
        <link rel="css/humanity/jquery-ui-1.9.2.custom.css">
        <script src="js/jquery-1.8.3.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.js"></script>
    </head>
    <script>
        $(function()
        {
            $("#artTextBox").selectable();
        });
    </script>
    <body>
        <div id="artBox" style="width: 500px; height: 300px; border: #fa0 solid 1px; padding: 1px">
            <div id="artTitleBox" style="width: 100%; height: 35px; background-color: #fa0; border: #ffffff solid 0px;">
                <div id="artDate" style="font: 10px Arial; vertical-align: middle; margin-left: 5px">jeudi à 18:50</div>
                <div id="artTitle" style="font: 16px Arial; vertical-align: middle; margin-left: 5px">Titre de l'article</div>
            </div>
            <div id="artTextBox" style="width: content-box; height: content-box; margin: 10px; border: #fa0 solid 1px;">
                Ceci est un texte qui peut être sélectionné
                
            </div>
        </div>
        
    </body>
</html>