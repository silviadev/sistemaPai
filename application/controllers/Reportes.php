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
    $vacunaPaciente = $this->pacientevacuna_model->listaVacunaPaciente();
    $data['pacienteVacunas'] = $vacunaPaciente;
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

  public function verdetallepaciente()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $idPaciente = $_POST['idPaciente'];
    $lista = $this->dosis_model->listaDosisVacunasPorIdPaciente($idPaciente);

    $tutor = $this->paciente_model->recuperarUsuarioPorIdPaciente($idPaciente);
    $data['pacienteDosis'] = $lista;
    $data['pacienteTutor'] = $tutor;

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_detalle_paciente', $data);
    $this->load->view('inc_footer');
  }

  public function buscarvacuna()
  {

    if ($_REQUEST['action'] == 'fetch_vacunas') {

      $requestData = $_REQUEST;
      $start = $_REQUEST['start'];

      $initial_date = $_REQUEST['initial_date'];
      $final_date = $_REQUEST['final_date'];
      $gender = $_REQUEST['gender'];

      $vacunaPaciente = $this->pacientevacuna_model->listaVacunaPaciente();
    

/*
      if (!empty($initial_date) && !empty($final_date)) {
        $date_range = " AND fechaVacuna BETWEEN '" . $initial_date . "' AND '" . $final_date . "' ";
      } else {
        $date_range = "";
      }

      if ($gender != '') {
        $gender = " AND gender = '$gender' ";
      }

      
      $columns = ' idPaciente, idDosis, idSiguienteDosis, fechaVacuna ';
      $table = ' users ';
      $where = " WHERE first_name!='' " . $date_range . $gender;

      $columns_order = array(
        0 => 'id',
        1 => 'first_name',
        2 => 'last_name',
        3 => 'email',
        4 => 'gender',
        5 => 'date_of_birth',
        6 => 'created_at'
      );

      $sql = "SELECT " . $columns . " FROM " . $table . " " . $where;

      $result = mysqli_query($connection, $sql);
      $totalData = mysqli_num_rows($result);
      $totalFiltered = $totalData;

      if (!empty($requestData['search']['value'])) {
        $sql .= " AND ( first_name LIKE '%" . $requestData['search']['value'] . "%' ";
        $sql .= " OR last_name LIKE '%" . $requestData['search']['value'] . "%'";
        $sql .= " OR email LIKE '%" . $requestData['search']['value'] . "%'";
        $sql .= " OR gender LIKE '" . $requestData['search']['value'] . "'";
        $sql .= " OR date_of_birth LIKE '%" . $requestData['search']['value'] . "%'";
        $sql .= " OR created_at LIKE '%" . $requestData['search']['value'] . "%' )";
      }

      $result = mysqli_query($connection, $sql);
      $totalData = mysqli_num_rows($result);
      $totalFiltered = $totalData;

      $sql .= " ORDER BY " . $columns_order[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'];

      // #if all records are set display, remove the LIMIT from SQL clause
      if ($requestData['length'] != "-1") {
        $sql .= " LIMIT " . $requestData['start'] . " ," . $requestData['length'];
      }

      $result = mysqli_query($connection, $sql);
      $data = array();
      $counter = $start;

      $count = $start;
      while ($row = mysqli_fetch_array($result)) {
        $count++;
        $nestedData = array();

        $nestedData['counter'] = $count;

        $nestedData['last_name'] = $row["last_name"];
        $nestedData['first_name'] = $row["first_name"];

        $nestedData['email'] = '<a href="mailto:' . strtolower($row["email"]) . '">' . strtolower($row["email"]) . '</a>';

        $nestedData['date_of_birth'] = $row["date_of_birth"];
        $nestedData['gender'] = $row["gender"];

        // #convert the timestamp() date into friendly date
        $time = strtotime($row["created_at"]);
        $nestedData['created_at'] = date('h:i:s A - d M, Y', $time);

        $data[] = $nestedData;
      }
     */
      $totalData = $vacunaPaciente->num_rows();
      $totalFiltered = $totalData;
      $json_data = array(
        "draw"            => intval($requestData['draw']),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "records"         => $vacunaPaciente->result()
      );

      echo json_encode($json_data);
      //var_dump($vacunaPaciente->result());
      //echo json_encode($vacunaPaciente->result_array());
    }
  }
}
