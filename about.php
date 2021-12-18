<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="tab icon" href="res/logoIcon.png" type="image/ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
              <section id="about" class="my-4 p-5 shadow rounded">
                <div class="row justify-content-center">
                    <div class="aboutImage col-md-4">
                        <div class="card ">
                            <h5 class="card-header text-center">Angel</h5>
                            <div class="card-body">
                                <img src="res/angel.jpeg" alt="" class="card-img-top rounded">
                                <p class="lead text-center">This cute puppy is Angel</p>
                            </div>
                        </div>
                    </div>
                    <div class="aboutUs col-md-6 align-self-center" style="padding-left:50px">
                        <div class="row">
                            <img src="res/logo.png" alt="" class="card-img-top rounded">
                            <h1>Who We Are</h1>
                            <p class="lead text-center">Our goal is to find loving homes for all of our beautiful pets.</p>
                            <p class="lead text-center">We do our best to provide an accurate portrayal of all our pets, but we highly encourage everyone come by and meet the animals before making a decision to bring any pet into your home.</p>
                            <h1>Hours</h1>
                            <p class="lead text-center">Monday - Friday: 10:00am - 4:00pm</p>
                            <p class="lead text-center">Monday - Friday: 11:00am - 4:00pm</p>
<p class="lead text-center"></p>
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#contactM">Contact Us</button>
                        </div>  
                    </div>
                </div>
              </section>
              <div class="modal fade" id="contactM" tabindex="-1" aria-labelledby="contactM" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"><h5 class="modal-title" id="contactM">Contact Us</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="lead">Email: petAdoptAthens@gmail.com</p>
                            <p class="lead">Phone: 770-853-3752</p>
                            <p class="lead">Location: TBD</p>
                        </div>
                    </div>
                </div>
            </div>
          </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
