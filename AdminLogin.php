<?php
error_reporting(0);
include "connect.php";
$loginname_error = $loginpassword_error = $login_error = "";
$loginname = "";
$loginpassword = "";
if (isset($_POST['loginsubmit'])) {
    if (empty($_POST['name'])) {
        $loginname_error = "PLEASE ENTER USERNAME";
    } else {
        $loginname = $_POST['name'];
    }
    if (empty($_POST['password'])) {
        $loginpassword_error = "PLEASE ENTER PASSWORD";
    } else {
        $loginpassword = $_POST['password'];
    }
    if (!empty($loginname) && !empty($loginpassword)) {

        $checkdata = "SELECT * FROM regadmin WHERE fullname='$loginname'";
        $weka = mysqli_query($connect, $checkdata);
        $result = mysqli_fetch_array($weka);
        $loginPass_db = $result['password'];
        if (password_verify($loginpassword, $loginPass_db)) {
            header("Location:view.php");
        } else {
            $login_error = "SOMETHING WENT WRONG<br>CHECK YOUR USER NAME OR PASSWORD";
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
    <title>Login</title>
</head>

<body>
    <a href="./index.php">HOME</a>
    <fieldset style="width:8%;margin-top:10%;margin-left:40%">
        <legend align="center">LOGIN</legend>
        <form method="POST">
            <label for="name">NAME</label>
            <input type="text" name="name" placeholder="ENTER NAME"><br>
            <span style="color:red;"><?php echo "$loginname_error" ?></span><br>
            <label for="name">PASSWORD</label>
            <input type="password" name="password" placeholder="ENTER PASSWORD"><br>
            <span style="color:red;"><?php echo "$loginpassword_error" ?></span><br>
            <input type="submit" name="loginsubmit">
            <span style="color:red;"><?php echo "$user" ?></span><br><br>
            <span style="color:red;"> <?php echo "$login_error" ?></span>
        </form>
    </fieldset>
</body>

</html>