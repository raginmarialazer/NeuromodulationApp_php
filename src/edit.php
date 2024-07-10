<?php
require_once 'C:\Neuromodulation\NeuromodulationApp_php\src\CRUD.php'; 
$crud = new CRUD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'Id' => $_POST['Id'],
        'first_name' => $_POST['first_name'],
        'surname' => $_POST['surname'],
        'date_of_birth' => $_POST['date_of_birth'],
        'age' => $_POST['age'],
        'question_1_score' => $_POST['question_1_number'],
        'question_2_score' => $_POST['question_2_inlineRadioOptions'],
        'question_3_score' => $_POST['question_3_inlineRadioOptions'],
        'question_4_score' => $_POST['question_4_inlineRadioOptions'],
        'question_5_score' => $_POST['question_5_inlineRadioOptions'],
        'question_6_score' => $_POST['question_6_inlineRadioOptions'],
        'question_7_score' => $_POST['question_7_inlineRadioOptions'],
        'question_8_score' => $_POST['question_8_inlineRadioOptions'],
        'question_9_score' => $_POST['question_9_inlineRadioOptions'],
        'question_10_score' => $_POST['question_10_inlineRadioOptions'],
        'question_11_score' => $_POST['question_11_inlineRadioOptions'],
        'question_12_score' => $_POST['question_12_inlineRadioOptions'],
        'total_score'=>$_POST['total_score'],
    ];
    try{
        if ($crud->update($data)) {           
            header('Location: http://localhost:8033/Admin.php');
            exit();
        } 
    }catch (Exception $e) {
        die("failed with SQL Server: " . $e->getMessage());
     }
}
?>

