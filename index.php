<?php 
// DATA:
$hotels = [

  [
      'name' => 'Hotel Belvedere',
      'description' => 'Hotel Belvedere Descrizione',
      'parking' => true,
      'vote' => 4,
      'distance_to_center' => 10.4
  ],
  [
      'name' => 'Hotel Futuro',
      'description' => 'Hotel Futuro Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 2
  ],
  [
      'name' => 'Hotel Rivamare',
      'description' => 'Hotel Rivamare Descrizione',
      'parking' => false,
      'vote' => 1,
      'distance_to_center' => 1
  ],
  [
      'name' => 'Hotel Bellavista',
      'description' => 'Hotel Bellavista Descrizione',
      'parking' => false,
      'vote' => 5,
      'distance_to_center' => 5.5
  ],
  [
      'name' => 'Hotel Milano',
      'description' => 'Hotel Milano Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 50
  ],

];

// $preferenza = $_POST;
$newHotel = [];
// SCELTA
if(isset($_POST['preferenza']) && !empty($_POST['preferenza'])){
  foreach($hotels as $element){
    if( $_POST['preferenza'] == '1'){
      if($element['parking']){
        if($_POST['voto'] >= $element['vote'])
        array_push($newHotel, $element);
      }
      
    }else if($_POST['preferenza'] == '2'){
      if(!$element['parking'])
        if($_POST['voto'] >= $element['vote'])
        array_push($newHotel, $element);
    }else{
      if($_POST['voto'] >= $element['vote'])
        array_push($newHotel, $element);
    }
  }
  
// var_dump($newHotel);

}

// /SCELTA
// var_dump($parking);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- link css -->
  <link rel="stylesheet" href="./style.css">
  <title>PHP Hotel</title>
</head>
<body>
  <div class="container my-5">
    <!-- Select parcheggio -->
    <div class=" my-5">
      <form action="index.php" method="POST">
        <select class="form-select" aria-label="Default select example" name="preferenza">
          <option selected>Preferenza parcheggio</option>
          <option value="1">Presente</option>
          <option value="2">Senza</option>
          <option value="3">Indifferente</option>
        </select>

        <label for="customRange3" class="form-label">Rating:</label>
        <input type="range" class="form-range" min="0" max="5" step="1" id="customRange3" name="voto" value="5">
        <!-- BTN -->
        <div class="my-3">
          <button type="submit" class="btn btn-primary">Cerca</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </div>
      </form>
    </div>
    <?php if(!empty($_POST['preferenza'])): ?>
    <div class="row row-cols-2  justify-content-center ">
    <?php 
      foreach ($newHotel as $elements) :
      ?>
          <div class="col-5 my-3  hotel ">
            <?php foreach ($elements as $key => $item ) : ?>
              <h4><?php echo $key ?>: <?php echo $item ?></h4>
            <?php endforeach ?>
          </div>  
      <?php endforeach ?>
      </div>
    </div>
    <?php endif ?>
  </div>
</body>
</html>