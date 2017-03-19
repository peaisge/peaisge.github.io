<?php
    session_start();
    $API_key = AIzaSyAo2khzYz_-UH7axF6npJSeV6Elcv_nmN0;
?>
<!DOCTYPE html>

<div id="container">
    <br/>
    <div class="btn-group btn-group-justified" id="mesboutons" role="group" aria-label="menu">
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
<script src="http://maps.google.com/maps/api/js?key=<?php echo $API_key ?>"></script>
<script src="js/plan2.js"></script>

