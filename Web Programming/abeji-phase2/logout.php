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
        <script src=“script.js" defer></script>
        <link rel="stylesheet" href="MiniProjectReset.css">
        <link rel="stylesheet" href="test.css">
    </head>
<body>
    <?php
    session_unset();
    session_destroy();
    header("Location: about.html");
    ?>

</body>
</html>