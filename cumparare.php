<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
  <div style="margin:25px auto 0;box-shadow: 0px 0px 20px rgba(0,0,0,0.5);height:90vh;width:80vw;"class="tot">
    <h1 style="text-align:center">Facturarea comenzi</h1>
    <hr>
  <?php
  $v1=1;
  $v2=2;
  $v3=3;
  $v4=4;
  $v5=5;
  $p=0;
  include 'connect.php';
  session_start();
  $idd = $_SESSION['idd'];
  $id = $_POST['id_produs'];
  $sql = "SELECT * FROM produse WHERE id_produs = '$id'";
  $result = mysqli_query($connect,$sql);
  while($row = $result -> fetch_assoc()){
  echo '<img style="width:100px;" src="imagini/'.$row['nume_imagine'].'"';
  echo '<h1>'.$row['nume_produs'].'<h1>';
  }
   ?>
   <hr>
   <form action="pdf.php" method="post">
   <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1"><i class="far fa-address-card"></i></span>
     <input type="text" class="form-control" placeholder="Card" aria-label="Username" name="card" aria-describedby="basic-addon1" required>
   </div>
   <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Orasul</span>
     <input type="text" class="form-control" placeholder="Orasul" aria-label="Username" name="oras" aria-describedby="basic-addon1" required>
   </div>
   <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Judetul</span>
     <input type="text" class="form-control" placeholder="Judetul" aria-label="Username" name="judet" aria-describedby="basic-addon1" required>
   </div>
   <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Numar de telefon</span>
     <input type="text" class="form-control" placeholder="Numarul de telefon" name="telefon" aria-label="Username" aria-describedby="basic-addon1" required>
   </div>
   <div class="input-group mb-3">
     <span class="input-group-text" id="basic-addon1">Detali</span>
     <input type="text" class="form-control" placeholder="Daca aveti ceva de sprecizat pentru livrare" name="detali" aria-label="Username" aria-describedby="basic-addon1" required>
   </div>
   <?php echo'<input type="hidden" name="id"  value="'.$idd.'">';?>
   <?php echo'<input type="hidden" name="idd"  value="'.$id.'">';?>
   <div style="text-align:center;"><button type="submit" class="btn btn-primary">Cumpara</button></div>

   </form>
   </div>
</body>
</html>
