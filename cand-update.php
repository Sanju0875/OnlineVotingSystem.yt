<?php
require("./connect.php");

$sql_query = "SELECT * FROM candidate";
$result = $conn->query($sql_query);
//var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

h2 {
    text-align: center;
    color: #2980b9;
    margin-bottom: 20px;
}

div {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    max-width: 400px;
    width: 90%;
}

.form-field {
    margin-bottom: 15px;
}

.form-field input[type="text"],
.form-field input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-field input[type="text"]:focus,
.form-field input[type="file"]:focus {
    outline: none;
    border-color: #2980b9;
}

button[type="submit"] {
    background-color: #2980b9;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #1c759f;
}

    </style>
</head>
<body>
    <div>
        <h2>Create Candidate</h2>
        <form action="./uploads.php" method="post" enctype="multipart/form-data">
            <div class="form-field">
                <input type="text" name="fullname" placeholder="Full Name" />
            </div>
            <div class="form-field">
                <select name="position">
                     <option value="President">--Select Position--</option>
                    <option value="President">President</option>
                    <option value="President">Vice-President</option>
                </select>
            </div>
            <div class="form-field">
                <input type="file" name="profile" />
            </div>
                
            <button type="submit">Submit</button>
        </form>
    </div>
    </body>
</html>