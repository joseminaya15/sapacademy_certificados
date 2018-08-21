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

    function getAllCursos() {
        $sql = "SELECT nombre
                  FROM cursos";
        $result = $this->db->query($sql);
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

    function guardaDescarga($tabla, $arrayInsert){
        $this->db->insert($tabla, $arrayInsert);
        $sql = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj"=> MSJ_INS);
    }

    function getAllUsers ($idioma = null, $curso = null){
        $where = '';
        $condicion = '';
        if($idioma == 'es') {
            $where .= '  AND p.id <= 385';
        } else if ($idioma == 'pt') {
            $where .= '  AND p.id > 385';
        }
        if($curso != null) {
            $where    .= " AND pc.id_curso = ".$curso;
            $condicion = " AND d.id_curso = ".$curso;
        } 
        $sql = "SELECT p.*,
                       CASE WHEN ( (SELECT GROUP_CONCAT(DISTINCT(c.nombre)) 
                                      FROM cursos c,
                                           descarga d,
                                           persona_x_curso pc
                                     WHERE d.id_curso = c.id
                                       AND d.id_persona = p.id
                                       ".$condicion.") IS NOT NULL )
                         THEN (SELECT GROUP_CONCAT(DISTINCT(c.nombre)) 
                                 FROM cursos c,
                                      descarga d,
                                      persona_x_curso pc
                                WHERE d.id_curso = c.id
                                  AND d.id_persona = p.id
                                  ".$condicion.") ELSE '  ' 
                         END AS curso
                  FROM personas p,
                       persona_x_curso pc,
                       cursos c
                 WHERE p.id = pc.id_persona
                   AND c.id = pc.id_curso "
                   .$where."
              GROUP BY p.id";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function getIngresos ($idioma = null){
        $where = '';
        if($idioma == 'es') {
            $where = 'AND p.id <= 385';
        } else if ($idioma == 'pt') {
            $where = 'AND p.id > 385';
        }
        $sql = "SELECT p.Nombres,
                       COALESCE(DATE_FORMAT(i.fecha_ingreso, '%d/%m/%Y %H:%i %p'), '00/00/0000 00:00') AS fecha,
                       i.fecha_ingreso
                  FROM ingreso i, 
                       personas p 
                 WHERE p.id = i.id_persona "
                 .$where." 
              ORDER BY fecha_ingreso desc";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function getDescargas ($curso = null) {
        $where = ($curso == null) ? '' : " AND c.nombre LIKE '".$curso."' ";
        $sql = "SELECT p.Nombres AS usuario,
                       c.nombre AS curso
                  FROM descarga d,
                       cursos c,
                       personas p 
                 WHERE p.id = d.id_persona 
                   AND c.id = d.id_curso "
                   .$where;
        $result = $this->db->query($sql);
        return $result->result();
    }
}