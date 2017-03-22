<?php
session_start();
$API_key = "AIzaSyAo2khzYz_-UH7axF6npJSeV6Elcv_nmN0";
?>
<!DOCTYPE html>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<div id="container">
    <br/>
    <b style="font-size: large">Le plan du site </b>
    <button type="button" class="btn btn-default" aria-label="Left Align" onclick="geolocaliserMap()" style="float:right">
        Ma position <i class="fa fa-location-arrow" aria-hidden="true"></i>
    </button>
</div>
<br>
<div id="map-canvas"></div>
<script src="js/plan.js"></script>
<script async defer src="http://maps.google.com/maps/api/js?key=<?php echo $API_key?>&callback=afficheCarte"></script>
