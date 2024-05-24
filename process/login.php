<?php
include '../db.php';

session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();

    $stmt->bind_result($user_id, $db_username, $profession, $db_password ,$user_type,$created_at);

    if ($stmt->fetch()) {
        if (password_verify($password, $db_password)) {

            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['profession'] = $profession;
            $_SESSION['created_at'] = $created_at;
            $_SESSION['user_type'] = $user_type;

            echo "sucess";



 
        } else {
            echo "Incorrect password.";
        }
    } else {
      echo "Username not found.";
    }

    $stmt->close();
    $conn->close();
}
?>