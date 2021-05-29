<?php
session_start();
include 'connect.php';
$card = $_POST['card'];
$oras = $_POST['oras'];
$judet = $_POST['judet'];
$telefon = $_POST['telefon'];
$detali = $_POST['detali'];
$id = $_POST['id'];
$idd = $_POST['idd'];
$email;
$nume;
$sql = 'SELECT * FROM user WHERE id='.$id.'';
$result = mysqli_query($connect,$sql);
while($row = $result -> fetch_assoc()){
  $email = $row['email'];
  $nume = $row['username'];
}
//$sq = "INSERT INTO vanzare(id_produs,id_client,judet,oras,detali,email,nume) VALUES('$idd','$id','$judet','$oras','$detali','$email','$nume')";
//$resul = mysqli_query($connect,$sq);
$sql = 'SELECT * FROM produse WHERE id_produs ='.$idd.'';
$result = mysqli_query($connect,$sql);
while($row = $result -> fetch_assoc()){
  $produs = $row['nume_produs'];
  $pret = $row['pret'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

  <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="text-align:center;">
    <div class="container-fluid">
      <a class="navbar-brand" href="Home.php" ><img style="width:100px;" src="logo.png" id="id"></a>
  <a href="index.php"><img style="width: 50px;"src="la.png"></a>

      </div>
    </div>
  </nav>
<div  id="pdf">
  <h1 style="text-align:center;">Factura electronica</h1>
  <?php echo'<h3>Subsemnatul '.$nume.' a cumparat produsul '.$produs.' cu pretul de '.$pret.',acesta este de acord cu termeni si conditiile acestui magazin si a platit suma integrala a produsului';
  echo '<h2 style="float:right;">'.$nume.'</h2>';
   ?>

</div>
<script>

const element = document.getElementById("pdf");
html2pdf()
.from(element)
.save()
</script>
</body>
</html>
