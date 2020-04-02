<?php
class Database
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
        $createDatabase = createDB($dbName);

        // Execute query
        if ($this->connection->query($createDatabase)) {

            $this->connection = new mysqli($serverName, $userName, $password, $dbName);

            // Create new Table
            $createTable = createTable($tableName);

            if ($this->connection->query($createTable) === false) {
                echo "Error creating Table: " . $this->connection->error;
            }

            /*
            // Insert data into Table
            $insertIntoTable = insertIntoTable($tableName);
            if ($this->connection->query($insertIntoTable) === false) {
                echo "Error updating Table: " . $this->connection->error;
            }
            */
        } else {
            return false;
        }
    }

    public function getDataFromDatabase()
    {
        $getData = "SELECT * FROM products";
        $returnData = $this->connection->query($getData);

        if ($returnData->num_rows > 0) {
            return $returnData;
        }
    }
}

function createDB($dbName)
{
    return "CREATE DATABASE IF NOT EXISTS $dbName";
}

function createTable($tableName)
{
    return "CREATE TABLE IF NOT EXISTS $tableName
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            image_url VARCHAR (100),
            title VARCHAR (25) NOT NULL,
            information VARCHAR (100) NOT NULL,
            original_price FLOAT,
            discount_price FLOAT
            )";
}

function insertIntoTable($tableName)
{
    return "INSERT INTO $tableName (image_url, title, information, original_price, discount_price) VALUES
            ('pizza.jpg', 'Pizza', 'Pizza was here', 100, 50),
            ('travel.jpg', 'Travel', 'Travelling was good', 80, 40),
            ('gentle.jpg', 'Gentle', 'Gentle rose flower', 60, 30)
            ";
}
