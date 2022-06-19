<?php

$newId = $_GET['id'];
include "connect.php";
$value_error = "";
$test1 = "";
$test2 = "";
$IA = "";
$GA = "";
$total = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['test1']) && $_POST['test1'] > 10) {
        $value_error = "INVALID VALUES";
    } else {
        $test1 = $_POST['test1'];
    }
    if (empty($_POST['tes2']) && $_POST['test2'] > 10) {
        $value_error = "INVALID VALUES";
    } else {
        $test2 = $_POST['test2'];
    }
    if (empty($_POST['IA']) && $_POST['IA'] > 10) {
        $value_error = "INVALID VALUES";
    } else {
        $IA = $_POST['IA'];
    }
    if (isset($_POST['GA']) && $_POST['GA'] > 10) {
        $value_error = "INVALID VALUES";
    } else {
        $GA = $_POST['GA'];
    }
    if (!empty($_POST['test1']) && $_POST['test1'] <= 10 && !empty($_POST['test2']) && $_POST['test2'] <= 10 && !empty($_POST['IA']) && $_POST['IA'] <= 10 && !empty($_POST['GA']) && $_POST['GA'] <= 10) {
        $total = $test1 + $test2 + $IA + $GA;
        if ($total <= 19) {
            $status = "FAILED";
        } else {
            $status = "PASSED";
        }
        $weka = "UPDATE ca SET test1='$test1',test2='$test2',ca1='$IA',ca2='$GA',total='$total',status='$status' WHERE id='$newId'";
        $wekaSql = mysqli_query($connect, $weka);
        if ($wekaSql) {
            header("Location:view.php");
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
    <title>Marks</title>
</head>

<body>
    <nav>
        <a href="./view.php">VIEW</a>
    </nav>

    <form method="POST">
        <br><label for="">TEST1</label><br>
        <input type="number" name="test1" placeholder="TEST1" required><br><br>
        <label for="">TEST2</label><br>
        <input type="number" name="test2" placeholder="TEST2" required><br><br>
        <label for="">INDIVIDUAL ASSIGNMENT</label><br>
        <input type="number" name="IA" placeholder="IA" required><br><br>
        <label for="">GROUP ASSIGNMENT</label><br>
        <input type="number" name="GA" placeholder="GA" required><br>
        <span style="color:red;"> <?php echo "$value_error"; ?></span><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>