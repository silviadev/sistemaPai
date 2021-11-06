<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends CI_Controller
{

  public function index()
  {
  }

  public function reportevacuna() 
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_vacuna', $data);
    $this->load->view('inc_footer');
  }

  public function reportetutores()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $lista = $this->usuario_model->listaTutores("tutor");
    $data['usuario'] = $lista;

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_tutores', $data);
    $this->load->view('inc_footer');

  }

  public function reportepacientes()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $lista = $this->paciente_model->lista();
    $data['paciente'] = $lista;

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_paciente', $data);
    $this->load->view('inc_footer');

  }
}
