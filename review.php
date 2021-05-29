<!DOCTYPE html>
   <head>
      <link rel="stylesheet" href="review.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
     <form action="introducer.php" method="post">
       <?php
        $id_produs = $_POST['id_produs'];
       echo '<input type="hidden" value="'.$id_produs.'" name="id_produs">';
        ?>
      <div class="container">
      <div class="post">
      </div>
      <div class="stele">
      <input type="radio" value="5" name="stea" id="r5">
      <label for="r5" class="fas fa-star"></label>
      <input type="radio" value="4" name="stea" id="r4">
      <label for="r4" class="fas fa-star"></label>
      <input type="radio" value="3"  name="stea" id="r3">
      <label for="r3" class="fas fa-star"></label>
      <input type="radio" value="2"  name="stea" id="r2">
      <label for="r2" class="fas fa-star"></label>
      <input type="radio" value="1"  name="stea" id="r1">
      <label for="r1"class="fas fa-star"></label>
      <div class="sub">
      <header></header>
      <div class="textarea">
      <textarea class="form-control review-content" id="review-body" name="content" rows="7" placeholder="Descrie experiența ta cu produsul" required=""></textarea>
      </div>
      <br>
      <div class="btn">
         <button type="submit">Post</button>
      </div>
    </div>
  </div>
</div>
  </form>
   </body>
</html>
