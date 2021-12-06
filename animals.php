<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="tab icon" href="images/logoIcon.png" type="image/ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adoption Catalog</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container-xl">
		<!-- each row in the grid has five columns -->
		<!-- each cell will be populated with an animal image from the database -->
		<!-- each image can be clicked in order to navigate to either a pop-up OR separate page with more information about the animal -->
		<!-- catalog should include a nav bar with a filter results option menu -->
		<!-- after completing the quiz, the user will be given their ideal pet type (energetic, calm, affectionate) -->
		<?php
			if(isset($_SESSION['userID'])){
				include 'navBarLoggedIn.php';
			}
			else{
				include 'navBarGeneral.php';
			}
		?>
		
		<div class="text-center">
			<h1>Adoption Catalog</h1>
			<h2>Find the right pet for you!</h2>
		</div>

		<?php
		try {
			$dsn = 'mysql:host=localhost;dbname=pet_shop';
			$username = 'root';
			$password = '';
			$db = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p> An error occured while connecting to the database: $error_message </p>";
		}
		$query = "SELECT * from animals ORDER BY name";
		$statement = $db->prepare($query);
		$statement->execute();
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
		?>
		<div class="row justify-content-center m-4 shadow-lg">
			<?php foreach ($animals as $animal) { ?>
				<div class="card col-md-2 m-3">
					<h5 class="card-header text-center"><?php echo $animal['name']; ?></h5>
					<div class="card-body justify-content-center">
						<!-- @br66190 please implement css in order to make image grid 5x4 (or whatever you think is best) -->
						<img src=<?php echo $animal['picture']; ?> alt="animal1" class="card-img-top rounded shadow-lg">
                        <?php
						$gender = $animal['gender']; ?>
						<?php if ($gender == 'Female'): ?>
							<i class="fas fa-venus"></i>
						<?php else: ?>
							<i class="fas fa-mars"></i>
						<?php endif; ?>
						<?php if (in_array($animal['animalID'], $favs)): ?>
							<a href="removeFavorite.php?animal_id=<?php echo $animal['animalID']?>&page=animals">
							<i class="fas fa-heart"></i></a>
						<?php else: ?>
							<a href="addFavorite.php?animal_id=<?php echo $animal['animalID']?>&page=animals"><i class="far fa-heart"></i></a>
						<?php endif; ?>
						<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#animalM<?php echo $animal['animalID']?>">Show More</button>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php foreach ($animals as $animal){ ?>
		<div class="modal fade" id="animalM<?php echo $animal['animalID']?>" tabindex="-1" aria-labelledby="animalM<?php echo $animal['animalID']?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title" id="animalM<?php echo $animal['animalID']?>"><?php echo $animal['name']?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
						<div class="row">
							<img src=<?php echo $animal['picture']; ?> alt="animal1" class="img-responsive rounded shadow-lg">
						</div>
						<p class="lead">Species: <?php echo $animal['species']?></p>
						<p class="lead">Breed: <?php echo $animal['breed']?></p>
						<p class="lead">Gender: <?php echo $animal['gender']?></p>
						<p class="lead">Age: <?php echo $animal['age']?></p>
						<p class="lead">Size: <?php echo $animal['size']?></p>
						<p class="lead">Gender: <?php echo $animal['description']?></p>
						<?php if (in_array($animal['animalID'], $favs)): ?>
							<a href="removeFavorite.php?animal_id=<?php echo $animal['animalID']?>" class="btn btn-outline-secondary">Remove Favorite</a>
						<?php else: ?>	
						<a href="addFavorite.php?animal_id=<?php echo $animal['animalID']?>" class="btn btn-outline-secondary">Favorite</a>
						<?php endif; ?>
					</div>
                </div>
            </div>
        </div>
		<?php }?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/d83b974fc1.js" crossorigin="anonymous"></script>
	</div>
</body>

</html>
