<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        $die("connection failed");
    }
    // echo " success";

    $name= $_POST["name"];
    $age= $_POST["age"];
    $gender= $_POST["gender"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];
    $other= $_POST["desc"];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age',
    '$gender', '$email', '$phone', '$other', current_timestamp());";

    if($con->query($sql)==true){
        // echo "Successfully inserted";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>travel details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="mountain-984083.jpg" alt="">
    <!-- <img src="hamburg-3846525.jpg" alt=""> -->
    <div class="container">
        <h1>welcome to trip form</h1>
        <p>enter your details and submit your form</p>

        <?php
        if($insert == true){
        echo "<p class='msg'>Thanks for your details</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gende">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone no.">
            <textarea name="desc" id="desc" cols="30" rows="4" placeholder="your message"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="inddex.js"></script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'this', '22',
    'male', 'this@this.com', '9999999999', 'message', current_timestamp()); -->
</body>

</html>