<?php

class Model_Usuario extends Model{
    private $db;
    private $usuario;
    private $clave;

    public function __construct()
    {
        require_once 'modelo_conexion_base_de_datos.php';
        $db=BaseDeDatos::conectarBD();
    }

   public function validarNombre($nombreUsuario){

     $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";     
      
     if (strlen($nombreUsuario)<3 || strlen($nombreUsuario)>20){ 
            return false; 
    } else{
        for ($i=0; $i<strlen($nombreUsuario); $i++){ 
                  if (strpos($permitidos, substr($$nombreUsuario,$i,1))===false){ 
                  return false; 
                 } else{
                    return true; 
                 }
            }   
    }

}

    public function validarlogin($nombreUsuario, $clave)
    {
        $db=BaseDeDatos::conectarBD();

        //$Sqlhash = 'SELECT * FROM Usuarios where usuario = "'.$nombreUsuario.'"';
       
       // $result2 = mysqli_query($db, $Sqlhash);
       // $hash =mysqli_fetch_assoc($result2);


          // if (password_verify($clave, $hash['contrasena'])) {
    
     $sql= 'SELECT Roles.tipo as rol, idUsuarios as id 
                FROM Usuarios
                INNER JOIN Roles on Usuarios.rol = Roles.idRoles
                WHERE Usuarios.usuario = "'.$nombreUsuario.'" AND Usuarios.contrasena = "'.$clave.'"';

               

        $result=mysqli_query($db, $sql);
 
        $rows=mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result)==1) {
            $rol=($rows['rol']);
            $id=($rows['id']);
            return $rol;
            }
         else {
            header("location:/login?e=1");

        }
//} else {
 //header("location:/login?e=1");
}

       
    //}

    public function buscarIdUsuario($nombreUsuario){

        $db=BaseDeDatos::conectarBD();

        $sql='select idUsuarios from Usuarios where usuario = "'.$nombreUsuario.'"; ';

        $result=mysqli_query($db, $sql);

         $rows=mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result)==1) {
            $idUsuario=($rows['idUsuarios']);
            return $idUsuario;
            }
    }


    public function cerrarsesion()
    {
        session_destroy();
        header("location:/index");
    }
    

    public function validarSiExisteUsuario($nombreUsuario){

        $db=BaseDeDatos::conectarBD();

        $sql='select * from Usuarios where usuario = "'.$nombreUsuario.'"; ';

        $result=mysqli_query($db, $sql);

        if(mysqli_num_rows($result)>0){
            return false;
        } else {
            return true;
        }
    }

     public function guardarUsuario($clave,$nombre,$razon,$domicilio,$cp,$email,$telefono,$nombreUsuario,$idRoles,$idIntegrantes){

    $db=BaseDeDatos::conectarBD();

    $sql='INSERT INTO Usuarios (idIntegrantes,nombre,razon,domicilio,cp,email,usuario,contrasena,rol,telefono) 
VALUES ('.$idIntegrantes.',"'.$nombre.'","'.$razon.'","'.$domicilio.'","'.$cp.'","'.$email.'","'.$nombreUsuario.'","'.$clave.'",'.$idRoles.','.$telefono.')';
    
    
    $result=mysqli_query($db, $sql);

    return $result;  
    }
   
} 

