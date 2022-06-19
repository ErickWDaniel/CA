<?php
$newId = $_GET['id'];
include "connect.php";
$fullname_error = $admission_error = "";
$fullname = "";
$admission = "";
$weka = "SELECT * FROM ca WHERE id='$newId'";
$wekaSql = mysqli_query($connect, $weka);
$result = mysqli_fetch_array($wekaSql);
$fullname_db = $result['fullname'];
$admission_db = $result['admission'];

if (isset($_POST['delete'])) {

    $sqlEnter = "UPDATE ca SET test1=0, test2=0,ca1=0,ca2=0 ,total=0 ,status='NULL' WHERE id='$newId'";
    $sqlReceive = mysqli_query($connect, $sqlEnter);
    if ($sqlReceive) {
        header("Location:view.php");
    } else {
        echo "SOMETHING WENT WRONG";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE RESULTS </title>
</head>

<body>
    <fieldset align=center>
        <legend align=" center">DELETE RESULTS</legend>
        <form method="post">
            <label>ARE YOU SURE YOU WANT TO DELETE RESULTS?<br>ELSE GO BACK</label><br>
            <button type="submit" name="delete">DELETE</button>
            <button><a href="view.php">BACK</a></button>
        </form>
    </fieldset>
</body>

</html>