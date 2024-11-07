<?php
require("./connect.php");
if (isset($_POST['submit'])) {
    echo "submitted";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from voter where email='$email'";
    $res = mysqli_query($conn, $email_search);

    while ($row = $res->fetch_assoc()){
        if ($email === $row["email"]){
            if ($password == $row["password"]){
                echo '<span style = "color: green;">login successful</span>';
                header("Location: ./list.php");
            }else {
                echo '<span style = "color: red;">incorrect password</span>';
            }
        }else{
            echo '<span style = "color: red;">invalid email</span>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login1.css">
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <h1>Padmashree International College</h1>
                <h2>Login</h2>
                <form action="#" id="myform" method="POST">
                    <div class="inputbox">
                        <input type="name" id="email" autocomplete="off" name="email">
                        <span id="emailError" class="error"></span>
                        <label for="email">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" autocomplete="off" name="password">
                        <span id="passwordError" class="error"></span>
                        <label for="password">Password</label>
                    </div>

                    <div class="forget">
                        <label for="remember-checkbox">
                            <input type="checkbox" id="remember-checkbox">
                            Remember me
                            <a href="#">Forgot Password</a>
                        </label>
                    </div>

                    <button tpe="button" name="submit">Login</button>
                    <div class="register">
                        <p>Don't have an account? <a href="./voter_register.php">Register now</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- <script src="./script.js"></script> -->
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" nomodule></script>
</body>
</html>
