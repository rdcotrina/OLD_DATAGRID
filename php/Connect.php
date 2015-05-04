<?php
class Connect{
    
    private $host = 'RD\RDCC';
    private $port = '3306';
    private $user = 'sa';
    private $pass = '123';
    private $motor = 'sql';
    private $dbname = 'rr_';
    
    public function __construct() {
        $conn = new PDO(
                $this->getDns(), 
                $this->user, 
                $this->pass
        );
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        return $conn;
    }
    
    private function getDns(){
        $dns = '';
        switch ($this->motor){
            case 'mysql':
                $dns = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->dbname;
                break;
            case 'sql':
                $dns = 'sqlsrv:Server='.$this->host.';Database='.$this->dbname;
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