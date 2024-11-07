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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="./candidate.css"> -->

</head>
    
    <div class="container">
        <div class="main">
            <div class="heading-section">
                <h3>Online Voting System</h3>
                <p>CANDIDATE LIST</p>
            </div>
            <table style="margin: 0 auto;">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>position</th>
                        <th>profile</th>
                        <th>Vote</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?php echo $row["name"]; ?>
                            </td>
                            <td>
                               
                                <?php echo $row["position"]; ?>

                                    
                            </td>
                            <td><img style="height:50px; width:50px;" src=<?php echo "./" . $row['profile']; ?> />
                            </td>
                            <td>
                                <button style="font-weight:bold" name="vote-btn"><a href="./success.php/?id=<?php echo $row['id']; ?><button type="button disable">click me</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>