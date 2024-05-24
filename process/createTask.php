<?php 
include '../db.php';
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $number_of_works_required = $_POST['number_of_works'];
    $task_description = $_POST['task_description'];
    $selected_profession = $_POST['profession'];
    $task_completion = "NO";
    if (!empty($task_name) && !empty($number_of_works_required) && !empty($task_description) && !empty($task_completion) ) {


        $insert_id ="";
        $sql = "INSERT INTO task ( profession, task_name, number_of_works, task_description) 
        VALUES (  '$selected_profession', '$task_name', '$number_of_works_required', '$task_description')";

            if ($conn->query($sql) === TRUE) {
                $insert_id =mysqli_insert_id($conn);

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }



    $sql = "SELECT user_id FROM users WHERE profession = '$selected_profession'";




    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $userIds = array();

        while ($row = $result->fetch_assoc()) {
            $userIds[] = $row['user_id'];
        }

        shuffle($userIds);

        $randomUserIds = array_slice($userIds, 0, $number_of_works_required);

        $insertValues = array();

        foreach ($randomUserIds as $userId) {
            $insertValues[] = "('$userId', '$task_name',  '$task_description' ,'$task_completion','$insert_id')";
        }

        $sql = "INSERT INTO `task_allocated` (`user_id`, `task_title`,`task_description`, `task_completion_status`, `task_id`) 
                VALUES " . implode(", ", $insertValues);

        if ($conn->query($sql) === TRUE) {
            echo "Task Created Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        echo "Failed to Create Record";
    }

    } else {
        echo "fill all Fields";
    }

 
}

?>
