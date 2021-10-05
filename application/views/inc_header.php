<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <style>
    .card-primary:not(.card-outline)>.card-header {
      background-color: #0AA5A7 !important;
    }

    .btn-secondary {
      background-color: #0AA5A7 !important;
      border-color: #0AA5A7 !important;
      box-shadow: none;
    }

    .btn-primary {
      color: #fff;
      background-color: #0AA5A7 !important;
      border-color: #0AA5A7 !important;
    }

    .dropdown-item.active,
    .dropdown-item:active {
      background-color: #0AA5A7 !important;
    }

    .main-header {
      background-color: #0AA5A7 !important;
    }

    .page-item.active .page-link {
      background-color: #0AA5A7 !important;
      border-color: #0AA5A7;
    }

    .dosis-form-template {
      display: none;
    }
  </style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/daterangepicker/daterangepicker.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/dist/css/adminlte.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">


  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>

<body class="hold-transition sidebar-mini dark-mode1 text-sm">
  <div class="wrapper">