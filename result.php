<?php
require_once("./connect.php");
$stmt = "SELECT * FROM candidate";
$result = $conn->query($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Election Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: red;
        }

        .result-item {
            display: flex;
            align-items: center;
            margin: 10px 0;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .result-item img {
            max-width: 100px;
            max-height: 80px;
            margin-right: 30px;
        }

        .candidate {
            flex-grow: 1;
        }

        .vote-count {
            font-weight: bold;
        }

        .result-list {
            margin-top: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 5px;
        }

        ul li span {
            margin-right: 120px;
        }

        ul li span:first-child {
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if ($result) {
            $maxvote = -1; // Set an initial value lower than any possible votes
            $winner = null;
            while ($row = $result->fetch_assoc()) {
                $votes = (int) $row["votes"];
                if ($votes > $maxvote) {
                    $maxvote = $votes;
                    $winner = $row;
                }
            }
        }
        ?>
        <h1>Election Results</h1>
        <!-- Winner Section -->
        <div class="winner-section">
            <div class="winner-title">Winner</div>
            <div class="result-item">
                <div class="candidate"><img src='<?php echo $winner['profile']; ?>' /></div>
                <div class="candidate">
                    <?php echo $winner['name']; ?>
                </div>
                <div class="vote-count">Votes :
                    <?php echo $winner['votes']; ?>
                </div>
            </div>
        </div>

        <!-- Candidate List -->
        <div class="result-list">
            <?php
            // Reset the query and loop through other candidates here
            $result = $conn->query($stmt);
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="result-item">
                    <ul>
                        <?php echo "<li><span>Name: " . $row['name'] . "</span> <span>Votes: " . $row['votes'] . "</span> <img src='" . $row['profile'] . "'>" . "</li>"; ?>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
