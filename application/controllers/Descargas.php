<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descargas extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_correo');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index(){
        if($this->session->userdata('correo') == null){
            header("location: Login");
        }
        $data['nombre']    = $this->session->userdata('Nombres');
        $data['apellidos'] = $this->session->userdata('Apellidos');
        $data['pais']      = $this->session->userdata('Pais') == null ? '-' : $this->session->userdata('Pais');
        $data['correo']    = $this->session->userdata('correo') == null ? '-' : $this->session->userdata('correo');
        $data['empresa']   = $this->session->userdata('empresa') == null ? '-' : $this->session->userdata('empresa');
        $username          = $this->M_correo->getDatosCorreos($this->session->userdata('correo'));
        $html = '';
        $pdf  = '';
        $btn  = '';
        foreach ($username as $key) {
            // $pdf = RUTA_ARCHIVOS.$key->certificados;
            // if(isset($key->certificados)){
            //     $btn = '<a onclick="openPDF(&quot;'.$pdf.'&quot;)"><i></i>Previsualizar</a>';
            // }else {
            //     $btn  = '<a onclick="openPDF(&quot;'.$pdf.'&quot;)" style="pointer-events: none;"><i></i>Previsualizar</a>';
            // }
            $html .= '<div class="certificados">
                        <div class="contenido">
                            <img src="'.RUTA_IMG.'logo/pdf.png">
                            <p><a href="Certificado" target="_blank">Previsualizar</a></p>
                        </div>
                    </div>
                    <div class="redes" style="display: none;">
                        <a class="mdl-button mdl-js-button mdl-button--icon twitter" href = "https://twitter.com/intent/tweet?status='.RUTA_ARCHIVOS.'$key->certificados" data-size = "large"><i class="fa fa-twitter"></i></a>
                        <a class="mdl-button mdl-js-button mdl-button--icon linkedin" href = "https://www.linkedin.com/shareArticle?mini=true&url=http://www.sap-latam.com/sap_business_one/Prueba&title=Publicación&source=SAP" data-size="large"><i class="fa fa-linkedin"></i></a>
                        <a class="mdl-button mdl-js-button mdl-button--icon facebook" href = "http://facebook.com/sharer.php?u=http://www.sap-latam.com/sap_business_one/Prueba" data-size="large"><i class="fa fa-facebook"></i></a>
                        <a class="mdl-button mdl-js-button mdl-button--icon google" href = "https://plus.google.com/share?url=http://www.sap-latam.com/sap_business_one/Prueba" data-size="large"><i class="fa fa-google-plus"></i></a>
                    </div>';
        }
        $data['html'] = $html;
		$this->load->view('v_certificados', $data);
	}
    function cerrarSesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('correo');
            $data['error'] = EXIT_SUCCESS;
        }catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}