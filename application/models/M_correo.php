<?php

class M_correo extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDatosCorreos($name) {
        $sql = "SELECT p.*,
                       c.nombre AS nombre_curso,
                       c.id AS idcurso
                  FROM personas p,
                       cursos c,
                       persona_x_curso pc
                 WHERE p.email LIKE ?
                   AND p.id = pc.id_persona
                   AND c.id = pc.id_curso";
        $result = $this->db->query($sql, array($name));
        return $result->result();
    }

    function getDatosCurso($name) {
        $sql = "SELECT *
                  FROM cursos
                 WHERE nombre LIKE ?";
        $result = $this->db->query($sql, array($name));
        return $result->result();
    }

    function getDatos() {
        $sql = "SELECT *
                  FROM personas";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function guardaIngreso($tabla, $arrayInsert){
        $this->db->insert($tabla, $arrayInsert);
        $sql = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj"=> MSJ_INS);
    }

    function getAllUsers (){
        $sql = "";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function getIngresos (){
        $sql = "";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function getDescargas () {
        $sql = "";
        $result = $this->db->query($sql);
        return $result->result();
    }
}