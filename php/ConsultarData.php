<?php

class ConsultarData{
    
    public function getData($flag,$criterio=''){
        $DB = new Connect();
        
        if($flag == 'P'){
            $sql = "SELECT nombres,apellidos FROM f_trabajador";
            if(!empty($criterio)){
                $sql .= " WHERE CONCAT(nombres,' ',apellidos) LIKE '%".$criterio."%' ";
            }
            
            $data = $DB->query($sql);
            $result = $data->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $result;
    }
    
    public function getDataSP($flag,$criterio=''){
        $DB = new Connect();
        
        $sql = "CALL dataGrid('".$criterio."')";
        
        $data = $DB->query($sql);
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}