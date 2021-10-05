<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosis_model extends CI_Model
{
  public $estado;
  public $fechaCreacion;
  public $fechaActualizacion;

  public function __construct() {
    $this->estado = true;
    $this->fechaCreacion = date("Y-m-d H:i:s");
    $this->fechaActualizacion = date("Y-m-d H:i:s");
  }

  public function listaDosis()
  {
    $this->db->select(
      'd.idDosis, d.idVia, d.idCategoriadosis, d.rangoMesInicial, d.rangoMesFinal,
      d.cantidad, d.idVacuna, d.estado, vi.nombre as viaNombre, c.dosis as dosisNombre,
      v.nombre as vacunaNombre');
    $this->db->from('dosis d');
    $this->db->join('via vi', 'vi.idVia = d.idVia');
    $this->db->join('vacuna v', 'd.idVacuna = v.idVacuna');
    $this->db->join('categoriadosis c', 'd.idCategoriadosis = c.idCategoriadosis');
    $this->db->where('d.estado', 1);
    return $this->db->get();
  }

  public function listaDosisVacunas()
  {
    $query = $this->db->query("SELECT d.idDosis, v.idVacuna, v.nombre as nombrevacuna, cd.dosis, via.nombre as nombrevia, d.rangoMesInicial
    FROM sistemapai.dosis d
    INNER JOIN sistemapai.vacuna v on d.idVacuna = v.idVacuna
    INNER JOIN sistemapai.via on via.idVia = d.idVia
    INNER JOIN sistemapai.categoriadosis cd on cd.idCategoriadosis = d.idCategoriadosis
    WHERE d.estado = 1
    ORDER BY (d.rangoMesInicial) ASC");
    return $query;
  }

  public function listaDosisPaciente($idPaciente)
  {
    $this->db->select(
      'd.idDosis, d.idVia, d.idCategoriadosis, d.rangoMesInicial, d.rangoMesFinal,
      d.cantidad, d.idVacuna, d.estado, vi.nombre as viaNombre, c.dosis as dosisNombre,
      v.nombre as vacunaNombre');
    $this->db->from('dosis d');
    $this->db->join('via vi', 'vi.idVia = d.idVia');
    $this->db->join('vacuna v', 'd.idVacuna = v.idVacuna');
    $this->db->join('categoriadosis c', 'd.idCategoriadosis = c.idCategoriadosis');
    $this->db->join('paciente p', 'p.idPaciente = d.idPaciente');
    $this->db->where('d.estado', 1);
    $this->db->where('d.idPaciente', $idPaciente);
    return $this->db->get();
  }

  

  public function listaDosisPorIdVacuna($idVacuna)
  {
    $this->db->select('d.idDosis, d.idVia, d.idCategoriadosis, d.rangoMesInicial, d.rangoMesFinal, d.cantidad, d.idVacuna, d.estado, vi.nombre as viaNombre, c.dosis as dosisNombre ');
    $this->db->from('dosis d');
    $this->db->where('d.idVacuna', $idVacuna);
    $this->db->where('d.estado', 1);
    $this->db->join('via vi', 'vi.idVia = d.idVia');
    $this->db->join('vacuna v', 'd.idVacuna = v.idVacuna');
    $this->db->join('categoriadosis c', 'd.idCategoriadosis = c.idCategoriadosis');
    return $this->db->get();
  }

  public function registrarDosis($data, $idAutor)
  {
    $data['fechaCreacion'] = $this->fechaCreacion;
    $data['estado'] = $this->estado;
    $data['idAuthor'] = $idAutor;
    $this->db->insert('dosis', $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function actualizarDosis($idDosis, $data, $idAutor)
  {
    $data['fechaActualizacion'] = $this->fechaActualizacion;
    $data['idAuthor'] = $idAutor;
    $this->db->where('idDosis', $idDosis);
    $this->db->update('dosis', $data);
  }

  public function eliminarDosisPorIdVacuna($idVacuna, $idAutor)
  {
    $data['estado'] = !$this->estado;
    $data['fechaActualizacion'] = $this->fechaActualizacion;
    $data['idAuthor'] = $idAutor;
    $this->db->where('idVacuna', $idVacuna);
    $this->db->update('dosis', $data);
  }

  public function eliminarDosis($idDosis, $idAutor)
  {
    $data['estado'] = !$this->estado;
    $data['fechaActualizacion'] = $this->fechaActualizacion;
    $data['idAuthor'] = $idAutor;
    $this->db->where('idDosis', $idDosis);
    $this->db->update('dosis', $data);
  }
}
