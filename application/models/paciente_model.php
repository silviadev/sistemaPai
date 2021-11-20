<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_model extends CI_Model {
   
	public function lista()
	{
		$this->db->select('p.*, concat(u.nombre, " ", u.primerApellido, " ", u.segundoApellido) as tutor');
        $this->db->from('paciente p');
        $this->db->where('p.estado', 1);
        $this->db->join('usuario u', 'u.idUsuario = p.idUsuario');
        return $this->db->get();
	}
	
    public function recuperarPaciente($idPaciente){
        $this->db->select('p.idPaciente, p.primerApellido, p.segundoApellido, p.nombre, p.fechaNacimiento, p.edad, p.sexo, p.idUsuario, p.foto, u.ci, u.nombre as nombreUsuario');
        $this->db->from('paciente p'); 
        $this->db->where('p.idPaciente', $idPaciente);
        $this->db->where('p.estado', 1);
        $this->db->join('usuario u', 'u.idUsuario = p.idUsuario');
        return $this->db->get();
	}

    public function recuperarPacientesPorIdUsuario($idUsuario) {
        $this->db->select('p.idPaciente, p.primerApellido, p.segundoApellido, p.nombre,
        p.primerApellido, p.segundoApellido, p.fechaNacimiento, p.edad, p.sexo, p.fechaNacimiento,
        p.idUsuario, p.codigo, p.fechaCreacion, u.nombre as nombreTutor, u.primerApellido as primerApellidoTutor,
        u.segundoApellido as segundoApellidoTutor, u.ci, u.direccion');
        $this->db->from('paciente p'); 
        $this->db->where('p.idUsuario', $idUsuario);
        $this->db->where('p.estado', 1);
        $this->db->join('usuario u', 'u.idUsuario = p.idUsuario');
        return $this->db->get();
    }

    public function modificarPaciente($idPaciente, $data)
    {
        $data['fechaActualizacion'] = date("Y-m-d H:i:s");
        $this->db->where('idPaciente', $idPaciente);
        $this->db->update('paciente', $data); 
    }

    public function agregarPaciente($data)
    {
        $data['fechaCreacion'] = date("Y-m-d H:i:s");
        $this->db->insert('paciente', $data); 
    }

    public function eliminarPaciente($idPaciente)
    {
        $data['estado'] = false;
        $data['fechaActualizacion'] = date("Y-m-d H:i:s");
        $this->db->where('idPaciente', $idPaciente);
        $this->db->update('paciente', $data);
    }

    public function recuperarUsuarioPorIdPaciente($idPaciente) {
        $this->db->select('u.nombre as nombreTutor, u.primerApellido as primerApellidoTutor, u.segundoApellido as segundoApellidoTutor, u.ci, p.nombre as nombrePaciente, p.primerApellido as primerApellidoPaciente, p.segundoApellido as segundoApellidoPaciente, p.codigo, p.sexo');
        $this->db->from('paciente p');
        $this->db->where('p.idPaciente', $idPaciente);
        $this->db->join('usuario u', 'u.idUsuario = p.idUsuario' );
        return $this->db->get();
    }
}

