<?php
include "connect.php";
if (isset($_POST['delete'])) {
    $id = $chukua['id'];
    $sqlTable = "DELETE test1,test2,ca1,ca2 FROM ca WHERE id ='$newId'";
    $sqlCheck = mysqli_query($connect, $sqlTable);
    if ($sqlCheck) {
        header("Location:view.php");
    }
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
    <a href="./index.php">HOME</a><br>
    <a href="register.php">Register</a><br>
    <a href="adminRegister.php">Admin Register</a><br><br>
    <fieldset align=center>

        <legend align=center>View</legend>
        <form method=" POST">
            <table border="1" align=center style="width: 100%;">
                <th>S/N</th>
                <th>NAME</th>
                <th>ADMISSION</th>
                <th>TEST1(10/10)</th>
                <th>TEST2(10/10)</th>
                <th>I/A(10/10)</th>
                <th>G/A(10/10)</th>
                <th>TOTAL</th>
                <th>STATUS(40/40)</th>
                <th colspan="3">ACTION</th>
                <?php
                $weka = "SELECT * FROM ca";
                $wekaSql = mysqli_query($connect, $weka);
                $rowNum = mysqli_num_rows($wekaSql);
                for ($i = 1; $i <= $rowNum; $i++) {
                    $chukua = mysqli_fetch_array($wekaSql);
                    $statusColor = $chukua['total'];
                    if ($statusColor > 19) {
                        $color = "green";
                    } elseif ($statusColor <= 19) {
                        $color = "red";
                    } else {
                    }
                ?> <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $chukua['fullname']; ?></td>
                        <td><?php echo $chukua['admission']; ?></td>
                        <td><?php echo $chukua['test1']; ?></td>
                        <td><?php echo $chukua['test2']; ?></td>
                        <td><?php echo $chukua['ca1']; ?></td>
                        <td><?php echo $chukua['ca2']; ?></td>
                        <td><?php echo $chukua['total']; ?></td>
                        <td style="background-color:<?php echo $color; ?>"><?php echo $chukua['status']; ?></td>
                        <td><button><a href="marks.php?id=<?php echo $chukua['id']; ?>">MARKS</a></button></td>
                        <td><button><a href="delete.php?id=<?php echo $chukua['id']; ?>">DELETE</a></button></td>
                        <td><button><a href="update.php?id=<?php echo $chukua['id']; ?>">UPDATE</a></button></td>


                    </tr>
                <?php
                }
                ?>

            </table>


        </form>

    </fieldset>

</body>

</html>