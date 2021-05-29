<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link rel="stylesheet" href="header.css">
<style>
.mult h1:hover{
  color:#212529;
}
.mult a{
  color:white;
}
#i1:hover{
  color:red;
}
#i2:hover{
  color:yellow;
}
#i3:hover{
  color:blue;
}
</style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <a class="nav-brand" href="index.php">
         <img style="width:50px;height:50px;" src="logo.png">
      </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form  action="search.php" method="POST" class="form-inline mx-lg-auto">
      <div class="input-group">
      <div class="input-group-prepend">
      <select name="select" id="inputGroup-sizing-default" class="input-group-text custom-select" id="inputGroupSelect04">
      <option >All</option>
      <option value="200">pana 200lei</option>
      <option value="99">pana 99lei</option>
      <option value="40">pana 40lei</option>
      </select>
    </div>
    <input type="text" style="overflow:hidden;" name="cautare" class="form-control" placeholder="Cauta">
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary my-0 my-sm-0"><i class="fas fa-search"></i></button>
    </div>
    </div>
    </form>

    <div class="icons">
      <?php
      if(isset($_SESSION['idd'])){
      $id = $_SESSION['idd'];
      $sq = "SELECT * FROM user WHERE id = '$id'";
      $r = mysqli_query($connect,$sq);
      $row = $r -> fetch_assoc();
      $numar = $row['numar'];
      echo'<a href="cos.php">
        <span><i style="color:white;margin-right:10px;float:left;" class="fas fa-shopping-cart fa-3x">'.$numar.'</i></span>
      </a>';
      if($row['poza'] == null){
      echo'
      <i onclick="im()" id="imagine" style="float:right;cursor:pointer;color:#212529;" class="fas fa-user-circle fa-3x"></i>
    ';
  }

  else {
     echo '<img src="clienti/'.$row['poza'].'" onclick="im()" id="imagine" style="float:right;width:50px;height:50px;background:white;border-radius:50px;cursor:pointer;border: 3px solid rgba(255, 132, 0,0.3);">';
  }
  }
      ?>
      <?php

      if(!isset($_SESSION['name']))
      {

  echo'  <a href="login.php"  <button type="button" class="btn btn-primary">
        Log in
      </button></a>';
      }
      ?>
    </div>


  </div>
</div>

  </nav>
  <div id ="arata" class="mult" style="color:white; padding: 10px;margin:auto;border: 3px solid green; float:right;position:absolute;right:0%; left: 60%;z-index:1;text-align: center;background:linear-gradient(#e01f1f,#1f35e0);width:50%;margin-right:5px; margin-top:3px;display:none;">
    <h1 ><i style="float:left;"class="fas fa-user"></i><a id= "i3" style="text-decoration:none;" href="profile.php">Profile</a></h1>
    <br>
    <h1><i style="float:left;"class="fas fa-question-circle"></i><a id="i2"style="text-decoration:none;"href="intrebari.php">Ajutor</a></h1>
    <br>
    <h1><i style="float:left;"class="fas fa-trash"></i><a id="i1"style="text-decoration:none; font-size:80%;"href="destroy.php">Deconectare</a></h1>
    <br>
    <h1><i style="float:left;"class="fas fa-info"></i><a id="i1"style="text-decoration:none;"href="info.php">Info</a></h1>
  </div>
<script>
var adv = false;
function im(){
adv = !adv;
if(adv){
document.getElementById('arata').style.display = "block";
document.getElementById('imagine').style.color = "white";
}
else{
document.getElementById('arata').style.display = "none";
document.getElementById('imagine').style.color = "#212529";
}
}
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>
</html>
