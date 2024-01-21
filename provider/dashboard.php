<?php              
      session_start();

      // Check if the user is not logged in
      if (!isset($_SESSION['owner_id'])) {
        header("Location: ../hero.php");
        exit();
      }

?>  
<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/icon.svg" />

    <!-- <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet"> -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
    />
    <link
      href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Dashboard</title>
  </head>

  <!-- Navbar with Image and text -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <img src="../icon.svg" width="50" height="50" class="d-inline-block" alt="" style="margin-right: 10px;" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-white" href="#">Venue Finder <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      <div class="d-flex">
      <div class="collapse navbar-collapse mr-2" id="navbarText">
        <p>Welcome to Dashboard <?php echo $_SESSION['email']; ?></p>  
      </div>
      </div>
    </div>
  </nav>

  <!-- Add your other head content here -->
  <title>Venue Finder</title>
</head>

  <body>
        <div class="col-md-10 p-5 m-5">
          <a class="btn btn-success btn-lg px-4" href="form.php">Add Venue</a>
          <a class="btn btn-success btn-lg px-4" href="#!">Check Venue</a>
          <a class="btn btn-success btn-lg px-4" href="#!">Update Personal Details</a>
        </div>  
  
        <footer class="page-footer">
      <!-- Footer Elements -->
      <div class="container">
        <!-- Call to action -->
        <ul class="list-inline text-center py-2">
          <li class="list-inline-item">
            <h5 class="mb-1">Go to HomePage:</h5>
          </li>
          <li class="list-inline-item">
            <a href="../hero.php">VenueGuru</a>
          </li>
        </ul>
      </div>
    </footer>  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js"></script>
    <script src="./assets/js/script.js"></script>
  </body>
</html>