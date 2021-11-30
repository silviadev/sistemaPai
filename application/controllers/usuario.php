<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
 
  public function __construct()
  {
    parent::__construct();
    $this->load->config('email');
    $this->load->library('email');
  }

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
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');


    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('usuario/usuario_agregar');
    $this->load->view('inc_footer');
  }

  public function agregarbd()
  {
    $data['nombre'] = $_POST['nombre'];
    $data['primerApellido'] = $_POST['primerApellido'];
    $data['segundoApellido'] = $_POST['segundoApellido'];
    $data['ci'] = $_POST['ci'];
    $data['direccion'] = $_POST['direccion'];
    $data['tipoUsuario'] = $_POST['tipoUsuario'];
    $data['correo'] = $_POST['correo'];

    if (isset($_POST['habilitado'])) {
      $data['habilitado'] = true;
    } else {
      $data['habilitado'] = false;
    }

    $data['idAuthor'] = $this->session->userdata('idUsuario');
    $data['nombreUsuario'] = $_POST['nombreUsuario'];

    $this->form_validation->set_rules('nombreUsuario', 'Nombre Usuario', 'callback_username_check');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->agregar();
    } else {
      if (isset($_POST['habilitado']) && $_POST['correo']) {
        $mensaje = "<div>Datos para acceder al sistema PAI</div><div>Nombre usuario: ".$data['nombreUsuario']."</div><div>Contrasena: ".$data['ci']."</div><div>Saludos sistemaPAI</div>";
        $this->enviarCorreo('silvia.veizaga.lopez@gmail.com', $_POST['correo'], "Acceso al sistema PAI", $mensaje);
      }
      $this->usuario_model->agregarUsuario($data);
      redirect('usuario/index', 'refresh');
    }
  }

  public function enviarCorreo($from, $to, $subject, $mensaje)
  {
    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($mensaje);

    if ($this->email->send()) {
        echo '';
    } else {
        show_error($this->email->print_debugger());
    }
  }

  public function username_check($nombreUsuario)
  {
    $nombreUsuarios = $this->usuario_model->verificarNombreUsuario($nombreUsuario);
    if ($nombreUsuarios->num_rows() > 0) {
      $this->form_validation->set_message('username_check', 'El {field} ya existe');
      return false;
    }
    else
    {
      return true;
    }
   
  }

  public function modificar()
  {
    $idUsuario = $_POST['idUsuario'];
    $data['infoUsuario'] = $this->usuario_model->recuperarUsuario($idUsuario);

    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');


    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('usuario/usuario_modificar', $data);
    $this->load->view('inc_footer');
  }

  public function modificarbd()
  {
    $idUsuario = $_POST['idUsuario'];
    $data['nombre'] = $_POST['nombre'];
    $data['primerApellido'] = $_POST['primerApellido'];
    $data['segundoApellido'] = $_POST['segundoApellido'];
    $data['ci'] = $_POST['ci'];
    $data['direccion'] = $_POST['direccion'];
    $data['tipoUsuario'] = $_POST['tipoUsuario'];
    $data['correo'] = $_POST['correo'];

    if (isset($_POST['habilitado'])) {
      $data['habilitado'] = true;
    } else {
      $data['habilitado'] = false;
    }

    if (isset($_POST['habilitado']) && $_POST['correo'] && !isset($_POST['habilitado_old'])) {
      
      $mensaje = "<div>Datos para acceder al sistema PAI</div><div>Nombre usuario: ".$data['nombreUsuario']."</div><div>Contrasena: ".$data['ci']."</div><div>Saludos sistemaPAI</div>";
      $this->enviarCorreo('silvia.veizaga.lopez@gmail.com', $_POST['correo'], "Acceso al sistema PAI", $mensaje);

    }

    $data['idAuthor'] = $this->session->userdata('idUsuario');
    $this->usuario_model->modificarUsuario($idUsuario, $data);
    redirect('usuario/index', 'refresh');
  }

  public function eliminarbd()
  { 
    $idAutor = $this->session->userdata('idUsuario');
    $idUsuario = $_POST['idUsuario'];
    $this->usuario_model->eliminarUsuario($idUsuario, $idAutor);
    redirect('usuario/index', 'refresh');
  }

  public function buscarPorNombre()
  {
    //datos de session
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $nombre = $_POST['nombre'];


    if (isset($nombre) && !empty($nombre) && !is_null($nombre)) {
      $data['infoUsuario'] = $this->usuario_model->buscarPorNombre($nombre);
      $this->load->view('inc_header');
      $this->load->view('inc_menu', $data);
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

  public function modificarContrasena()
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
    $this->load->view('usuario/usuario_modificar_datos_seguridad', $data);
    $this->load->view('inc_footer');
  }
  public function modificarbdDatosPersonales()
  {
    $idUsuario = $_POST['idUsuario'];
    $data['direccion'] = $_POST['direccion'];
    $data['correo'] = $_POST['correo'];
    //$data['nombreUsuario'] = $_POST['nombreUsuario'];

    $this->usuario_model->modificarUsuario($idUsuario, $data);
    if ($_POST["tipoUsuario"] == "admin") {
      redirect('usuario', 'refresh');
    } else {
      redirect('tutor', 'refresh');
    }
  }

  public function modificarbdDatosSeguridad()
  {
    $this->form_validation->set_rules('antiguaContrasena', 'antigua contraseña', 'callback_verificar_contrasena');
    $this->form_validation->set_rules('nuevaContrasena', 'nueva contraseña', 'required');
    $this->form_validation->set_rules(
      'confirmarContrasena',
      'confirmar contraseña',
      'required|matches[nuevaContrasena]',
      array('matches' => 'La nueva contrasena y confirmar contrasena no coincide')
    );

    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

    //datos de session
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    if ($this->form_validation->run() == false) {
      $this->load->view('inc_header');
      $this->load->view('inc_menu', $data);
      $this->load->view('usuario/usuario_modificar_datos_seguridad', $data);
      $this->load->view('inc_footer');
    } else {
      $id = $this->session->userdata('idUsuario');
      $nuevaContrasena = $this->input->post('nuevaContrasena');
      $this->usuario_model->update_user($id, array('contrasena' => md5($nuevaContrasena)));
      redirect('login/logout');
    }
  }

  public function verificar_contrasena($oldpass)
  {
    $id = $this->session->userdata('idUsuario');
    $user = $this->usuario_model->get_user($id);

    if ($user->contrasena !== md5($oldpass)) {
      $this->form_validation->set_message('verificar_contrasena', 'La {field} no coincide');
      return false;
    }

    return true;
  }

  public function obtenerDatosSession()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    return $data;
  }
}
