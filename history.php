<html>
<head>
<style>
.bg{
  background-color: #C2DFFF;
}

table{
  border: 1px solid black;
  border-spacing: 0;
  border-collapse: collapse;
  width: 100%;
}
th, td {
  text-align: left;
  padding: 16px;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
#container {
  width: 80%;
  border-radius: 25px;
  border: 2px solid Black;
  padding: 15px 15px 15px 15px;
  margin: 20px 20px 20px 20px;
  background: white;
  overflow: auto;
  box-shadow: 5px 5px 2px #888888;
  position: relative;
}

#x {
    position: relative;
    float: right;
    background: red;
    color: white;
    top: -10px;
    right: -10px;
}
.button {
  position: absolute;
  top: 100%;
  left: 90%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: blue;
  color: white;
  font-size: 16px;
  padding: 16px 30px;
  border: black;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

</style>


<div id="container">
        <a href="search.php" id = "x">
            X
        </a>
        
</head>
<body>
<div class="bg">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM transfer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>sender</th><th>receiver</th><th>amount</th><th>datetime</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["sender"]. "</td><td>" . $row["receiver"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["datetime"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>

</div>
</body>
</html>