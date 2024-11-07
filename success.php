<?php
require("./connect.php");
if (isset($_GET["id"])){
    $candidate_id = (int)$_GET["id"];
    $stmt = "select * from candidate;";
    $res = $conn->query($stmt);

    if ($res){
        echo "Success";
        while ($row = $res->fetch_assoc()){
            // var_dump($row["id"]);
            if ($candidate_id === (int)$row["id"]){
                $current_vote = $row["votes"];
                $current_vote++;
                var_dump($current_vote);
                $stmt = "update candidate set votes = $current_vote where id = $candidate_id;";
                $res = $conn->query($stmt);

                if ($res){
                    echo "<script>console.log('Successful');</script>";
                    header("location: /Onlinevoting/");
                }else{
                    echo "Failed";
                    echo "<script>console.log('Failed');</script>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfully Voted</title>
    <link rel="stylesheet" href="success.css">
</head>

<body>
    <div class="container">
        <div class="success-message">
            <h1>Successfully Voted!</h1>
            <p>Thank you for casting your vote.</p>
        </div>
        <div class="confetti-container">
            <div class="confetti"></div>
        </div>
    </div>

    <!-- <script src="script.js"></script> -->
</body>

</html>
