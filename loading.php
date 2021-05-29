<!DOCTYPE html>
<html>
<head>
  <style>
  .cerc{
    margin: 0 auto;
    justify-content: center;
    width: 400px;
    height: 400px;
    border: 5px solid rgba(255,255,255,0.3);
    border-radius: 50%;
    border-top-color:white;
    animation: inrotire 1s linear;
    display: none;
  }
  .totul{

  }
  @keyframes inrotire
   {
     30%{
       border-right-color:white;
      display: block;
     }
     60%{
       border-bottom-color:white;
       display: block;

     }
     90%{
       border-left-color:white;
       display: block;
     }

  }
  </style>
</head>
<body>
<div class="cerc"><img src="imagini/amuzant.gif"></div>
</body>
</html>
