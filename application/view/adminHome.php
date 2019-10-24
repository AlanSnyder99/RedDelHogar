<?php

 if (!isset($_SESSION["login"])) {
     header("location:/login");
}

$idUsuario=$data;

$rol = $_SESSION['rol'];



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
    <link rel="stylesheet" href="../application/resources/css/style.css">
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
    <a class="navbar-brand">Red Del Hogar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
       
        <?php
                        if($rol=='administradorTotal'){
                    echo "<li>";
                    echo "<a class='nav-link' href='/sucursales/adminSucursales'>Sucursales</a>";
                    echo "</li>";    
                    }
        ?>

         <?php
                        if($rol=='administradorTotal'){
                    echo "<li>";
                    echo " <a class='nav-link' href='/main/adminNovedades'>Novedades</a>";
                    echo "</li>";    
                    }
        ?>
         <li>
          <a class="nav-link" href="/main/adminUsuarios">Usuarios</a>
        </li>
        <li >
        <a class="nav-link" href="/login/cerrarsesion">Cerrar Sesion </a>
        </li>
      </ul>
    </div>
  </nav>

  <!--================ Showcase section ===================-->
<br><br><br>

  <!--================== Features section =====================-->
  <div id="features">

          <div class="container">
            <div class="row">
              <div class="col-sm bottom-space">
                    <div class="feature-box" style="cursor: pointer;" onclick="window.location='/main/adminNovedades';">
                        <i class="fa fa-address-card fa-5x fa-icon-image"></i>
                        <h3 class="heading-tertiary u-margin-bottom-small">
                          Agregar Novedad

                        </h3>
                      
                    </div>
              </div>
              <div class="col-sm bottom-space">
                    <div class="feature-box" id="dos" style="cursor: pointer;" onclick="window.location='/main/adminUsuarios';">
                        <i class="fa fa-black-tie fa-5x fa-icon-image" ></i>
                        <h3 class="heading-tertiary u-margin-bottom-small">Agregar Usuario</h3>
                       
                    </div>
              </div>
              <div class="col-sm bottom-space">
                    <div class="feature-box" id="tres" style="cursor: pointer;" onclick="window.location='/main/sumateALaRed';">
                        <i class="fa fa-at fa-5x fa-icon-image"></i>
                        <h3 class="heading-tertiary u-margin-bottom-small" >Agregar Sucursal </h3>
                     
                     
                    </div>
              </div>
            </div>
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
