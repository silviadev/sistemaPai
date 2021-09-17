<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacuna_model extends CI_Model
{
  public $estado;
  public $fechaCreacion;
  public $fechaActualizacion;

  public function __construct() {
    $this->estado = true;
    $this->fechaCreacion = date("Y-m-d H:i:s");
    $this->fechaActualizacion = date("Y-m-d H:i:s");
  }

  public function lista()
  {
    $this->db->select('*');
    $this->db->from('vacuna');
    $this->db->where('estado', true);
    return $this->db->get();
  }

  public function recuperarVacunaPorId($idVacuna)
  {
    $this->db->select('*');
    $this->db->from('vacuna');
    $this->db->where('idVacuna', $idVacuna);
    return $this->db->get();
  }

  public function registrarVacuna($data, $idAutor)
  {
    $data['fechaCreacion'] = $this->fechaCreacion;
    $data['estado'] = $this->estado;
    $data['idAuthor'] = $idAutor;
    $this->db->insert('vacuna', $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function eliminarVacuna($idVacuna, $idAutor)
  {
    $data['fechaActualizacion'] = $this->fechaActualizacion;
    $data['estado'] = !$this->estado;
    $data['idAuthor'] = $idAutor;
    $this->db->where('idVacuna', $idVacuna);
    $this->db->update('vacuna', $data);
  }

  public function actualizarVacuna($idVacuna, $data, $idAutor)
  {
    $data['fechaActualizacion'] = $this->fechaActualizacion;
    $data['idAuthor'] = $idAutor;
    $this->db->where('idVacuna', $idVacuna);
    $this->db->update('vacuna', $data);
  }
}
