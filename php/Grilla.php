<?php
require_once '../php/Connect.php';
require_once '../php/DataGrid.php';
require_once '../php/ConsultarData.php';

$Grid = new DataGrid();

$criterio = '';

$Grid->addColumn(array(
    "title"=>"Nombres",
    "campo"=>"nombres"
));
$Grid->addColumn(array(
    "title"=>"Apellidos",
    "campo"=>"apellidos"
));
$Grid->selectData(array(
    "criterio"=>$criterio,
    "class"=>"ConsultarData",
    "method"=>"getData"
));

echo $Grid->render();


