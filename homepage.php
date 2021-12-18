<?php
session_start();

$dsn='mysql:host=localhost;dbname=pet_shop';
try {
  $db = new PDO($dsn, "root", "");
} catch (PDOException $e) {
  $error=$e->getMessage();
  echo '<p> Unable to connect to database: '.$error;
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="tab icon" href="res/logoIcon.png" type="image/ico">
  <title>Adopt an Animal!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-xl">
<?php
			if(isset($_SESSION['userID'])){
				include 'navBarLoggedIn.php';
			}
			else{
				include 'navBarGeneral.php';
			}
		?>
  <main>
    
    <section id="animals" class="pb-4">
      <div class="mx-5 justify-content-center align-items-center">
        <h2 class="text-center">Animals</h2>
        <div class="row justify-content-center">
          <p class="col-md-8 align-self-center lead" style="text-align: center">Ready to adopt your new best friend? Great! Each animal at our shelter has their very own story that you can find out here. We hope you'll consider adopting one of these special animals and giving them the life they deserve.</p>
        </div>
      <?php
      $query = "SELECT * from animals ORDER BY name LIMIT 4";
      $statement = $db->prepare($query);
      $statement->execute();
      if($statement->rowCount()>0) {
        $animals = $statement->fetchAll();
        $statement->closeCursor();
        
        $userID = $_SESSION['userID'];
        $favQuery = "SELECT animalID FROM favorite_animals WHERE userID = '$userID';";
        $statement2 = $db->prepare($favQuery);
        $statement2->execute();
        $favorites = $statement2->fetchAll();
        $statement2->closeCursor();
        $favs = array();
        foreach($favorites as $favorite){
          $favs[] = $favorite['animalID'];
        }
        
        echo '<div class="row justify-content-center">';
        foreach ($animals as $animal) { ?>
          <div class="card col-md-3 shadow rounded">
            <h5 class="card-header text-dark text-center"><?php echo $animal['name']; ?></h5>
            <div class="card-body">
              <img src=<?php echo $animal['picture']; ?> class="card-img-top rounded shadow-lg" alt="animal2"><br>
              <?php
              $gender = $animal['gender']; ?>
              <?php if ($gender == 'Female') { ?>
                <i class="fas fa-venus"></i>
              <?php } else { ?>
                <i class="fas fa-mars"></i>
              <?php } ?>
              <?php if (in_array($animal['animalID'], $favs)): ?>
                <a href="removeFavorite.php?animal_id=<?php echo $animal['animalID']?>&page=homepage">
                <i class="fas fa-heart"></i></a>
              <?php else: ?>
                <a href="addFavorite.php?animal_id=<?php echo $animal['animalID']?>&page=homepage"><i class="far fa-heart"></i></a>
              <?php endif; ?>
            </div>
          </div>
        

      <?php } } ?>
      <div class="row justify-content-center my-4">
        <a href="animals.php" class="btn btn-outline-secondary col-md-6">More</a>
      </div>

    </div>
    </section>

    <section id="favorite" class="pb-4 text-light">
      <div class="container-lg">
        <div class="row justify-content-center">
          <h2 class="text-center my-4">Favorites</h2>
        </div>
        <div class="row justify-content-center">
          <p class="lead col-md-8" style="text-align: center">One of our available animals catch your eye? By favoriting them, they will be displayed here for easy access.</p>
        </div>
        <?php
        if (isset($_SESSION["userID"])) {
          $userID = $_SESSION["userID"];
          $query = "SELECT * FROM animals, favorite_animals WHERE userID = '$userID' AND animals.animalID = favorite_animals.animalID ORDER BY name LIMIT 4";
          $statement = $db->prepare($query);
          $statement->execute();
          if($statement->rowCount()>0) {
            $favanimals = $statement->fetchAll();
            $statement->closeCursor();
            echo '<div class="row justify-content-center">';
            foreach ($favanimals as $favanimal) { ?>
              <div class="card col-md-3 shadow rounded">
                <h5 class="card-header text-dark text-center"><?php echo $favanimal['name']; ?></h5>
                <div class="card-body text-dark">
                  <img src=<?php echo $favanimal['picture']; ?> class="card-img-top rounded shadow-lg" alt="animal2"><br>
                  <?php
                  $gender = $favanimal['gender']; ?>
                  <?php if ($gender == 'Female') { ?>
                    <i class="fas fa-venus"></i>
                  <?php } else { ?>
                    <i class="fas fa-mars"></i>
                  <?php } ?>
                  <a href="removeFavorite.php?animal_id=<?php echo $animal['animalID']?>&page=homepage">
                  <i class="fas fa-heart"></i></a>
                </div>
              </div>
            
    
          <?php } ?>
            <div class="row justify-content-center my-4">
              <a href="profile.php" class="btn btn-outline-light col-md-6">View on profile</a>
            </div>
        <?php } else { ?>
          <div class="row justify-content-center">
            <p class="lead col-md-8" style="text-align: center">No favorite pets yet!</p>
          </div>
          <div class="row justify-content-center my-4">
            <a href="favorite_pets.html" class="btn btn-outline-light col-md-6">View on profile</a>
          </div>
        <?php } ?>
        <?php } else { ?>
          <div class="row justify-content-center">
            <p class="lead col-md-8" style="text-align: center">No favorite pets yet!</p>
          </div>
          <div class="row justify-content-center my-4">
            <a href="login.php" class="btn btn-outline-light col-md-6">View on profile</a>
          </div>
        <?php } ?>
      </div>
     
      
     
      
    </section>

    <section id="quiz" class="pb-4">
      <div class="container-lg">
        <div class="row justify-content-center">
          <h2 class="text-center my-4">Quiz</h2>
        </div>
        <div class="row justify-content-center">
          <p class="lead col-md-8" style="text-align: center">Looking for a pet with a specific personality? Take this quiz to figure out which pet would be best for you to take home!</p>
        </div>
        <?php if (isset($_SESSION["userID"])) { ?>
          <div class="row justify-content-center my-5">
            <a href="quiz.php" class="btn btn-outline-secondary col-md-6">Take the Quiz</a>
          </div>
        <?php } else { ?>
          <div class="row justify-content-center my-5">
            <a href="login.php" class="btn btn-outline-secondary col-md-6">Take the Quiz</a>
          </div>
        <?php } ?>
      </div>

      

    </section>
    
  </main>

  <footer>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d83b974fc1.js" crossorigin="anonymous"></script>
</div>
</body>
</html>
