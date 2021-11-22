var mapa_id = $('#mapa');
L.mapbox.accessToken = 'pk.eyJ1IjoibWFjaXQiLCJhIjoiY2t2dHV0MGw3MHF3czJ2cHBncm0xczZzNCJ9.zkSrJ-MRihKSwzVBGdIEKg';
if (mapa_id.length > 0) {
    var $lat = parseFloat(mapa_id.data('lat')),
    $lng = parseFloat(mapa_id.data('lng')),
    $zoom = mapa_id.data('zoom'),
    $maptitle = mapa_id.data('maptitle'),
    $mapaddress = mapa_id.data('mapaddress'), 
    mimapa = L.mapbox.map('mapa').setView([$lat, $lng],$zoom).addLayer(L.mapbox.styleLayer('mapbox://styles/macit/ckvtsxwmt0mqj14p8jvio1zpa')); 
    L.mapbox.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}',{
        attribution: 'Map',
        titleSize:'512',
        maxZoom: 15,
        zoomOffset:-1,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoibWFjaXQiLCJhIjoiY2t2dHV0MGw3MHF3czJ2cHBncm0xczZzNCJ9.zkSrJ-MRihKSwzVBGdIEKg'
    }).addTo(mimapa);
    var marker = L.marker([$lat,$lng]).addTo(mimapa);
    marker.bindPopup('<b>'+$maptitle+'</b><br>'+$mapaddress).openPopup();
    mimapa.scrollWheelZoom.disable();
}