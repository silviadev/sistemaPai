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
        return $this->db->get();
	}
	
    public function recuperarUsuario($idUsuario){
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->get();
	} 

    public function modificarUsuario($idUsuario, $data)
    {
        $data['fechaActualzacion'] = date("Y-m-d H:i:s");
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data); 
    }
    public function agregarUsuario($data) {

        $data['nombreUsuario'] = strtolower($data['nombre'].".".$data['primerApellido']);
        //$data['contrasena'] = md5(strtolower($data['nombre'].".".$data['primerApellido']."!.."));
        $data['contrasena'] = strtolower($data['nombre'].".".$data['primerApellido']."!..");
        $data['fechaCreacion'] = date("Y-m-d H:i:s");
        $this->db->insert('usuario', $data); 
    }
    public function eliminarUsuario($idUsuario){

        $this->db->where('idUsuario', $idUsuario);
        $this->db->delete('usuario'); 
    }

    public function buscarPorNombre($nombre) 
    {
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->like('nombre', $nombre);
        return $this->db->get();
    }
}
