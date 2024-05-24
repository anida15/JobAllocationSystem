<?php
include '../db.php';

session_start();

$profession = $_SESSION['profession'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedUsername = $_POST['user_id'];  
    $selectedProfession = $_POST['profession'];

    $stmt = $conn->prepare("UPDATE users SET profession = ? WHERE user_id = ?");
    $stmt->bind_param("si", $selectedProfession, $selectedUsername);

    if ($stmt->execute()) {
        $_SESSION['profession'] = $selectedProfession;
        echo "Update Successful ";
    } else {
        echo "Error updating: " . $conn->error;
    }

    $stmt->close(); 
}
?>
