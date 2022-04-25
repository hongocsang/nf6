<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect</title>
</head>
<body>
<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'dms';
 
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>
</body>
</html>