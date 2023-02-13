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
        <div class='image1'></div>
        <form action = "login.php" method="post">
            <fieldset class = "form" id = "form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <br>
                <br>
                <label for="psw">Password:</label>
                <input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <br>
                <br>
                <input type="submit" name="submit" value="Submit"> 
            </fieldset>
        </form>
    </body>
</html>