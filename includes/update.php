<?php
require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';

    if (!empty($id)) {
        try {
            $sql = "UPDATE student 
                    SET Surname = :surname, 
                        Name = :name, 
                        Middlename = :middlename, 
                        Address = :address, 
                        contact_number = :contact_number 
                    WHERE ID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':surname' => $_POST['surname'] ?? null,
                ':name' => $_POST['name'] ?? null,
                ':middlename' => $_POST['middlename'] ?? null,
                ':address' => $_POST['address'] ?? null,
                ':contact_number' => $_POST['contact_number'] ?? null,
                ':id' => $id
            ]);

            header("Location: ../public/index.php?status=updated");
            exit();
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    } else {
        echo "No ID provided.";
    }
}
?>
