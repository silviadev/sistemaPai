<?php

function formatearFecha($fecha)
{
    $fechaP = DateTime::createFromFormat("dd/mm/YY", $fecha, new DateTimeZone("America/New_York"));
    return $fechaP;
}

function calculaEdad($fechanacimiento)
{
    list($dia, $mes, $ano) = explode("/",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
    {

      $ano_diferencia--;
      return $ano_diferencia. " años";
    }
    else if ($ano_diferencia == 0 && $mes_diferencia > 0) {
       return $mes_diferencia." meses";
    }
    else if ($ano_diferencia == 0 && $mes_diferencia == 0 && $dia_diferencia > 0) {
      return $dia_diferencia." dias";
    }
}
?>