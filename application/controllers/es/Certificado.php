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
		$Apellidos = $this->session->userdata('Apellidos');
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
								margin: 5px 0;
								font-family: "Roboto",sans-serif;
								font-weight: bold;
								color: #000000;
							}
							.js-information p{
								font-size: 20px;
								font-family: "Roboto",sans-serif;
								font-weight: light;
								color: #231F20;
							}
							.js-information h3{
								font-size: 36px;
								line-height: 38px;
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
								font-size: 20px;
								line-height: 22px;
								margin: 5px 0;
							}
							.js-information span{
								font-size: 14px;
								font-family: "Roboto",sans-serif;
								font-weight: light;
								display: block;
								color: #231F20;
							}
						</style>
					</head>
					<body>
						<div class="fondo-imagen">
							<img style="width: 100%;" src="http://hpedigitalmarketingacademy.com/Certificados/public/img/fondo/fondo.png"/>
						</div>
						<div class="js-information">
							<h2>Certificado</h2>
							<h3>SAP Marketing Academy</h3>
							<p>SAP hace constar que:</p>
							<h3>'.$nombre.' '.$Apellidos.'</h3>
							<div class="js-information--curso">
								<p>Ha participado de</p>
								<h3>Marketing Mix Modeling</h3>
								<p>Julio del 2018</p>
							</div>
							<div class="js-information--firma">
								<img width="250" style="border-bottom: 1px solid #757575;" src="http://hpedigitalmarketingacademy.com/Certificados/public/img/fondo/firma.jpg"/><br><br>
								<span>SAP Partner & SME</span><br>
								<span>Marketing Latin America</span><br>
							</div>
						</div>
					</body>
				  </html>';
		$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
		$mpdf ->writeHTML($html);
		$mpdf ->output();
	}
}
