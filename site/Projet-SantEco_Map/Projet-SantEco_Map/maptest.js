

<script>
// Provide your access token
L.mapbox.accessToken = 'pk.eyJ1IjoiYWF1ZHJpYyIsImEiOiJjbGZndzAwb3IxYWdjM3NuemkwMTRkamJtIn0.5v3HkIpqfwb5p5IWfL4aWA';
// Create a map in the div #map
L.mapbox.map('map', 'mapbox.streets');
</script>



function getColor(d) {
    return d > 1000 ? '#800026' :
           d > 500  ? '#BD0026' :
           d > 200  ? '#E31A1C' :
           d > 100  ? '#FC4E2A' :
           d > 50   ? '#FD8D3C' :
           d > 20   ? '#FEB24C' :
           d > 10   ? '#FED976' :
                      '#FFEDA0';
}

function style(feature) {
    return {
        fillColor: getColor(feature.properties.density),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7
    };
}
function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    layer.bringToFront();
}
layer.on({
    mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: zoomToFeature
});


geojson = L.geoJson(statesData, {
style: style,
onEachFeature: onEachFeature
}).addTo(map);

var popup = L.popup()
    .setLatLng([51.513, -0.09])
    .setContent("I am a standalone popup.")
    .openOn(map);

