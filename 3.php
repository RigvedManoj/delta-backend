<?php
$servername = "localhost";
$username = "root";
$password = "";//enter password
$dbname = "delta";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
$_SESSION['username'] =0;
//sql to drop table
$sql="DROP TABLE SIGNUP";
mysqli_query($conn, $sql);
$sql="DROP TABLE CODE";
mysqli_query($conn, $sql);
// sql to create table
$sql = "CREATE TABLE SIGNUP(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
pass VARCHAR(100) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo  "Table SIGNUP created successfully  ";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$sql = "CREATE TABLE CODE(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
snip TEXT NOT NULL,
reg_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {
    echo "Table CODE created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
