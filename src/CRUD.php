<?php
require_once 'C:\Neuromodulation\NeuromodulationApp_php\database\dbConfig.php'; 

class CRUD {
    private $pdo;

    public function __construct() {
        global $conn;
        $this->pdo = $conn;
    }
//methods calling SPs
    public function getAllPatientsAndScores() {
        $stmt = $this->pdo->query("EXEC spGetAllPatientsAndScores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("EXEC spCreatePatientAndScore ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?");
        return $stmt->execute([
            $data['first_name'],
            $data['surname'],
            $data['date_of_birth'],
            $data['age'],
            $data['question_1_score'],
            $data['question_2_score'],
            $data['question_3_score'],
            $data['question_4_score'],
            $data['question_5_score'],
            $data['question_6_score'],
            $data['question_7_score'],
            $data['question_8_score'],
            $data['question_9_score'],
            $data['question_10_score'],
            $data['question_11_score'],
            $data['question_12_score'],
            $data['total_score'],
            date('Y-m-d H:i:s')
        ]);
    }
    public function update($data) {
        $stmt = $this->pdo->prepare("EXEC spUpdatePatientAndScore ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?");
        return $stmt->execute([
            $data['Id'],
            $data['first_name'],
            $data['surname'],
            $data['date_of_birth'],
            $data['age'],
            $data['question_1_score'],
            $data['question_2_score'],
            $data['question_3_score'],
            $data['question_4_score'],
            $data['question_5_score'],
            $data['question_6_score'],
            $data['question_7_score'],
            $data['question_8_score'],
            $data['question_9_score'],
            $data['question_10_score'],
            $data['question_11_score'],
            $data['question_12_score'],
            $data['total_score'],
            date('Y-m-d H:i:s')
        ]);
    }

    public function delete($patientId) {
        $stmt = $this->pdo->prepare("EXEC spDeletePatientAndScore ?");
        return $stmt->execute([$patientId]);
    }

    public function GetById($PatientId) {
        $stmt = $this->pdo->prepare("EXEC spGetPatientAndScoreByPatientId ?");
        $stmt->execute([$PatientId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>