var infowindow = new google.maps.InfoWindow({
                                            content: "<b>centre de la carte</b>"
                                            });

window.addEventListener('load', function(){
    new FastClick(document.body);
}, false);
            
$(window).on('hashchange', route);

function afficheCarte(){
    var mapId = navigator.geolocation.watchPosition(onSuccess, onError, {
                                    maximumAge: 10000, timeout: 300000, enableHighAccuracy: true
                                });
    google.maps.event.addDomListener(window, 'load', onSuccess);
}

function onSuccess(position) {
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
                       infowindow.open(map, marker);
                       });
    $.get('functions.php', function(data){
        
    });
}

function onError(error) {
    alert('code: ' + error.code + '\n' +
          'message: ' + error.message + '\n');
}

function route(){
    var page, hash = window.location.hash;
    switch(hash){
        case "#carte-site":
            $.get('js/templates.html', function(templates){
                window.onload = afficheCarte();
                page = $(templates).filter('#tpl-carte-site').html();
                $('#container').html(page);
            }, 'html');
            break;
            
        case "#carte-geoloc":
            $.get('js/templates.html', function(templates){
                window.onload = afficheCarte();
                page = $(templates).filter('#tpl-carte-geoloc').html();
                $('#container').html(page);
            }, 'html');
            break;
        
        case "#reglages":
            $('#map-canvas').html("");
            $.get('js/templates.html', function(templates){
                page = $(templates).filter('#tpl-reglages').html();
                $('#container').html(page);
            }, 'html');
            break;
            
        case "#profil":
            $('#map-canvas').html("");
            $.get('js/templates.html', function(templates){
                page = $(templates).filter('#tpl-profil').html();
                $('#container').html(page);
            }, 'html');
            break;
            
        case "#add-friends-event":
            $.getJSON("http://www.enseignement.polytechnique.fr/informatique/INF471T/php/categoriesAchats.php", function(achats) {
                $.get('js/templates.html', function(templates) {
                    var template = $(templates).filter('#tpl-add-friends-event').html();
                    page = Mustache.render(template, achats);
                    document.getElementById("container").innerHTML = page;
                }, 'html');
            });
            break;
           
        default:
            $.get('js/templates.html', function(templates){
                window.onload = afficheCarte();
                page = $(templates).filter('#tpl-carte-site').html();
                $('#container').html(page);
            }, 'html');
            break;
    }
}
route();




