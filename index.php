<?php
include 'connect.php';
$v1=1;
$v2=2;
$v3=3;
$v4=4;
$v5=5;
$p=0;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">
</head>
<body>
  <div>
<div class="totul">
  <div class="d">
    <div class="i">
    <br>
    <div class="a" id="i1" style="margin-top:12vh;text-align: center;"><a href="electrocasnice.php">Electrocasnice</a></div>
    <br>
    <div class="a" id="i2"style="margin-top:12vh;text-align: center;"><a href="echipamente_sportive.php">Echipamente sportive</a></div>
    <br>
    <div class="a" id="i3" style="margin-top:12vh;text-align: center;"><a href="it.php">IT</a></div>
    <br>
    <div class="a" id="i4" style="margin-top:12vh;text-align: center;"><a href="unelte.php">Unelte pentru constructi</a></div>
    </div>
   
    <?php
    ob_start();
    include 'header.php';
    if(isset($_SESSION['admin'])&&$_SESSION['admin'] == 'admin'){
      header('Location: admin.php');
      die();
    }
    if(!isset($_SESSION['br'])&&$_SESSION['br']!=1)
    {
      header('Location: preintrare.php');
      die();
    }

     ?>
<div class="o">
<?php
$sql = 'SELECT * FROM produse';
$result = mysqli_query($connect,$sql);
while($row = $result->fetch_assoc()){

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
</div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

</body>
</html>
