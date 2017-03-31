<?php
$API_key = "AIzaSyAo2khzYz_-UH7axF6npJSeV6Elcv_nmN0";
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<div id="container">
    <br/>
    <b style="font-size: large">Le plan du site </b>
    <span style="padding-right:5%">
        <button type="button" class="btn btn-default" aria-label="Left Align" onclick="recentrerMap()" style="float:right">
        Le site <i class="fa fa-map-marker" aria-hidden="true"></i>
    </span>
    </button>
    <button type="button" class="btn btn-default" aria-label="Left Align" onclick="geolocaliserMap()" style="float:right; padding-right:5px">
        Ma position <i class="fa fa-location-arrow" aria-hidden="true"></i>
    </button>
</div>
<br>
<div id="map-canvas"></div>
<script src="js/plan.js"></script>
<script async defer src="http://maps.google.com/maps/api/js?key=<?php echo $API_key?>&callback=afficheCarte"></script>

