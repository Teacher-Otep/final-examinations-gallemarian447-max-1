<?php
require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'] ?? '';
    $name = $_POST['name'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $address = $_POST['address'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';

    try {
        $sql = "INSERT INTO student (surname, name, middlename, address, contact_number) 
                VALUES (:surname, :name, :middlename, :address, :contact_number)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':surname'       => $surname,
            ':name'          => $name,
            ':middlename'    => $middlename,
            ':address'       => $address,
            ':contact_number'=> $contact_number
        ]);
        header("Location: ../public/index.php?status=success");
        exit();
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>
