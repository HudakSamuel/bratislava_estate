<?php

class Connect{
    protected $connection;

    private $hostname = '';
    private $username = '';
    private $db_name = '';
    private $password = '';

    // connects to database //
    public function __construct(){
        $this->connection = new MySQLi($this->hostname,$this->username,$this->password,$this->db_name);

        if ($this->connection->connect_error){
            die("Connection not estabilished: " . $this->connection->connect_error);
        }
    }
}

?>