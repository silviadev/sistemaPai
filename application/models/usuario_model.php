<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function validar($nombreUsuario, $contrasena)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('nombreUsuario', $nombreUsuario);
        $this->db->where('contrasena', $contrasena);
        $this->db->where('habilitado', 1);
        return $this->db->get();
    }

	public function lista()
	{
		$this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('estado', 1);
        return $this->db->get();
	}
	
    public function recuperarUsuario($idUsuario){
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->get();
	}

    public function recuperarUsuarioPorCi($ci)
    {
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('ci', $ci);
        return $this->db->get();
    }

    public function recuperarUsuarioTutorPorCi($ci)
    {
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('ci', $ci);
        $this->db->where('tipoUsuario', 'tutor');
        return $this->db->get();
    }

    public function modificarUsuario($idUsuario, $data)
    {
        $data['fechaActualizacion'] = date("Y-m-d H:i:s");
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data); 
    }

    public function agregarUsuario($data) {
        $nombreUsuario = substr($data['nombre'], 0, 1).$data['primerApellido'];
        $data['nombreUsuario'] = strtolower($nombreUsuario);
        $data['contrasena'] = md5(strtolower($data['ci']));
        $data['fechaCreacion'] = date("Y-m-d H:i:s");
        $this->db->insert('usuario', $data); 
    }

    public function eliminarUsuario($idUsuario)
    {
        $data['estado'] = false;
        $data['fechaActualizacion'] = date("Y-m-d H:i:s");
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data);
    }

    public function buscarPorNombre($nombre) 
    {
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->like('nombre', $nombre);
        return $this->db->get();
    }

    public function get_user($id)
    {
        $this->db->where('idUsuario', $id);
        $query = $this->db->get('usuario');
        return $query->row();
    }

    public function update_user($id, $data)
    {   
        $data['fechaActualizacion'] = date("Y-m-d H:i:s");
        $this->db->where('idUsuario', $id);
        $this->db->update('usuario', $data);
    }
}
