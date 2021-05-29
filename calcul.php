<?php
include 'connect.php';
session_start();
$produs = $_SESSION['prodv'];
$sql = 'SELECT *  FROM review';
$result = mysqli_query($connect,$sql);
$s=0;
while($row =$result -> fetch_assoc()){
  if($row['produs_id'] == $produs){
$s++;
}
}
$p= 0;
$sq = 'SELECT *  FROM review';
$result = mysqli_query($connect,$sq);
while($ro =$result -> fetch_assoc()){
  if($ro['produs_id'] == $produs){
  $p = $p + $ro['stele'];
}
}
$media = $p/$s;
$int = intval($media);
$slq = "UPDATE produse SET stele ='$int' WHERE id_produs = '$produs'";
$result = mysqli_query($connect,$slq);
echo $s;
header('Location: index.php');
 ?>
