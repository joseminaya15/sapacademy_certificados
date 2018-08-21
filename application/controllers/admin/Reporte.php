<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

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
            $combo = '';
            $cursos   = $this->M_correo->getAllCursos();
            $usuarios = $this->M_correo->getAllUsers();
            $ingresos = $this->M_correo->getIngresos();
            $descargas= $this->M_correo->getDescargas();
            foreach ($usuarios as $key) {
                $html1 .= '<tr>
                               <td>'.$key->Nombres.'</td>
                               <td>'.$key->email.'</td>
                               <td>'.$key->empresa.'</td>
                               <td>'.$key->pais.'</td>
                               <td>'.$key->curso.'</td>
                           </tr>';
            }
            foreach ($ingresos as $key) {
                $html2 .= '<tr>
                               <td>'.$key->Nombres.'</td>
                               <td>'.$key->fecha.'</td>
                           </tr>';
            }
            foreach ($descargas as $key) {
                $html3 .= '<tr>
                               <td>'.$key->usuario.'</td>
                               <td>'.$key->curso.'</td>
                           </tr>';
            }
            foreach ($cursos as $key) {
                $combo .= '<option value="'.$key->nombre.'">'.$key->nombre.'</option>';
            }
            $data['table1'] = $html1;
            $data['table2'] = $html2;
            $data['table3'] = $html3;
            $data['cursos'] = $combo;
            $this->load->view('admin/v_admin', $data);
        // }
	}

    function ingresoIdioma () {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html1    = '';
            $idioma   = $this->input->post('idioma');
            $ingresos = $this->M_correo->getIngresos($idioma);
            foreach ($ingresos as $key) {
                $html1 .= '<tr>
                               <td>'.$key->Nombres.'</td>
                               <td>'.$key->fecha.'</td>
                           </tr>';
            }
            $data['html']  = $html1;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function usuarioIdiomaCurso () {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html1    = '';
            $idioma   = $this->input->post('idioma');
            $curso    = $this->input->post('curso');
            $idCurso  = $this->M_correo->getDatosCurso($curso);
            $usuarios = $this->M_correo->getAllUsers($idioma, $idCurso[0]->id);
            foreach ($usuarios as $key) {
                $html1 .= '<tr>
                               <td>'.$key->Nombres.'</td>
                               <td>'.$key->email.'</td>
                               <td>'.$key->empresa.'</td>
                               <td>'.$key->pais.'</td>
                               <td>'.$key->curso.'</td>
                           </tr>';
            }
            $data['html']  = $html1;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function descargaCursos () {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html1    = '';
            $curso    = $this->input->post('curso');
            $usuarios = $this->M_correo->getDescargas($curso);
            foreach ($usuarios as $key) {
                $html1 .= '<tr>
                               <td>'.$key->usuario.'</td>
                               <td>'.$key->curso.'</td>
                           </tr>';
            }
            $data['html']  = $html1;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
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
