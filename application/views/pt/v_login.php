<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="SAP Marketing Academy">
        <meta name="keywords"               content="SAP Marketing Academy">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="Febrero 15, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
        <title>SAP Marketing Academy</title>
        <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.ico">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>benton.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
        <div class="js-header">
            <div class="js-header--container">
                <div class="js-header--left">
                    <img class="logo-one" src="<?php echo RUTA_IMG?>logo/logo_favicon.png">
                    <p>SAP Marketing Academy</p>
                </div>
            </div>
        </div>
        <section id="principal">
            <div class="js-fondo js-fondo--login"></div>
            <div class="js-container">
                <div class="js-home js-height js-flex">
                    <div class="js-contenido">
                        <p>Bem-vindo ao Portal de Certificados</p>
                        <h2>SAP Marketing Academy</h2>
                        <p>Agradecemos por sua participação. Lembre-se de que nossos certificados são reconhecidos internacionalmente e darão a você uma grande vantagem competitiva.</p>
                        <h3>Obter certificado</h3>
                        <p>Insira seu e-mail para acessar seu certificado:</p>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insira seu e-mail" onkeyup="verificarDatos(event);">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="ingresar()">Ingresar</button>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            // var URLactual = window.location;
            // if(URLactual['href'] != 'http://www.sap-latam.com/SAP_Marketing_Academy/pt/'){
            //     location.href = 'http://www.sap-latam.com/SAP_Marketing_Academy/pt/';
            // }
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
    </body>
</html>