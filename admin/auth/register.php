<!-- register.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center mb-4">Create Account</h3>
        <?php
session_start();


if (isset($_SESSION['errors'])) {
    echo '<div class="alert alert-danger">';
    foreach ($_SESSION['errors'] as $field => $messages) {
        foreach ($messages as $msg) {
            echo "<div>• $msg</div>";
        }
    }
    echo '</div>';
    unset($_SESSION['errors']);
}


if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}
?>

        <form action="../controllers/auth/register_controller.php" method="POST">
            <!-- Full Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">

            </div>
            <!-- phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">phone number</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm" name="confirm-password"
                    placeholder="Confirm password">
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-success w-100">Register</button>

            <!-- Extra links -->
            <div class="text-center mt-3">
                Already have an account? <a href="#">Login</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>