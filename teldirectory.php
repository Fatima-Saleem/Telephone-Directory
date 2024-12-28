<?php
namespace MyApp;
require_once 'db.php'; 

class MyDirectory {
    protected $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    //create
    public function addEntry($userId, $name, $phone, $email) 
    {
        $sql = "INSERT INTO directory (user_id, name, phone, email) VALUES (:userId, :name, :phone, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
    //read
    public function getAllEntries($userId) 
    {
        $sql = "SELECT * FROM directory WHERE user_id = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    //update
    public function updateEntry($directoryId, $name, $phone, $email) {
        // echo "Directory ID: " . $directoryId . "<br>";
        // echo "Name: " . $name . "<br>";
        // echo "Phone: " . $phone . "<br>";
        // echo "Email: " . $email . "<br>";
    
        $sql = "UPDATE directory SET name = :name, phone = :phone, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $directoryId, \PDO::PARAM_INT); 
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
    
        try {
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo "Entry updated successfully.";
            } else {
                echo "No entry was updated. Please check if the ID is correct.";
            }
        } catch (\PDOException $e) {
            echo "SQL Error: " . $e->getMessage();
        }
    }
    
    
    //delete
    public function deleteEntry($directoryId) 
    {
        $sql = "DELETE FROM directory WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $directoryId);
        $stmt->execute();
    }
}
?>