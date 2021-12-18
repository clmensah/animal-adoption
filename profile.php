<?php
session_start();
try {
$dsn = 'mysql:host=localhost;dbname=pet_shop';
$username = 'root';
$password = '';
$db = new PDO($dsn,$username,$password);
} catch(PDOException $e) {
  $error_message = $e -> getMessage();
  echo "<p> An error occured while connecting to the database: $error_message </p>";
}

$userID = $_SESSION['userID'] ?? null;

$queryUsers = "SELECT * FROM users WHERE userID = :userID";
$statement1 = $db ->prepare($queryUsers);
$statement1 -> bindValue(':userID', $userID);
$statement1 -> execute();
$users = $statement1 -> fetch();
$thisfname = $users['firstName'] ?? ' ';
$thislname = $users['lastName'] ?? ' ';
$thisemail = $users['email'] ?? ' ';
$thisresult = $users['quizResults'] ?? 'none';
$thisID = $users['userID'] ?? ' ';
$statement1 -> closeCursor();

$queryFav = "SELECT * FROM animals, favorite_animals WHERE userID = '$thisID' AND animals.animalID = favorite_animals.animalID";
$statement2 = $db->prepare($queryFav);
$statement2->execute();
$fav = $statement2->fetchAll();
#$thisfavU = $fav['name'];
$statement2->closeCursor();


?>
<html>
<head>
<link rel="tab icon" href="res/logoIcon.png" type="image/ico">
<title>Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <div class="text-center" style="margin-bottom: 20px">
      <h1>Profile</h1>
    </div>
    
<div class="row justify-content-center m-4 shadow-lg" style="width: 750px; margin: 0 auto 30px !important; padding: 20px">
    <div class="favorites text-center" style="margin-bottom: 15px">
    <h2>Account Info: </h2>
    </div>
    <div class="row justify-content-center text-center">
      <p class="col-md-3 lead">First Name: </p>
      <p class="col-md-3 lead"><?php echo $thisfname;  ?></p>
    </div>
    <div class="row justify-content-center text-center">
      <p class="col-md-3 lead">Last Name: </p>
      <p class="col-md-3 lead"><?php echo $thislname;  ?></p>
    </div>
    <div class="row justify-content-center text-center">
      <p class="col-md-3 lead">Email: </p>
      <p class="col-md-3 lead"><?php echo $thisemail;  ?></p>
    </div>

<a class="text-center" href="update_account.php" style="margin-top: 15px; font-size:21px">Update Profile</a>
</div>

<div class="row justify-content-center m-4 shadow-lg" style="width: 750px; margin: auto !important; padding: 20px">
    <div class="favorites text-center">
    <h2>Favorites: </h2>
    <div class="row justify-content-center">
    <?php foreach ($fav as $favs) : ?>
      <div class="card col-md-3 shadow rounded mx-2">
            <h5 class="card-header text-dark text-center"><?php echo $favs['name']; ?></h5>
            <div class="card-body">
              <img src=<?php echo $favs['picture']; ?> class="card-img-top rounded shadow-lg" alt="animal2"><br>
              <?php
              $gender = $favs['gender']; ?>
              <?php if ($favs == 'Female') { ?>
                <i class="fas fa-venus"></i>
              <?php } else { ?>
                <i class="fas fa-mars"></i>
              <?php } ?>
              <i class="fas fa-heart"></i>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
    </div>
</div>
        
</div>
</body>
</html>

