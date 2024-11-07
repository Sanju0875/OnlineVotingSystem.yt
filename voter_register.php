<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    
    $emailqeury = " select * from voter where email = '$email'";
    $query = mysqli_query($conn, $emailqeury);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        echo "email already exits";
    }else{
        if($password === $c_password){
            $insertquery = "insert into voter(name,email,gender,password) values('$name', '$email', '$gender', '$password')";
            $iquery = mysqli_query($conn, $insertquery);
            if($conn){
                header("Location:./index.php");
            }
        }else{
            ?>
            <script>
                alert("password not match");
                </script>
            <?php
    }   
    
}}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./voter_register.css">
    <title>Login Page</title>

</head>

<body>
    <section class="container">
        <div class="form-box">
            <div class="form-value">
                <form id="myform" action="#" method="POST">
                    <h1> Padmashree International College</h1>
                    <h2>Voter Register</h2>
                    <div class="inputbox">
                        <input type="text" id="name" name="name" value="" autocomplete="off">
                        <span id="nameError" class="error"></span>
                        <label for="name">Name</label>
                    </div>


                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" id="email" name="email" value="" autocomplete="off">
                        <span id="emailError" class="error"></span>
                        <label for="email">E-mail</label>
                    </div>

                    <div class="inputbox">
                        <label for="gender" class="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" value="" autocomplete="off">
                        <span id="passwordError" class="error"></span>
                        <label for="password">Password</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="cpassword" name="c_password" value="" autocomplete="off">
                        <span id="cpasswordError" class="error"></span>
                        <label for="cpassword">Confirm Password</label>
                    </div>

                    <button name="submit" type="submit">Register</button>
                    <div class="register">
                        <p>Already Registered! <a href="./index.php">Login now</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="./script.js"></script>
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" nomodule></script>
</body>

</html>