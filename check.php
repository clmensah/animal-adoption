<?php
session_start();
try {
    $dsn = 'mysql:host=localhost;dbname=pet_shop';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn,$username,$password);
    #echo "<p> You are connected to the database!</p>";
    } catch(PDOException $e) {
      $error_message = $e -> getMessage();
      echo "<p> An error occured while connecting to the database: $error_message </p>";
    }

$email=$_POST['email'];
$password=$_POST['password'];


$query= "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$data=$db->query($query);
if($data->rowCount()>0) {
  $row = $data->fetch();
  $_SESSION['userID'] = $row['userID'];
  header('Location: homepage.php');
} else {
  header('Location: login.php?login_fail=1');
}

?>
