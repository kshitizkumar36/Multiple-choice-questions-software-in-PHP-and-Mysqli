<?php
session_start();
include'../../connect.php';

if (isset($_POST['new_question'])) {
    // Escape the inputs to avoid SQL injection
    $Question = mysqli_real_escape_string($conn, $_POST['Question']);
    $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
    $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
    $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
    $correct_answer = mysqli_real_escape_string($conn, $_POST['correct_answer']);

    // Get the latest question id
    $q1 = "SELECT `qid` FROM `questions` ORDER BY `qid` DESC LIMIT 1";
    $r1 = mysqli_query($conn, $q1);
    $d1 = mysqli_fetch_assoc($r1);
    $older_id = isset($d1['qid']) ? $d1['qid'] : 0;
    $now_id = $older_id + 1;

    // Get the latest answer id
    $q2 = "SELECT `aid` FROM `answers` ORDER BY `aid` DESC LIMIT 1";
    $r2 = mysqli_query($conn, $q2);
    $d2 = mysqli_fetch_assoc($r2);
    $answer_id = isset($d2['aid']) ? $d2['aid'] : 0;
    $answer = $answer_id + intval($correct_answer);  // Make sure to convert the answer to an integer

    // Insert the new question with the associated answer ID
    $query1 = "INSERT INTO `questions` (`question`, `ans_id`) VALUES ('$Question', '$answer')";
    $run1 = mysqli_query($conn, $query1);

    if ($run1) {
        // Insert the answer options
        $query2 = "INSERT INTO `answers` (`answer`, `ans_id`) VALUES ('$option1', '$now_id')";
        $qr2 = mysqli_query($conn, $query2);

        $query3 = "INSERT INTO `answers` (`answer`, `ans_id`) VALUES ('$option2', '$now_id')";
        $qr3 = mysqli_query($conn, $query3);

        $query4 = "INSERT INTO `answers` (`answer`, `ans_id`) VALUES ('$option3', '$now_id')";
        $qr4 = mysqli_query($conn, $query4);

        $query5 = "INSERT INTO `answers` (`answer`, `ans_id`) VALUES ('$option4', '$now_id')";
        $qr5 = mysqli_query($conn, $query5);

        if ($qr2 && $qr3 && $qr4 && $qr5) {
            // Set a success message and redirect
            $_SESSION['success'] = "Question added successfully!";
            header("location:dashboard.php");
        } else {
            // Error handling if answers were not inserted
            $_SESSION['error'] = "Failed to insert answers.";
            header("location:dashboard.php");
        }
    } else {
        // Error handling if the question was not inserted
        $_SESSION['error'] = "Failed to insert question.";
        header("location:dashboard.php");
    }
}


if(isset($_POST['delete']))
{
	$q_id= $_POST['q_id'];
	$query1="DELETE FROM `questions` WHERE `qid`='$q_id'";
	$run1= mysqli_query($conn,$query1);
	if($run1)
	{
		$query2="DELETE FROM `answers` WHERE `ans_id`='$q_id'";
		$run2= mysqli_query($conn,$query2);
		if($run2)
		{
			$_SESSION['success']="Question Removed successfully!";
				header("location:dashboard.php");
		}
	}
}



?>