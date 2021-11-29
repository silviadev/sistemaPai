<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/fpdf.php';

class Reportes extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('America/La_Paz');
  }

  public function reportevacuna()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');
    /* $vacunaPaciente = $this->pacientevacuna_model->listaVacunaPaciente();
    $data['pacienteVacunas'] = $vacunaPaciente; */

    $vacuna = $this->pacientevacuna_model->lista();
    if (count($vacuna->result())) {
      $data['pacienteVacunas'] = $vacuna;
    }

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_vacuna', $data);
    $this->load->view('inc_footer');
  }

  public function reportepacientevacuna()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $today = date('Y-m-d');
    $dataToday = $this->dosis_model->listaDosisVacunasHoy($today);
    
    $data['totalHoy'] = $this->total($dataToday);
    
    $dataPendiente = $this->dosis_model->listaDosisVacunasPendientes($today);
    $data['totalPendiente'] = $this->total($dataPendiente);
    
    $dataRezagado = $this->dosis_model->listaDosisVacunasRezagado($today);
    $data['totalRezagado'] =  $this->total($dataRezagado);

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_paciente_vacuna', $data);
    $this->load->view('inc_footer');
  }

  public function total($dataTotal)
  {
    $arrayToday = array();
    foreach ($dataTotal->result() as $key => $value) {
      $arrayToday[] = $value->codigo;
    }
    $total = array_unique($arrayToday);
    return count($total);
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
    $this->load->view('inc_header');
    if ($this->session->userdata('tipoUsuario') == "tutor") {
      $this->load->view('inc_menu_tutor', $data);
    }else {
      $this->load->view('inc_menu', $data);
    }
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
    $data['idPaciente']=$idPaciente;
    $lista = $this->dosis_model->listaDosisVacunasPorIdPaciente($idPaciente);

    $tutor = $this->paciente_model->recuperarUsuarioPorIdPaciente($idPaciente);
    $data['pacienteDosis'] = $lista;
    $data['pacienteTutor'] = $tutor;

    $this->load->view('inc_header');
    if ($this->session->userdata('tipoUsuario') == "tutor") {
      $this->load->view('inc_menu_tutor', $data);
    }else {

      $this->load->view('inc_menu', $data);
    }
    $this->load->view('reportes/reporte_detalle_paciente', $data);
    $this->load->view('inc_footer');
  }

  public function verdetalletutor()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');
    
    $idUsuario = $_POST['idUsuario'];
    $lista = $this->paciente_model->recuperarPacientesPorIdUsuario($idUsuario);
    $data['idUsuario'] = $idUsuario;
    $data['pacientes'] = $lista;
    $data['usuario'] = $this->usuario_model->recuperarUsuario($idUsuario);

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_detalle_tutor', $data);
    $this->load->view('inc_footer');
  }

  public function reporteHoy()
  {
    $today = date('Y-m-d');
    $json_data = $this->dosis_model->listaDosisVacunasHoy($today);
    echo json_encode($json_data->result());
  }

  public function reporteVacunasPendientes()
  {
    $today = date('Y-m-d');
    $json_data = $this->dosis_model->listaDosisVacunasPendientes($today);
    echo json_encode($json_data->result());
  }

  public function reporteVacunaRezagado() {
    $today = date('Y-m-d');
    $json_data = $this->dosis_model->listaDosisVacunasRezagado($today);
    echo json_encode($json_data->result());
  }

  public function imprimir() 
  {  
    $GLOBALS["autor"] = $this->session->userdata('nombre')." ".$this->session->userdata('primerApellido')." ".$this->session->userdata('segundoApellido');
    $idPaciente = $_POST['idPaciente'];
    $pacienteDosis = $this->dosis_model->listaDosisVacunasPorIdPaciente($idPaciente);

    $pacienteTutor = $this->paciente_model->recuperarUsuarioPorIdPaciente($idPaciente);

    $this->load->library('pdf');
    $this->pdf = new Pdf();
    $this->pdf->AddPage('P','Letter',0);
    $this->pdf->Ln();
    
    $this->pdf->SetFont('Arial','B', 12);
    foreach ($pacienteTutor->result() as $row) {
      $nombre = "TUTOR: ".$row->nombrePaciente . "  " . $row->primerApellidoPaciente . "  " . $row->segundoApellidoPaciente;
      $this->pdf->Cell(25, 5, $nombre, 0, 1, 'L');
      $this->pdf->Cell(25, 5, "CI: ".$row->ci, 0, 1, 'L');
    }

    $this->pdf->Ln();
    foreach ($pacienteTutor->result() as $row) {
      $nombrePaciente =  "PACIENTE: ".$row->nombreTutor." ".$row->primerApellidoTutor." ".$row->segundoApellidoTutor;
      
      $this->pdf->Cell(25, 5, $nombrePaciente, 0, 1,'L');
      $this->pdf->Cell(25, 5, "CÓDIGO: ".$row->codigo, 0, 1,'L');
    }
    
    $this->pdf->Line(10, 45, 210-10, 45);
    $this->pdf->Line(10, 80, 210-10, 80);

    $this->pdf->Ln(10);
    $this->pdf->SetFont('Arial', 'B', 14);
    $this->pdf->Cell(0, 5, 'VACUNAS APLICADAS', 0, 1, 'C');
    $this->pdf->Ln();
    
    $this->pdf->SetFont('Arial', '', 11);
    $header = array('APLICACION (MESES)', 'VACUNA DOSIS', 'FECHA VACUNA');
    $this->pdf->FancyTable($header, $pacienteDosis, "APLICADAS");
    $this->pdf->Ln(5);

    $this->pdf->SetFont('Arial', 'B', 14);
    $this->pdf->Cell(0, 5, 'SIGUIENTE VACUNA', 0, 1, 'C');
    $this->pdf->Ln();
    
    $this->pdf->SetFont('Arial', '', 11);
    $header = array('APLICACION (MESES)', 'VACUNA DOSIS', 'FECHA SIGUIENTE DOSIS');
    $this->pdf->FancyTable($header, $pacienteDosis, "SIGUIENTE_VACUNA");
    $this->pdf->Ln(5);

    $this->pdf->SetFont('Arial', 'B', 14);
    $this->pdf->Cell(0, 5, 'VACUNAS PENDIENTES', 0, 1, 'C');
    $this->pdf->Ln();
    
    $this->pdf->SetFont('Arial', '', 11);
    $header = array('APLICACION (MESES)', 'VACUNA DOSIS', 'FECHA VACUNA');
    $this->pdf->FancyTable($header, $pacienteDosis, "VACUNA_PENDIENTE");
    
    $this->pdf->AliasNbPages();
    $this->pdf->Output('reporte_paciente_vacuna.pdf' , 'D' );
  }

  public function imprimir_tutor_paciente()
  {
    $GLOBALS["autor"] = $this->session->userdata('nombre')." ".$this->session->userdata('primerApellido')." ".$this->session->userdata('segundoApellido');
    $idUsuario = $_POST['idUsuario'];

    $pacienteTutor = $this->usuario_model->recuperarUsuario($idUsuario);
    $pacientes = $this->paciente_model->recuperarPacientesPorIdUsuario($idUsuario);

    $this->load->library('pdf');
    $this->pdf = new Pdf();
    $this->pdf->AddPage('P','Letter', 0);
    $this->pdf->Ln();
    
    $this->pdf->SetFont('Arial','B', 12);
    foreach ($pacienteTutor->result() as $row) {
      $nombre = "TUTOR: ".$row->nombre . "  " . $row->primerApellido . "  " . $row->segundoApellido;
      $this->pdf->Cell(25, 5, $nombre, 0, 1, 'L');
      $this->pdf->Cell(25, 5, "CI: ".$row->ci, 0, 1, 'L');
      $this->pdf->Cell(25, 5, "DIRECCION: ".$row->direccion, 0, 1, 'L');
      $this->pdf->Cell(25, 5, "CORREO: ".$row->correo, 0, 1, 'L');
    }

    $this->pdf->Ln();
    
    $this->pdf->Line(10, 45, 210-10, 45);
    $this->pdf->Line(10, 75, 210-10, 75);
  
    $this->pdf->Ln();
    
    $this->pdf->SetFont('Arial', '', 10);
    $header1 = array('NOMBRE', 'APELLIDO ', 'APELLIDO', 'CODIGO', 'SEXO', 'FECHA DE', 'FECHA DE');
    $header2 = array('', 'PATERNO', 'MATERNO', '', '', 'NACIMIENTO', 'REGISTRO');
    $this->pdf->FancyTablePaciente($header1, $header2, $pacientes);
    
    $this->pdf->AliasNbPages();
    $this->pdf->Output('reporte_tutor_pacientes.pdf' , 'D' );
  }

  public function listatutores() 
  {
    $lista = $this->usuario_model->listaTutores();
    $data['usuario'] = $lista;

    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('reportes/reporte_tutores', $data);
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
