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
<body style="background-image:url('AdamEdit.jpg');position:absolute;width:100%;height:150%;background-size:cover">
<div class='NavBar'>
    <h1 style="font-size:2em;margin-top:2em;padding-left:2em">Review Blog</h1>
    <form style="margin-left:-5em" action = "Path.php" method="post">
        <fieldset class = "form" id = "form">
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
            
            $sql = "SELECT * FROM blogs ORDER BY ID DESC LIMIT 1";

            $result = $conn->query($sql);
            $datas = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $datas[] = $row;
                }
            }
            for ($x = 0; $x <= 2; $x++) {
                echo "<br>";
            }

            $datas = array_reverse($datas);
            foreach($datas as $data){
                echo "<br>";
                echo '<span style="color:aliceblue;padding-left:5em;font-size:1.3em">Date:  '. $data['date'].'  '. $data["time"].' <br></span>';
                echo '<span style="color:aliceblue;padding-left:5em;font-size:1.3em">Title:  '.$data["title"].' <br></span>';
                echo '<span style="color:aliceblue;padding-left:5em;font-size:1.3em">Text: '.$data["text"].' <br></span>';
            } 
            ?>
            <br>
            <br>
            <label style="margin-left:25em" for="Review">Options</label>
            <select type = "Review" name="Review" id="Review">
                <option value="1">Advance</option>
                <option value="2">Edit</option>
            <input style="position:absolute;float:right;margin-left:5em" type="submit" name="submit" value="Submit"> 
        </fieldset>
    </form>
</body>
</html>