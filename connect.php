<?php
define("SERVER", 'localhost');
define("USERNAME", 'root');
define("PASSWORD", '');
define("DATABASE", 'test2');
$connect = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
if (!$connect) {
    echo "Error:Not connected to Database";
}
// 