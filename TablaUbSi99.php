<?php
if (!isset ($_COOKIE[ini_get('session.name')])){
    session_start();
}/*
$self = $_SERVER['PHP_SELF'] ;//Obtenemos la página en la que nos encontramos
header("refresh:60;url=$self");
*/?>
<!DOCTYPE html>
<html>
<head>
  <link href="css/Estilo.css" rel="stylesheet" type="text/css"/>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-1.11.1.min.js" type="text/javascript"></script> 
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBj63YpYW3PHaDhIWfShYTdyyPqT7CDeKE"
            type="text/javascript"></script>
 <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
  <title>Si99</title>
                  <header>
             <h2>Tabla Ubicaciones Bahias Si99</h2>
                  <nav id="nav">
                     <a href="#" id="btnExport" style="width:50px;height:50px"> <img src="imagenes/reportes.png" ></a>
                     <a id="map1" href="#"  onclick="inicializaGoogleMaps()" style="width:50px;height:50px"> <img src="imagenes/maps.png" style="width:50px;height:50px" ></a>
                     <a href="cerrar.php" Id="current-page-item" style="width:50px;height:50px"><img src="imagenes/logout.png" ></a>
                       </nav>
                           </header>
                                </head>                         
 <br>
 <body>
  <div id="wrapper">
 </div>
<div id="layer">
  <div id="layerc">
    <p>Descargando Informaciòn...</p>
    <div id="layerClock"></div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  
  $("#dvData").html(function(){
    // Una vez se ha cargado el archivo, escondemos el reloj
    $("#layer").hide();
  });
});
</script>
  <script>
    $("#btnExport").click(function(e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
        e.preventDefault();
    });
    </script>

    
<style type="text/css">
body { 
  background-image: url(imagenes/Fondo.jpg);
  height: 100%; 
  margin: 0; 
  padding: 0; 
  text-align: center;
}
#layerClock {
  margin:auto;
  width:31px;height:31px;
  
background-image: url('imagenes/loading.gif');
}
table {
border-radius: 18px;
width:100%;
background:#f7fbff;
border-top:2px solid #a9cae8;
border-right:2px solid #a9cae8;
margin:1 auto;
border-collapse:collapse;

}
td {
border-radius: 18px;
color:#678197;
border-bottom:2px solid #a9cae8;
border-left:2px solid #a9cae8;
padding:.3em 1em;
text-align:center;
}

tr {
   border-radius: 18px;
  font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
  sans-serif;
  color: #6D929B;
  border-right: 2px solid #a9cae8;
  border-bottom: 2px solid #a9cae8;
  border-top: 2px solid #a9cae8;
  letter-spacing: 2px;
  text-transform: uppercase;
  text-align: left;
  padding: 6px 6px 6px 12px;
  }

th {
  width:;
  border-radius: 18px;
color:#678197;
border-bottom:2px solid #a9cae8;
border-left:2px solid #a9cae8;
padding:.3em 1em;
text-align:center;
}
#dvData {
    border-radius: 25px;
    border: 10px solid #73AD21;
    padding: 20px; 
    position: relative;
    left: 100px;
    width: 80%;
}

</style>
<body>
<div  id="dvData" >
<?php
include("Libreria-Web-Services-Syscaf-S.A.S/call_core_orgid.php");
include("Libreria-Web-Services-Syscaf-S.A.S/call_Positioning_LatestPositionPerVehicle.php");
?>
</div>
</body >
  <br>
<center>
<div id="map" style="width:800px; height:600px"></div>
<br>
<script type="text/javascript">
function inicializaGoogleMaps() {
        // Coordenadas del centro de nuestro recuadro principal
    var list=255;
    var x =4.529271320353346;
    var y = -74.12000161742401;
    var mapOptions = {
        zoom: 8,
        center: new google.maps.LatLng(x, y),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
      var map = new google.maps.Map(document.getElementById("map"),mapOptions);
     var markers = [] , i;
     for(i=0; i<list; i++) {
    latitude=[<?php echo $result_LatestPositionPerVehicle_Latitude?>];
 Longitude=[<?php echo $result_LatestPositionPerVehicle_Longitude?>];
         myLatLng = new google.maps.LatLng(latitude[i],Longitude[i]);
        markers[i]=new google.maps.Marker({
            position: myLatLng,
                     });
                markers[i].setMap(map);
            }
     }
 </script>
</center>
</div>
 <br>
 <footer>
  <br>
<h2>&copy; Desarrollado Por Syscaf S.A.S</h2>
 </footer>