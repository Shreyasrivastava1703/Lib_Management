<?php
class db {
    private $connection;

    function __construct() {
        $this->setConnection();
    }

    function setConnection() {
        $server = "localhost";
        $dbname = "librarymanagementsystem";
        $username = "root";
        $password = "";

        $this->connection = new mysqli($server, $username, $password, $dbname);

        if ($this->connection->connect_errno) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    function getConnection() {
        return $this->connection;
    }
}
?>
