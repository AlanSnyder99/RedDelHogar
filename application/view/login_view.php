  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../application/resources/css/login.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   </head>
<body>

      <div class="w3-container" id="conteinerGeneral">
            <form method="POST" action="/login/validarlogin" enctype="application/x-www-form-urlencodes">
               <div class="imgcontainer">
                <img src="../application/resources/img/logoGif.gif" alt="logo" class="logo">
               </div>    
                
                <div class="w3-container" id="container">
                  <div class="form-group">
                    <label for="nombreUsuario">Nombre de usuario</label>
                    <div >
                      <input type="text" id="name" class="form-control" name="nombreUsuario" required="" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <div class="form-field">
                      <input type="password" id="name" class="form-control" name="clave" required="" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="text-center mb-3" id="msjError" style="display:none;color:red;">El usuario y/o la contraseña no coinciden</div>
                
             
              <div class="row">
                <div >
                  <input type="submit" name="submit" id="submit" value="Iniciar Sesión">
                </div>
                <br>

              
              </div>
              </div>
              </div>
             </div> 
            </form>
          </div>
  
    </section>

    <?php if (isset($_GET['e'])){ ?>
  <script>document.getElementById("msjError").style.display = "block";</script>
  <?php } ?>

</body>
</html>