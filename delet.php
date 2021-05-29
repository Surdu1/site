<?php
session_start();
include 'connect.php';
if(isset($_SESSION['idd']) && !empty($_SESSION['idd'])){
  $id = $_SESSION['idd'];
  $sql = "DELETE FROM user WHERE id = '$id'";
  $result = mysqli_query($connect,$sql);
  session_destroy();
}
header('Location: index.php');
 ?>
