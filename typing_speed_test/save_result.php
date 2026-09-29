<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['user_id'])) {
    exit("User not logged in");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];

    $wpm = isset($_POST['wpm']) ? (int)$_POST['wpm'] : 0;
    $accuracy = isset($_POST['accuracy']) ? (float)$_POST['accuracy'] : 0;
    $mistakes = isset($_POST['mistakes']) ? (int)$_POST['mistakes'] : 0;
    $test_time = isset($_POST['test_time']) ? (int)$_POST['test_time'] : 60;

    $sql = "INSERT INTO results(user_id, wpm, accuracy, mistakes, test_time)
            VALUES('$user_id', '$wpm', '$accuracy', '$mistakes', '$test_time')";

    if (mysqli_query($conn, $sql)) {
        echo "Result Saved Successfully";
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }

} else {

    echo "Invalid Request";

}
?>