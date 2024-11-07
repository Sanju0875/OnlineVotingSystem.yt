<?php
require("./connect.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // It's better to use prepared statements to prevent SQL injection
    $search_query = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($search_query);
    
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            // Successful login, redirect to admin dashboard
            header("location: ./admin_dash.php");
            exit; // Make sure to exit after redirection
        } else {
            echo "Error: Invalid username or password";
        }

        $stmt->close();
    } else {
        echo "Error: Database query failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin1.css">
</head>

<body>
    <div class="form-box">
        <h2>Admin Login</h2>
        <form action="#" method="post">
            <div class="form-field">
                <label for="username">Full Name</label>
                <input type="text" name="username" id="username" required />
            </div>
            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required />
            </div>
            <div class="form-field">
                <button type="submit" name="submit" class="btnLogin">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
