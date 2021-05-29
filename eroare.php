<?php
include 'connect.php';
$probleme = $_POST['intrebare'];
$sql = "INSERT INTO erori(eroarea) VALUES('$probleme')";
$resul = mysqli_query($connect,$sql);
header('Location: intrebari.php');
 ?>
