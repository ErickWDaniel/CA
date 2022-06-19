<?php
require_once "connect.php";
error_reporting(0);
session_start();
$id = $_SESSION['id'];
$weka = "SELECT * FROM ca WHERE id='$id'";
$wekaSql = mysqli_query($connect, $weka);
$result = mysqli_fetch_array($wekaSql);

include "connect.php";
if (isset($_POST['submit'])) {
    session_unset();
    session_destroy();
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAILS</title>
</head>

<body>
    <a href="./index.php">HOME</a>
    <form method="POST">
        <table border="1" style="width: 100%">
            <th>ID</th>
            <th>Name</th>
            <th>Admission</th>
            <th>TEST1</th>
            <th>TEST2</th>
            <th>INDIVIDUAL ASSIGNMENT</th>
            <th>GROUP ASSIGNMENT</th>
            <?php
            ?> <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['fullname']; ?></td>
                <td><?php echo $result['admission']; ?></td>
                <td><?php echo $result['test1']; ?></td>
                <td><?php echo $result['test2']; ?></td>
                <td><?php echo $result['ca1']; ?></td>
                <td><?php echo $result['ca2']; ?></td>
            </tr>
            <?php

            ?>

        </table>

        <button type="submit" name="submit">logout</button>
    </form>


</body>

</html>