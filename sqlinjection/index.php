<html>
<body>
<h1>Welcome to SQL injection testing grounds</h1>
<p>Try playing with the "id" parameter</p>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbhost = "localhost";
$dbuser = "test";
$dbpass = "test";
$db = "sqlinjection";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
if(isset($_GET['id']))
{
$id=$_GET['id'];
//$intid=(int)$id;
/*
$sql="Select name from fruits where id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_all();*/
$sql="SELECT name FROM fruits WHERE id=$id";
//$stmt=mysqli_prepare($conn,$sql);
//mysqli_stmt_bind_param($stmt,"i",$intid);
$result=mysqli_query($conn,$sql);
//$result=mysqli_stmt_execute($stmt)
$row = mysqli_fetch_all($result);

if($row)
{
//echo "<font size='5' color= '#99FF00'>";
//echo "Fruit: ". $row['name'];
//print_r($row);
echo 'fruit found';
}
else 
{
echo 'Entry not found';
echo '<font color= "#FFFF00">';
echo (mysqli_error($conn));
echo "</font>";  
}
}
?>
</body>
</html>