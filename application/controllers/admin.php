<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index() {
        redirect('usuario', 'refresh');

       /*  $lista = $this->usuario_model->lista();
        $data['usuario'] = $lista;

        $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
        $data['nombre']  = $this->session->userdata('nombre');
        $data['primerApellido']  = $this->session->userdata('primerApellido');
        $data['segundoApellido']  = $this->session->userdata('segundoApellido');
        
        $this->load->view('inc_header');
        $this->load->view('usuario/usuario_lista', $data);
        $this->load->view('inc_footer'); */
    }
}
