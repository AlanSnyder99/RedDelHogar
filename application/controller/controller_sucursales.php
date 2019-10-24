<?php 

include 'application/model/model_servicios.php';

class Controller_Sucursales extends Controller
{
   function index(){
		
		$servicio = new Model_Servicios();
		$zonas = $servicio->listaZonas();
        $this->view->generateSt('indexSucursales.php',$zonas);
    }

  function sucursalesZona(){
		
		$idZona = $_GET['idZona'];
		$servicio = new Model_Servicios();
		$listaSucursalesPorZona = $servicio->listaSucursalesPorZona($idZona);
        $this->view->generateSt('indexSucursalesPorZona.php',$idZona);
    }


 }
 ?>