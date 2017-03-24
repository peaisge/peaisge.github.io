var watchId;
var map;

var infowindowStatique = new google.maps.InfoWindow({
                                            content: "<b>Le lieu du mariage</b>"
                                            });

var infowindowMobile = new google.maps.InfoWindow({
                                            content: "<b>Votre position</b>"
                                            });

window.addEventListener('load', function(){
    new FastClick(document.body);
}, false);
            
function afficheCarte(){
    navigator.geolocation.getCurrentPosition(onSuccessStatique, onError, {
                                    maximumAge: 10000, timeout: 300000, enableHighAccuracy: true
                                });
    google.maps.event.addDomListener(window, 'load', onSuccessStatique); 
}

function geolocaliserMap(){
    watchId = navigator.geolocation.watchPosition(onSuccessMobile, onError, {
                                    maximumAge: 10000, timeout: 300000, enableHighAccuracy: true
                                });
}

function recentrerMap(){
    navigator.geolocation.getCurrentPosition(onSuccessRecentrer, onError, {
                                    maximumAge: 10000, timeout: 300000, enableHighAccuracy: true
                                });
}

function arretGeolocalisation(){
    navigator.geolocation.clearWatch(watchId);
}

function onSuccessStatique(){
    var lat = 48.858565;
    var lng = 2.347198;
    
    //Google Maps
    var myLatlng = new google.maps.LatLng(lat,lng);
    var mapOptions = {zoom: 16, center: myLatlng};
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var marker = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map,
                                        title : "Lieu du mariage"
                                        });
    marker.addListener('click', function() {
                       infowindowStatique.open(map, marker);
                       });
}

function onSuccessRecentrer(){
    var lat = 48.858565;
    var lng = 2.347198;
    var myLatlng = new google.maps.LatLng(lat,lng);
    map.panTo(myLatlng);
    var marker = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map,
                                        title : "Lieu du mariage"
                                        });
    marker.addListener('click', function() {
                       infowindowStatique.open(map, marker);
                       });
}

function onSuccessMobile(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var myLatlng = new google.maps.LatLng(lat, lng);
    map.panTo(myLatlng);
    var marker = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map,
                                        title : "Ma position"
                                        });
    marker.addListener('click', function() {
                       infowindowMobile.open(map, marker);
                       });
    arretGeolocalisation();
}

function onError(error) {
    switch(error.code){
        case error.PERMISSION_DENIED:
            alert("L'utilisateur n'a pas autorisé l'accès à sa position");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("L'emplacement de l'utilisateur n'a pas pu être déterminé");
            break;
        case error.TIMEOUT:
            alert("Le service n'a pas répondu à temps");
            break;
        case error.UNKNOWN_ERROR:
            alert("Erreur inconnue");
            break;
    }
}




