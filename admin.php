<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admnin</title>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  background: white;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

td{
  background-color: #dddddd;
}
</style>
<head>
<body>
  <?php
  session_start();
  if(!isset($_SESSION['admin'])||$_SESSION['admin']!='admin'){
    header('Location: index.php');
    die();
  }
  ?>
  <div style="background:linear-gradient(#e01f1f,#1f35e0);color:white;">
    <a href="destroy.php"><button style="float:right;margin-top:10px;" class="btn btn-primary">Deconectare</button></a>
  <h1 style="text-align:center;">Administrare</h1>
  <hr>
</div>
  <h1 style="text-align:center">Utilizatori/Produse</h1>
  <?php
  include 'connect.php';
  $sql = 'SELECT * FROM user';
  $resul = mysqli_query($connect,$sql);
  $s = 0;
  echo '<table>';
  echo '<tr>
  <th>Id</th>
  <th>Username</th>
  <th>Parola cripatata</th>
  <th>Email</th>
  <th>Poza</th>
  <th>Numar de produse in cos</th>
  <th>Judet</th>
  <th>Oras</th>
  </tr>';
  while ($row = $resul -> fetch_assoc()){
    $s = $s + 1;
  echo ' <tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['username'].'</td>
    <td>'.$row['password'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['poza'].'</td>
    <td>'.$row['numar'].'</td>
    <td>'.$row['judetul'].'</td>
    <td>'.$row['orasul'].'</td>
  </tr>';
  }
  echo '</table>';
  echo '<h1 style="float:right;">In total '.$s.' utilizatori</h1>';
   ?>
   <?php
   include 'connect.php';
   $sd = 1;
   $sql = 'SELECT * FROM produse';
   $resul = mysqli_query($connect,$sql);
   while ($row = $resul -> fetch_assoc()){
     $sd++;
   }
   $sql = 'SELECT * FROM produse';
   $resul = mysqli_query($connect,$sql);
   $s = 0;
   echo '<table>';
   echo '<tr>
   <th>Id</th>
   <th>Nume</th>
   <th>Poza</th>
   <th>descriere</th>
   <th>Stele</th>
   <th>Link</th>
   <th>Semi-nume</th>
   <th>Pret</th>
   <th>Categorie</th>
   </tr>';
   while ($row = $resul -> fetch_assoc()){
     $s = $s + 1;
   echo ' <tr>
     <td>'.$row['id_produs'].'</td>
     <td>'.$row['nume_produs'].'</td>
     <td>'.$row['nume_imagine'].'</td>
     <td>'.$row['descriere'].'</td>
     <td>'.$row['stele'].'</td>
     <td>'.$row['link'].'</td>
     <td>'.$row['semi_nume'].'</td>
     <td>'.$row['pret'].'</td>
     <td>'.$row['categorie'].'</td>
   </tr>';
   }
   echo '</table>';
   echo '<h1 style="float:right;">In total '.$s.' produse</h1>';
    ?>
    <div  style="width:100%;height:100%; margin-top:100px;">
      <h1 style="text-align:center;">Adaugare de produse</h1>
  <form action="adauga_produse.php" method="post" enctype="multipart/form-data">
    <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Numele produsului</span>
  </div>
  <input type="text" class="form-control" name="produse"  aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group input-group-sm mb-3">
<div class="input-group-prepend">
<span class="input-group-text"  id="inputGroup-sizing-sm">Descriere</span>
</div>
<input type="text" class="form-control" name="descriere" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group input-group-sm mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="inputGroup-sizing-sm">Link</span>
</div>
<input type="text" class="form-control" name="link" value="pag.php?info=" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group input-group-sm mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="inputGroup-sizing-sm">Semi nume</span>
</div>
<input type="text" class="form-control" name="semi_nume" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group input-group-sm mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="inputGroup-sizing-sm">Pret</span>
</div>
<input type="text" class="form-control"  name="pret" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Categorie</label>
  </div>
  <select class="custom-select"  name="categorie" id="inputGroupSelect01">
    <option value="it">It</option>
    <option value="echipament">Echipament Sportiv</option>
    <option value="electrocasnice">Electrocasnice</option>
    <option value="constructi">Echipamente pentru constructi</option>
  </select>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" id="file" name="imagine" id="inputGroupFile01">
    <label class="custom-file-label" for="inputGroupFile01">Adauga imagine</label>
  </div>
</div>
<?php
echo '<input type="hidden" value="'.$sd.'" name="id">';
?>
<button type="submit" class="btn btn-primary">Adauga produs</button>

</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
