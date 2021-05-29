<?php
session_start();
if(!isset($_SESSION['idd'])||!isset($_POST["id_produs"])|| !isset($_POST["stea"])||!isset($_POST['content'])||$_SESSION['idd']==null||$_POST["id_produs"]==null||$_POST["stea"]==null||$_POST['content']==null){
  header('Location: review.php');
}
include 'connect.php';
$id = $_SESSION['idd'];
$produs = $_POST["id_produs"];
$stele = $_POST["stea"];
$_SESSION['prodv'] = $_POST["id_produs"];
$comentariu =  $_POST['content'];
$sql = "INSERT INTO  review(client_id,comentariul,produs_id,stele) VALUES('$id','$comentariu','$produs','$stele')";
$result = mysqli_query($connect,$sql);
header('Location: calcul.php');
 ?>
