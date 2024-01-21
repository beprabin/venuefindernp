<?php
    include ('functions/common_functions.php');
    include ('authenticate.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>VenueGuru- Homepage</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/icon.svg" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/herostyles.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />

    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css" rel="stylesheet" />

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

        #map {
            height: 400px;
            width: 600px;
        }
    </style>


</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-2">
            <a class="navbar-brand" href="#">
                <img src="icon.svg" width="50" height="50" class="d-inline-block" alt="" style="margin-right: 10px;" />
            </a>
            <a class="navbar-brand" href="#!">VenueGuru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 p-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    <li class="nav-item "><a class="nav-link" data-bs-toggle="modal" data-bs-target="#signin" type="Sign in" href="#!">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-success text-white" href="hostmyvenue.php">Host my Space</a></li>
                </ul>
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
                    <form action="ownerdetails.php" method="POST">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="first_name" name="first_name" required /><br>

                        <label for="lastName">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" required /><br>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required /><br>

                        <label for="repassword">Confirm password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required /><br>

                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" id="ph_number" name="ph_number" required /><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required /><br>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal for Sign In -->
    <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sign In</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="provider/dashboard.php" method="POST">
                        <label for="username">Email:</label>
                        <input type="text" id="email" name="email" required><br>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required><br>
                        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-white">Sign in</button>
                    </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2"> Enter a city to find venues near you. </h1>
                        <!-- <p class="lead text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p> -->
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <form class="d-flex" role="search" action="search_venue.php" method="get">
                            <div class="col-xs-6 p-3">
                                <input class="form-control me-2" type="search" placeholder="City" aria-label="City" name="search_data">
                            </div>
                            <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                            <div class="p-3">
                                <input type="submit" value="Search" class="btn btn-primary" name="search_venue">
                            </div>
                        </form>
                            <!-- <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="col d-flex justify-content-around mb-2">
                <a href="" class="badge badge-pill badge-primary">Kathmandu</a>
                <a href="" class="badge badge-pill badge-secondary">Pokhara</a>
                <a href="" class="badge badge-pill badge-success">Chitwan</a>
                <a href="" class="badge badge-pill badge-danger">Biratnagar</a>
                <a href="" class="badge badge-pill badge-warning">Jhapa</a>
                <a href="" class="badge badge-pill badge-info">Bhaktapur</a>
                <a href="" class="badge badge-pill badge-light">Lumbini</a>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5">
            <div class="row d-flex justify-content-around">
                <?php
                getVenue();
                getVenueOnLocation();
                ?>
            </div>
    </section>
    <section class="py-5 border-bottom d-flex justify-content-center" id="maps">
        <div id="map"></div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy; VenueGuru 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/heroscripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        //maps in the form
        var map = L.map('map').setView([27, 85], 7);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([27.715141756723987, 85.31158447265625], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(event) {
            var markerLatLng = marker.getLatLng();
            document.getElementById('latitude').value = markerLatLng.lat;
            document.getElementById('longitude').value = markerLatLng.lng;
        });
    </script>
</body>

</html>