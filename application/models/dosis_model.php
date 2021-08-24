<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosis_model extends CI_Model
{
/*   public function lista()
  {
    $this->db->select('v.idVacuna, v.nombre, v.descripcion, via.nombre as via, d.orden as dosis, d.orden, d.orden');
    $this->db->from('vacuna v');
    $this->db->join('dosis d', 'v.idVacuna = d.idVacuna', 'left');
    $this->db->join('via', 'via.idVia = d.idVia');
    return $this->db->get();
  } */

  public function registrarDosis($data)
  {
    $data['fechaCreacion'] = date("Y-m-d H:i:s");
    $this->db->insert('dosis', $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function listaDosisPorIdVacuna($idVacuna)
  {
    $this->db->select('d.idDosis, d.idVia, d.idCategoriaDosis, d.rangoMesInicial, d.rangoMesFinal, d.cantidad, d.idVacuna, d.estado, vi.nombre as viaNombre, c.dosis as dosisNombre ');
    $this->db->from('dosis d');
    $this->db->where('d.idVacuna', $idVacuna);
    $this->db->where('d.estado', 1);
    $this->db->join('via vi', 'vi.idVia = d.idVia');
    $this->db->join('vacuna v', 'd.idVacuna = v.idVacuna');
    $this->db->join('categoriadosis c', 'd.idCategoriaDosis = c.idCategoriaDosis');
    return $this->db->get();
  }

  public function actualizarDosis($idDosis, $data)
  {
    $data['fechaActualizacion'] = date("Y-m-d H:i:s");
    $this->db->where('idDosis', $idDosis);
    $this->db->update('dosis', $data);
  }

  public function eliminarDosisPorIdVacuna($idVacuna)
  {
    $data['estado'] = 0;
    $data['fechaActualizacion'] = date("Y-m-d H:i:s");
    $this->db->where('idVacuna', $idVacuna);
    $this->db->update('dosis', $data);
  }

  public function eliminarDosis($idDosis)
  {
    $data['estado'] = 0;
    $data['fechaActualizacion'] = date("Y-m-d H:i:s");
    $this->db->where('idDosis', $idDosis);
    $this->db->update('dosis', $data);
  }
}
