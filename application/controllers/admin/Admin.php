<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        // if($this->session->userdata('usuario') == null){
        //     header("location: Login");
        // } else {
            $html1 = '';
            $html2 = '';
            $html3 = '';
            $usuarios = $this->M_correo->getAllUsers();
            $ingresos = $this->M_correo->getIngresos();
            $descargas= $this->M_correo->getDescargas();
            foreach ($usuarios as $key) {
                $html1 .= '';
            }
            foreach ($ingresos as $key) {
                $html2 .= '<tr>
                               <td></td>
                               <td></td>
                           </tr>';
            }
            foreach ($descargas as $key) {
                $html3 .= '';
            }
            $data['table1'] = $html1;
            $data['table2'] = $html2;
            $data['table3'] = $html3;
            $this->load->view('admin/v_admin', $data);
        // }
	}
    function cerrarCesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('usuario');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
