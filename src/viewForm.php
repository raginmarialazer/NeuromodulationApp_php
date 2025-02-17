<?php
require_once 'C:\Neuromodulation\NeuromodulationApp_php\src\CRUD.php'; 

$crud = new CRUD();

if (isset($_GET['Id'])) {
    $patientId = $_GET['Id'];
        // Cast to integer
        $patientId = (int)$patientId;  
}
$patient = $crud->GetById($patientId);
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
    <div class="container  mt-4">
        <h1>Neuromodulation</h1>
        <form id="patient-form" action="\edit.php" method="POST">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Patient Details</h5>
            <div class="form-group">
                <label for=" first_name"> First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $patient['First_name']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $patient['Surname']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $patient['Date_of_birth']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $patient['Age']; ?>" readonly>
            </div>
        </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Brief Pain Inventory (BPI)</h5>
                <div class="form-group mb-3">
                    <label for="question_1">1.How much relief have pain treatments or medicaTons FROM THIS CLINIC provided?</label>
                    <input value="<?php echo $patient['Question_1_score']; ?>" readonly type="range" class="form-control" id="question_1_range" name="question_1_range" min="0" max="100" oninput="syncInputs(this.value)">
                    <input  value="<?php echo $patient['Question_1_score']; ?>" readonly type="number" class="form-control mt-2" id="question_1_number" name="question_1_number" min="0" max="100" required oninput="syncInputs(this.value)">       
                </div>
                <div class="form-group">
                    <label for="question_2">2. Please rate your pain based on the number that best describes your pain at it’s WORST in the past week.</label>
                    <br> 
                    <div class="form-check form-check-inline">                  
                    <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio1" <?php if ($patient['Question_2_score'] == "1") { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="question_2_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio2" <?php if ($patient['Question_2_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_2_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio3" <?php if ($patient['Question_2_score'] == "31") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_2_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio4" <?php if ($patient['Question_2_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for=" question_2_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio5" <?php if ($patient['Question_2_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_2_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio6" <?php if ($patient['Question_2_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_2_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio7" <?php if ($patient['Question_2_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_2_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio8" <?php if ($patient['Question_2_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_2_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio9" <?php if ($patient['Question_2_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_2_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_2_inlineRadioOptions" id="question_2_inlineRadio10" <?php if ($patient['Question_2_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_2_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_3">3. Please rate your pain based on the number that best describes your pain at it’s LEAST in the past week.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio1"  <?php if ($patient['Question_3_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_3_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio2"   <?php if ($patient['Question_3_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_3_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio3"   <?php if ($patient['Question_3_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_3_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio4"   <?php if ($patient['Question_3_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_3_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio5"   <?php if ($patient['Question_3_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_3_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio6"   <?php if ($patient['Question_3_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_3_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio7"   <?php if ($patient['Question_3_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_3_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio8"   <?php if ($patient['Question_3_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_3_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio9"   <?php if ($patient['Question_3_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_3_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_3_inlineRadioOptions" id="question_3_inlineRadio10"   <?php if ($patient['Question_3_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_3_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_4">4. Please rate your pain based on the number that best describes your pain on the Average.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio1"   <?php if ($patient['Question_4_score'] == "1") { echo "checked"; } ?>  value="1">
                        <label class="form-check-label" for="question_4_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio2" <?php if ($patient['Question_4_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_4_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio3" <?php if ($patient['Question_4_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_4_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio4" <?php if ($patient['Question_4_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_4_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio5" <?php if ($patient['Question_4_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_4_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio6" <?php if ($patient['Question_4_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_4_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio7" <?php if ($patient['Question_4_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_4_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio8" <?php if ($patient['Question_4_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_4_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio9" <?php if ($patient['Question_4_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_4_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_4_inlineRadioOptions" id="question_4_inlineRadio10" <?php if ($patient['Question_4_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_4_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_5">5. Q5 - Please rate your pain based on the number that best describes your pain that tells how much pain you have RIGHT NOW.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio1" <?php if ($patient['Question_5_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_5_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio2" <?php if ($patient['Question_5_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_5_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio3" <?php if ($patient['Question_5_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_5_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio4" <?php if ($patient['Question_5_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_5_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio5" <?php if ($patient['Question_5_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_5_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio6" <?php if ($patient['Question_5_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_5_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio7" <?php if ($patient['Question_5_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_5_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio8" <?php if ($patient['Question_5_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_5_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio9" <?php if ($patient['Question_5_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_5_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_5_inlineRadioOptions" id="question_5_inlineRadio10" <?php if ($patient['Question_5_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_5_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_6">6. Based on the number that best describes how during the past week pain has INTERFERED with your: General Actvity.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio1" <?php if ($patient['Question_6_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_6_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio2"  <?php if ($patient['Question_6_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_6_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio3"  <?php if ($patient['Question_6_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_6_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio4"  <?php if ($patient['Question_6_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_6_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio5"  <?php if ($patient['Question_6_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_6_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio6"  <?php if ($patient['Question_6_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_6_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio7"  <?php if ($patient['Question_6_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_6_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio8"  <?php if ($patient['Question_6_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_6_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio9"  <?php if ($patient['Question_6_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_6_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_6_inlineRadioOptions" id="question_6_inlineRadio10"  <?php if ($patient['Question_6_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_6_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_7">7. Based on the number that best describes how during the past week pain has INTERFERED with your: Mood.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio1"  <?php if ($patient['Question_7_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_7_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio2" <?php if ($patient['Question_7_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_7_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio3" <?php if ($patient['Question_7_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_7_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio4" <?php if ($patient['Question_7_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_7_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio5" <?php if ($patient['Question_7_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_7_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio6" <?php if ($patient['Question_7_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_7_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio7" <?php if ($patient['Question_7_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_7_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio8" <?php if ($patient['Question_7_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_7_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio9" <?php if ($patient['Question_7_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_7_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_7_inlineRadioOptions" id="question_7_inlineRadio10" <?php if ($patient['Question_7_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_7_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_8">8. Based on the number that best describes how during the past week pain has INTERFERED with your: Walking ability.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio1" <?php if ($patient['Question_8_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_8_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio2" <?php if ($patient['Question_8_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_8_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio3" <?php if ($patient['Question_8_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_8_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio4" <?php if ($patient['Question_8_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_8_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio5" <?php if ($patient['Question_8_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_8_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio6" <?php if ($patient['Question_8_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_8_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio7" <?php if ($patient['Question_8_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_8_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio8" <?php if ($patient['Question_8_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_8_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio9" <?php if ($patient['Question_8_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_8_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_8_inlineRadioOptions" id="question_8_inlineRadio10" <?php if ($patient['Question_8_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_8_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_9">9. Based on the number that best describes how during the past week pain has INTERFERED with your: Normal work (includes work both outside the home and housework).</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio1" <?php if ($patient['Question_9_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_9_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio2" <?php if ($patient['Question_9_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_9_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio3" <?php if ($patient['Question_9_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_9_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio4" <?php if ($patient['Question_9_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_9_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio5" <?php if ($patient['Question_9_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_9_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio6" <?php if ($patient['Question_9_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_9_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio7" <?php if ($patient['Question_9_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_9_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio8" <?php if ($patient['Question_9_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_9_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio9" <?php if ($patient['Question_9_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_9_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_9_inlineRadioOptions" id="question_9_inlineRadio10" <?php if ($patient['Question_9_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_9_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_10">10. Based on the number that best describes how during the past week pain has INTERFERED with your: RelaTonships with other people.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio1" <?php if ($patient['Question_10_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_10_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio2"  <?php if ($patient['Question_10_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_10_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio3"  <?php if ($patient['Question_10_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_10_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio4"  <?php if ($patient['Question_10_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_10_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio5"  <?php if ($patient['Question_10_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_10_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio6"  <?php if ($patient['Question_10_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_10_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio7"  <?php if ($patient['Question_10_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_10_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio8"  <?php if ($patient['Question_10_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_10_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio9"  <?php if ($patient['Question_10_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_10_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_10_inlineRadioOptions" id="question_10_inlineRadio10"  <?php if ($patient['Question_10_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_10_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_11">11. Based on the number that best describes how during the past week pain has INTERFERED with your: Sleep.</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio1"  <?php if ($patient['Question_11_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_11_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio2"  <?php if ($patient['Question_11_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_11_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio3"  <?php if ($patient['Question_11_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_11_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio4"  <?php if ($patient['Question_11_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_11_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio5"  <?php if ($patient['Question_11_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_11_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio6"  <?php if ($patient['Question_11_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_11_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio7"  <?php if ($patient['Question_11_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_11_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio8"  <?php if ($patient['Question_11_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_11_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio9"  <?php if ($patient['Question_11_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_11_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_11_inlineRadioOptions" id="question_11_inlineRadio10"  <?php if ($patient['Question_11_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_11_inlineRadio10">10</label>
                    </div>       
                </div>
                <div class="form-group">
                    <label for="question_12">12. Based on the number that best describes how during the past week pain has INTERFERED with your: Enjoyment of life</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio1"  <?php if ($patient['Question_12_score'] == "1") { echo "checked"; } ?> value="1">
                        <label class="form-check-label" for="question_12_inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio2" <?php if ($patient['Question_12_score'] == "2") { echo "checked"; } ?> value="2">
                        <label class="form-check-label" for="question_12_inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio3" <?php if ($patient['Question_12_score'] == "3") { echo "checked"; } ?> value="3">
                        <label class="form-check-label" for="question_12_inlineRadio3">3</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio4" <?php if ($patient['Question_12_score'] == "4") { echo "checked"; } ?> value="4">
                        <label class="form-check-label" for="question_12_inlineRadio4">4</label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio5" <?php if ($patient['Question_12_score'] == "5") { echo "checked"; } ?> value="5">
                        <label class="form-check-label" for="question_12_inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio6" <?php if ($patient['Question_12_score'] == "6") { echo "checked"; } ?> value="6">
                        <label class="form-check-label" for="question_12_inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio7" <?php if ($patient['Question_12_score'] == "7") { echo "checked"; } ?> value="7">
                        <label class="form-check-label" for="question_12_inlineRadio7">7</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio8" <?php if ($patient['Question_12_score'] == "8") { echo "checked"; } ?> value="8">
                        <label class="form-check-label" for="question_12_inlineRadio8">8</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio9" <?php if ($patient['Question_12_score'] == "9") { echo "checked"; } ?> value="9">
                        <label class="form-check-label" for="question_12_inlineRadio9">9</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input readonly class="form-check-input" type="radio" name="question_12_inlineRadioOptions" id="question_12_inlineRadio10" <?php if ($patient['Question_12_score'] == "10") { echo "checked"; } ?> value="10">
                        <label class="form-check-label" for="question_12_inlineRadio10">10</label>
                    </div>       
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Total Score</h5>
                <div class="form-group">                    
                <input readonly type="total_score" class="form-control" id="total_score" name="total_score" value="<?php echo $patient['Total_score']; ?>">
                </div> 
            </div>
        </div>
                    <a  href="Admin.php" class="btn btn-secondary btn-sm mt-4 mb-4" >Back</a>
                    <a  href="editForm.php?Id=<?php echo $patientId; ?>" class="btn btn-primary btn-sm mt-4 mb-4" >Edit</a>
                    <a  href="delete.php?Id=<?php echo $patientId; ?>" class="btn btn-danger btn-sm mt-4 mb-4" onclick="return confirm('Are you sure to delete?');">Delete</a>
    </form>
    </div>
</body>
</html>

