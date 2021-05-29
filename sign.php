<?php
$password = $_POST['password'];
if(empty($_POST['username'])){
    header('Location: sign-up.php?info=nousername');
    die();
}
if(empty($_POST['password'])){
    header('Location: sign-up.php?info=nopassword');
    die();
}
if(empty($_POST['email'])){
    header('Location: sign-up.php?info=noemail');
    die();
}
if(strlen($password)<=8){
  header('Location: sign-up.php?info=scurt');
  die();
}
require 'connect.php';
$nume = $_POST['username'];
$email = $_POST['email'];
$sq = 'SELECT * FROM user';
$re = mysqli_query($connect,$sq);
while($row = $re->fetch_assoc())  {
if($row['email'] == $email){
  header('Location: sign-up.php?info=proemail');
  die();
}
}
$password_hashed = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO user (username,password,email) VALUES('$nume','$password_hashed','$email')";
$result = mysqli_query($connect,$sql);
header('Location: login.php');
?>
