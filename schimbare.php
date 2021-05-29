<?php
include 'connect.php';
session_start();
echo $_POST['judet'];
$id = $_SESSION['idd'];
$user = $_POST['user'];
$oras = $_POST['oras'];
$judet = $_POST['judet'];
$email = $_POST['email'];
if(!empty($_FILES['imagine']['name'])){
  $nume = $_FILES['imagine']['name'];
  $tmp_name = $_FILES['imagine']['tmp_name'];
  $size = $_FILES['imagine']['size'];
  if($size <= 1500000){
  move_uploaded_file($tmp_name, 'clienti/'.$nume);
  $sql = "UPDATE user SET poza = '$nume' WHERE id = '$id'";
  $result = mysqli_query($connect,$sql);
}
}
$sql = "UPDATE user SET judetul = '$judet',email = '$email',username = '$user',orasul = '$oras' WHERE id = '$id'";
$result = mysqli_query($connect,$sql);
if(isset($_POST['parola'])&& !empty($_POST['parola'])){
  $parola = $_POST['parola'];
  $password_hashed = password_hash($parola, PASSWORD_DEFAULT);
  echo $password_hashed;
  $sql = "UPDATE user SET password = '$password_hashed' WHERE id = '$id'";
  $result = mysqli_query($connect,$sql);

}
header('Location: index.php');
 ?>
