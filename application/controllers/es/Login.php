<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->session->unset_userdata('email');
	    $this->session->unset_userdata('Nombres');
	    $this->session->unset_userdata('pais');
	    $this->session->unset_userdata('id');
		$this->load->view('es/v_login');
	}

	function ingresar() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
			$email    = $this->input->post('email');
			$username = $this->M_correo->getDatosCorreos($email);
			if(count($username) != 0) {
				if ($username[0]->id <= 385) {
					if($username[0]->email == $email) {
					$session = array('email'     => $email,
									 'Nombres'   => $username[0]->Nombres,
									 'pais' 	 => $username[0]->pais,
									 'empresa' 	 => $username[0]->empresa,
									 'id' 		 => $username[0]->id);
	          		$this->session->set_userdata($session);
	          		$arrayInsert = array('id_persona'    => $username[0]->id,
	          							 'fecha_ingreso' => date('Y-m-d H:i:s') );
	          		$this->M_correo->guardaIngreso('ingreso', $arrayInsert);
					$data['error'] = EXIT_SUCCESS;
					}
				} else {
					$data['msj'] = 'Usuario registrado en otro idioma';
				}
			} else {
				$data['msj'] = 'Usuario no registrado';
			}
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}
}
