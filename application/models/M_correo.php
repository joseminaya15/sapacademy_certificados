<?php

class M_correo extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDatosCorreos($name) {
        $sql = "SELECT *
                  FROM emails
                 WHERE Email LIKE ?";
        $result = $this->db->query($sql, array($name));
        return $result->result();
    }

    function getDatos() {
        $sql = "SELECT *
                  FROM emails";
        $result = $this->db->query($sql);
        return $result->result();
    }
}