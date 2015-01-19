<?php

class Connect extends PDO{
    
    private $host = 'localhost';
    private $port = '3306';
    private $user = 'root';
    private $pass = '';
    private $motor = 'mysql';
    private $dbname = 'rrhh_';
    
    public function __construct() {
        parent::__construct(
                $this->getDns(), 
                $this->user, 
                $this->pass, 
                array(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'
                )
        );
    }
    
    private function getDns(){
        $dns = '';
        switch ($this->motor){
            case 'mysql':
                $dns = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->dbname.';';
                break;
            case 'sql':
                $dns = 'sqlsvr:server='.$this->host.';Database='.$this->dbname.';';
                break;
            case 'oracle':
                $dns = 'oci:dbname='.$this->dbname;
                break;
            case 'pgsql':
                $dns = 'pgsql:host='.$this->host.';port='.$this->port.';dbname='.$this->dbname;
                break;
        }
        return $dns;
    }
    
}