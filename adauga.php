<?php
session_start();
include 'connect.php';
if(isset($_SESSION['numar'])&& isset($_SESSION['idd'])){
  echo $_SESSION['idd'];
  echo '<br>';
$id = $_SESSION['idd'];
$_SESSION['nume_id'] = $id;
$produs = $_POST['id_produs'];
$gl = 'SELECT * FROM cumparaturi';
$po = mysqli_query($connect,$gl);
while($opp = $po -> fetch_assoc()){
  if($opp['produs_id']==$produs && $opp['client_id']==$id){
    header('Location: index.php');
    die();
  }
}
$sq = "SELECT * FROM user WHERE id = '$id'";
$r = mysqli_query($connect,$sq);
$row = $r -> fetch_assoc();
$numar = $row['numar'];
$numar++;
$_SESSION['numar'] = $numar;
echo $numar;
  echo '<br>';
echo $produs;
  echo '<br>';
$sql = "UPDATE user SET numar = '$numar' WHERE id = '$id'";
$result = mysqli_query($connect,$sql);
$pentru = "INSERT INTO cumparaturi(client_id,produs_id) VALUES('$id','$produs')";
$k = mysqli_query($connect, $pentru);
}
echo $id;
echo '<br>';
echo $numar;
header("Location: index.php");
 ?>
