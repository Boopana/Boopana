<html>
<head>
<style>

.bg{
  background-color: #C2DFFF;
}

.header {
  padding: 60px;
  text-align: center;
  color: green;
  font-size: 30px;
}
.button {
  position: absolute;
  top: 70%;
  left: 60%;
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
.b1{
top: 70%;
left: 40%;
}
</style>

</head>
<div class="bg">
<body>
<div class="header">
<?php
$sender=filter_input(INPUT_POST,'sender');
$receiver=filter_input(INPUT_POST,'receiver');
$amount=filter_input(INPUT_POST,'amount');
$dt=date("Y-m-d H:i:s");
if(!empty($sender)){
if(!empty($receiver)){
$host="localhost";
$user="root";
$pas="";
$db="bank";
$conn=new mysqli($host,$user,$pas,$db);
if(mysqli_connect_error())
{
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
$sql="INSERT INTO transfer(sender,receiver,amount,datetime)values('$sender','$receiver','$amount','$dt')";

if($conn->query($sql)){
if($amount==0){
echo "<h1>ENTER THE VALID AMOUNT</h1>";}
else{

echo "<h2>SUCCESSFUL TRANSACTION!!!</h2>";}

}
else{
echo"Error:".$sql."<br>".$conn->error;
}
$conn->close();
}
}else{
echo"receiver should not be empty";
die();
}
}
else{
echo"sender should not be empty";
die();
}

?>

<a href="history.php" class="button">VIEW HISTORY</a>
<a href="search.php" class="button b1">BACK</a>

</div>
</div>
</body>
</html>