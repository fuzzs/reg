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
        <title><?= $pageTitle ?></title>
        <link rel="stylesheet" href="/css/humanity/jquery-ui-1.9.2.custom.css" type="text/css">
        <link rel="stylesheet" href="/css/public.css" type="text/css">
        <link rel="stylesheet" href="/css/movingboxes.css" type="text/css">
        <script src="/js/jquery-1.8.3.js"></script>
        <script src="/js/jquery-ui-1.9.2.custom.js"></script>
        <script src="/js/common.js"></script>
        <script src="/js/article.class.js"></script>
        <script src="/js/artselector.class.js"></script>
        <script src="/js/commentor.class.js"></script>
        <script src="/js/jquery.movingboxes.js"></script>
    </head>
<body>
    <div class="regloHeader">
        <div class="regloTitle"></div>
        <span style="font-size: 10px;"><a href="http://reglo.local/index.php/logincontroller/logoff/" id="baseDisconnect">Disconnect</a></span>
    </div>
    <div class="regloMenuBar">
        <div class="regloMenu">
            <div class="regloMenuItem">Profile</div>
            <div class="regloMenuItem">Articles</div>
            <div class="regloMenuItem">Dossiers</div>
            <div class="regloMenuItem">Organisations</div>
        </div>
        
        <div class="regloContextMenu" id="menuContext">
        </div>
    </div>
    <div class="regloSubMenuBar" id="subMenu">
        
    </div>
    
    <div class="regloContent" id="content">
