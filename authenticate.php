
<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['owner_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection file
    include 'connection.php';

    // Get input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs (you should add more validation and sanitation)
    if (empty($email) || empty($password)) {
        $error = "Both email and password are required.";
    } else {
        // Check user credentials
        $query = "SELECT id, username, password FROM ownerdetails WHERE username = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['owner_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Redirect to the dashboard or any other page
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>