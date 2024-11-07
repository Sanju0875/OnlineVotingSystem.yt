<?php
require("./connect.php");
$votingOpen = "";

if ($votingOpen) {

    echo '<button><a href="./success.php/?id=' . $row['id'] . '"><button type="button disable">click me</button></a></button>';
} else {
    echo '<p>Voting is not yet open. Please wait for the election to start.</p>';
}
?>
