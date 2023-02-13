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
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a id = "start" href="about.html">About</a></li>
                        <li><a href="initialLogin.php">Add Blog</a></li>
                        <li><a href="SelectMonth.php">View Blogs</a></li>
                        <li><a href="#contactdetails">Contact</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="experience.html">Experience</a></li>
                        <li><a href="education.html">Education</a></li>
                        <li><a href="about.html#skills">Skills</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

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
    $month = $_POST["Month"];
    if($month=="All"){
        $sql = "SELECT * FROM blogs";
    }
    else{
        $sql = "SELECT * FROM blogs WHERE month='$month'";
    }

    $result = $conn->query($sql);
    $datas = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $datas[] = $row;
        }
    }
    for ($x = 0; $x <= 3; $x++) {
        echo "<br>";
    }

    //Reverses the order of the data
    $datas = array_reverse($datas);
    foreach($datas as $data){
        echo "<br>";
        echo '<span style="color:aliceblue;padding-left:5em;font-size:1.3em">Date:  '. $data['date'].'  '. $data["time"].' <br></span>';
        echo '<span style="color:aliceblue;padding-left:5em;font-size:1.3em">Title:  '.$data["title"].' <br></span>';
        echo '<span style="color:aliceblue;padding-left:5em;font-size:1.3em">Text: '.$data["text"].' <br></span>';
    } 
    ?>
</body>
</html>
