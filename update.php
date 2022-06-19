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

if (isset($_POST['submit'])) {

    if (empty($_POST['fullname'])) {
        $fullname_error = "Enter your name";
    } else {

        $fullname = $_POST['fullname'];
    }
    if (empty($_POST['admission'])) {
        $admission_error = "Enter your Admission Number";
    } else {
        $admission = $_POST['admission'];
    }

    if (!empty($_POST['fullname']) && !empty($_POST['admission'])) {
        $sqlEnter = "UPDATE ca SET fullname='$fullname', admission='$admission' WHERE id='$newId'";
        $sqlReceive = mysqli_query($connect, $sqlEnter);
        if ($sqlReceive) {
            header("Location:view.php");
        } else {
            echo "SOMETHING WENT WRONG";
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
    <title>UPDATE </title>
</head>

<body>
    <nav>
        <a href="./index.php">Home</a>
    </nav>
    <fieldset>
        <legend>UPDATE</legend>
        <form method="post" >
            <hr><br>
            <label for="">CURRENT NAME:<?php echo "$fullname_db"; ?></label><br>
            <label for="">CURRENT ADMISSION:<?php echo "$admission_db"; ?></label><br>
            <label id="label" for="fullname">FULL NAME</label><br>
            <input type="text" name="fullname"><br>
            <span style="color:red;"><?php echo "$fullname_error"; ?></span><br><br>
            <label id="label" for="admission">ADMISSION NUMBER</label><br>
            <input type="number" name="admission"><br>
            <span style="color:red;"><?php echo "$admission_error"; ?></span><br><br>
            <button class="button" name="submit">REGISTER</button>
        </form>
    </fieldset>
</body>

</html>