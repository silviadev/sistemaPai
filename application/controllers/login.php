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
    $contrasena = md5($_POST['contrasena']);

    $consulta = $this->usuario_model->validar($nombreUsuario, $contrasena, "");
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
      if ($this->session->userdata('tipoUsuario') == 'admin' || $this->session->userdata('tipoUsuario') == 'responsableVacuna') {
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

  public function olvidoContrasena()
  {
    $this->load->view('inc_header');
    $this->load->view('login/forgot_password');
    $this->load->view('inc_footer');
  }

  public function resetPassword() {
    $email = $_POST["email"];

    $this->form_validation->set_rules('email', 'Email', 'callback_verificar_email');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->load->view('inc_header');
      $this->load->view('login/forgot_password');
      $this->load->view('inc_footer');
    } else {
      //enviar el correo
      //agregar en la bd un parametro reset
        $this->load->model('usuario_model');
        $usuario = $this->usuario_model->validarResetEmail($email);
        $result = $usuario->result();

        if (count($result) > 0)
        {   $idUsuario = $result[0]->idUsuario;
            $data['codigoReset'] = mt_Rand(10000, 99999);
            $id =  $this->usuario_model->guardarCodigoReset($data, $idUsuario);
            if (!$id)
            {
              
              redirect('login/forgot_password', 'refresh');
            }
            else {
              $data['idUsuario'] = $idUsuario;
              $this->load->view('inc_header');
              $this->load->view('login/codigo_reset', $data);
              $this->load->view('inc_footer');
            }
        }
    }
  }

  public function verificar_email($email)
  {
      $user = $this->usuario_model->validarResetEmail($email);

      if ($user->num_rows() == 0) {
          $this->form_validation->set_message('verificar_email', 'El usuario con el {field} '.$email.' no existe');
          return false;
      }

      return true;
  }

  public function reset($id) {
    $data["idUsuario"] = $id;
    $this->load->view('inc_header');
    $this->load->view('login/recover_password', $data);
    $this->load->view('inc_footer');
  }

  public function envioReset() 
  {
    $this->load->view('inc_header');
    $this->load->view('login/envio-reset');
    $this->load->view('inc_footer');
  }

  public function guardarBd()
  {
    $idUsuario = $_POST["idUsuario"];
    $data["contrasena"] = md5($_POST["nuevaContrasena"]);
    $this->usuario_model->modificarUsuario($idUsuario, $data);
    redirect("login", "refresh");
  }

  public function verificarCodigoReset()
  {
    $data['idUsuario'] = $_POST['idUsuario'];
    /* $this->load->view('inc_header');
    $this->load->view('login/recover_password', $data);
    $this->load->view('inc_footer'); */


    $codigoReset = $_POST["codigoReset"];
    $this->form_validation->set_rules('codigoReset', 'Codigo Reset', 'callback_verificar_codigoReset');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

    if ($this->form_validation->run() == false) {
      //$data['idUsuario'] = 5;
      $this->load->view('inc_header');
      $this->load->view('login/codigo_reset', $data);
      $this->load->view('inc_footer');
    } else {
      $this->load->view('inc_header');
      $this->load->view('login/recover_password', $da);
      $this->load->view('inc_footer');
    }
  }

  public function callback_verificar_codigoReset()
  {

    $idUsuario = $_POST['idUsuario']; 
    $codigoReset = $_POST["codigoReset"]; 
    $user = $this->usuario_model->validarResetCodigo($codigoReset, $idUsuario);

    if ($user->num_rows() == 0) {
        $this->form_validation->set_message('verificar_codigoReset', 'El usuario con el {field} '.$codigoReset.' no existe');
        return false;
    }

    return true;
  }
}
