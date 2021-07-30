<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $data['msg'] = $this->uri->segment(3);
        if ($this->session->userdata('nombreUsuario')) {
            redirect('login/panel', 'refresh');
        } else {
            $this->load->view('inc_header');
            $this->load->view('loginForm', $data);
            $this->load->view('inc_footer');
        }
    }

    public function validarUsuario()
    {
        $nombreUsuario = $_POST['nombreUsuario'];
        //$contrasena = md5($_POST['contrasena']);
        $contrasena = $_POST['contrasena'];

        $consulta = $this->usuario_model->validar($nombreUsuario, $contrasena);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $row) {
                $this->session->set_userdata('idUsuario', $row->idUsuario);
                $this->session->set_userdata('nombreUsuario', $row->nombreUsuario);
                $this->session->set_userdata('tipoUsuario', $row->tipoUsuario);
                $this->session->set_userdata('nombre', $row->nombre);
                $this->session->set_userdata('primerApellido', $row->primerApellido);
                $this->session->set_userdata('segundoApellido', $row->segundoApellido);
                redirect('login/panel', 'refresh');
            }
        } else {
            redirect('login/index/1', 'refresh');
        }
    }

    public function panel()
    {
        if ($this->session->userdata('nombreUsuario')) {
            if ($this->session->userdata('tipoUsuario') == 'admin') {
                redirect('admin', 'refresh');
            } else if ($this->session->userdata('tipoUsuario') == 'tutor') {
                redirect('tutor', 'refresh');
            }
        } else {
            redirect('login/index/2', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/index/3', 'refresh');
    }
}