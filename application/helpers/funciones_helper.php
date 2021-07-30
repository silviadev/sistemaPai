<?php

function formatearFecha($fecha)
{
    $fechaP = DateTime::createFromFormat("dd/mm/YY", $fecha, new DateTimeZone("America/New_York"));
    return $fechaP;
}
?>