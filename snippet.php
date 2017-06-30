<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    text-align: center;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
textarea
{ margin: 0px;
  width: 1336px;
  height: 539px;
  resize: none;
  outline: none;
  overflow: auto;
  white-space: nowrap;
}
</style>
</head>
<body id="body">
  <form method="post" action="snippet.php">
  <input type="text" name="title" placeholder="TITLE">
  <p><textarea id ="note"  name="note" placeholder="click here to write note"rows="4" cols="190"></textarea></p>
  <p><input type="submit" value="Submit"></p>
  </form>
</body>

<?php
session_start();
if(empty($_SESSION['username']))
{
header("Location:signup.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";//enter password
$dbname = "delta";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  if (!empty($_POST['note'])) {
      $note=$_POST['note'];
      $title=$_POST['title'];
    $stmt = $conn->prepare("INSERT INTO CODE (title,snip) VALUES (?,?)");
    $stmt->bind_param("ss", $head,$info);
   // set parameters and execute
    $head=$title;
    $info=$note;
    $stmt->execute();
    $stmt->close();
  }
    $conn->close();
header("Location:codes.php");
}
 ?>
