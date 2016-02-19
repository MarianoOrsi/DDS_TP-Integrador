<!DOCTYPE html>
<html lang="en">
<head>

<META charset="iso-8859-1">
<title>TP Integrador - Grupo 81</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />


 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- css -->
<link href="../experiment/css/bootstrap.min.css" rel="stylesheet" />
<link href="../experiment/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<!--<link href="../experiment/css/jcarousel.css" rel="stylesheet" />-->
<link href="../experiment/css/flexslider.css" rel="stylesheet" />
<link href="../experiment/css/style.css" rel="stylesheet" />
<link href="../experiment/css/login.css" rel="stylesheet" />
<!-- Theme skin -->
<link href="../skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="wb-frmvld">
                 <p class="form-title">Registrarme</p>

                    <form class="login" action="../negocio/registrarUsuario.php" method="post" style="background-image:url(../experiment/img/SignUp/SignUp.png)">
    				
                     <?php
                        if(isset($_GET["first"]))
                        {
                            echo'   <div class="alert alert-danger" role="alert" text-align="center">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Error:</span>
                                        El usuario ya existe!
                                     </div>';
                        };
                    ?>

                    <input type="text" name="usuario" placeholder="Usuario" data-rule-nowhitespace="true" required="required"/>

                    <input type="password" name="contrasenia" placeholder="Contrase&ntilde;a" data-rule-nowhitespace="true" required="required"/>
                    <input type="email" name="email" placeholder="mail@algunServidor.com" required="required"  />

                    <select class="combo" name="genero" required="required">
                        <option value="">Sexo</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>

                    <input type="number" name="edad" placeholder="Edad" required="required"/>
                    <input type="number" name="altura" placeholder="Altura" required="required" />
                    
                    <select class="combo" name="complexion" required="required">
                        <option value="">Complexion</option>
                        <option value="Peque">Peque&ntilde;a</option>
                        <option value="Mediana">Media</option>
                        <option value="Grande">Grande</option>
                    </select>
                    <!--<label>Condicion Preexistente</label>-->
                    <select class="combo" name="condPre" required="required">
                        <option value="">Condiciones Preexistentes</option>
                        <option value="Diabetes">Diabetes</option>
                        <option value="Hipertension">Hipertension</option>
                        <option value="Celiasis">Celiasis</option>
                        <option value="Ninguna">Ninguna</option>
                    </select>
                    <select class="combo" name="dieta" required="required">
                        <option value="">Dieta</option>
                        <option value="Normal">Normal</option>
                        <option value="Ovolactovegetariano">Ovolactovegetariano</option>
                        <option value="Vegetariano">Vegetariano</option>
                        <option value="Vegano">Vegano</option>
                    </select>
                    <select class="combo" name="rutina" required="required">
                        <option value="">Rutina</option>
                        <option value="Nada">Sedentaria con nada de ejercicio</option>
                        <option value="Leve">Sedentaria con algo de ejercicio (-30 min.)</option>
                        <option value="Mediano">Sedentaria con ejercicio (+30 min.)</option>
                        <option value="Fuerte">Activa sin ejercicio adicional</option>
    					<option value="Intensivo">Activa con ejercicio adicional (+30 min.)</option>
                    </select>
                    <input type="text" name="preferencias" placeholder="Preferencias alimenticias" />
                    
                    <input type="submit" value="Registrarse" name="submit" class="btn btn-success btn-sm" />
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/jquery.fancybox-media.js"></script>
<script src="../js/google-code-prettify/prettify.js"></script>
<script src="../js/portfolio/jquery.quicksand.js"></script>
<script src="../js/portfolio/setting.js"></script>
<script src="../js/jquery.flexslider.js"></script>
<script src="../js/animate.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/validate.js"></script>
</body>
</html>