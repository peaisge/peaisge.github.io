<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/> 
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, 
            user-scalable=no" name="viewport">
        <title>Localisation</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/perso.css"/>
        <link href="css/highlight.css" rel="stylesheet">
        <link href="css/docs.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <br/>
            <div class="btn-group btn-group-justified" role="group" aria-label="menu">
                <div class="btn-group" role="group">
                    <a href="#carte-site">
                        <button type="button" class="btn btn-default active">Plan du site</button>
                    </a>
                </div>
                <div class="btn-group" role="group">
                    <a href="#carte-geoloc">
                        <button type="button" class="btn btn-default">Où je suis</button>
                    </a>
                </div>
            </div>
        </div>
        <div id="map-canvas"></div>
        <script type="text/javascript" src="js/fastclick.js"></script>
        <script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
        <script type="text/javascript" src="js/mustache.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script><script src="js/highlight.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/plan.js"></script>
        
    </body>
</html>
