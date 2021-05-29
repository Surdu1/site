<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    height:90%;
    box-shadow: 5px 10px  rgba(255, 102, 0,0.5);
    background:linear-gradient(rgba(31, 53, 224,0.5),#e01f1f);
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
    width: 80%;
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
#ochi1{
  display: none;
  margin-left: -50px;
  cursor: pointer;
}
#ochi2{
  cursor: pointer;
  margin-left: -50px;
}
.input  img{
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
<form action="sign.php" id="form" method="post" enctype="multipart/form-data">
<div class="input">
<h1 style="color:white;">Sign up</h1>
<?php
if(isset($_GET['info']) && $_GET['info'] == "nuimagine"){
    echo '<p style="color:black">Poza nu a fost adaugata</p>';
}
if(isset($_GET['info']) && $_GET['info'] == "nousername"){
    echo '<p style="color:black">Username nu a fost adaugata</p>';
}
if(isset($_GET['info']) && $_GET['info'] == "noemail"){
    echo '<p style="color:black">Email-ul nu a fost adaugata</p>';
}
if(isset($_GET['info']) && $_GET['info'] == "nopassword"){
    echo '<p style="color:black">Parola nu a fost adaugata</p>';
}
if(isset($_GET['info']) && $_GET['info'] == "proemail"){
    echo '<p style="color:black">Acest email se afla deja in baza de date</p>';
}
if(isset($_GET['info']) && $_GET['info'] == "scurt"){
    echo '<p style="color:black">Parola trebuie sa contina minim 8 caractere</p>';
}
?>
<div id="error"></div>
<input  style="height: 8vh; border-radius:10vh;" type="text" placeholder="Username" name="username" id="username" require>
<input  style="height: 8vh; border-radius:10vh;" placeholder="Email" type="email" id="email"name="email" size="30" pattern=".+@gmail.com" require>
<input  style="height: 8vh; border-radius:10vh;" type="password" placeholder="Password" name="password" id="password" require><span class="ochi" onclick="myFunction()">
 <i id="ochi1"  class="fa fa-eye fa-2x"></i>
 <i id="ochi2"  class="fa fa-eye-slash fa-2x"></i>
</span>
</div>
<div class="submit">
<input type="submit" value="Conecteazate">
</div>
</form>
<div class="i">
<a href="login.php"><input type="button" value='Sign-in'></a>
</div>
</div>
<script>
function myFunction(){
  var x = document.getElementById("password");
  var y = document.getElementById("ochi1");
  var z = document.getElementById("ochi2");
  if(x.type === 'password'){
    x.type = 'text';
    y.style.display = 'inline';
    z.style.display = 'none';
  }
  else{
    x.type = 'password';
    y.style.display = 'none';
    z.style.display = 'inline';
  }

}
</script>
</body>
</html>
