<?php
// login to MySQL Server from PHP
$conn = mysqli_connect("localhost", "root", "lolhooba");

// If login failed, terminate the page (using the 'die' function)
if (!$conn) {
    die("Error when connecting to MySQL: " . mysqli_connect_error());
}

// Login was successful. Then choose a database to work with
$selected = mysqli_select_db($conn, "student_practical_training_system");

// If the required database cannot be used, terminate the page
if (!$selected) {
    die("Cannot use database: " . mysqli_error($conn));
}

// Rest of your code...
