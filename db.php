<?php
class db{
      private $connection;

    function setConnection(){
        try{
            $this->connection=new PDO("mysql:host=localhost;dbname=libraryManagementSystem","root","");
           // echo "Connection Done";
        }
        catch(PDOException $e){
            echo "Error";
        }
    }
}
?>