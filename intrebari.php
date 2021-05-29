<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="intrebare.png">
<title>Intrebari</title>
<style>
body{
    margin:0;
    padding:0;
    background-size:cover;
}
.tot{
    width: 100%;
    background-image: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url(background.jpg);
    background-size: cover;
    text-align: center;
    height: 100vh;
    overflow: hidden;

}

.buton{
    text-align:center;
    border-radius: 30px;
    border: 2px solid black;
    width:80%;
    position: absolute;
    left:50%;
    transform:translateX(-50%);
    box-shadow: 0 0 20px 9px #ff61231f;
    overflow: hidden;

}
.pune{
    text-align:center;
    margin-top:10%;
}
.nav-item button{
    border-radius: 30px;
    background: #ff861c;
    outline: none;
    transition: 0.4s ease;
}
.nav-item button:hover{
   background:#db7114;
}
.buton button{
    border:0;
    outline:0;
    background: transparent;
    width:50%;
    font-size:100%;

}
#btn{
    top:0;
    left:0;
    width:49.5%;
    border-radius:30px;
    height:100%;
    padding:10px;
    background: linear-gradient(to right , #ff105f,#ffad06);

}
.pune{
    margin-top:100px;
    display:none;
}
.frecvent{
    margin-top:100px;
}
@media all and (min-width:994px)
{
    .nav-item{
        margin-left:20%;
    }
}
@media all and (max-width: 1097px){
#btn{
    width:48.24%;
}
}
details[open] summary ~ * {
    animation: open 0.3s ease-in-out;
}
@keyframes open {
    0{
        opacity:0;
    }
    100{
        opacity: 1;
    }
}

details summary::-webkit-details-marker{
    display:none;
}
details summary{
    width:98%;
    padding:0.5rem 0;
    border-top:1px solid black;
    position: relative;
    cursor: pointer;
    font-weight:300;
    list-style: none;
    margin-top:10px;
}
details summary:after{
    content: "+";
    color:black;
    position:absolute;
    font-size:5rem;
    line-height: 0;
    margin-top:-4%;
    right:0;
    font-weight:200;
    transform-origin:center;
    transition:200ms linear;
}
details[open] summary:after{
    transform:rotate(45deg);
    font-size:4rem;

}
details summary{
    outline:0;
}
details p{
    font-size:0.95rem;
    margin:0 0 0 1rem;

}
.frecvent{
    width:100%;
    overflow: hidden;
}
</style>
<head>
</body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="text-align:center;">
  <div class="container-fluid">
    <a class="navbar-brand" href="Home.php" ><img style="width:100px;" src="logo.png" id="id"></a>
<a href="index.php"><img style="width: 50px;"src="la.png"></a>

    </div>
  </div>
</nav>
</div>
</div>
<h1 style="text-align:center;margin-top:20px;">Intrebari</h1>
<div class="buton">
<button  id="btn" onclick="bt()">Erori frecvente</button>
<button  class="dreapta" id="nbtn" onclick="bn()">Specificati </button>
</div>
<div class="pune" id="pune">
    <h1 style="font-size:7vh;">Specificane eroarea ta</h1>
    <h2 style="font-size:5vh;">Aici puteti sa ne specifaicati eroarea pe care o intampinati pentru a ne ocupa de aceasta in ce mai scurt timp cu putinta</h2>
    <form action="eroare.php" method="post">
    <input style="width:90%; border-radius:5vh; outline:none; height:10vh; font-size:3vh;" type="text" placeholder="Eroarea intampinata" name="intrebare">
    <input style="width:40%; height:6vh;margin-top:10px;border-radius:3vh;font-size:2vh;background: linear-gradient(to right , #ff105f,#ffad06);"type="submit" value="Trimite">
</form>
</div>
<div class="frecvent"  id="element">
    <section >
        <details>
            <summary ><h1>404 NU SA PUTUT GASI SERVER-UL</h1></summary>
            <h2>Aceasta eroare apere din cauza faptului ca server-ul nostru nu mai functioneaza,nu va faceti griji se va rezolva imediat</h2>
        </details>
        <details>
            <summary ><h1>Produsele nu pot fi achizitionate</h1></summary>
            <h2>Daca aveti aceasta eroare va rugam sa o semnalati<br>
              Tutorial:
            <br>
              <h1 style="text-align:center;"><img style="width:80%;"src="t1.png"></h1>
              <br>
              <h1 style="text-align:center;"><img style="width:80%;"src="t2.png"></h1>
            </h2>
        </details>
        <details>
            <summary ><h1>Probleme cu logarea</h1></summary>
            <h2>Problemele cu logarea nu sunt frecvent,dar si foarte greu de rozolvat.Puteti reincarca pagina.Daca intampinati aceasta problema trebuie sa ne precizati eroarea aceasta fiind preluata de catre noi si rezolvata in cel mai scurt timp</h2>
        </details>
    </section>
</div>
<script>
   x = document.getElementById("btn");
   y = document.getElementById("nbtn");
   c = document.getElementById("pune");
   v = document.getElementById("element");
   function bt(){
       x.id = "btn";
       y.id = "nbtn";
       c.style.display = "none";
       v.style.display = "block";
   }
   function bn(){
       x.id="nbtn";
       y.id="btn";
       v.style.display = "none";
      c.style.display = "block";
   }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
