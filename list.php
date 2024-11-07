<?php
require("connect.php");
$stmt = "SELECT * FROM candidate;";
$res = $conn->query($stmt);

if ($res){
    echo "<script>console.log('Successful')</script>";
}else{
    echo "<script>console.log('Error')</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Admin Phone</title>
    <link rel="stylesheet" href="./list1.css">
    <style>
        .main-container {
            display: grid;
            grid-template-rows: auto auto;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="title">Voting System</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="bookmarks-outline"></ion-icon></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
        
                    <li>
                        <a href="./candidate.php">
                            <span class="icon"><ion-icon name="flag-outline"></ion-icon></span>
                            <span class="title">Candidates</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="./aboutus.php">
                            <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                            <span class="title"> About Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="./result.php">
                            <span class="icon"><ion-icon name="flag-outline"></ion-icon></span>
                            <span class="title">Results</span>
                        </a>
                    </li>
                </ul>

            </div>
            <div class="topbar">
                <div class="search">
                    <label>
                        <input type="text" placeholder="search here">
                    </label>
                </div>
                <div class="search bar">
                    <ion-icon name="search-outline"></ion-icon>
                </div>
                <div class="logo">
                    <img src="./public/images/vote.jpg">
                </div>
            </div>
            <div class="voteBox">
                <div class="card">
                    <div>
                        <div class="numbers"> 1,500</div>
                        <div class="cardName">Total Voters</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="man-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"> 4</div>
                        <div class="cardName">Candidates</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="flag-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">600 </div>
                        <div class="cardName"> Total Vote Counted</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="finger-print-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">40</div>
                        <div class="cardName"></div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>

        </div>
        <?php require("./candidate.php"); ?>
    </div>

</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>