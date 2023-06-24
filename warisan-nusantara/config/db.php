<?php

include_once 'createdb.php';

class db{
    private $host = '';
    private $user = 'root';
    private $password = '';
    private $dbname = 'nusantara';

    //connect to database
    public function connect(){
        $mysql_connect_str = "mysql:host=$this->host; dbname=$this->dbname";
        $dbConnection = new PDO($mysql_connect_str, $this->user, $this->password);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbConnection;
    }
}

//create instance of db class
$db = new db();

?>