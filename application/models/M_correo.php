<?php

class M_correo extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDatosCorreos($name) {
        $sql = "SELECT * 
                  FROM personas p, 
                       persona_x_curso pc
                  WHERE p.email LIKE ? 
                    AND p.id = pc.id_persona";
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
}