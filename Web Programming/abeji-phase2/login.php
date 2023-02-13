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
    //sets varaiables

    $email = $_POST["email"];
    $pass1 = $_POST["password"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = ("SELECT ID FROM users WHERE email='$email' AND password='$pass1'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
            while($row = $result->fetch_assoc())
            {
                header("Location: addEntry.php", true, 301);
                exit();
            }
        }
        else 
        {
            header("Location: initialLogin.php");
            exit();
        }
        $conn->close();
    }
    ?>
</body>
</html>