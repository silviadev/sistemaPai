<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacuna extends CI_Controller
{

  public function index()
  {

    $lista = $this->vacuna_model->lista();
    $result = [];
    if ($lista->num_rows() > 0) {
      foreach ($lista->result() as $row) {
        $res = array(
          'idVacuna' => $row->idVacuna,
          'nombre' => $row->nombre,
          'descripcion' => $row->descripcion
        );
        $listaDosis = $this->dosis_model->listaDosisPorIdVacuna($row->idVacuna);
        if ($listaDosis->num_rows() > 0) {
          $res["dosis"] = $listaDosis->result();
        } else {
          $res["dosis"]  = [];
        }
        array_push($result, $res);
      }
    }
    $data['vacuna'] = $result;

    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('vacuna/vacuna_lista', $data);
    $this->load->view('inc_footer');
  }

  public function agregar()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $data['categoriaVia'] = $this->via_model->viaLista($data);
    $data['categoriaDosis'] = $this->categoriadosis_model->categoriaDosisLista($data);

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('vacuna/registrar_vacuna_form', $data);
    $this->load->view('inc_footer');
  }

  public function registrarBd()
  {
    $data['nombre'] = $_POST['nombre'];
    $data['descripcion'] = $_POST['descripcion'];
    $idAuthor = $this->session->userdata('idUsuario');
    $idVacuna = $this->vacuna_model->registrarVacuna($data, $idAuthor);

    $items1 = [];
    $items2 = [];
    $items3 = [];
    $items4 = [];
    $items5 = [];
    if (isset($_POST['via'])) $items1 = $_POST['via'];
    if (isset($_POST['dosis'])) $items2 = $_POST['dosis'];
    if (isset($_POST['rangoMesInicial'])) $items3 = $_POST['rangoMesInicial'];
    if (isset($_POST['rangoMesFinal'])) $items4 = $_POST['rangoMesFinal'];
    if (isset($_POST['cantidad'])) $items5 = $_POST['cantidad'];

    while (true) {
      $via = current($items1);
      $dosis = current($items2);
      $rangoMesInicial = current($items3);
      $rangoMesFinal = current($items4);
      $cantidad = current($items5);

      $dataDosis["idVacuna"] = $idVacuna;
      $dataDosis["idVia"] = $via;
      $dataDosis["idCategoriadosis"] = $dosis;
      $dataDosis["rangoMesInicial"] = $rangoMesInicial;
      $dataDosis["rangoMesFinal"] = ($rangoMesFinal > 0) ? $rangoMesFinal : -1;
      $dataDosis["cantidad"] = $cantidad;

      if (
        count($items1) > 0 && count($dataDosis) > 0 && count($dataDosis) > 0 &&
        count($dataDosis) > 0 && count($dataDosis) > 0
      ) {
        $this->dosis_model->registrarDosis($dataDosis, $idAuthor);
      }

      $via = next($items1);
      $dosis = next($items2);
      $rangoMesInicial = next($items3);
      $rangoMesFinal = next($items4);
      $cantidad = next($items5);
      if ($via === false && $dosis === false && $rangoMesInicial === false && $rangoMesFinal === false && $cantidad === false) break;
    }

    redirect('vacuna', 'refresh');
  }

  public function modificar()
  {
    $idVacuna = $_POST['idVacuna'];
    $vacuna = $this->vacuna_model->recuperarVacunaPorId($idVacuna);
    $result = [];
    
    if ($vacuna->num_rows() > 0) {
      foreach ($vacuna->result() as $row) {
        $res = array(
          'idVacuna' => $row->idVacuna,
          'nombre' => $row->nombre,
          'descripcion' => $row->descripcion
        );
        $listaDosis = $this->dosis_model->listaDosisPorIdVacuna($row->idVacuna);
        if ($listaDosis->num_rows() > 0) {
          $res["dosis"] = $listaDosis->result();
        } else {
          $res["dosis"]  = [];
        }
        array_push($result, $res);
      }
    }
    $data['infoVacuna'] = $result;

    $data['categoriaVia'] = $this->via_model->viaLista($data);
    $data['categoriaDosis'] = $this->categoriadosis_model->categoriaDosisLista($data);

    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('vacuna/modificar_vacuna_form', $data);
    $this->load->view('inc_footer');
  }

  public function actualizarBd()
  {
    $idVacuna = $_POST['idVacuna'];
    $data['nombre'] = $_POST['nombre'];
    $data['descripcion'] = $_POST['descripcion'];
    $idAuthor = $this->session->userdata('idUsuario');
    $this->vacuna_model->actualizarVacuna($idVacuna, $data, $idAuthor);
    //Actualizar dosis

    $ids = [];
    $items1 = [];
    $items2 = [];
    $items3 = [];
    $items4 = [];
    $items5 = [];
    if (isset($_POST['idDosis'])) $ids = $_POST['idDosis'];
    if (isset($_POST['via'])) $items1 = $_POST['via'];
    if (isset($_POST['dosis'])) $items2 = $_POST['dosis'];
    if (isset($_POST['rangoMesInicial'])) $items3 = $_POST['rangoMesInicial'];
    if (isset($_POST['rangoMesFinal'])) $items4 = $_POST['rangoMesFinal'];
    if (isset($_POST['cantidad'])) $items5 = $_POST['cantidad'];

    while (true) {
      $id = current($ids);
      $via = current($items1);
      $dosis = current($items2);
      $rangoMesInicial = current($items3);
      $rangoMesFinal = current($items4);
      $cantidad = current($items5);

      $dataDosis["idVacuna"] = $idVacuna;
      $dataDosis["idVia"] = $via;
      $dataDosis["idCategoriadosis"] = $dosis;
      $dataDosis["rangoMesInicial"] = $rangoMesInicial;
      $dataDosis["rangoMesFinal"] = ($rangoMesFinal > 0) ? $rangoMesFinal : -1;
      $dataDosis["cantidad"] = $cantidad;

      if (
        count($items1) > 0 && count($items2) > 0 && count($items3) > 0 &&
        count($items4) > 0 && count($items5) > 0 && $id !== "") {
        $this->dosis_model->actualizarDosis($id, $dataDosis, $idAuthor);
      }
      else if (count($items1) > 0 && count($items2) > 0 && count($items3) > 0 &&
        count($items4) > 0 && count($items5) > 0 && $id == "") {
        $this->dosis_model->registrarDosis($dataDosis, $idAuthor);
      }

      $id = next($ids);
      $via = next($items1);
      $dosis = next($items2);
      $rangoMesInicial = next($items3);
      $rangoMesFinal = next($items4);
      $cantidad = next($items5);
      if ($via === false && $dosis === false && $rangoMesInicial === false && $rangoMesFinal === false && $cantidad === false) break;
    }

    //Eliminar dosis
    $idDosisEliminar = [];
    if (isset($_POST['idDosisEliminar'])) $idDosisEliminar = $_POST['idDosisEliminar'];
    while (true) {
      $id = current($idDosisEliminar);

      if (count($idDosisEliminar) > 0 && $id !== "") {
        $this->dosis_model->eliminarDosis($id, $idAuthor);
      }
      
      $id = next($idDosisEliminar);
     
      if ($id === false) break;
    }

    redirect('vacuna', 'refresh');
  }

  public function eliminarbd()
  {
    $idVacuna = $_POST['idVacuna'];
    $idAuthor = $this->session->userdata('idUsuario');
    $this->dosis_model->eliminarDosisPorIdVacuna($idVacuna, $idAuthor);
    $this->vacuna_model->eliminarVacuna($idVacuna, $idAuthor);
    redirect('vacuna', 'refresh');
  }
}
