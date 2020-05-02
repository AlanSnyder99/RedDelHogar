<?php

 if (!isset($_SESSION["login"])) {
     header("location:/login");
}

$idUsuario=$data;

$rol = $_SESSION['rol'];

$servicio = new Model_Servicios();

$result1 = $servicio->temas();





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

 <script src="https://cdn.tiny.cloud/1/n9djy4yvoizpg7ai1r8skyo5b7fjrcyhduxeq8btvbm077tl/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>



    


  </head>
  <body>

<nav class="navbar navbar-expand-lg fixed-top activate-menu navbar-light bg-light">
    <!--<a class="navbar-brand mu-logo" href="index.html"><img class="logo" href="index.html" src="imgs/logo2.png" alt="logo"></a>-->
        <a class="navbar-brand" href="#"><img style="height: 30px; width: 200px;" src="../application/resources/img/RDHPNG.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
       
        <?php
                        if($rol=='administradorTotal'){
                    echo "<li>";
                    echo "<a class='nav-link' href='/main/adminSucursales'>Sucursales</a>";
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
<br>
<div class="container">
    <div class="row">
<div class="col-md-12">
<h2>Agregar Novedad
</h2>
</div>
</div>
</div>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">


        <form method="POST" action="/main/grabarNovedad" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
                <h5 for="inputUserName" class="control-label">Titulo:</h5>
                <input type="text" class="form-control" id="inputUserName" name="titulo"  required>
                <small id="emailnotification" class="form-text text-muted">Necesario</small>
            </div>
            <div class="form-group">
                <h5 for="inputUserName" class="control-label">Subtitulo:</h5>
                <input type="text" class="form-control" id="inputUserName" name="subtitulo" >
                <small id="emailnotification" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <h5 for="inputUserName" class="control-label">Descripcion:</h5>
                <input type="text" class="form-control" id="inputUserName" name="descripcion">
            </div>
             <div class="form-group">
                <h5 for="inputUserName" class="control-label">Desarrollo:</h5>
                <textarea class="form-control" id="inputUserName" name="desarrollo"></textarea>
               
            </div>
            <div class="form-group">
                <h5 for="inputPassword" class="control-label">Fecha:</h5>
                <input type="text" class="form-control" id="inputPassword" name="fecha" required>
                <small id="emailnotification" class="form-text text-muted">Necesario</small>
            </div>
            <div class="form-group">
                <h5 for="inputUserName" class="control-label">Fecha Calendario:</h5>

                <input type="datetime" class="form-control" value="<?php echo $data2  ?>" id="inputUserName" name="fechaCalendario" required>
                <small id="calendar" class="form-text text-muted">Necesario </small>
            </div>

            </div>
            <div class="form-group">
              <h5 for="comment">Tema:</h5>
               <select class="form-control" required name="tema">
               <?php if(mysqli_num_rows($result1) >= 1){
   while($temas = mysqli_fetch_assoc($result1)){ 
    echo " <option>".$temas['idTemas']."-".$temas['tema']."</option>";
  }
}
    ?>
                </select>
                 <small id="emailnotification" class="form-text text-muted">Necesario </small>
            </div>
      

              <div class="form-group">
              <h5 for="comment">Imagen:</h5>
              <input  name="imagen" type="file" required >
              <small id="emailnotification" class="form-text text-muted">Necesario </small>
               </div>
            
            
            <button type="submit" class="btn btn-primary">Cargar</button>
        </form>

    </div>
</div></div>
</div>
    


<br><br>

<div class="container">
    <div class="row">
<div class="col-md-12">
<h2>Lista Novedades
</h2>
</div>
</div>
</div>
<br><br>
<div class="container">
  
        <ul class="list-group list-group-flush">

 <?php
 if(mysqli_num_rows($data) >= 1){
   while($novedades = mysqli_fetch_assoc($data)){
 
 echo "
          
  <li class='list-group-item'>
<div class='col-md d-flex flex-md-row flex-column align-self-center text-md-left'>
    <img class='rounded mx-left d-block' style='width:25%' src='../application/resources/upload/".$novedades['bannerImg']."' />
    <a href='/main/verNovedad?idNovedad=".$novedades['idNovedades']."' style='text-decoration:none'>
<div class='ccm-block-page-list-page-entry-text' style='margin-left: 10px;'>
  <h3>".$novedades['titulo']."</h3>
<p>".$novedades['descripcion']."</p>
</div>
</a>
  </li>
<br>

          ";
        }
                }
                
?>
</ul>
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
