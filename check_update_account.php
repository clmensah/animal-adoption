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

if ($_POST['fname'] != "") {
  $query = "UPDATE users SET firstName = :firstName WHERE userID = :userID";
  $statement = $db->prepare($query);
  $statement->bindValue(':firstName', $_POST['fname']);
  $statement->bindValue(':userID', $_SESSION['userID']);
  $statement->execute();
  $statement->closeCursor();
}
if ($_POST['lname'] != "") {
  $query = "UPDATE users SET lastName = :lastName WHERE userID = :userID";
  $statement = $db->prepare($query);
  $statement->bindValue(':lastName', $_POST['lname']);
  $statement->bindValue(':userID', $_SESSION['userID']);
  $statement->execute();
  $statement->closeCursor();
}
if ($_POST['email'] != "") {
  $query = "UPDATE users SET email = :email WHERE userID = :userID";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $_POST['email']);
  $statement->bindValue(':userID', $_SESSION['userID']);
  $statement->execute();
  $statement->closeCursor();
}
if ($_POST['password1'] != "" && $_POST['password2'] != "") {
  if ($_POST['password1'] == $_POST['password2']) {
    $query = "UPDATE users SET password = :password WHERE userID = :userID";
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $_POST['password1']);
    $statement->bindValue(':userID', $_SESSION['userID']);
    $statement->execute();
    $statement->closeCursor();
  } else {
    header("Location: update_account.php?update_fail=2");
    exit();
  }
} else if ($_POST['password1'] != "" || $_POST['password2'] != "") {
  header("Location: update_account.php?update_fail=1");
  exit();
}

header("Location: profile.php");
?>
