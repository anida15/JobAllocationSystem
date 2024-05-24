<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $profession = $_POST['profession'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if (!empty($username) && !empty($password) && !empty($profession)) {

        if ($confirm_password == $password) {

            $stmt_check = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt_check->bind_param("s", $username);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();

            if ($result_check->num_rows > 0) {
                echo "Username already exists";
            } else {

         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $user_type = "standard";
                $stmt = $conn->prepare("INSERT INTO users (username, profession, password, user_type) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $username, $profession, $hashed_password, $user_type);

                if ($stmt->execute()) {
                    echo "Account Created Successfully";
                } else {
                    echo "Error creating account: " . $conn->error;
                }

                $stmt->close();
            }
            $stmt_check->close();
        } else {
            echo "Passwords Don't Match";
        }
    } else {
        echo "Please Fill All fields";
    }
}

$conn->close();
?>
