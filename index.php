<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){

        die("failed to connect the database.". mysqli_connect_error());
        
    }

   $name = $_POST['name'];
   $id = $_POST['id'];
   $department = $_POST['department'];
   $branch = $_POST['branch'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $sql = "INSERT INTO `campusdrive`.`student` (`name`, `id`, `deparment`, `branch`, `email`, `phone`, `dt`) VALUES ('$name', '$id', '$department', '$branch', '$email', '$phone', current_timestamp());";
//echo $sql;

if($con->query($sql)==true){
   $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
} 

$con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="img" src="charusat.jpg" alt="Charusat">
    <div class="container">
        <h1>Welcome to Charusat Campus Placement Training Form</h3>
        <p> Enter your details and submit this form to 
            confirm your registration for the Training.
        <?php
        if($insert == true){
            echo "<p class='submitmsg'>Thanks for Submitting Form</p>";
        }
        ?>
        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="id" id="id" placeholder="Enter your ID">
            <input type="text" name="department" id="department" placeholder="Enter your Department">
            <input type="text" name="branch" id="branch" placeholder="Enter your Branch">
            <input type="email" name="email" id="email" placeholder="Enter your EmailId">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone No.">
            <button class="btn">submit</button>
            
        </form>
        </p>
        <script src = "index.js"> </script>
    </div>
</body>
</html>




