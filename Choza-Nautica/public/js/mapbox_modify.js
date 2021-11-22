var vMarker
var map
map = new google.maps.Map(document.getElementById('mapaModify'),{
    zoom:19,
    center:new google.maps.Lating(),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});
vMarker = new google.maps.Marker({
    position:new google.maps.Lating(),
    draggable:true
});
map.setCenter(vMarker,'dragend', function(evt){
    $().val(evt.lating.lat().tofixed(6));
    $().val(evt.lating.lat().tofixed(6));
    map.panTo(evt.lating);
});
map.setCenter(vMarker.position);
vMarker.setMapa(map);

$("#txt")