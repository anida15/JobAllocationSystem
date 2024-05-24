<?php
include '../db.php';

session_start(); 
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$profession = $_SESSION['profession'];
$created_at = $_SESSION['created_at'];
$user_type = $_SESSION['user_type'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
 
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    // Update the user's password in the database
    
    $sql = "UPDATE users SET password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $user_id);

    if ($stmt->execute()) {
        echo "Password updated successfully.";
    } else {
        echo "Error updating password: " ;
    }

}

?>