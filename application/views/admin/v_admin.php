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
        <link rel="stylesheet"    href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet"    href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>benton.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body style="background-color: #F2F2F2">
        <div class="js-header">
            <div class="js-header--container">
                <div class="js-header--left">
                    <img class="logo-one" src="<?php echo RUTA_IMG?>logo/logo_favicon.png">
                    <p>SAP Marketing Academy</p>
                </div>
            </div>
        </div>
        <section id="admin" class="js-section">
            <div class="js-container js-admin">
                <div class="mdl-card">
                    <div class="mdl-card__title">
                        <div class="js-flex">
                            <div class="js-flex__left">
                                <h2>Administrador</h2>
                            </div>
                            <div class="js-flex__right">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" onclick="cerrarCesion()">Cerrar Sesi&oacute;n</button>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#usuarios" aria-controls="usuarios" role="tab" data-toggle="tab">Usuarios</a></li>
                            <li><a href="#ingresos" aria-controls="ingresos" role="tab" data-toggle="tab">Ingresos</a></li>
                            <li><a href="#descargas" aria-controls="descargas" role="tab" data-toggle="tab">Descargas</a></li>
                            <li><a href="#reporte2017" aria-controls="reporte2017" role="tab" data-toggle="tab">Reportes 2017</a></li>
                            <li><a href="#reporte2018" aria-controls="reporte2018" role="tab" data-toggle="tab">Reportes 2018</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="usuarios">
                                <div class="js-select">
                                    <select class="selectpicker" id="idioma"  name="idioma" onchange="" title="Idioma">
                                        <option value="Español">Espa&ntilde;ol</option>
                                        <option value="Portugues">Portugues</option>
                                    </select>
                                </div>
                                <div class="js-select">
                                    <select class="selectpicker" id="curso"  name="curso" onchange="" title="Curso">
                                        <option value="Español">Espa&ntilde;ol</option>
                                        <option value="Portugues">Portugues</option>
                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table id="TableUsuario" class="display nowrap table table-bordered table-hover dt-responsive js-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="tr-header-reporte">
                                                <th class="text-left">Nombres</th>
                                                <th class="text-left">E-mail</th>
                                                <th class="text-left">Empresa</th>
                                                <th class="text-left">Pa&iacute;s</th>
                                                <th class="text-left">Cursos descargados</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                          <?php echo $table1 ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="ingresos">
                                <div class="js-select">
                                    <select class="selectpicker" id="idioma"  name="idioma" onchange="" title="Idioma">
                                        <option value="Español">Espa&ntilde;ol</option>
                                        <option value="Portugues">Portugues</option>
                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table id="TableIngreso" class="display nowrap table table-bordered table-hover dt-responsive js-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="tr-header-reporte">
                                                <th class="text-left">Usuario</th>
                                                <th class="text-left">Fecha de Ingreso</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                          <?php echo $table2 ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="descargas">
                                <div class="js-select">
                                    <select class="selectpicker" id="curso"  name="curso" onchange="" title="Curso">
                                        <option value="Español">Espa&ntilde;ol</option>
                                        <option value="Portugues">Portugues</option>
                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table id="TableCurso" class="display nowrap table table-bordered table-hover dt-responsive js-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="tr-header-reporte">
                                                <th class="text-left">Usuario</th>
                                                <th class="text-left">Curso</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                          <?php echo $table3 ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reporte2017">
                                
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reporte2018">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>admin.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
            $(document).ready(function() {
                $('.js-table').DataTable( {
                    searching : false,
                    responsive: true,
                    dom: 'Bfrtip',
                    aLengthMenu : [20],
                    buttons: [
                        {
                            extend:'excel',
                            text: 'Exportar a Excel'
                        }
                    ],
                    language : {
                        info : "Mostrando _TOTAL_ registros",
                    }
                });
            });
        </script>
    </body>
</html>