<!DOCTYPE html>
<html>
<head>
    <link rel="tab icon" href="images/logoIcon.png" type="image/ico">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-xl">
<?php
session_start();
?>
    <?php
			if(isset($_SESSION['userID'])){
				include 'navBarLoggedIn.php';
			}
			else{
				include 'navBarGeneral.php';
			}
		?>
    <div class="text-center" style="margin-bottom: 30px">
        <h1>Login</h1>
    </div>
    <div class="row justify-content-center m-4 shadow-lg" style="width: 750px; margin: auto !important; padding: 20px">
      <?php
        if (isset($_GET['login_fail'])) {
          $loginResult = $_GET['login_fail'];
          if (isset($loginResult)) {
            echo '<p class="text-center" style="font-size:25px">Error: Login failed</p>';
          }
        }
      ?>
      <form action="check.php" method="post" class="row justify-content-center text-center">
          <label for="email" style="font-size:20px">Email:</label>
          <input class="col-md-6 rounded-pill" type="email" name="email" id="email" placeholder="email" style="width:600px"><br>
          <label for="password" style="margin-top:10px; font-size:20px" >Password:</label>
          <input class="col-md-6 rounded-pill" type="password" name="password" id="password" placeholder="password" style="width:600px"><br>
          <div class="row justify-content-center my-5">
            <input class="col-md-6 btn btn-outline-secondary rounded-pill" type="submit" value="Login" style="width:600px">
          </div>
      </form>
      <div class="row justify-content-center">
        <a class="text-center" href="signup.php" style="font-size:19px">Create an Account?</a>
      </div>
    </div>
</div>
</body>
</html>
