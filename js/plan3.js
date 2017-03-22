function afficheCarte() {
    var latlng = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
      zoom: 4,
      center: latlng
    });
    var marker = new google.maps.Marker({
      position: latlng,
      map: map
    });
}
jQuery("#mesboutons .btn").click(function(){
        jQuery("#mesboutons .btn").removeClass('active');
        jQuery(this).toggleClass('active'); 
});