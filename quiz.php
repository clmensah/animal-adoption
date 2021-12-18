<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="tab icon" href="res/logoIcon.png" type="image/ico">
    <title>Quiz</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<main>
		<div class="container">
		<?php
			if(isset($_SESSION['userID'])){
				include 'navBarLoggedIn.php';
			}
			else{
				include 'navBarGeneral.php';
			}
		?>
			<h1 class="text-center">Which pet is right for you?</h1>
			<h2 class="text-center">Take our Pet Quiz to find out!</h2>
			<div class="card shadow-lg rounded">
				<div class="card-body">

						<div class="row justify-content-center">
							<div class="card col-md-8 rounded">
								<div class="card-header">
									<p id="question1"></p>
								</div>
								<div class="card-body">
									<input type="radio" class="pet_type" value="A" name="choice1" id="1A">
									<label id=question1-A for="question1-A"></label><br>
									<input type="radio" class="pet_type" value="B" name="choice1" id="1B">
									<label id="question1-B" for="question1-B"></label><br>
									<input type="radio" class="pet_type" value="C" name="choice1" id="1C">
									<label id="question1-C" for="question1-C"></label><br>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="card col-md-8">
								<div class="card-header">
									<p id="question2"></p>
								</div>
								<div class="card-body">
									<input type="radio" class="pet_type" value="A" name="choice2" id="2A">
									<label id="question2-A" for="question2-A"></label><br>
									<input type="radio" class="pet_type" value="B" name="choice2" id="2B">
									<label id="question2-B" for="question2-B"></label><br>
									<input type="radio" class="pet_type" value="C" name="choice2" id="2C">
									<label id="question2-C" for="question2-C"></label><br>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="card col-md-8">
								<div class="card-header">
									<p id="question3"></p>
								</div>
								<div class="card-body">
									<input type="radio" class="pet_type" value="A" name="choice3" id="3A">
									<label id="question3-A" for="question3-A"></label><br>
									<input type="radio" class="pet_type" value="B" name="choice3" id="3B">
									<label id="question3-B" for="question3-B"></label><br>
									<input type="radio" class="pet_type" value="C" name="choice3" id="3C">
									<label id="question3-C" for="question3-C"></label><br>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="card col-md-8">
								<div class="card-header">
									<p id="question4"></p>
								</div>
								<div class="card-body">
									<input type="radio" class="pet_type" value="A" name="choice4" id="4A">
									<label id="question4-A" for="question4-A"></label><br>
									<input type="radio" class="pet_type" value="B" name="choice4" id="4B">
									<label id="question4-B" for="question4-B"></label><br>
									<input type="radio" class="pet_type" value="C" name="choice4" id="4C">
									<label id="question4-C" for="question4-C"></label><br>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="card col-md-8">
								<div class="card-header">
									<p id="question5"></p>
								</div>
								<div class="card-body">
									<input type="radio" class="pet_type" value="A" name="choice5" id="5A">
									<label id="question5-A" for="question5-A"></label><br>
									<input type="radio" class="pet_type" value="B" name="choice5" id="5B">
									<label id="question5-B" for="question5-B"></label><br>
									<input type="radio" class="pet_type" value="C" name="choice5" id="5C">
									<label id="question5-C" for="question5-C"></label><br>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="card col-md-8">
								<div class="card-header">
									<p id="question6"></p>
								</div>
								<div class="card-body">
									<input type="radio" class="pet_type" value="A" name="choice6" id="6A">
									<label id="question6-A" for="question6-A"></label><br>
									<input type="radio" class="pet_type" value="B" name="choice6" id="6B">
									<label id="question6-B" for="question6-B"></label><br>
									<input type="radio" class="pet_type" value="C" name="choice6" id="6C">
									<label id="question6-C" for="question6-C"></label><br>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="card col-md-8">
								<div class="card-header">
									<p id="question7"></p>
								</div>
								<div class="card-body">
									<input type="radio" class="pet_type" value="A" name="choice7" id="7A">
									<label id="question7-A" for="question7-A"></label><br>
									<input type="radio" class="pet_type" value="B" name="choice7" id="7B">
									<label id="question7-B" for="question1-C"></label><br>
									<input type="radio" class="pet_type" value="C" name="choice7" id="7C">
									<label id="question7-C" for="question7-C"></label><br>
								</div>
							</div>
						</div>
						<script type="text/javascript" src="quiz.js"></script>
						<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
							integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
							crossorigin="anonymous">
							</script>
						<script> generate_quiz();</script>
						<div class="row justify-content-center">
							<button class="btn btn-outline-secondary col-md-6" data-bs-toggle="modal" data-bs-target="#quizM" type="button"  id="submit" style="margin-top:20px">Submit</button>
						</div>
						<div class="modal fade" id="quizM" tabindex="-1" aria-labelledby="quizM" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header"><h5 class="modal-title" id="quizM">Quiz Results</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p class="lead" id="result">Hello</p>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
