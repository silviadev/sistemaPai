<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $estado;
    public $fechaCreacion;
    public $fechaActualizacion;

    public function __construct(){
        $this->estado = true;
        $this->fechaCreacion = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

    public function validar($nombreUsuario, $contrasena, $tipoUsuario)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('nombreUsuario', $nombreUsuario);
        $this->db->where('contrasena', $contrasena);
        $this->db->where('habilitado', 1);
        if ($tipoUsuario !== "") {
            $this->db->where('tipoUsuario', $tipoUsuario);
        }
        $this->db->where('estado', 1);
        return $this->db->get();
    }

    public function listaUsuarioPorTipo($tipo)
	{
		$this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('estado', 1);
        $this->db->where('tipoUsuario', $tipo);
        return $this->db->get();
	}

	public function lista()
	{
		$this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('estado', 1);
       
        return $this->db->get();
	}

    public function listaTutores()
    {
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('tipoUsuario', "tutor");
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
        $this->db->where('estado', 1);
        return $this->db->get();
    }

    public function recuperarUsuarioTutorPorCi($ci)
    {
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('ci', $ci);
        $this->db->where('estado', 1);
        $this->db->where('tipoUsuario', 'tutor');
        return $this->db->get();
    }

    public function modificarUsuario($idUsuario, $data)
    {
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data); 
    }

    public function agregarUsuario($data) {
        $data['contrasena'] = md5(strtolower($data['ci']));
        $data['fechaCreacion'] =  $this->fechaCreacion;
        $data['estado'] = $this->estado;
        $this->db->insert('usuario', $data); 
    }

    public function eliminarUsuario($idUsuario, $idAutor)
    {
        $data['estado'] = !$this->estado;
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $data['idAuthor'] = $idAutor;
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
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idUsuario', $id);
        $this->db->update('usuario', $data);
    }


    public function validarResetEmail($email)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $email);
        $this->db->where('habilitado', 1);
        $this->db->where('estado', 1);
        return $this->db->get();
    }

    public function guardarCodigoReset($data, $idUsuario)
    {
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data);
        if($this->db->affected_rows() > 0){
            return $idUsuario;
         } else {
            return false;
         }
    }

    public function validarResetCodigo($codigoReset, $idUsuario)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('idUsuario', $idUsuario);
        $this->db->where('codigoReset', $codigoReset);
        $this->db->where('habilitado', 1);
        $this->db->where('estado', 1);
        return $this->db->get();
    }

    public function verificarNombreUsuario($nonmbreUsuario) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('nombreUsuario', $nonmbreUsuario);
        $this->db->where('estado', 1);
        return $this->db->get();
    }
}
