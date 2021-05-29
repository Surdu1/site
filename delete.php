<?php
session_start();
include 'connect.php';
$produsul = $_POST['id_produs'];
$sesiunea = $_SESSION['idd'];
echo $produsul;
echo $sesiunea ;
$sql = "DELETE FROM cumparaturi WHERE produs_id = '$produsul' AND client_id = '$sesiunea'";
$result = mysqli_query($connect,$sql);
$qsl = "SELECT * FROM user";
$re = mysqli_query($connect,$qsl);
while($row = $re ->fetch_assoc()){
  if($row['id'] == $sesiunea){
    $olp = $row['numar'];
    $olp --;
    $wl = "UPDATE user SET numar = '$olp' WHERE id ='$sesiunea'";
    $df = mysqli_query($connect,$wl);
  }
}
header('Location: cos.php');

 ?>
