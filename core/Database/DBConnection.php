<?php 

namespace Core\Database;

class DBConnection{
    /**
     * initialize a db connection
     * @return mysqli
    */
    public function init(){
        $servername = "localhost";
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_NAME'];

        $conn = new \mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}