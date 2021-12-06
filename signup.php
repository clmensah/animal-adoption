<?php
session_start();

$exists=false;
$nameError=false;
try {
    $dsn = 'mysql:host=localhost;dbname=pet_shop';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn,$username,$password);
    } catch(PDOException $e) {
      $error_message = $e -> getMessage();
      echo "<p> An error occured while connecting to the database: $error_message </p>";
    }


$fname = null;
$lname = null;
$email = null;
$password = null;


if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

$same = "Select * from users where email='$email'";
$stmt = $db->prepare($same);
$stmt->execute();
$dup = $stmt->fetch();
if ($dup) {
    $exists = "An account with this email already exists";
  
} else  if (empty($_POST["fname"]) ) {
        $nameError = "Every box is required";
    } else {
    $query = "INSERT INTO users (firstname, lastname, email, password) VALUES (:fname, :lname, :email, :pass)";
    $statement = $db->prepare($query);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pass', $password);
    $statement->execute();
    $statement->closeCursor();
    }
    $query= "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $data=$db->query($query);
    if($data->rowCount()>0) {
      $row = $data->fetch();
      $_SESSION['userID'] = $row['userID'];
      header('Location: homepage.php');
    }


?>
<html>
<head>
  <link rel="tab icon" href="images/logoIcon.png" type="image/ico">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if($exists) {
  echo ' <div class="alert alert-danger 
      alert-dismissible fade show" role="alert">

  <strong>Error!</strong> '. $exists.'
  <button type="button" class="close" 
      data-dismiss="alert" aria-label="Close"> 
      <span aria-hidden="true">×</span> 
  </button>
 </div> '; 
}



?>
<div class="container-xl">
    <?php
      if(isset($_SESSION['userID'])){
        include 'navBarLoggedIn.php';
      }
      else{
        include 'navBarGeneral.php';
      }
    ?>
    <div class="text-center" style="margin-bottom: 30px">
      <h1>Sign Up</h1>
    </div>
 
    <div class="row justify-content-center m-4 shadow-lg" style="width: 750px; margin: auto !important; padding: 20px">
      <form class="row justify-content-center text-center" action="signup.php" method="post" target="_self">
        <label class="text-center" for="fname" style="font-size:20px">First name:</label>
        <input class="col-md-6 rounded-pill" type="text" id="fname" name="fname" style="width:600px"><br>

        <label class="text-center" for="lname" style="margin-top: 10px; font-size:20px">Last name:</label>
        <input class="col-md-6 rounded-pill" type="text" id="lname" name="lname" style="width:600px"><br>

        <label class="text-center" for="email" style="margin-top: 10px; font-size:20px">Email:</label>
        <input class="col-md-6 rounded-pill" type="text" id="email" name="email" style="width:600px"><br>

        <label class="text-center" for="password" style="margin-top: 10px; font-size:20px">Password:</label>
        <input class="col-md-6 rounded-pill" type="password" id="password" name="password" style="width:600px"><br>
        <div class="row justify-content-center my-5">
          <input class="col-md-6 btn btn-outline-secondary rounded-pill" type="submit" value="Sign Up" style="width:600px">
        </div>
        
      </form>
      <div class="row justify-content-center">
          <a class="text-center" href="login.php" style="font-size:19px">Already have an Account?</a>
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>
