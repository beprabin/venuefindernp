<?php
  include('connection.php');
?>
<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    <link rel="stylesheet" href="./assets/css/style.css" />
    <title>Venue Finder</title>
  </head>

  <!-- Navbar with Image and text -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <img src="icon.svg" width="50" height="50" class="d-inline-block" alt="" style="margin-right: 10px;" />
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
      <button class="btn btn-outline-success text-white" data-bs-toggle="modal" data-bs-target="#signin" type="aboutus">About Us</button>
    </div>
      
      <div class="collapse navbar-collapse mr-2" id="navbarText">
      <button class="btn btn-outline-success text-white" data-bs-toggle="modal" data-bs-target="#signin" type="Sign in">Sign in</button>
    </div>
        
        <div>
          <button class="btn btn-outline-success text-white" data-bs-toggle="modal" data-bs-target="#register" type="Register">Register</button>
        </div>
      </div>
    </div>
  </nav>




    <!-- Modal for registration -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Register Here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form onsubmit="return validateForm()">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required /><br>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required /><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required /><br>

                <label for="repassword">Confirm password:</label>
                <input type="password" id="repassword" name="repassword" required /><br>

                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" required /><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required /><br>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary">Sign In</button>
            <button type="button" class="btn btn-primary">Register</button>
          </div>
        </div>
      </div>
    </div>


    
    <!-- Modal for signin -->
    <style>
    /* Custom styles for the Sign In modal */
    .modal-content {
      border-radius: 10px;
    }

    .modal-header {
      background-color: #936837;
      color: white;
      border-bottom: 2px solid #936837;
    }

    .modal-title {
      font-size: 1.5rem;
    }

    .modal-body {
      padding: 20px;
    }

    form label {
      font-weight: bold;
    }

    form input {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
    }

    .modal-footer .btn-primary {
      background-color: #28a745;
      color: white;
      border: none;
    }

    .modal-footer .btn-primary:hover {
      background-color: #218838;
    }
  </style>

  <!-- Add your other head content here -->
  <title>Venue Finder</title>
</head>

<!-- Rest of your HTML body content -->
<body>
  <!-- Your existing HTML content -->

  <!-- Modal for Sign In -->
  <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sign In</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <label for="username">Email:</label>
            <input type="text" id="email" name="email" required><br>

            <label for="password" >Password:</label>
            <input type="password" id="password" name="password" required><br>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary text-white">Sign in</button>
        </div>
      </div>
    </div>
  </div>
    
  </nav>

  <body>
    <div class="row">
      <div class="jumbotron col">
        <p class="lead text-white">
            Enter a city to find venues near you. <br />
          
        </p>
        <hr class="my-4" />
        <!--submit form-->
        <form class="form-inline">
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only text-black">City</label>
            <input
              type="text"
              class="form-control"
              id="inputPassword2"
              placeholder="City"
              style="width: 1500px;" 
/>

          </div>
          <br>
          <button
            onclick="hideCards()"
            type="submit"
            id="submit"
            class="btn btn-primary mb-2"
            style="width: 150px; margin-left: auto; margin-right: auto; display: block;"
          >
            Search
          </button>
        </form>
      </div>

      <!--placeholder for map-->
      <!-- <div id="map"></div>
      <div id="map2"></div> -->
    </div>

    <div
      class="row d-flex justify-content-around"
      id="hide-container"
      style="display: none"
    ></div>

    <!-- Footer -->
    <footer class="page-footer">
      <!-- Footer Elements -->
      <div class="container">
        <!-- Call to action -->
        <ul class="list-inline text-center py-2">
          <li class="list-inline-item">
            <h5 class="mb-1">Find us at :</h5>
          </li>
          <li class="list-inline-item">
            <a
              href="https://www.facebook.com/"
              class="btn btn-primary" 
              >Facebook</a
            >
          </li>
          <li class="list-inline-item">
            <a
              href="https://www.instagram.com/"
              class="btn btn-primary"
              >Instagram</a
            >
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