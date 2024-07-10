<?php
require 'C:\Neuromodulation\NeuromodulationApp_php\vendor\autoload.php';

// Load .env file
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Access the environment variables
$serverName = $_ENV['DB_SERVERNAME'];
$dbName = $_ENV['DB_DBNAME'];
$dbUserName = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];

//database connection
try{
   $conn=new PDO("sqlsrv:server=$serverName;Database=$dbName", $dbUserName, $dbPassword);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die("Connection failed with SQL Server: " . $e->getMessage());
}

?>
