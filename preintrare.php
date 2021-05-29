<?php
session_start();
$_SESSION['br'] = 1;
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <style>
  body{
  background: linear-gradient(to right,#e01f1f,#1f35e0);
  }
  .card{
    float:left;
     width:30vw;
     margin: 18px;
  }
  @media all and (max-width:531px){
      .i {
          display: none;
      }
      .o{
        margin-left: 0;
      }
      .card{
        width:100%;
        margin: 0;
        margin-top:10px;

      }
  }
  </style>
</head>
<body>
<a href="index.php" style="float:right;"><img src="arr.png"style="width:100px;"></a>
<h1 style="text-align:center;"><img  src='logo.png'style="width:200px;height:200px;"></h1>
<h1 style="text-align:center;color:white;">Produse ce te-ar putea interesa</h1>
<div class="o">
<?php
include 'connect.php';
$v1=1;
$v2=2;
$v3=3;
$v4=4;
$v5=5;
$p=0;
$c=0;
$sl =0;
$sj = 'SELECT * FROM produse';
$ds = mysqli_query($connect,$sj);
while($bn = $ds -> fetch_assoc()){
  $sl++;
}
$rand = rand(1,$sl);
$ra = rand(1,$sl);
$rad = rand(1,$sl);
while($rand == $ra||$rad==$ra||$rand==$rad){
  $rand = rand(1,$sl);
  $ra = rand(1,$sl);
  $rad = rand(1,$sl);
}
$sql = "SELECT * FROM produse WHERE id_produs ='$ra' OR id_produs ='$rad' OR id_produs ='$rand '";
$result = mysqli_query($connect,$sql);
while($row = $result->fetch_assoc()){
if($c == 3){
  break;
}
  $stele = $row["stele"];
  echo '<form action="adauga.php" method="POST">
  <input type="hidden" name="id_produs" value="'.$row["id_produs"].'">

  ';

echo '<div class="card">
  <img style="height: 200px;width:50%;margin-left:25%;" src="imagini/'.$row["nume_imagine"].'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$row["nume_produs"].'</h5>
    <i class="fas fa-star checked'.$v1.'"></i>
    <i class="fas fa-star checked'.$v2.'"></i>
    <i class="fas fa-star checked'.$v3.'"></i>
    <i class="fas fa-star checked'.$v4.'"></i>
    <i class="fas fa-star checked'.$v5.'"></i>
'; echo '<h3 style="float:right;">'.$row["pret"].'lei</h3>';
echo'
    <p class="card-text"></p>
    ';
    if(isset($_SESSION['name'])){
    echo '<a href="adauga.php"><button type="submit" class="btn btn-primary"> Adauga in cos</button></a>';
     }

  echo  '<a style="margin-left:1px;" href="'.$row['link'].'" class="btn btn-primary">Priveste</a>
  </div>
  </div>';
  if($stele >= ($v1 - $p) ){
 echo '<style>
 .checked'.$v1.' {
   color: orange;
 }
</style>';
}
  if($stele >= ($v2 - $p) ){
 echo '<style>
 .checked'.$v2.' {
   color: orange;
 }
 </style>';
}
if($stele >= ($v3 - $p)){
 echo '<style>
 .checked'.$v3.' {
   color: orange;
 }
 </style>';
}
if($stele >= ($v4 - $p) ){
 echo '<style>
 .checked'.$v4.' {
   color: orange;
 }
 </style>';
}
if($stele >= ($v5 - $p) ){
 echo '<style>
 .checked'.$v5.' {
   color: orange;
 }
 </style>';
}
   $c++;
  $v1=$v1+5;
  $v2=$v2+5;
  $v3=$v3+5;
  $v4=$v4+5;
  $v5=$v5+5;
  $p = $p+5;

  echo '</form>';
}
?>
</div>
</body>
</html>
