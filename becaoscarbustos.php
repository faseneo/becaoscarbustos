<?php
include ('seguridad3.php');
// Se crea formulario para postular a beca colaboracion 2018, basado en el formulario becas.php, fsegovia : 19122017
//$rut="18486804-0";
  $id=$_SESSION["id"];
  $rut=$_SESSION["rut"];
  $nombre = $_SESSION["nom"]." ".$_SESSION["apepat"]." ".$_SESSION["apemat"];
  $sexo=$_SESSION["sex"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Beneficios 2018 - Universidad Metropolitana de Ciencias de la Educación</title>
  <meta name="description" content="umce beneficios">
  <meta name="author" content="umce">
  <meta name="robots" content="noindex"/>
  <meta name="robots" content="nofollow">  

  <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> -->
    <link href="../img/templates/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script type="text/javascript">
        var rut0='<?php echo $_SESSION["rut"]; ?>';
    </script>
    <script src="js/funcionesalbeca.js"></script>
    <style type="text/css">
      #logopostula{
        display: none;
      }
    </style>    
  </head>
  <body>
    <?php include "cabecera.php"; ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h3 style="text-align:center"> Bienvenid@ <?php echo utf8_encode($nombre); ?></h3>
          <hr>
        </div>
      </div>  
      <div class="row" id="descripcion">
        <div class="col-sm-12">
          <h4>Beca Oscar Bustos Aburto</h4>
          <p style="text-align:justify;">La Corporación de Desarrollo Cultural y Social  “Aurora de Italia”, entrega apoyo a estudiantes universitarios, seleccionados por su destacado mérito académico y reconocido esfuerzo que hacen para financiar sus estudios en Educación Superior.
Para ello, otorga <strong>3 BECAS de $280.000.- (pago único)</strong> a estudiantes de pregrado de la UMCE que cumplan los siguientes requisitos:<br><br>
            ESTUDIANTES 1° AÑO:
            <ul>
              <li>Haber aprobado el 100% de las asignaturas del 1° semestre 2018.</li>
              <li>Promedio del semestre, igual o superior a 6,0.</li>
              <li>Ingreso per capita familiar hasta 5° decil, según clasificación Ministerio Desarrollo Social.</li>
            </ul>
            <p>
            ESTUDIANTES 2° AÑO O POSTERIOR:
            <ul>
              <li>Haber aprobado el 100% de las asignaturas del 1° semestre 2018.</li>
              <li>Estar cursando por primera vez el año o semestre de la carrera.</li>
              <li>Promedio del semestre, igual o superior a 6,0.</li>
              <li>No haber reprobado ramos durante el transcurso de la carrera.</li>
              <li>Ingreso per capita familiar hasta 5° decil, según clasificación Ministerio Desarrollo Social.</li>
            </ul>
            <br><br>
          </p>
        </div>
      </div>
      <!-- Comienzo del formulario UMCE por Luis García Manzo -->
      <form  role="form" name="formulariopostulacon" id="formulariopostulacon" method="post">
        <input type="hidden" name="rut" id ="rut" value="<?php echo $rut; ?>">
        <input type="hidden" name="id" id ="id" value="<?php echo $id; ?>">
        <input type="hidden" name="Accion" id ="Accion" value="">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <!-- <h5><strong>Seleccione una alternativa</strong></h5> -->
          </div>
        </div>                
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <div class="form-group">
              <select name='becaoscarbustos' id='becaoscarbustos' class="form-control">
<!--                 <option value='No postula'>No deseo postular</option> -->
                <option value='Beca Oscar Bustos Aburto'>Beca Oscar Bustos Aburto</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3" style="text-align:center;">
            <h5><strong>Ingresa tu correo y teléfono.</strong><br>
            Si no tienes el correo de la UMCE, puedes solicitar activación <a href="http://146.83.132.24/correos/">aquí</a> </h5>
          </div>
        </div>        
        <div class="row">
          <div class="col-sm-12 form-inline" style="text-align:center;">
            <input type="text" class="form-control" name="correo" id="correo" placeholder="correo@mimail.com" required />
            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="12" value="+569" required />
            <select name="banco" id="banco" class="form-control">
              <option value="">Banco</option>
              <option value="BBVA">BBVA</option>
              <option value="Banco Estado">Banco Estado</option>
              <option value="Banco de Chile">Banco de Chile</option>
              <option value="Banco Internacional">Banco Internacional</option>
              <option value="Scotiabank Chile">Scotiabank Chile</option>
              <option value="BCI">BCI</option>
              <option value="Corpbanca">Corpbanca</option>
              <option value="Banco Bice">Banco Bice</option>
              <option value="HSBC Bank">HSBC Bank</option>
              <option value="Banco Santander">Banco Santander</option>
              <option value="Banco Itaú">Banco Itaú</option>
              <option value="The Royal Bank of Scotland (Chile)">The Royal Bank of Scotland (Chile)</option>
              <option value="Banco Security">Banco Security</option>
              <option value="Banco Falabella">Banco Falabella</option>
              <option value="Deutsche Bank (Chile)">Deutsche Bank (Chile)</option>
              <option value="Banco Ripley">Banco Ripley</option>
              <option value="Rabobank Chile">Rabobank Chile</option>
              <option value="Banco Consorcio">Banco Consorcio</option>
              <option value="Banco Penta">Banco Penta</option>
              <option value="Banco Paris">Banco Paris</option>
            </select>
            <input type="text" class="form-control" name="nro_cta" id="nro_cta" maxlength="12" placeholder="Nro. de Cuenta" required />
            <select class="form-control" name="tipo_cta" id="tipo_cta">
              <option value="ctarut">Rut</option>
              <option value="ctavista">Vista</option>
              <option value="ctacorriente">Corriente</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <br>
            <button type="button" id="enviar" name="enviar" class="btn btn-primary">Continuar con la Postulación</button>
            <button type="button" id="modificar" name="modificar" class="btn btn-warning">Modificar Postulación</button>
            <button type="button" id="reenviar" name="reenviar" class="btn btn-primary">Reingresar Postulación</button>
          </div>
        </div> <br>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <p class="salir" id="salir"></p>
          </div>
        </div>
      </form>
    </div> <!-- /container -->
    <!-- Modal mensajes cortos-->
    <div class="modal fade" id="myModalLittle" tabindex="-1" role="dialog" aria-labelledby="myModalLittleLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Mensaje</h4>
          </div>
          <div class="modal-body">
            <p id="msg" class="msg"></p>
          </div>
          <div class="modal-footer">
            <button type="button" id="cerrarModalLittle" class="btn btn-default" data-dismiss="modal">Continuar</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
