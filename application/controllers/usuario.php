<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

    public function index()
    {
        $lista = $this->usuario_model->lista();
        $data['usuario'] = $lista;

        $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
        $data['nombre']  = $this->session->userdata('nombre');
        $data['primerApellido']  = $this->session->userdata('primerApellido');
        $data['segundoApellido']  = $this->session->userdata('segundoApellido');
        
        $this->load->view('inc_header');
        $this->load->view('inc_menu', $data);
        $this->load->view('usuario/usuario_lista', $data);
        $this->load->view('inc_footer');
    }

    public function agregar()
    {
        $this->load->view('inc_header');
        $this->load->view('usuario/usuario_agregar');
        $this->load->view('inc_footer');
    }

    public function agregarbd()
    {
        $data['nombre'] = $_POST['nombre'];
        $data['primerApellido'] = $_POST['primerApellido'];
        $data['segundoApellido'] = $_POST['segundoApellido'];
        $data['direccion'] = $_POST['direccion'];
        $data['tipoUsuario'] = $_POST['tipoUsuario'];
        $data['correo'] = $_POST['correo'];

        if (isset($_POST['habilitado'])) {
            $data['habilitado'] = true;
        } else {
            $data['habilitado'] = false;
        }

        $this->usuario_model->agregarUsuario($data);
        redirect('usuario/index', 'refresh');
    }

    public function modificar()
    {
        $idUsuario = $_POST['idUsuario'];
        $data['infoUsuario'] = $this->usuario_model->recuperarUsuario($idUsuario);
        $this->load->view('inc_header');
        $this->load->view('usuario/usuario_modificar', $data);
        $this->load->view('inc_footer');
    }

    public function modificarbd()
    {
        $idUsuario = $_POST['idUsuario'];
        $data['nombre'] = $_POST['nombre'];
        $data['primerApellido'] = $_POST['primerApellido'];
        $data['segundoApellido'] = $_POST['segundoApellido'];
        $data['direccion'] = $_POST['direccion'];

        $data['correo'] = $_POST['correo'];

        if (isset($_POST['habilitado'])) {
            $data['habilitado'] = true;
        } else {
            $data['habilitado'] = false;
        }

        $this->usuario_model->modificarUsuario($idUsuario, $data);
        redirect('usuario/index', 'refresh');
    }

    public function eliminarbd()
    {
        $idUsuario = $_POST['idUsuario'];
        $this->usuario_model->eliminarUsuario($idUsuario);
        redirect('usuario/index', 'refresh');
    }

    public function buscarPorNombre()
    {
        $nombre = $_POST['nombre'];

        if (isset($nombre) && !empty($nombre) && !is_null($nombre)) {
            $data['infoUsuario'] = $this->usuario_model->buscarPorNombre($nombre);
            $this->load->view('inc_header');
            $this->load->view('paciente_agregar', $data);
            $this->load->view('inc_footer');
        }
    }

    public function modificarDatosPersonales()
    {
        $idUsuario = $this->session->userdata('idUsuario');
        $data['infoUsuario'] = $this->usuario_model->recuperarUsuario($idUsuario);

        //datos de session
        $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
        $data['nombre']  = $this->session->userdata('nombre');
        $data['primerApellido']  = $this->session->userdata('primerApellido');
        $data['segundoApellido']  = $this->session->userdata('segundoApellido');

        $this->load->view('inc_header');
        $this->load->view('inc_menu', $data);
        $this->load->view('usuario/usuario_modificar_datos_personales', $data);
        $this->load->view('inc_footer');
    }

    public function modificarbdDatosPersonales()
    {
        $idUsuario = $_POST['idUsuario'];
        $data['nombre'] = $_POST['nombre'];
        $data['primerApellido'] = $_POST['primerApellido'];
        $data['segundoApellido'] = $_POST['segundoApellido'];
        $data['direccion'] = $_POST['direccion'];
        $data['correo'] = $_POST['correo'];
        $data['nombreUsuario'] = $_POST['nombreUsuario'];
        $data['contrasena'] = $_POST['contrasena'];

        $this->usuario_model->modificarUsuario($idUsuario, $data);
        redirect('usuario/index', 'refresh');

    }
}
