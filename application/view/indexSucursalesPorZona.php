<?php

// Include the database configuration file
$servicio = new Model_Servicios();

$idZona = $data;

$result = $servicio->listaSucursalesPorZona($idZona);

$result2 = $servicio->listaSucursalesPorZona($idZona);

$result3 = $servicio->listaSucursalesPorZona($idZona);

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="author" content="Theme Industry">
    <!-- description -->
    <meta name="description" content="boltex">
    <!-- keywords -->
    <meta name="keywords" content="">
        <title>Red Del Hogar</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="css/bootstrap3.min.css"> -->
    <link rel="stylesheet" href="../application/resources/css/style_sucursal.css">
    <link rel="stylesheet" href="../application/resources/css/font-awesome.min.css">
    <link rel="stylesheet" href="../application/resources/css/magnific-popup.css">
    <link rel="stylesheet" href="../application/resources/css/cubeportfolio.min.css">
    <link rel="stylesheet" type="text/css" href="../application/resources/css/component.css" />
        <!-- Slick slider -->
    <link  rel="stylesheet" href="../application/resources/css/slick.css">
    <link  rel="stylesheet" href="../application/resources/css/slick-theme.css">

   <style type="text/css">
      #map {
        height: 100%;
      }
    </style>

    

  </head>
  <body>
  <nav class="navbar navbar-expand-lg fixed-top activate-menu navbar-light bg-light">
    <!--<a class="navbar-brand mu-logo" href="index.html"><img class="logo" href="index.html" src="imgs/logo2.png" alt="logo"></a>-->
    <a class="navbar-brand" href="/main/index">Red Del Hogar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li >
          <a class="nav-link" href="/main/empresa">Empresa</a>
        </li>
        <li>
          <a class="nav-link" href="/main/proveedores">Proveedores</a>
        </li>
        <li>
          <a class="nav-link" href="/main/sumateALaRed">Sumate a la red</a>
        </li>
        <li>
          <a class="nav-link" href="/main/marketing">Marketing</a>
        </li>
        <li>
          <a class="nav-link" href="/sucursales/index">Sucursales</a>
        </li>
        <li>
          <a class="nav-link" href="/main/catalogos">Catalogos</a>
        </li>
        <li>
          <a class="nav-link" href="/main/novedades">Novedades</a>
        </li>
         <li>
          <a class="nav-link" href="/main/beneficioAnses">Beneficio ANSES</a>
        </li>
        <li>
          <a class="nav-link" href="/main/#contact">Contacto</a>
        </li>
      </ul>
    </div>


  </nav>


  <!--================ Map section ===================-->
  <div id="showcase">
   <div id="map"></div>
   
    <script>
      
     
      function initMap() {
        var map;
        var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.628524, lng: -58.650026},
          zoom: 7
        });

         var markers = [
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '["'.$row['descripcion'].'", '.$row['latitude'].', '.$row['longitude'].'],';
            }
        }
        ?>
    ];

    var infoWindowContent = [
        <?php if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()){ ?>
                ['<div class="info_content">' +
                '<h3><?php echo $row['nombre']; ?></h3>' +
                '<p><?php echo $row['domicilio']; ?></p>' + '</div>'],
        <?php }
        }
        ?>
    ];

     var infoWindow = new google.maps.InfoWindow(), marker, i;

     for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

 
    }



      }
   google.maps.event.addDomListener(window, 'load', initMap);
    </script>
   </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdROo0mPZr7wsA7bE9_E4c0Q8Wuh1LHf0&callback=initMap"
    async defer></script>
<br>
<div class="zonas">
  
<?php
                
                if(mysqli_num_rows($result3) >= 1){
                    while($sucursales = mysqli_fetch_assoc($result3)){
                        echo "<ul class='list-group list-group-flush'>
  <li class='list-group-item'><strong>".$sucursales['nombre']."<br>Domicilio:</strong> ".$sucursales['domicilio']."<br> <strong>Telefono:</strong> ".$sucursales['telefono']."  </li>
</ul>";
                    }
                }
                
?>


</div>

<br><br><br><br>

<div class="container">
<div class="float-sm-left "><h2>Telefono</h2><p>4483-4005/ 06/ 07</p><p>Lunes a Viernes de 09:00 a 18:00 hs</p></div>
<div class="float-sm-right"><h2>Sede</h2><p>Paunero 715, Morón Pcia. Bs. As.</p></div>
</div>

  <footer class="text-center pos-re">
    <div class="container">
      <div class="footer__box">
        <br>  <br>
        <p>&copy;  2016 Red del Hogar</p>
<p>Paunero 715, Morón.

Pcia. Buenos Aires.

4483-4005/ 06/ 07

info@reddelhogar.com.ar
</p>
<a href="#">
            <img class="dataFiscal" src="../application/resources/img/dataFiscal.jpg" alt="logo">
 </a>
      </div>
    </div>

    <div class="curve curve-top curve-center"></div>
</footer>

  <script src="../application/resources/js/jquery.min.js"></script>
  <script src="../application/resources/js/modernizr.custom.js"></script>
  <script src="../application/resources/js/bootstrap.min.js"></script>
  <script src="../application/resources/js/slick.min.js" type="text/javascript"></script>
  <script src="../application/resources/js/slick.js" type="text/javascript"></script>
  <script src="../application/resources/js/scrollreveal.min.js"></script>
  <script src="../application/resources/js/jquery.cubeportfolio.min.js"></script>
  <script src="../application/resources/js/jquery.matchHeight-min.js"></script>
  <script src="../application/resources/js/masonry.pkgd.min.js"></script>
  <script src="../application/resources/js/jquery.flexslider-min.js"></script>
  <script src="../application/resources/js/classie.js"></script>
	<script src="../application/resources/js/helper.js"></script>
  <script src="../application/resources/js/grid3d.js"></script>
  <script src="../application/resources/js/script.js"></script>


</body>
</html>
