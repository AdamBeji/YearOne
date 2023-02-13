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
        <div class='image1'></div>
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <form action = "addBlog.php" method="post" onsubmit="return Validate()">
                    <fieldset class = "form" id = "form">
                        <div class="form-group">
                            <textarea id = "text1" type="title" class="form-control" name="title" placeholder="Title"><?php echo $_SESSION['title']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea id = "text2" type = "text" class="form-control bcontent" name="content" placeholder="Enter your text here"><?php echo $_SESSION['text']; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <button id = "submit" type="submit">Submit</button>
                            <button id="clear" onclick="return ConfirmDelete()" type="reset">Clear</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script>
    function ConfirmDelete()
    {
        var ConfirmDelete = confirm("Are you sure you want to delete?");
        if (ConfirmDelete)
            return true;
        else
            return false;
    }
    </script>
    <script>
        function IsEmptyTitle()
        {
            var title = document.getElementById("text1");
            if(title.value.length == 0){
                title.className = "NoInputTitle";
                return false;
                document.getElementById("submit").addEventListener("click", function(event){
                    event.preventDefault()
                });
            }
        }
    </script>
    <script>
        function IsEmptyText(){
            var text = document.getElementById("text2");
            if(document.getElementById("text2").value.length == 0){
                text.className = "NoInputText";
                return false;
                document.getElementById("submit").addEventListener("click", function(event){
                    event.preventDefault()
                });
            }
        }
    </script>
    <script>
        function Validate(){
            var ValidTitle = IsEmptyTitle();
            var ValidText = IsEmptyText();
            if(ValidTitle==false){
                return false;
            }
            if(ValidText==false){
                return false;
            }
        }
    </script>
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

    $title = $_SESSION['title'];
    
    $sql = "DELETE FROM blogs WHERE title='$title'";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Record deleted successfully";
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
    ?>
</body>
</html>