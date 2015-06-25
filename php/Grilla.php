<?php
require_once '../php/Connect.php';
require_once '../php/DataGrid.php';
require_once '../php/ConsultarData.php';

$Grid = new DataGrid("gridT");

$criterio = isset($_REQUEST['_criterio'])?$_REQUEST['_criterio']:'';
$page     = isset($_REQUEST['_page'])?$_REQUEST['_page']:1;
$regxpag  = isset($_REQUEST['_regxpag'])?$_REQUEST['_regxpag']:10;

$Grid->excel();
$Grid->pdf();

$Grid->addCheckBox(array(
    "values"=>array("apellidos","nombres"),
    "ajax"=>array(
        "funcion"=>"index.check",
        "params"=>array("apellidos","nombres")
    ),
    "fnCallbak"=>function($fila,$row){
        if($row['genero'] == 'M'){
            $cadena = '<input type="checkbox" id="chk_gridT'.$fila.'" name="chk_gridT[]" disabled>';
        }else{
            $cadena = '<input type="checkbox" id="chk_gridT'.$fila.'" name="chk_gridT[]">';
        }
        
        return $cadena;
    }
));

$Grid->addColumn(array(
    "title"=>"Nombres",
    "campo"=>"nombres"
));
$Grid->addColumn(array(
    "title"=>"Apellidos",
    "campo"=>"apellidos",
    "fnCallbak"=>function($fila,$row){
        $cadena = $row['nombres'].' - '.$row['apellidos'];
        return $cadena;
    }
));
$Grid->addAccion(array(
    "titulo"=>"Editar",
    "icono"=>"glyphicon glyphicon-pencil",
    "ajax"=>array(
        "funcion"=>"index.edit",
        "params"=>array("apellidos","nombres")
    ),
    "fnCallbak"=>function($fila,$row){
        $cadena = $fila.'.- '.$row['nombres'].' - '.$row['apellidos'];
        return $cadena;
    }
));
$Grid->addAccion(array(
    "titulo"=>"Editar",
    "icono"=>"glyphicon glyphicon-pencil",
    "ajax"=>array(
        "funcion"=>"index.edit",
        "params"=>array("apellidos","nombres")
    )
));
$Grid->addAccion(array(
    "titulo"=>"Editar",
    "icono"=>"glyphicon glyphicon-pencil",
    "ajax"=>array(
        "funcion"=>"index.edit",
        "params"=>array("apellidos","nombres")
    )
));

$Grid->selectData(array(
    "info"=>true,
    "criterio"=>$criterio,
    "class"=>"ConsultarData",
    "method"=>"getDataSP",
    "paginate"=>array(
        "ajax"=>"index.getDatagrid",
        "page"=>$page,
        "reg_x_pag"=>$regxpag,
        "itemPaginas"=>10
    )
));

echo $Grid->render();


