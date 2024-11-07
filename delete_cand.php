<?php
require_once("./connect.php");
if (isset($_GET["id"])){
    $candidate_id = (int)$_GET["id"];
    $stmt = "select * from candidate;";
    $res = $conn->query($stmt);

    if ($res){
        while ($row = $res->fetch_assoc()){
            if ($candidate_id === (int)$row["id"]){
                $stmt = "delete from candidate where id = $candidate_id;";
                $res = $conn->query($stmt);

                if ($res){
                    echo "<script>console.log('Successful');</script>";
                    header("location: /Onlinevoting/admin_dash.php");
                }else{
                    echo "<script>console.log('Failed');</script>";
                }
            }
        }
    }
}
?>