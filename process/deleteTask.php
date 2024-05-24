<?php 

include '../db.php';



if (isset($_POST['task_id'])) {
    $taskIdToDelete = $_POST['task_id'];
    if (deleteTask($taskIdToDelete, $conn)) {
        echo "Task Deleted";
    } else {
        echo "<Failed";
    }
}

function deleteTask($taskId, $conn) {
    $sql = "DELETE FROM task WHERE task_id = $taskId";
    if ($conn->query($sql) === TRUE) {
       
      $sql = "DELETE FROM task_allocated WHERE task_id = $taskId";
      if ($conn->query($sql) === TRUE) {
          return true;
          
      } 

    } else {
        return false;
    }
}



?>