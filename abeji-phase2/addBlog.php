<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="MiniProjectReset.css">
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ecs417";

    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $_SESSION['title'] = $_POST['title'];
    $title = $_SESSION['title'];
    $_SESSION['text'] = $_POST['content'];
    $text = $_SESSION['text'];

    $date = date("Y/m/d");
    $month = date("m");
    date_default_timezone_set("Europe/London");
    $time = date("h:i:sa");

    $sql = "INSERT INTO blogs (date,time,title,text,month) VALUES ('$date', '$time', '$title', '$text','$month')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ReviewBlog.php");
        exit();
    } else {
        header("Location: addEntry.php");
        exit();
    }

    $conn->close();
    ?>
</body>
</html>