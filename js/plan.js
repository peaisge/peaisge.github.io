var watchId;

var infowindowStatique = new google.maps.InfoWindow({
                                            content: "<b>Le lieu du mariage</b>"
                                            });

var infowindowMobile = new google.maps.InfoWindow({
                                            content: "<b>Votre position</b>"
                                            });

window.addEventListener('load', function(){
    new FastClick(document.body);
}, false);
            
$(window).on('hashchange', route);

function afficheCarteStatique(){
    var mapId = navigator.geolocation.getCurrentPosition(onSuccessStatique, onError, {
                                    maximumAge: 10000, timeout: 300000, enableHighAccuracy: true
                                });
    google.maps.event.addDomListener(window, 'load', onSuccessStatique); 
}

function afficheCarteMobile(){
    watchId = navigator.geolocation.watchPosition(onSuccessMobile, onError, {
                                    maximumAge: 10000, timeout: 300000, enableHighAccuracy: true
                                });
    google.maps.event.addDomListener(window, 'load', onSuccessMobile);
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
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var marker = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map,
                                        title : "Centre"
                                        });
    marker.addListener('click', function() {
                       infowindowStatique.open(map, marker);
                       });
}

function onSuccessMobile(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    
    //Google Maps
    var myLatlng = new google.maps.LatLng(lat,lng);
    var mapOptions = {zoom: 16, center: myLatlng};
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var marker = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map,
                                        title : "Centre"
                                        });
    marker.addListener('click', function() {
                       infowindowMobile.open(map, marker);
                       });
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
    }
}

function route(){
    var page, hash = window.location.hash;
    switch(hash){
        case "#carte-site":
            window.onload = afficheCarteStatique();
            break;
            
        case "#carte-geoloc":
            window.onload = afficheCarteMobile();
            break;
        
        case "#destroy-geoloc":
            window.onload = arretGeolocalisation();
            break;
            
        //case "#reglages":
        //    $('#map-canvas').html("");
        //    $.get('js/templates.html', function(templates){
        //        page = $(templates).filter('#tpl-reglages').html();
        //        $('#container').html(page);
        //    }, 'html');
        //    break;
            
        //case "#profil":
        //   $('#map-canvas').html("");
        //    $.get('js/templates.html', function(templates){
        //        page = $(templates).filter('#tpl-profil').html();
        //        $('#container').html(page);
        //    }, 'html');
        //    break;
           
        default:
            window.onload = afficheCarteStatique();
            break;
    }
}
route();

jQuery("#mesboutons .btn").click(function(){
        jQuery("#mesboutons .btn").removeClass('active');
        jQuery(this).toggleClass('active'); 
});




