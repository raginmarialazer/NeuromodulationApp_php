<?php
require_once 'C:\Neuromodulation\NeuromodulationApp_php\src\CRUD.php'; 
$crud = new CRUD();

if (isset($_GET['Id'])) {
    $patientId = $_GET['Id'];
        // Cast to integer
        $patientId = (int)$patientId;  
}

    try{
        if ($crud->delete($patientId)) {
            header('Location: http://localhost:8033/Admin.php');
            exit();
        } 
    }catch (Exception $e) {
        die("Failed with SQL Server: " . $e->getMessage());
     }

?>
