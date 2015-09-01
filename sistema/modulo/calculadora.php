<?php session_start();
include ('../../sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
?>
<!DOCTYPE html>
<html>
   <head>
	<title>Calculadora <?php echo TITULO?></title>
   <link rel="stylesheet" href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/css/bootstrap.min.css">
   <script src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/calculadora/jquery-2.1.4.min.js"></script>
       
   <link rel="stylesheet" href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/css/calculadora/prism.css">
   <script src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/calculadora/prism.js"></script>

   <link rel="stylesheet" href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/css/calculadora/calculadora.css">
   <script src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/calculadora/calculadora.js"></script>
</head>
  <body>
    <div class="container">
      <div class="row">
        <div class=" col-md-4 ">
            <div id="idCalculadora"></div>
		</div>
      </div>
    </div>
    
    <script>
         $("#idCalculadora").Calculadora();
         $("#micalc").Calculadora({'EtiquetaBorrar':'Clear',TituloHTML:'<a class="btn-block btn3d btn btn-success" href="http://develoteca.com" target="_blank">By Develoteca.com</a>'});
        
        $("#CalcOptoins").Calculadora({
            EtiquetaBorrar:'Clear',
            ClaseBtns1: 'warning', /* Color Numbers*/
            ClaseBtns2: 'success', /* Color Operators*/
			ClaseBtns3: 'primary', /* Color Clear*/
            TituloHTML:'<h2>Develoteca.com</h2>',
            Botones:["+","-","*","/","0","1","2","3","4","5","6","7","8","9",".","="]

            
        });
    </script>
    
  </body>
</html>
