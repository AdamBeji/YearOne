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
    <form action = "viewBlog.php" method="post">
        <fieldset class = "form" id = "form">
        <label for="Months">Filter by Month:</label>
            <select type = "Month" name="Month" id="Month">
                <option value="All">All</option>
                <option value="01">Jan</option>
                <option value="02">Feb</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">Aug</option>
                <option value="09">Sept</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            <input type="submit" name="submit" value="Submit"> 
        </fieldset>
    </form>
</body>
</html>