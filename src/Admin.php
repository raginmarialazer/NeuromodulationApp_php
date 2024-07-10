<?php
require_once 'C:\Neuromodulation\NeuromodulationApp_php\database\dbConfig.php'; 
require_once 'C:\Neuromodulation\NeuromodulationApp_php\src\CRUD.php'; 
// Set default redirect url 
$redirectURL = 'NeuromodulationForm.php';

$crud = new CRUD();
$patients = $crud->getAllPatientsAndScores();

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container my-5">
    <h2>Admin View</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date of Submission</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Total Score</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($patients) {
    foreach ($patients as $patient) { ?>

            <tr data-id="<?php echo $patient['Id']; ?>">
                <td><?php echo $patient['Created_date']; ?></td>
                <td><?php echo $patient['First_name']; ?></td>
                <td><?php echo $patient['Surname']; ?></td>
                <td><?php echo $patient['Age']; ?></td>
                <td><?php echo $patient['Date_of_birth']; ?></td>
                <td><?php echo $patient['Total_score']; ?></td>                
            </tr>

        <?php } }
        else{ ?>
            <tr><td colspan="7">No patient records found...</td></tr>           
        <?php } ?>

        </tbody>
    </table>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('tbody tr').click(function() {
            var Id = $(this).data('id');
            window.location.href = 'http://localhost:8033/viewForm.php?Id=' + Id;
        });
    });
</script>