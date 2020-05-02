<?php 

include 'application/model/model_usuario.php';

class Controller_Login extends Controller
{
   function index(){
		
		 $this->view->generateSt('login_view.php');
    }

   function validarlogin(){

        $usuario = new Model_Usuario();
        $nombreUsuario = $_POST['nombreUsuario'];
        $clave =  $_POST['clave']; 
       // $clave = password_hash($clavePrimera, PASSWORD_DEFAULT );
		$rol =  $usuario->validarlogin($nombreUsuario,$clave);
		
		$_SESSION['rol'] = $rol;
		

			switch ($rol){
			case "administradorTotal":
				$_SESSION["login"]="sessionAdmin";
				$idUsuario = $usuario->buscarIdUsuario($nombreUsuario);
				$_SESSION['idUsuario'] = $idUsuario;
				$this->view->generateSt('adminHome.php', $idUsuario);
				break;

			case "administradorSemi":
				$_SESSION["login"]="sessionAdmin";
				$idUsuario = $usuario->buscarIdUsuario($nombreUsuario);
				$_SESSION['idUsuario'] = $idUsuario;
				$this->view->generateSt('adminHome.php', $idUsuario);
				break;	
			
					}    
			}


    function cerrarsesion(){
		session_destroy();
    	header("location:/");
    }

	
	
	function error(){
		$this->view->generateSt('usuario_error_view.php');
	}

	function adminHome(){
		$this->view->generateSt('adminHome.php');
	}

 }

 ?>