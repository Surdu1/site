<?php
session_start();
include 'connect.php';
$email = $_POST['email'];
if(!isset($_POST['email'])|| $_POST['email']== null){
    header('Location: login.php?info=email');
    die();
}
if(!isset($_POST['password'])|| $_POST['password']== null){
    header('Location: login.php?info=password');
    die();
}
$password = $_POST['password'];
$sql ="SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connect,$sql);
$row = $result->fetch_assoc();
$pass = $row['password'];
$check = password_verify($password,$pass);
if($row['email']== $email){
if($check == 1){
    $_SESSION['idd']=$row['id'];
    $_SESSION['name']=$row['username'];
    $_SESSION['password']=$row['password'];
    $_SESSION['numar']=$row['numar'];
    $_SESSION['email']=$row['email'];
    $_SESSION['admin']=$row['admin'];
}

else{
    header('Location: login.php?info=nugasit');
    die();
}
}
else{
    header('Location: login.php?info=noemail');
    die();
}
header('Location: index.php');
?>
