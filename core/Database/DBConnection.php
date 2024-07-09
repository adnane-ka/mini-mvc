<?php 

namespace Core\Database;

class DBConnection{
    private static $instance;
    private $connection;

    /**
     * Ensure private construction to prevent direct construction calls
    */
    private function __construct(){
        $this->init();
    }

    /**
     * Controls access to the DBConnection singleton 
     * @return DBConnection
     */
    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Initialize a db connection
     * @return void
    */
    private function init(){
        $servername = "localhost";
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_NAME'];

        $conn = new \mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $this->connection = $conn;
    }

    /**
     * Get the connection
     * @return mysqli
     */
    public function getConnection() {
        return $this->connection;
    }

    /**
     * Close the mysql connection
     * @return void
     */
    public function closeConnection() {
        $this->connection->close();
    }

    /**
     * Prevent Unserialization
    */
    public function __wakeup(){}

    /**
     * Prevent Cloning
    */
    protected function __clone(){}
}