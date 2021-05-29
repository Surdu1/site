<?php
session_start();
if(!isset($_SESSION['admin'])||$_SESSION['admin']!='admin'){
  header('Location: index.php');
  die();
}
?>
<?php
include 'connect.php';
$produs = $_POST['produse'];
$descriere = $_POST['descriere'];
$link = $_POST['link'];
$id = $_POST['id'];
echo $id;
$semi = $_POST['semi_nume'];
$pret = $_POST['pret'];
$categorie = $_POST['categorie'];
if(!empty($_FILES['imagine']['name'])){
  $nume = $_FILES['imagine']['name'];
  $tmp_name = $_FILES['imagine']['tmp_name'];
  $size = $_FILES['imagine']['size'];
  if($size <= 1500000){
  move_uploaded_file($tmp_name, 'imagini/'.$nume);
$sql = "INSERT INTO produse(id_produs,nume_imagine,nume_produs,descriere,link,semi_nume,pret,categorie) VALUES('$id','$nume','$produs','$descriere','$link','$semi','$pret','$categorie')";
$result = mysqli_query($connect,$sql);
header('Location: admin.php');
}
}
 ?>
