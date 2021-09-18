<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PacienteVacuna_model extends CI_Model
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
    $query = $this->db->query("Select p.nombre as nombrePaciente, v.nombre as nombreVacuna, v.descripcion, 
    obtener_dosis(pv.idDosis) as dosis, obtener_dosis(pv.idSiguienteDosis) as siguienteDosis, pv.fechaSiguienteDosis, pv.idPacienteVacuna
    From sistemapai.pacientevacuna pv
    Inner join sistemapai.paciente p on p.idPaciente=pv.idPaciente
    inner join sistemapai.dosis d on d.idDosis = pv.idDosis
    inner join sistemapai.vacuna v on d.idVacuna = d.idVacuna;");
    return $query;
  }
}
