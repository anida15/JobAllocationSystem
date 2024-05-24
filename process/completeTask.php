<?php

include '../db.php';

    if (isset($_POST['task_id'])) {
        $taskIdToComplete = $_POST['task_id'];
        if (completeTask($taskIdToComplete, $conn)) {
            echo "Task Completed";
        } else {
            echo "Faild To Complete";
        }
    }


    function completeTask($taskId, $conn) {
        $fixed_rate_per_task =10;
        $random_number = rand(7, 30);
        $total_earned = $random_number * $fixed_rate_per_task;
          $sql = "UPDATE task_allocated SET task_completion_status = 'YES' , price=$total_earned WHERE task_allocated_id = $taskId";
          if ($conn->query($sql) === TRUE) {
              return true;
          } else {
              return false;
          }
      }
      
    ?>