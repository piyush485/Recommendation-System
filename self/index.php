<?php
    $insert = false;
    // check if the name is provided or not for checking that form is submitted successfullty 
    if(isset($_POST['name'])){

        // provides the credentials for the secure connection
        $server = "localhost";
        $username = "root";
        $password = "";

        // connect to the sql server 
        $con = mysqli_connect($server, $username, $password);

        // check if the connection is established or not 
        if(!$con){
            die("Connection to this database failed due to ".mysqli_connect_error());
        }
        // for checking the connection 
        // echo "Conneected";

        // get all the details of the form in variables
        $name = $_POST['name'];
        $section = $_POST['section'];
        $semester = $_POST['semester'];
        $branch = $_POST['branch'];
        $campus = $_POST['campus'];
        $recommendation = $_POST['recommendation'];

        // this is the query to run in the db to insert all the provided fields. 
        $sql = "INSERT INTO `trip`.`recommendation` (`NAME`, `SECTION`, `SEMESTER`, `BRANCH`, `CAMPUS`, `RECOMMENDATION`, `DT`) VALUES ('$name', '$section', '$semester', '$branch', '$campus', '$recommendation', current_timestamp());";
        // echo $sql;
        if($con->query($sql) == true){
            // $insert = true;
            header("Location: senondPage.php");
        }else{
            echo "Error: $sql <br> $con->error";
        }
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendation Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Yanone+Kaffeesatz:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Graphic Era University">
    <div class="container">
        <h1>Graphic Era University Recommendation Form</h1>
        <hr>
        <p>Enter all the fields and provide us your Feedback.</p>
        <hr>
        <form action="index.php" method="post">
            <label for="name">Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#160;&#160;</label>
            <input class="one" type="text" id="name" name="name" placeholder="Enter your name" required>
            <br>
            <label for="section">Section: &nbsp;&nbsp;&#160;&#160;&#160;</label>
            <input class="one" type="text" id="section" name="section" placeholder="Enter your section" required>
            <br>
            <label for="semester">Semester: &#160;</label>
            <input class="one" type="text" id="semester" name="semester" placeholder="Enter your semester" required>
            <br>
            <label for="branch">Branch: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </label>
            <input class="one" type="text" id="branch" name="branch" placeholder="Branch e.g., CSE" required>
            <br>
            <label for="campus">Campus: &#160;&nbsp;&nbsp;</label>
            <input class="one" type="text" id="campus" name="campus" placeholder="e.g., Dehradun" required>
            <br>
            <label for="recommendation">Recommendation: </label><br>
            &#160;&#160;&#160;&#160;&#160;
            &#160;&#160;&#160;&#160;&#160;
            <textarea class="one" name="recommendation" id="recommendation" cols="30" rows="5" placeholder="Enter your recommendation here" required></textarea>
            <br>
            <button class="btn">Submit</button>
        </form>
    </div>  
</body>
</html>