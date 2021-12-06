<?php
    session_start();
    try {
        $dsn = 'mysql:host=localhost;dbname=pet_shop';
        $username = 'root';
        $password = '';
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p> An error occured while connecting to the database: $error_message </p>";
    }
    if(isset($_SESSION['userID'])){
        $animal_id = filter_input(INPUT_GET, 'animal_id',FILTER_VALIDATE_INT);
        $page = filter_input(INPUT_GET, 'page',FILTER_DEFAULT);
        if($animal_id != NULL && $animal_id !=  FALSE){
            $id = $_SESSION['userID'];
            $query = "DELETE FROM favorite_animals WHERE animalID = '$animal_id' AND userID = '$id'";
            $statement = $db->prepare($query);
            $statement->execute();
            if ($page == "animals") {
              header('Location: animals.php');
            } else if ($page == "homepage") {
              header('Location: homepage.php');
            }
        }
    } else {
      $page = filter_input(INPUT_GET, 'page',FILTER_DEFAULT);
      if ($page == "animals") {
        header('Location: animals.php');
      } else if ($page == "homepage") {
        header('Location: homepage.php');
      }
    }
?>
