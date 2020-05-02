<?php

include 'application/model/model_usuario.php';
include 'application/model/model_servicios.php';

class Controller_Administrador extends Controller
{
    public function index()
    {
    	
    	$idUsuario = $_GET['idUsuario'];
        $this->view->generateSt('adminHome.php',$idUsuario);
        
    }

     public function indexPost()
    {
      
      $idUsuario = $_POST['idUsuario'];
        $this->view->generateSt('adminHome.php',$idUsuario);
        
    }

    public function verUsuarios()
    {
    	$usuario = new Model_Usuario();
    	$idUsuario = $_GET['idUsuario'];
    	$usuarios = $usuario->listaUsuarios();
        $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);
        
    }

      public function verClienteParticular()
    {
      $usuario = new Model_Usuario();
      $idUsuario = $_GET['idUsuario'];
      $cliente = urldecode($_GET['cliente']);
      $rows = $usuario->traerClientePorId($cliente);
      $this->view->generateSt('verCliente.php',$idUsuario,$rows);
        
    }

    public function modificarUsuario(){
            $usuario = new Model_Usuario();
    		$idUsuario = $_GET['idUsuario'];
        $usuario1 = urldecode($_GET['usuario']);
        $rows = $usuario->traerUsuarioPorId($usuario1);
    		$this->view->generateSt('modificarUsuario.php',$idUsuario, $rows);
    }

    public function grabarModificacionUsuario(){
        $usuario = new Model_Usuario();
        $idUsuario = $_GET['idUsuario'];
        $usuario1 = urldecode($_GET['usuario']);
        $rows = $usuario->traerUsuarioPorId($usuario1);
        $usuarios = $usuario->listaUsuarios();

        $nombreUsuario = $_POST['nombreUsuario'];
        $nombreUsuarioComparacion = $_POST['nombreUsuarioComparacion'];
        $claveBasica = $_POST['clave'];
        $claveComparacion = $_POST['claveComparacion'];
        $rol = $_POST['rol'];
        $idRol = preg_replace("/[^0-9]{1,4}/", '', $rol); //EXTRAE EL NUMERO DEL STRING DE LA FORMA DE PAGO
        $idRolComparacion = $_POST['rolComparacion'];

        if ($nombreUsuario != $nombreUsuarioComparacion) {
            
            $usuario->modificarNombreUsuario($nombreUsuario,$usuario1);


            if ($claveBasica != $claveComparacion) {
                
                $claveNueva = md5($claveBasica);
                $usuario->modificarClaveUsuario($claveNueva,$usuario1);
                
                if ($idRol != $idRolComparacion) {
                    
                    $usuario->modificarRolUsuario($idRol,$usuario1);
                    $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);

                } else {
                 $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);
              echo'<script type="text/javascript">
             alert("Nombre y Clave modificados");
             </script>';
                }

            } elseif ($idRol != $idRolComparacion) {
                $usuario->modificarRolUsuario($idRol,$usuario1);
                    $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);
            } else {
                
                 $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);
              echo'<script type="text/javascript">
             alert("Nombre modificado");
             </script>';
            
            }

        } elseif ($claveBasica != $claveComparacion) {
        
                $claveNueva = md5($claveBasica);
                $usuario->modificarClaveUsuario($claveNueva,$usuario1);
                
                if ($idRol != $idRolComparacion) {
                    
                    $usuario->modificarRolUsuario($idRol,$usuario1);
                    $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);
                } else{
                 $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);
                     echo'<script type="text/javascript">
                    alert("Clave modificada");
             </script>';
            
                }

        } elseif ($idRol != $idRolComparacion){

            $usuario->modificarRolUsuario($idRol,$usuario1);
            $this->view->generateSt('usuariosAdmin.php',$idUsuario,$usuarios);
              echo'<script type="text/javascript">
             alert("Rol modificado");
             </script>';

        } else {
           
            $this->view->generateSt('modificarUsuario.php',$idUsuario,$rows);
        echo'<script type="text/javascript">
             alert("No hubo modificaciones");
             </script>';
        }        
    }

 public function modificarCliente(){
        $usuario = new Model_Usuario();
        $idUsuario = $_GET['idUsuario'];
        $idCliente = urldecode($_GET['cliente']);
        $rows = $usuario->traerClientePorId($idCliente);
        $this->view->generateSt('modificarCliente.php',$idUsuario,$rows);
    }

public function grabarModificacionCliente(){
        $usuario = new Model_Usuario();
        $cliente = new Model_Cliente();
        $idUsuario = $_GET['idUsuario'];
        $idCliente = urldecode($_GET['cliente']);
        $rows = $usuario->traerClientePorId($idCliente);
        $usuarios = $usuario->listaUsuarios();

        $nombreCliente = $_POST['nombreCliente'];
        $nombreClienteComparacion = $_POST['nombreCliente2'];
        $dni = $_POST['dni'];
        $dni2 = $_POST['dni2'];
        $producto = $_POST['producto'];
        $producto2 = $_POST['producto2'];

       

        if ($nombreCliente != $nombreClienteComparacion) {
            
            $cliente->modificarNombreCliente($nombreCliente,$idCliente);


            if ($dni != $dni2) {
                
                $cliente->modificarDniCliente($dni,$idCliente);
                
                if ($producto != $producto2) {
                    
                     $cliente->modificarProductoCliente($producto,$idCliente);
                     $this->view->generateSt('listaClientesHome.php',$idUsuario);  
                     echo'<script type="text/javascript">
                      alert("Nombre, DNI y Producto modificados");
                      </script>';
                  

                } else {
               
                  $this->view->generateSt('listaClientesHome.php',$idUsuario);  
              echo'<script type="text/javascript">
             alert("Nombre y Dni modificados");
             </script>';
                }

            } elseif ($producto != $producto2) {
                     $cliente->modificarProductoCliente($producto,$idCliente);
                     $this->view->generateSt('listaClientesHome.php',$idUsuario);  
            } else {
                
                  $this->view->generateSt('listaClientesHome.php',$idUsuario);  
                  echo'<script type="text/javascript">
                 alert("Nombre modificado");
                 </script>';
            
            }

        } elseif ($dni != $dni2) {
        
             $cliente->modificarDniCliente($dni,$idCliente);
                
                if ($producto != $producto2) {
                    
                     $cliente->modificarProductoCliente($producto,$idCliente);
                     $this->view->generateSt('listaClientesHome.php',$idUsuario); 
                } else{
                 $this->view->generateSt('listaClientesHome.php',$idUsuario); 
                     echo'<script type="text/javascript">
                    alert("DNI modificado");
             </script>';
            
                }

        } elseif ($producto != $producto2){

             $cliente->modificarProductoCliente($producto,$idCliente);
            $this->view->generateSt('listaClientesHome.php',$idUsuario); 
             echo'<script type="text/javascript">
                    alert("Producto modificado");
             </script>';

        } else {
           
            $this->view->generateSt('listaClientesHome.php',$idUsuario); 
        echo'<script type="text/javascript">
             alert("No hubo modificaciones");
             </script>';
        }        
    }
    
    public function verUsuarioBuscado(){

    	$idUsuario = $_GET['idUsuario'];
    	$usuario = new Model_Usuario();
    	$nombreUsuario = $_POST['nombre'];	
    	$usuarios = $usuario->usuarioBuscado($nombreUsuario);
        $this->view->generateSt('usuarioBuscadoAdmin.php',$idUsuario,$usuarios); 
    }

    public function nuevoUsuario(){
        $idUsuario = $_GET['idUsuario'];
        $this->view->generateSt('nuevoUsuario.php',$idUsuario); 
    }   

    public function guardarUsuario(){
        $usuario = new Model_Usuario();

        $nombre = $_POST['nombre'];
        $razon = $_POST['razon'];
        $domicilio = $_POST['domicilio'];
        $cp = $_POST['cp'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $nombreUsuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $rol = $_POST['rol'];
        $idRoles = preg_replace("/[^0-9]{1,4}/", '', $rol);
        $provincia = $_POST['provincia'];
        $idProvincias = preg_replace("/[^0-9]{1,4}/", '', $provincia);
        $localidad = $_POST['localidad'];
        $idLocalidad = preg_replace("/[^0-9]{1,4}/", '', $localidad); //EXTRAE EL NUMERO DEL STRING DE ROL
        $integrante = $_POST['integrante'];
        $idIntegrantes = preg_replace("/[^0-9]{1,4}/", '', $integrante); //EXTRAE EL NUMERO DEL STRING DE INTEGRANTES

       

        if(!$usuario->validarSiExisteUsuario($nombreUsuario)){
           
             $this->view->generateSt('adminUsuarios.php');
            echo'<script type="text/javascript">
             alert("El usuario ya existe");
             </script>';
        } elseif (strlen($contrasena) < 4) {
              $this->view->generateSt('adminUsuarios.php');
            echo'<script type="text/javascript">
             alert("La clave debe ser mayor a 4 digitos");
             </script>';
        }else{
        
 

        $clave = password_hash($contrasena, PASSWORD_DEFAULT );

       

        $usuario->guardarUsuario($clave,$nombre,$razon,$domicilio,$cp,$email,$telefono,$nombreUsuario,$idRoles,$idIntegrantes);

        $servicio = new Model_Servicios();
         $usuarios = $servicio->listaUsuarios();
        $this->view->generateSt('adminUsuarios.php',$usuarios);
          
          echo'<script type="text/javascript">
             alert("Usuario guardado con exito");
             </script>'; 
        }
    }

 public function nuevoServicio(){
        $idUsuario = $_GET['idUsuario'];
        $this->view->generateSt('nuevoServicio.php',$idUsuario); 
    }   
 
     public function guardarServicio(){

        $servicios = new Model_Servicios();
        $nombreServicio = $_POST['nombre'];
        $domicilio = $_POST['domicilio'];
        $telefono = $_POST['telefono'];
        $horarioDeAtencion = $_POST['horario'];
        $email = $_POST['email'];
        $marcasArray = $_POST['marcas'];
        $marcas = implode(", ", $marcasArray);
//      $idMarcas = preg_replace("/[^0-9]{1,4}/", '', $marcas); //EXTRAE EL NUMERO DEL STRING DE MARCAS
        $idUsuario = $_POST['idUsuario'];
        
           if(!$servicios->validarSiExisteServicio($nombreServicio)){
           
             $this->view->generateSt('nuevoServicio.php',$idUsuario);
            echo'<script type="text/javascript">
             alert("El servicio ya existe");
             </script>';
            }else{

            $servicios->guardarServicio($nombreServicio,$domicilio,$telefono,$horarioDeAtencion,$email,$marcas);
            $this->view->generateSt('nuevoServicio.php',$idUsuario);
          
          echo'<script type="text/javascript">
             alert("Servicio guardado con exito");
             </script>'; 
        }
    
    } 

    function listaServiciosVacia(){

        $servicio = new Model_Servicios();
        $idUsuario = $_GET['idUsuario'];
        $servicios = $servicio->listaServicios();
        $this->view->generateSt('listaServicios.php',$idUsuario,$servicios);
    }

    function verServicio(){

        $servicio = new Model_Servicios();
        $idUsuario = $_GET['idUsuario'];
        $servicioId = $_GET['servicioId'];
        $verServicios = $servicio->servicioPorId($servicioId);
        $this->view->generateSt('verServicio.php',$idUsuario,$verServicios);
    }

   public function verServicioBuscado(){

        $idUsuario = $_GET['idUsuario'];
        $servicio = new Model_Servicios();
        $nombre = $_POST['nombre'];  
        $servicios = $servicio->servicioBuscado($nombre);
        $this->view->generateSt('listaServiciosBuscados.php',$idUsuario,$servicios); 
    }
    
    public function guardarSucursal(){
        $servicio = new Model_Servicios();
         
         $sucursales = $servicio->listaSucursales();
        
        $descripcion = $_POST['descripcion'];
        $domicilio = $_POST['domicilio'];
        $horario = $_POST['horario'];
        $telefono = $_POST['telefono'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];

    
        $provincia = $_POST['provincia'];
        $idProvincias = preg_replace("/[^0-9]{1,4}/", '', $provincia);
        $localidad = $_POST['localidad'];
        $idLocalidad = preg_replace("/[^0-9]{1,4}/", '', $localidad); //EXTRAE EL NUMERO DEL STRING DE ROL
        $integrante = $_POST['integrante'];
        $idIntegrantes = preg_replace("/[^0-9]{1,4}/", '', $integrante);
        $zona = $_POST['zona'];
        $idZonas = preg_replace("/[^0-9]{1,4}/", '', $zona); //EXTRAE EL NUMERO DEL STRING DE INTEGRANTES


        $servicio->guardarSucursal($descripcion,$domicilio,$telefono,$horario,$latitud,$longitud,$idProvincias,$idLocalidad,$idIntegrantes,$idZonas);

       $this->view->generateSt('adminSucursales.php',$sucursales);   

    }
}
