<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacuna_model extends CI_Model
{
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

  public function registrarVacuna($data)
  {
    $data['fechaCreacion'] = date("Y-m-d H:i:s");
    $this->db->insert('vacuna', $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function eliminarVacuna($idVacuna)
  {
    $data['estado'] = false;
    $data['fechaActualizacion'] = date("Y-m-d H:i:s");
    $this->db->where('idVacuna', $idVacuna);
    $this->db->update('vacuna', $data);
  }

  public function actualizarVacuna($idVacuna, $data)
  {
    $data['fechaActualizacion'] = date("Y-m-d H:i:s");
    $this->db->where('idVacuna', $idVacuna);
    $this->db->update('vacuna', $data);
  }
}
