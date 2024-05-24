<?php 

include '../db.php';



if ( isset($_POST['user_id'])) {
    $userIdToDelete = $_POST['user_id'];
    if (deleteTask($userIdToDelete, $conn)) {
        echo "Account Deleted";
    } else {
        echo "<Failed";
    }
}

function deleteTask($userId, $conn) {
    $sql = "DELETE FROM users WHERE user_id = $userId";
    if ($conn->query($sql) === TRUE) {
      return true;

    } else {
        return false;
    }
}
 


?>