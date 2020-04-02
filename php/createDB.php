<?php
class CreateDB
{
    public $serverName;
    public $userName;
    public $password;
    public $dbName;
    public $tableName;
    public $connection;

    // Class constructor
    // __construct() - class constructor
    public function __construct(
        $dbName = "Newdb",
        $tableName = "Productdb",
        $serverName = "localhost",
        $userName = "root",
        $password = ""
    ) {
        $this->$dbName = $dbName;
        $this->$tableName = $tableName;
        $this->$serverName = $serverName;
        $this->$userName = $userName;
        $this->$password = $password;

        // Create Connection
        $this->connection = new mysqli($serverName, $userName, $password, $dbName);

        // Check Connection
        if ($this->connection->connect_error) {
            die("Connection Failed: " . $this->connection->connect_error);
        }

        // Query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

        // Execute query
        if ($this->connection->query($sql)) {

            $this->connection = new mysqli($serverName, $userName, $password, $dbName);

            // Create new Table
            $sql = "CREATE TABLE IF NOT EXISTS $tableName
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (25) NOT NULL,
                             product_price FLOAT,
                             product_image VARCHAR (100)
                            );";

            if ($this->connection->query($sql) === false) {
                echo "Error creating Table: " . $this->connection->error;
            }
        } else {
            return false;
        }
    }
}
