<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Online Voting System</title>
    <link rel="stylesheet" href="./admin_dash.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h1>Admin Dashboard</h1>
            <ul>
                <li class="active"><a href="#">Dashboard</a></li>
                <li><a href="./cand-update.php">Candidates</a></li>
                <li><a href="./election.php">Voting Time</a></li>
                <li><a href="./voterlist.php">Voters</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
        

        <div class="main-content">
            <div class="header">
                <h2>Welcome, Admin!</h2>

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
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="heading-section">
                <h3>Online Voting System</h3>
                <p>CANDIDATE LIST</p>
            </div>
            <table style="margin: 0 auto; height:300px; width:700px" >
                <thead>
                    <tr>
                        <th>name</th>
                        <th>position</th>
                        <th>profile</th>
                        <th>action</th>
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
                                <button style="font-weight:bold" name="vote-btn"><a href="./delete_cand.php/?id=<?php echo $row['id']; ?>">delete</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>
</html>
            </div>
        </div>
    </div>
</body>

</html>