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
        if($this->session->userdata('email') == null){
            header("location: Login");
        }
        $data['nombre']    = $this->session->userdata('Nombres');
        $data['email']    = $this->session->userdata('email') == null ? '-' : $this->session->userdata('email');
        $data['empresa']   = $this->session->userdata('empresa') == null ? '-' : $this->session->userdata('empresa');
        $data['pais']      = $this->session->userdata('pais') == null ? '-' : $this->session->userdata('pais');
        $username          = $this->M_correo->getDatosCorreos($this->session->userdata('email'));
        $html = '';
        $pdf  = '';
        $btn  = '';
        foreach ($username as $key) {
            $html .= '<div class="js-certificados__contenido">
                        <div class="js-certificados__contenido--left">
                            <img src="'.RUTA_IMG.'logo/pdf.png">
                            <p>'.$key->nombre_curso.'</p>
                        </div>
                        <div class="js-certificados__contenido--right">
                            <a target="_blank" onclick="certificado(&quot;'.base64_encode($key->nombre_curso).'&quot;);">Previsualizar</a>
                        </div>
                    </div>';
        }
        $data['html'] = $html;
		$this->load->view('es/v_certificados', $data);
	}
    function descarga (){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $recibo = $this->input->post('session');
            $nombre = base64_decode($recibo);
            $session = array('curso' => $nombre);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function cerrarSesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('email');
            $data['error'] = EXIT_SUCCESS;
        }catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}