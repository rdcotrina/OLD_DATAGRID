<?php

class DataGrid{
    
    private $_columns = array();        /*almacena las columnas*/
    private $_data;                     /*almacena la data*/
    public  $totalRegistros;           /*almacena el total de registros*/

    private function createHead(){
        $header  = '<thead>';
        $header .=      '<tr>';
        foreach ($this->_columns as $value) {
            $title = isset($value['title'])?$value['title']:'Title';
            
            $header .= '<th>'.$title.'</th>';
        }
        $header .=      '</tr>';
        $header .= '</thead>';
        
        return $header;
    }

    private function createRows(){
        $tbody  = '<tbody>';
        
        if(count($this->_data)){
            foreach ($this->_data as $row) {
                $tbody .= '<tr>';
                foreach ($this->_columns as $col){
                    $campo = isset($col['campo'])?$col['campo']:'';
                    
                    if(empty($campo)){
                        $f = 'Campo indefinido';
                    }else{
                        $f = $row[$campo];
                    }
                    
                    $tbody .= '<td>'.$f.'</td>';
                    
                }
                $tbody .= '</tr>';
            }
        }else{
            $tbody .= '<tr>';
            $tbody .=   '<td colspan="'.count($this->_columns).'" style="text-align:center">No se encontraron registros.</td>';
            $tbody .= '</tr>';
        }
        
        $tbody .= '</tbody>';
        return $tbody;
    }

    public function addColumn($obj){
        $this->_columns[] = $obj;
    }
    
    public function selectData($obj){
        $criterio = isset($obj['criterio'])?$obj['criterio']:'';
        $class    = isset($obj['class'])?$obj['class']:'';
        $method   = isset($obj['method'])?$obj['method']:'';
        
        $Obj = new $class();
        $result = $Obj->$method('P',$criterio);
        
        $this->_data = $result;
        $this->totalRegistros = count($result);
    }

    public function render(){
        $table  = '<table border="1" width="100%">';
        $table .= $this->createHead();
        $table .= $this->createRows();
        $table .= '</table>';
        
        return $table;
    }
    
}