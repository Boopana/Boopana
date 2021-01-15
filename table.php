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

.button {
  position: absolute;
  top: 90%;
  left: 40%;
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
.button2 {
 top: 90%;
  left: 60%;
 background-color: blue;} /* Blue */
</style>
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

$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>S.NO</th><th>NAME</th><th>EMAIL</th><th>CURRENT BALANCE</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["S.NO"]. "</td><td>" . $row["NAME"] . "</td><td>" . $row["EMAIL"] . "</td><td>" . $row["CURRENT BALANCE"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>

<a href="home.html" class="button">HOME</a>
<a href="search.php" class="button button2">TRANSACTIONS</a>
</div>
</body>
</html>