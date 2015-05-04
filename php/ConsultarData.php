<?php

class ConsultarData extends Connect{
    
    private $_DB;

    public function __construct() {
        $this->_DB = parent::__construct();
    }

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
    
    public function __getDataSP($flag,$criterio='',$page,$regxpag){
        $sql = "CALL dataGrid('".$flag."','".$criterio."','".$page."','".$regxpag."'); ";
        
        $data = $this->_DB->query($sql);
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
       
        return $result;
    }
    
    public function getDataSP($flag,$criterio='',$page,$regxpag){
        
        $sql = "EXEC dataGrid ?,?,?,? ";
        
        $data = $this->_DB->prepare($sql);
        $data->execute(array($flag,$criterio,$page,$regxpag));
        $data->nextRowset();
        
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
       
        return $result;
    }
    
}