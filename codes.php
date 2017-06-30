<?php
session_start();
if(empty($_SESSION['username']))
{
header("Location:signup.php");
}
else {
$name=$_SESSION['username'];
}
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
$title=array();
$i=0;
$sql = "SELECT title FROM CODE";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $title[$i]=$row["title"];
      $i++;
    }
  }
  $conn->close();
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href=codes.css>
</head>
  <body id="body">
   <ul>
      <li><a href="snippet.php">update</a></li>
      <li>
          <a><?php echo $name?></a>
          <ul class="dropdown">
              <li><a href="signup.php">Log out</a></li>
          </ul>
      </li>
   </ul>
</body>
<script>
var i=0;
var title= <?php echo json_encode($title); ?>;
var body = document.getElementById("body");
while(i<title.length)
{
var link=document.createElement("p");
  link.setAttribute("id",i);
var t1 = document.createTextNode(title[i]);
link.appendChild(t1);
body.appendChild(link);
var f1 = document.getElementById(i);
f1.addEventListener("click",modify);
i++;
}
function modify(e)
{
  rem=e.target.id;
  window.location.href = 'display.php?id='+rem;
}
</script>
