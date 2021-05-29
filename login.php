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
    height:80%;
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
.i input{
    outline:none;
    height: 10vh;
    width:40%;

    border-radius:10vh;
    font-size:150%;
}
.input input{
    width: 90%;
   margin-top:4vh;
   outline:none;
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
#i1{
    width:20vh;
    height:5vh;
    float:left;
    margin-top:40px;
}
#i2{
    width:15vh;
    height:15vh;


    float:right;
}
.corp h1{
    font-size:5vh;
}
</style>
</head>
<body>
<div class= ceva>
<div class="corp">
<h1 style="color:white;">Sign-in</h1>
<?php
if(isset($_GET['info']) && $_GET['info'] == "nugasit"){
    echo'<h3 style="color:red">Parola nu sa potrivit cu email-ul</h3>';
}
if(isset($_GET['info']) && $_GET['info'] == "noemail"){
    echo'<h3 style="color:red">Email-ul nu a fost gasit</h3>';
}
if(isset($_GET['info']) && $_GET['info'] == "email"){
    echo'<h3 style="color:red">Email-ul nu a fost introdus</h3>';
  }
if(isset($_GET['info']) && $_GET['info'] == "password"){
      echo'<h3 style="color:red">Parola nu a fost introdus</h3>';
    }
?>
<form action="sign-in.php" method="POST">
<div class="input">
<input  style="height: 10vh; border-radius:10vh;" placeholder="Email" type="email" name="email" size="30" pattern=".+@gmail.com" require>
<input  style="height: 10vh; border-radius:10vh;" id="password" type="password" placeholder="Password" name="password" require><span class="ochi" onclick="myFunction()">
 <i id="ochi1" class="fa fa-eye fa-2x"></i>
 <i id="ochi2" class="fa fa-eye-slash fa-2x"></i>
</span>
</div>
<div class="submit">
<input type="submit" value="Conecteazate">
</div>
</form>

<div class="i">
<a href="sign-up.php"><input type="button" value='Sign-up'></a>
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
