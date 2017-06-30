<html>
<head>
   <link rel="stylesheet" href="styles/default.css">
   </head>
<?php
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
$notes="";
if (isset($_GET['id'])) {
  $sql = "SELECT id,snip FROM CODE";
  $id=$_GET['id'];
  $id++;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($id==$row["id"])
        $notes=$row["snip"];
  }
}
}
  $conn->close();
?>
<body>
<pre><code><?php echo $notes;?>;</code></pre>
</body>
<script src="highlight.pack.js"></script>
<script>
hljs.initHighlightingOnLoad();
</script>
