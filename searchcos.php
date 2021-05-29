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
    if($_POST['op'] == null)
    {
      header('Location: cos.php');
    }
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img style="width:50px;"src="cos.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="searchcos.php" method="post" class="d-flex">
        <input class="form-control me-2" name ="op" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>

  </div>
</nav>
<div class="o">
<?php
$ol = $_SESSION['idd'];
$search = $_POST['op'];
$mn ="SELECT * FROM produse WHERE nume_produs LIKE '%$search%' OR descriere LIKE '%$search%' OR semi_nume LIKE '%$search%'OR link LIKE '%$search%' OR categorie LIKE '%$search%' ";
$nm = mysqli_query($connect,$mn);
$gql = "SELECT * FROM cumparaturi WHERE client_id = $ol";
$bl = mysqli_query($connect,$gql);
$count = 0;
while($row = $nm -> fetch_assoc()){
while($lj= $bl->fetch_assoc()){
    if($row['id_produs'] == $lj['produs_id']){
      $stele = $row["stele"];
      echo '<form action="adauga.php" method="POST">
      <input type="hidden" name="id_produs" value="'.$row["id_produs"].'">

      ';
$count++;
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
        echo '<a href="delete.php" style="margin-right:1px;"><button type="submit" name="delete" class="btn btn-primary">Delete</button></a>';
       if(isset($_SESSION['name'])){
       echo '<a href="buy.php"><button type="submit" name="buy" class="btn btn-primary">Cumpara</button></a>';
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
  }

}
if($count == 0)
{
  echo '<h1>Acest produs nu s-a putut gasi in cos</h1>';
}
 ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>
</html>
