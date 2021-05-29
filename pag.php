<?php
include "connect.php";
$v1=1;
$v2=2;
$v3=3;
$v4=4;
$v5=5;
$p=0;
 ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="pag.css">
</html>
<body>
  <div class="o">
  <?php
  include 'header.php';
  $i = $_GET['info'];
  $sql = "SELECT * FROM produse WHERE semi_nume ='$i'";
  $result = mysqli_query($connect,$sql);
  while($row = $result -> fetch_assoc()){
  echo '<h1 style="text-align:center;">'.$row['nume_produs'].'</h1>';
  echo '<hr>';
  echo '<img  src="imagini/'.$row['nume_imagine'].'"';
  echo '<h1></h1>';
  echo '<hr>';
  $produsul= $row["id_produs"];
  echo '<div style="background:linear-gradient(#1f35e0,#e01f1f);">';
  echo '<h1 style="font-size:6vh;color:white;">'.$row['descriere'].'</h1>';
  echo '<h1 style="color:white;font-size:6vh;">Pret:'.$row['pret'].'lei</h1>';
  echo '<h1 style="font-size:6vh;color:white;">Categorie: '.$row['categorie'].'</h1>';
  echo '<form action="adauga.php" method="post">';
  echo '<input type="hidden" name="id_produs" value='.$row["id_produs"].'>';
  if(isset($_SESSION['idd'])){
  echo '<button type="submit" style="font-size:3vh;color:white;"class="btn btn-primary">Adauga in cos</button>';
echo '</form>';
echo '<form action="cumparare.php" method="post">';
echo '<input type="hidden" name="id_produs" value='.$row["id_produs"].'>';
echo '<button style="margin-left:3px;color:white;font-size:3vh;float:right;margin-top:-6vh;"class="btn btn-primary">Cumpara</button>';
echo '</form>';
}
else {
  echo '</form>';
  echo '<a href="login.php"><button type="submit" style="font-size:3vh;color:white;"class="btn btn-primary">Conecteazate</button></a>';
}
  echo '<br>';
  echo '</div>';
echo '</div>';
}
echo '<h1 style="text-align:center;">Review</h1>';
$sb = "SELECT * FROM produse WHERE id_produs='$produsul'";
$fr = mysqli_query($connect,$sb);
while($rp = $fr ->fetch_assoc()){
if($rp['id_produs'] = $produsul){
echo '<form action="review.php" method="post">';
echo '<input type="hidden" name="id_produs" value="'.$rp["id_produs"].'">';
if(isset($_SESSION['idd'])){
echo '<button type="submit" class="btn btn-primary">Adauga un review</button>';
}
echo '</form>';
echo '<div>';
echo '<h1>Numarul de stele:</h1>';
echo '<br>';
    $stele = $rp['stele'];
    if($stele >= ($v1 - $p) ){
      echo '<i class="fas fa-star checked'.$v1.' fa-3x"></i>
      <i class="fas fa-star checked'.$v2.' fa-3x"></i>
      <i class="fas fa-star checked'.$v3.' fa-3x"></i>
      <i class="fas fa-star checked'.$v4.' fa-3x"></i>
      <i class="fas fa-star checked'.$v5.' fa-3x"></i>';
   echo '<style>
   .checked'.$v1.' {
     color: orange;
   }
  </style>';
  }
  else {
    echo'<i class="fas fa-star  fa-3x"></i>
    <i class="fas fa-star  fa-3x"></i>
    <i class="fas fa-star fa-3x"></i>
    <i class="fas fa-star fa-3x"></i>
    <i class="fas fa-star  fa-3x"></i>';
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

}

}
echo '<hr>';
$rt = 'SELECT * FROM review';
$vb = mysqli_query($connect,$rt);
while($gl = $vb -> fetch_assoc()){
  if($gl['produs_id'] == $produsul ){
  echo '<div style="border: 2px solid black;border-radius:10px;margin-top:10px;">';
  echo '<div style="display:flex;">';
  $idul = $gl['client_id'];
  $select = 'SELECT * FROM user WHERE id = '.$idul.'';
  $glq = mysqli_query($connect,$select);
  while($tu = $glq -> fetch_assoc()){
    if($tu["poza"] != null){
    echo '<img style="width:60px;height:60px;border: 3px solid #1f35e0;border-radius:50px;" src="clienti/'.$tu["poza"].'">';
  }
  else{
    echo '<img style="width:60px;height:60px;boder:2px solid #1f35e0;border-radius:50px;"src="clienti/principal.jpg">';
  }
  echo '<h1>'.$tu["username"].'</h1>';
  }
  echo '</div>';
  $stea = $gl['stele'];
  echo '<div style="float:right;margin-top:-30px;">';
  echo '<i class="fas fa-star checked'.$v1.' fa-2x"></i>
  <i class="fas fa-star checked'.$v2.' fa-2x"></i>
  <i class="fas fa-star checked'.$v3.' fa-2x"></i>
  <i class="fas fa-star checked'.$v4.' fa-2x"></i>
  <i class="fas fa-star checked'.$v5.' fa-2x"></i>';
  if($stea >= ($v1 - $p) ){
 echo '<style>
 .checked'.$v1.' {
   color: orange;
 }
</style>';
}
  if($stea >= ($v2 - $p) ){
 echo '<style>
 .checked'.$v2.' {
   color: orange;
 }
 </style>';
}
if($stea >= ($v3 - $p)){
 echo '<style>
 .checked'.$v3.' {
   color: orange;
 }
 </style>';
}
if($stea >= ($v4 - $p) ){
 echo '<style>
 .checked'.$v4.' {
   color: orange;
 }
 </style>';
}
if($stea >= ($v5 - $p) ){
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
  echo '</div>';
  echo'<hr>';
  echo '<h3>'.$gl['comentariul'].'</h3>';
  echo '</div>';

}
}
?>
</body>

</html>
