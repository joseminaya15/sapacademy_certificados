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
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
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
                <div class="js-header--right">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="cerrarSesion()">Fechar Sessão</button>
                </div>
            </div>
        </div>
        <div id="certificado">
            <div class="js-fondo js-fondo-home"></div>
            <div class="js-container">
                <div class="js-datos">
                    <p>Bem-vindo:</p>
                    <h2><?php echo $nombre?></h2>
                    <p>Pa&iacute;s: <?php echo $pais ?></p>
                    <p>E-mail: <?php echo $email ?></p>
                    <p>Empresa: <?php echo $empresa ?></p>
                </div>
                <div class="js-certificados">
                    <h2>Certificados obtidos</h2>
                    <?php echo $html ?>
                </div>
            </div>
        </div>
        <footer class="js-section">
            <div class="js-container">
                <p>&copy; 2018 SAP SE or an SAP affiliate company. All rights reserved.</p>
            </div>
        </footer>
        <!--MODAL-->
        <div class="modal fade" id="ModalCertificado" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg text-center">
                <div class="modal-content">
                    <div class="mdl-card" >
                        <div class="mdl-card__title p-0" id="r">
                            
                        </div>
                        <div class="mdl-card__menu">                            
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>certificados.js?v=<?php echo time();?>"></script>
    </body>
</html>