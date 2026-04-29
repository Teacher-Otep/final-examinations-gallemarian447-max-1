<?php
require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';

    if (!empty($id)) {
        try {
            $sql = "DELETE FROM student WHERE ID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);

            header("Location: ../public/index.php?status=deleted");
            exit();
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    } else {
        echo "No ID provided.";
    }
}
?>
