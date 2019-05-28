/*------------setup de la map------------*/
var map = L.map("map", {
    gestureHandling: true
});
map.scrollWheelZoom.disable();

// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var osmAttrib='Map data © OpenStreetMap contributors';
var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
//vue de base de la carte
map.setView([47.0, 3.0], 6)
map.addLayer(osm);
//initalisation d'un tableau pours les markers
let markers = [];
