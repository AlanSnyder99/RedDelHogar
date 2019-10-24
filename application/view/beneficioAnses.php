<?php 
$servicio = new Model_Servicios();

$result = $servicio->localidades();

$result2 = $servicio->provincias();

$result3 = $servicio->zonas();

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
        <link rel="stylesheet" href="../application/resources/css/style_Anses.css">
    <link rel="stylesheet" href="../application/resources/css/font-awesome.min.css">
    <link rel="stylesheet" href="../application/resources/css/magnific-popup.css">
    <link rel="stylesheet" href="../application/resources/css/cubeportfolio.min.css">
    <link rel="stylesheet" type="text/css" href="../application/resources/css/component.css" />
        <!-- Slick slider -->
    <link  rel="stylesheet" href="../application/resources/css/slick.css">
    <link  rel="stylesheet" href="../application/resources/css/slick-theme.css">


    

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

<br><br>

<div id="features">
     <div class="text-center features-caption features">
                <h1>BENEFICIO ANSES</h1>
                <div class="container" > 
  <br>
                 <img class="bannerEmpresa" style="width:90%" src="../application/resources/img/GENERAL_WEB.jpg" />
                  <p>
                    10% de descuento en productos seleccionados, con un tope de reintegro de $1000 por transacción, todos los días lunes. Sólo con pago débito.

El reintegro se realiza en tu cuenta y el dinero se acredita dentro de los 7 días hábiles de la compra.
                  </p>
                  
     </div>
<br><br>


<div class="container">

<form method="POST" action="/main/tablaSucursales">
  <strong>Provincia</strong> <select class="select"  name="provincia"><option></option><?php if(mysqli_num_rows($result2) >= 1){
   while($provincias = mysqli_fetch_assoc($result2)){ 
    echo " <option>".$provincias['provincia']."</option>";
  }
}
    ?></select>
  <strong>Localidad</strong><select class="select" name="localidad"><option></option><?php if(mysqli_num_rows($result) >= 1){
   while($localidades = mysqli_fetch_assoc($result)){ 
    echo " <option>".$localidades['localidad']."</option>";
  }
}
    ?></select>
  <strong>Zona</strong><select class="select" name="zona"><option></option><?php if(mysqli_num_rows($result3) >= 1){
   while($zonas = mysqli_fetch_assoc($result3)){ 
    echo " <option>".$zonas['zona']."</option>";
  }
}
    ?></select>
     <button type="submit" class="btn">Buscar</button>
  <br><br>
</form>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Comercio</th>
      <th scope="col">Domicilio</th>
      <th scope="col">Localidad</th>
      <th scope="col">Provincia</th>
      <th scope="col">Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php
     if(mysqli_num_rows($data) >= 1){
   while($sucursales = mysqli_fetch_assoc($data)){
   echo " <tr>
      <th scope='row'>".$sucursales['nombre']."</th>
      <td>".$sucursales['domicilio']."</td>
      <td>".$sucursales['localidad']."</td>
      <td>".$sucursales['provincia']."</td>
      <td>".$sucursales['telefono']."</td>
    </tr>"; 
    }
}
        ?>
  </tbody>
</table>
</div>

<br><br><br>











</div>    
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
