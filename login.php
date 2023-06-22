<!-- login.php -->
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Connect to the database
    require_once('dbconn.php');

    // Check if email exists
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    // If email exists, verify password
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password matches, create session variables
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $role;

            // Redirect to the appropriate dashboard based on the role
            if ($role === 'student') {
                header("Location: student_dashboard.php");
                exit;
            } elseif ($role === 'coordinator') {
                header("Location: coordinator_dashboard.php");
                exit;
            } elseif ($role === 'admin') {
                header("Location: admin_dashboard.php");
                exit;
            } else {
                // Invalid role
                $response = "<div class='alert alert-danger' role='alert'>
                        <strong>Error!</strong> Invalid role.
                    </div>";
            }
        } else {
            // Password does not match
            $response = "<div class='alert alert-danger' role='alert'>
                    <strong>Error!</strong> Incorrect password.
                </div>";
        }
    } else {
        // Email does not exist
        $response = "<div class='alert alert-danger' role='alert'>
                <strong>Error!</strong> Email not found.
            </div>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <div class="form-check form-check-inline small">
                                            <input class="form-check-input" type="radio" name="role" value="student" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Student
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline small">
                                            <input class="form-check-input" type="radio" name="role" value="coordinator" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Coordinator
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline small">
                                            <input class="form-check-input" type="radio" name="role" value="admin" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Admin
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pt-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input name="submit" type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                        <hr>
                                        <div class="text-center">
                                            <?php echo $response ?? ""; ?>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>