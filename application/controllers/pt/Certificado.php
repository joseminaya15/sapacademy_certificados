<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require getcwd().'\vendor\autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class Certificado extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");
    }

	public function index(){
		$nombre = $this->session->userdata('Nombres');
		$curso  = $this->session->userdata('curso');
		$fondo  = $this->session->userdata('fondo');
		$img    = $this->session->userdata('imagen');
		$html='<html>
					<head>
						<link rel="shortcut icon" href="http://hpedigitalmarketingacademy.com/Certificados/public/img/logo/favicon.ico">
						<link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
						<style>
							body,html{
								margin: 0;
								padding: 0;
								font-family: "MetricRegular";
							}
							.fondo-imagen{
								position: absolute;
								top: 0;
								left: 0;
								right: 0;
								bottom: 0;
								width: 100%;
								height: 100%;
							}
							.js-logo{
								padding-top: 150px;
							}
							.js-information{
								text-align: left;
								padding-top: 20px;
							}
							.js-information h2{
								font-size: 80px;
								line-height: 80px;
								margin: 30px 0 5px 0;
								font-family: "Roboto",sans-serif;
								font-weight: bold;
								color: #000000;
							}
							.js-information p{
								font-size: 18px;
								line-height: 18px;
								font-family: "Roboto",sans-serif;
								font-weight: light;
								color: #231F20;
							}
							.js-information h3{
								font-size: 32px;
								line-height: 32px;
								font-family: "Roboto",sans-serif;
								font-weight: bold;
								color: #939598;
								margin: 10px 0;
							}
							.js-information--curso h3{
								font-size: 32px;
								line-height: 34px;
								margin: 10px 0;
							}
							.js-information--curso p{
								font-size: 16px;
								line-height: 16px;
								margin: 5px 0;
							}
							.js-information span{
								font-size: 14px;
								font-family: "Roboto",sans-serif;
								font-weight: bold;
								display: block;
								color: #231F20;
							}
						</style>
					</head>
					<body>
						<img width="100%" height="18" src="http://www.sap-latam.com/SAP_Marketing_Academy/public/img/logo/barras_'.$fondo.'.png"/>
						<div class="js-information">
							<img style="float: right;width: 170px;" src="http://www.sap-latam.com/SAP_Marketing_Academy/public/img/logo/logo-sap--black.png"/>
							<h2>Certificado</h2>
							<h3>SAP Marketing Academy</h3>
							<p>SAP hace constar que:</p>
							<h3 style="border-bottom: 1px solid #000000;padding: 10px 0; margin-bottom: 20px;width:500px;">'.$nombre.'</h3>
							<div class="js-information--curso">
								<p>Ha participado de</p>
								<h3>'.$curso.'</h3>
								<p>Julio del 2018</p>
							</div>
							<div class="js-information--firma" style="margin-top: 20px;">
								<img width="200" style="border-bottom: 1px solid #757575;" src="http://www.sap-latam.com/SAP_Marketing_Academy/public/img/logo/firma.png"/><br><br>
								<span>SAP Partner & SME</span><br>
								<span>Marketing Latin America</span><br>
							</div>
							<img style="float: right;position: absolute;margin-top: -75px;margin-bottom: 14px;" src="http://www.sap-latam.com/SAP_Marketing_Academy/public/img/logo/color'.$img.'.png"/>
						</div>
						<img width="100%" height="18" src="http://www.sap-latam.com/SAP_Marketing_Academy/public/img/logo/barras_'.$fondo.'.png"/>
					</body>
				  </html>';
		$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
		$mpdf ->writeHTML($html);
		$mpdf ->output();
	}
}
