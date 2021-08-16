<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paciente extends CI_Controller
{

    public function index()
    {

        $lista = $this->paciente_model->lista();
        $data['paciente'] = $lista;

        $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
        $data['nombre']  = $this->session->userdata('nombre');
        $data['primerApellido']  = $this->session->userdata('primerApellido');
        $data['segundoApellido']  = $this->session->userdata('segundoApellido');


        $this->load->view('inc_header');
        $this->load->view('inc_menu', $data);
        $this->load->view('paciente_lista', $data);
        $this->load->view('inc_footer');
    }

    public function modificar()
    {
        $idPaciente = $_POST['idPaciente'];
        $data['infoPaciente'] = $this->paciente_model->recuperarPaciente($idPaciente);

        $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
        $data['nombre']  = $this->session->userdata('nombre');
        $data['primerApellido']  = $this->session->userdata('primerApellido');
        $data['segundoApellido']  = $this->session->userdata('segundoApellido');

        $this->load->view('inc_header');
        $this->load->view('inc_menu', $data);
        $this->load->view('paciente_modificar', $data);
        $this->load->view('inc_footer');
    }

    public function modificarbd()
    {
        $this->load->helper('funciones');
        $idPaciente = $_POST['idPaciente'];
        $data['nombre'] = $_POST['nombre'];
        $data['primerApellido'] = $_POST['primerApellido'];
        $data['segundoApellido'] = $_POST['segundoApellido'];
        $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
        $data['edad'] = calculaEdad($data['fechaNacimiento']);
        $data['sexo'] = $_POST['sexo'];
        $data['estatura'] = $_POST['estatura'];
        $data['peso'] = $_POST['peso'];

        $this->paciente_model->modificarPaciente($idPaciente, $data);
        $this->subirFoto($idPaciente);
        redirect('paciente/index', 'refresh');
    }
    public function agregar()
    {
        
        $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
        $data['nombre']  = $this->session->userdata('nombre');
        $data['primerApellido']  = $this->session->userdata('primerApellido');
        $data['segundoApellido']  = $this->session->userdata('segundoApellido');

        $this->load->view('inc_header');
        $this->load->view('inc_menu', $data);
        $this->load->view('paciente_agregar');
        $this->load->view('inc_footer');
    }

    public function crearPaciente()
    {
        $this->load->helper('funciones');
        $ci = $_POST['ci'];
        $data['nombre'] = $_POST['nombre'];
        $data['primerApellido'] = $_POST['primerApellido'];
        $data['segundoApellido'] = $_POST['segundoApellido'];
        $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
        $data['edad'] = calculaEdad($data['fechaNacimiento']);
        $data['sexo'] = $_POST['sexo'];
        $data['estatura'] = $_POST['estatura'];
        $data['peso'] = $_POST['peso'];
        $this->load->model('usuario_model');
        $usuario = $this->usuario_model->recuperarUsuarioPorCi($ci);
        $result = $usuario->result();

        if (count($result) > 0)
        {   $data['idUsuario'] = $result[0]->idUsuario;
            $this->paciente_model->agregarPaciente($data);
            redirect('paciente/index', 'refresh');
        }
    }

    public function eliminarbd()
    {
        $idPaciente = $_POST['idPaciente'];
        $this->paciente_model->eliminarPaciente($idPaciente);
        redirect('paciente/index', 'refresh');
    }
    
    public function subirFoto ($idPaciente)
    {
        $nombrearchivo  = $idPaciente.".jpg";
        $config['upload_path'] = './uploads/paciente/';
        $config['file_name'] = $nombrearchivo;

        $direccion = "./uploads/paciente/".$nombrearchivo;
        unlink($direccion);

        $config['allowed_types'] = 'jpg|png';
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload())
        {
            $data['error']  = $this->upload->display_errors();
        }
        else {
            $data['foto'] = $nombrearchivo;
            $this->paciente_model->modificarPaciente($idPaciente, $data);
            $this->upload->data();
        }
    }
}
