function initialize() {
  var latlng = new google.maps.LatLng(43.0685834,141.348829);/*表示したい場所の経度、緯度*/
  var myOptions = {
    zoom: 15, /*拡大比率*/
    center: latlng, /*表示枠内の中心点*/
    mapTypeId: google.maps.MapTypeId.ROADMAP/*表示タイプの指定*/
  };
  var map = new google.maps.Map(document.getElementById('gmap_ct'), myOptions);
/*スタイルのカスタマイズ*/
 var styleOptions =
[
 {
 "featureType": "landscape.natural",
 "stylers": [
 { "color": "#90c892" }
 ]
 },{
 "featureType": "road",
 "stylers": [
 { "gamma": 2.61 },
 { "color": "#ffffff" }
 ]
 },{
 "featureType": "transit.line",
 "stylers": [
 { "invert_lightness": true },
 { "visibility": "simplified" },
 { "color": "#ffbe00" }
 ]
 },{
 "elementType": "labels.icon",
 "stylers": [
 { "visibility": "off" }
 ]
 },{
 "featureType": "landscape.man_made",
 "elementType": "geometry",
 "stylers": [
 { "visibility": "simplified" },
 { "color": "#ffce5f" }
 ]
 },{
 "featureType": "poi",
 "elementType": "geometry",
 "stylers": [
 { "color": "#ffde5b" }
 ]
 },{
 "featureType": "water",
 "stylers": [
 { "color": "#dfe8ff" }
 ]
 },{
 "featureType": "transit.station",
 "elementType": "geometry",
 "stylers": [
 { "color": "#fab022" }
 ]
 }
];
 
 var styledMapOptions = { name: 'あーと・とー' }
 var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
 map.mapTypes.set('sample', sampleType);
 map.setMapTypeId('sample');
 
/*オリジナルアイコンの取得*/
var icon = new google.maps.MarkerImage('/xxxxxx.png',/*アイコンの場所*/
 new google.maps.Size(44,44),/*アイコンのサイズ*/
 new google.maps.Point(0,0)/*アイコンの位置*/
);
 
/*マーカーの設置*/
var markerOptions = {
 position: latlng,/*表示場所と同じ位置に設置*/
 map: map,
 icon: icon,
 title: 'ここです'/*マーカーのtitle*/
};
var marker = new google.maps.Marker(markerOptions);
}