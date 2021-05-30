<?php

include("../inc/connect.inc.php");
if(isset($_GET['id']))
$query = "SELECT * FROM orders WHERE id={$_GET['id']}";
$run = mysqli_query($conn,$query);
while ($row=mysqli_fetch_assoc($run)) {
    $dstatus = $row['dstatus'];
    if ($dstatus=="no") {
        $dstatus="yes";
    mysqli_query($conn,"UPDATE orders SET dstatus='$dstatus' WHERE id={$_GET['id']}");
    header('location: index.php');
    } elseif ($dstatus=="yes") {
        header('location: index.php');
        exit();
    }
}

?>