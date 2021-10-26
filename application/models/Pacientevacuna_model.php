<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PacienteVacuna_model extends CI_Model
{
  public $estado;
  public $fechaCreacion;
  public $fechaActualizacion;

  public function __construct()
  {
    $this->estado = true;
    $this->fechaCreacion = date("Y-m-d H:i:s");
    $this->fechaActualizacion = date("Y-m-d H:i:s");
  }

  public function lista()
  {
    $query = $this->db->query("Select p.nombre as nombrePaciente, 
    obtener_dosis(pv.idDosis) as dosis, obtener_vacuna(pv.idDosis) as nombreVacuna, pv.idPacienteVacuna, d.rangoMesInicial, pv.fechaVacuna
    From pacientevacuna pv
    inner join paciente p on p.idPaciente=pv.idPaciente
    inner join dosis d on d.idDosis = pv.idDosis
    order by d.rangoMesInicial asc;");
    return $query;
  }

  public function agregarPacienteVacuna($idAutor, $data)
  {
    $data['fechaCreacion'] = $this->fechaCreacion;
    $data['estado'] = $this->estado;
    $data['idAuthor'] = $idAutor;
    $this->db->insert('pacientevacuna', $data);
  }
}
