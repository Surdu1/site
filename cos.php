<?php
include 'connect.php';
session_start();
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
  <div class="i">
    <h1 style="color:white;margin-top:40%;text-align:center;">Recomandari</h1>
    <?php
    $pinci = 5;
    $patru = 4;
    $trei = 3;
    $sl =0;
    $sj = 'SELECT * FROM produse';
    $ds = mysqli_query($connect,$sj);
    while($bn = $ds -> fetch_assoc()){
      $sl++;
    }
    $rand = rand(1,$sl);
     $opls = "SELECT * FROM produse WHERE id_produs='$rand'";
     $lp = mysqli_query($connect,$opls);
     $rwo = $lp -> fetch_assoc();

     $stele =$rwo["stele"];
     echo '<form action="adauga.php" method="POST">
     <input type="hidden" name="id_produs" value="'.$rwo["id_produs"].'">

     ';

   echo '<div class="card" style="width:90%;">
     <img style="height: 200px;width:50%;margin-left:25%;" src="imagini/'.$rwo["nume_imagine"].'" class="card-img-top" alt="...">
     <div class="card-body">
       <h5 class="card-title">'.$rwo["nume_produs"].'</h5>
       <i class="fas fa-star checked'.$v1.'"></i>
       <i class="fas fa-star checked'.$v2.'"></i>
       <i class="fas fa-star checked'.$v3.'"></i>
       <i class="fas fa-star checked'.$v4.'"></i>
       <i class="fas fa-star checked'.$v5.'"></i>
   '; echo '<h3 style="float:right;">'.$rwo["pret"].'lei</h3>';
   echo'
       <p class="card-text"></p>
       ';
       if(isset($_SESSION['name'])){
       echo '<a href="adauga.php"><button type="submit" class="btn btn-primary">Cumpara</button></a>';
        }

     echo  '<a style="margin-left:1px; font-size:100%;" href="'.$rwo['link'].'" class="btn btn-primary">Priveste</a>
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

     ?>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img style="width:50px;height:50px;" src="logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="searchcos.php" method="post" class="d-flex">
        <input class="form-control me-2" name ="op" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><a href="index.php"><i class="fas fa-search"></i></button>
      </form>
    </div>
   <a href="index.php"><img style="width: 50px;height:50px;"src="la.png"></a>
  </div>
</nav>
<div class="o">
<?php
$sd = $_SESSION['idd'];
$fql = "SELECT * FROM user WHERE id ='$sd'";
$gl = mysqli_query($connect,$fql);
while($yow = $gl -> fetch_assoc()){
  if($yow['numar']==0)
  {
    echo '<h1>Momentan nici un produs nu a fost adaugat in cos</h1>';
    echo '<a href="index.php"><button class="btn btn-primary">Adauga produse</button>';
  }
}
$sql = 'SELECT * FROM cumparaturi';
$result = mysqli_query($connect,$sql);
while($row = $result -> fetch_assoc())
{
  if($row['client_id'] == $_SESSION['idd']){
  $cv = $row["produs_id"];
  $pro = "SELECT * FROM produse WHERE id_produs ='$cv'";
  $php = mysqli_query($connect,$pro);
  while($rp = $php -> fetch_assoc()){
  $stele = $rp["stele"];
  echo '<form action="delete.php" method="POST">
  <input type="hidden" name="id_produs" value="'.$rp["id_produs"].'">';
echo '<div class="card" style=";">
  <img style="height: 200px;width:50%;margin-left:25%;" src="imagini/'.$rp["nume_imagine"].'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$rp["nume_produs"].'</h5>
    <i class="fas fa-star checked'.$v1.'"></i>
    <i class="fas fa-star checked'.$v2.'"></i>
    <i class="fas fa-star checked'.$v3.'"></i>
    <i class="fas fa-star checked'.$v4.'"></i>
    <i class="fas fa-star checked'.$v5.'"></i>
'; echo '<h3 style="float:right;">'.$rp["pret"].'lei</h3>';
echo'
    <p class="card-text"></p>
    ';
    echo '<div style="display:flex;">';
     echo '<a href="delete.php" style="margin-right:1px;"><button type="submit" name="delete" class="btn btn-primary">Delete</button></a>';
    echo '</form>';
    if(isset($_SESSION['name'])){
      echo '<form action="cumparare.php" method="post">';
      echo '<input type="hidden" name="id_produs" value='.$rp["id_produs"].'>';
    echo '<a href="buy.php" style="display:flex;"><button type="submit" name="buy" class="btn btn-primary">Cumpara</button></a>';
     echo '</form>';
     }

  echo  '<a style="margin-left:1px;" href="'.$rp['link'].'" class="btn btn-primary">Priveste</a>
  </div>
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
  echo '</form>';
}
}
}
 ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>
</html>
