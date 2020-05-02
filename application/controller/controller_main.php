<?php

include 'application/model/model_servicios.php';

class Controller_Main extends Controller{
    
    function index(){
        $servicio = new Model_Servicios();
        $novedades = $servicio->ultimasNovedadesIndex();
        $novedadesSector = $servicio->ultimasNovedadesSectorIndex();        
        $this->view->generateSt('index.php',$novedades, $novedadesSector);
    }

    function empresa(){
        $this->view->generateSt('empresa.php');
    }

    function proveedores(){
        $this->view->generateSt('proveedores.php');
    }

    function emailProveedores(){
    	$servicio = new Model_Servicios();
        $titulo = "Contacto Proveedor";
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
      	$web = $_POST['web'];
        $mensaje = $_POST['mensaje'];

        if($nombre == null && $email == null && $web == null && $mensaje == null ) {
                $this->view->generateSt('proveedores.php');
        } else {
            $txt = "<strong>Nombre: ".$nombre."</strong><br><strong>Email: ".$email."</strong><br><strong>Web: ".$web."</strong><br><br>".$mensaje."";

        $servicio->enviarEmail($titulo,$txt,$nombre);
             echo'<script type="text/javascript">
    alert("Consulta enviada con Exito!");
    </script>';
        $this->view->generateSt('proveedores.php');
        };

        $this->view->generateSt('proveedores.php');
    }

       function emailSumateRed(){
        $servicio = new Model_Servicios();
        $titulo = "Contacto Sumate A La Red";
        $nombre = $_POST['nombre'];
        $nombreComercio = $_POST['nombreDelComercio'];
        $cuit = $_POST['cuit'];
        $direccion = $_POST['direccion'];
        $localidad = $_POST['localidad'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];

        if($nombre == null && $nombreComercio == null && $cuit == null && $direccion == null && $localidad == null && $email == null && $mensaje == null && $telefono == null ) {
                $this->view->generateSt('sumateALaRed.php');
        } else {
            $txt = "<strong>".$asunto."</strong><br><br><strong>Nombre: </strong> ".$nombre."<br><strong>Nombre del comercio: </strong> ".$nombreComercio."<br><strong>Cuit: </strong> ".$cuit."<br><strong>Direccion: </strong> ".$direccion."<br><strong>Localidad: </strong> ".$localidad."<br><strong>Email: </strong> ".$email."<br><strong>Telefono: </strong> ".$telefono."<br><br>".$mensaje."";

        $servicio->enviarEmail($titulo,$txt,$nombre);
             echo'<script type="text/javascript">
    alert("Consulta enviada con Exito!");
    </script>';
        $this->view->generateSt('sumateALaRed.php');
        };

          $this->view->generateSt('sumateALaRed.php');
    }

    function enviarEmailContacto(){
        $servicio = new Model_Servicios();
        $titulo = "Contacto";
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $localidad = $_POST['localidad'];
        $mensaje = $_POST['mensaje'];
        
        if($nombre == null && $email == null && $localidad == null && $mensaje == null ) {
              header("location: /main/index");  
        } else {
            $txt = "<strong>Nombre: </strong> ".$nombre."<br><strong>Email: </strong> ".$email."<br><strong>Localidad: </strong> ".$localidad."<br><br>".$mensaje."";
        
        $servicio->enviarEmail($titulo,$txt,$nombre);
        
        header("location: /main/index");  
        };

        header("location: /main/index");  
    }

    function sumateALaRed(){
        $this->view->generateSt('sumateALaRed.php');
    }

     function marketing(){
        $this->view->generateSt('marketing.php');
    }

     function accionesEnPuntosDeVenta(){
        $this->view->generateSt('accionesEnPuntosDeVenta.php');
    }

    function catalogos(){
        $this->view->generateSt('catalogos.php');
    }

     function revistasDelSector(){
        $this->view->generateSt('revistasDelSector.php');
    }

     function revistasDeGranTirada(){
        $this->view->generateSt('revistasDeGranTirada.php');   
     }

     function contacto(){
        $this->view->generateSt('contacto.php');   
     }

     function adminUsuarios(){
         $servicio = new Model_Servicios();
         $usuarios = $servicio->listaUsuarios();
        $this->view->generateSt('adminUsuarios.php',$usuarios);   
     }
       function adminSucursales(){
         $servicio = new Model_Servicios();
         $sucursales = $servicio->listaSucursales();
        $this->view->generateSt('adminSucursales.php',$sucursales);   
     }
     

     function adminNovedades(){
        $servicio = new Model_Servicios();
        $fecha = new DateTime();
        $diaActual = date('Y/m/d h:i:s', time());
        $novedades = $servicio->todasNovedades();
        $this->view->generateSt('adminNovedades.php',$novedades,$diaActual); 
     }

     function grabarNovedad(){
        $servicio = new Model_Servicios();
        $imagen = $_FILES['imagen']['name'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descripcion = $_POST['descripcion'];
        $desarrollo = $_POST['desarrollo'];
        $fecha = $_POST['fecha'];
        $fechaCalendario = $_POST['fechaCalendario'];
        $tema = $_POST['tema'];
        $idTema = preg_replace("/[^0-9]{1,4}/", '', $tema); 
        
        

       if($_FILES["imagen"]["error"] > 0){
            echo'<script type="text/javascript">
             alert("*Advertencia*No cargo una imagen");
             </script>'; 
            }else{

        move_uploaded_file($_FILES["imagen"]["tmp_name"],
        "application/resources/upload/" . $_FILES["imagen"]["name"]);
        }

     

      $servicio->grabarNovedad($titulo,$subtitulo,$descripcion,$desarrollo,$fecha,$fechaCalendario,$idTema,$imagen);

      echo'<script type="text/javascript">
    alert("Novedad guardada con exito");
    </script>';

     $fecha = new DateTime();
        $diaActual = date('Y/m/d h:i:s', time());
        $novedades = $servicio->todasNovedades();
        $this->view->generateSt('adminNovedades.php',$novedades,$diaActual);
     }


    function beneficioAnses(){
    $servicio = new Model_Servicios();
    $tablaSucursales = $servicio->tablaSucursales();
    $this->view->generateSt('beneficioAnses.php',$tablaSucursales);   
    }

    function tablaSucursales(){
        $servicio = new Model_Servicios();
        $localidad = $_POST['localidad'];
        $zona = $_POST['zona'];
        $provincia = $_POST['provincia'];

        if ($localidad != null && $zona == null && $provincia == null ) {
            $tablaSucursales = $servicio->tablaSucursalesPorLocalidad($localidad);
            $this->view->generateSt('beneficioAnses.php',$tablaSucursales);  
        } elseif ($localidad == null && $zona != null && $provincia == null ) {
            $tablaSucursales = $servicio->tablaSucursalesPorZona($zona);
            $this->view->generateSt('beneficioAnses.php',$tablaSucursales);  
        } elseif ($localidad == null && $zona == null && $provincia != null ) {
            $tablaSucursales = $servicio->tablaSucursalesPorProvincia($provincia);
            $this->view->generateSt('beneficioAnses.php',$tablaSucursales);  
        } elseif ($localidad != null && $zona != null && $provincia == null ) {
            $tablaSucursales = $servicio->tablaSucursalesPorLocalidadZona($localidad,$zona);
            $this->view->generateSt('beneficioAnses.php',$tablaSucursales);  
        } elseif ($localidad != null && $zona == null && $provincia != null ) {
            $tablaSucursales = $servicio->tablaSucursalesPorLocalidadProvincia($localidad,$provincia);
            $this->view->generateSt('beneficioAnses.php',$tablaSucursales);  
        } elseif ($localidad == null && $zona != null && $provincia != null ) {
            $tablaSucursales = $servicio->tablaSucursalesPorProvinciaZona($zona,$provincia);
            $this->view->generateSt('beneficioAnses.php',$tablaSucursales);  
        } elseif ($localidad != null && $zona != null && $provincia != null ) {
            $tablaSucursales = $servicio->tablaSucursalesPorTodo($zona,$provincia,$localidad);
            $this->view->generateSt('beneficioAnses.php',$tablaSucursales);  
        } else{
            $tablaSucursales = $servicio->tablaSucursalesPor($localidad,$zona,$provincia);
         $this->view->generateSt('beneficioAnses.php',$tablaSucursales);
        }

          
    }

     function novedades(){

        $servicio = new Model_Servicios();
        $fecha = new DateTime();
        $diaActual = date('m/d/Y h:i:s a', time());
//      $novedades = $servicio->totalNovedades($diaActual);
        $novedades = $servicio->ultimasNovedades();
        $fechasDeNovedades = $servicio->fechasDeNovedades();   
        $this->view->generateSt('novedades.php',$novedades,$fechasDeNovedades);

    }

     function eventos(){

        $servicio = new Model_Servicios();
        //$fecha = new DateTime();
        //$diaActual = date('m/d/Y h:i:s a', time());
//      $novedades = $servicio->totalNovedades($diaActual);
        $eventos = $servicio->totalEventos();
        //$fechasDeNovedades = $servicio->fechasDeNovedades();   
        $this->view->generateSt('eventos.php',$eventos);

    }

     function verEvento(){
        
        $idEventos = $_GET['idEventos'];
        $servicio = new Model_Servicios();
        $evento = $servicio->eventoPorId($idEventos);
        $this->view->generateSt('verEvento.php',$evento);
    }

      function verNovedad(){
        
        $idNovedad = $_GET['idNovedad'];
        $servicio = new Model_Servicios();
        $novedad = $servicio->novedadPorId($idNovedad);
        $this->view->generateSt('verNovedad.php',$novedad);
    }


     function responsabilidadSocial(){

        //$servicio = new Model_Servicios();
        //$fecha = new DateTime();
        //$diaActual = date('m/d/Y h:i:s a', time());
//      $novedades = $servicio->totalNovedades($diaActual);
        //$eventos = $servicio->totalEventos();
        //$fechasDeNovedades = $servicio->fechasDeNovedades();   
        $this->view->generateSt('responsabilidadSocial.php');

    }

    function verResponsabilidad(){
        
        $idResponsabilidades = $_GET['idResponsabilidades'];
       
         switch ($idResponsabilidades) {
            case 1:
                $this->view->generateSt('verResponsabilidad01.php');
                break;
            
            case 2:
                 $this->view->generateSt('verResponsabilidad02.php');
                break;

            };
        //$this->view->generateSt('verResponsabilidad.php');
    }

    function novedadesPorFecha(){
        
        $servicio = new Model_Servicios();
        $fecha = $_POST['fecha'];
        //$resultado = str_replace("/", " ", $fecha);
        list($month, $year) = explode("/", $fecha);
       
        $novedades = $servicio->totalNovedadesPorFecha($month, $year);
        $fechasDeNovedades = $servicio->fechasDeNovedades();   
        $this->view->generateSt('novedades.php',$novedades,$fechasDeNovedades);
        //$novedad = $servicio->novedadPorId($idNovedad);
        //$this->view->generateSt('verNovedad.php',$novedad);
    }

      function pdfView(){
        $id = $_GET['id'];

        switch ($id) {
            case 1:
                $pdf = "catalogoJulio.pdf";
                break;
            
            case 2:
                $pdf = "catalogoDiciembre.pdf";
                break;

            }

            $this->view->generateSt('pdfView.php',$pdf);
      }
    
}