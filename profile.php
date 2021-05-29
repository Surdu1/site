<?php
include 'connect.php';
session_start();
$id = $_SESSION['idd'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="read-book.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<title>Sign-in</title>
<style>
body{
    margin:0;
    padding:0;
    background: #e6e3e1;

}
.ceva{
    height:100%;
    width:100%;
    align-items:center;
    text-align:center;

}
.corp{
    width:80%;
    height:120vh;
    box-shadow: 5px 10px  rgba(255, 102, 0,0.5);
    background:white;
    position:absolute;
    left:50%;
    top: 50%;
    transform: translate(-50%,-50%);
}
.input{
    height: 100%;
    width: 100%;
    margin-top:4vh;
}
.submit button{
    outline:none;
    height: 10vh;
    width:40%;

    border-radius:10vh;
    font-size:150%;
}
.input input{
    width: 90%;
   margin-top:1vh;
   outline:none;
   font-size:4vh;
}
.submit input{
    outline:none;
    height: 10vh;
    width:40%;
    margin-top:20px;
    border-radius:10vh;
    font-size:150%;
}
@media all and (max-width:619px){
    .submit input{
        font-size:100%;
    }
    .i a input{
        font-size:100%;
    }
}
@media all and (max-width:426px){
    .submit input{
        font-size:80%;
    }
    .i a input{
        font-size:80%;
    }
}
.i input{
    outline:none;
    height: 10vh;
    width:40%;

    border-radius:10vh;
    font-size:150%;
}

.corp h1{
    font-size:5vh;
}
.file img{
    width:100px;
    height:100px;
    border-radius:60px;
    border: 5px solid rgba(255, 132, 0,0.3);
}
.file input{
    display: none;

}
</style>

</head>
<body>
<div class= ceva>
<div class="corp">
<form action="schimbare.php" id="form" method="post" enctype="multipart/form-data">
<div class="input">
<div class="file" style="margin-top:13vh;">
<input type="file" id="file" name="imagine" onchange="displayImage(this)">
<?php
$sq = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($connect,$sq);
while($ro = $result ->fetch_assoc()){
  if($ro['poza'] == null){
 echo '<label for="file"><img style="cursor:pointer;" src="clienti/principal.jpg" id="profileDisplay" onclick="triggerClick()"><label>';
}
else{
echo '<label for="file"><img style="cursor:pointer;" src="clienti/'.$ro['poza'].'" id="profileDisplay" onclick="triggerClick()"><label>';
}
}
?>
</div>
<?php
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($connect,$sql);
while($row = $result ->fetch_assoc()){
echo '<div id="bine">';
echo '<h1 style="text-align:center;">Nume</h1>';
echo '<input type="text" style="border:4px solid black;" name="user" value="'.$row['username'].'" id="nume">';
echo '<h1 style="text-align:center;">Email</h1>';
echo '<input style="border:4px solid black;" type="email" name="email" value="'.$row['email'].'" id="email" size="30" pattern=".+@gmail.com" require >';
echo '<h1 style="text-align:center;">Schimba parola</h1>';
echo '<input style="border:4px solid black;" type="text" value="" name="parola" id="email">';
echo '<h1 style="text-align:center;">Judet</h1>';
echo '<input style="border:4px solid black;" type="text" value="'.$row['judetul'].'" name="judet" id="email">';
echo '<h1 style="text-align:center;">Oras</h1>';
echo '<input style="border:4px solid black;" type="text" value="'.$row['orasul'].'" name="oras" id="email">';
echo '</div>';

echo '<button type="submit"style="margin-top:10px;float:right;margin-right:4vw;margin-top:5vh;" class="btn btn-primary">Trimiteti</button>';
}
 ?>
</form>
</div>
<a href="delet.php"><button style="margin-top:10px;float:left;margin-left:4vw;margin-top:5vh;" class="btn btn-primary">Delete</button></a>

</div>
<script>
function triggerClick(){
    document.querySelector('#imagine').click();
}
function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>
</body>
</html>
