<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "INSERT INTO tasks (title, due_date, status) VALUES ('$title', '$due_date', '$status')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>