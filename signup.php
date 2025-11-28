<?php
session_start();
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($email) || empty($password)) {
        $message = "All fields are required.";
    } else {

        // Check if email exists
        $check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Email already exists.";
        } else {

            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {

                // Auto login user
                $_SESSION["user_id"] = $stmt->insert_id;
                $_SESSION["username"] = $username;

                header("Location: index.php");
                exit;

            } else {
                $message = "Signup failed. Try again.";
            }
        }
    }
}
?>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sign Up</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-5">

<div class="card p-4 shadow-sm">
<h3 class="text-center mb-3">Sign Up</h3>

<?php if($message): ?>
<div class="alert alert-danger"><?=$message?></div>
<?php endif; ?>

<form method="post">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100">Register</button>
</form>

<p class="text-center mt-3">
Already have an account? <a href="login.php">Login</a>
</p>

</div>
</div>
</div>
</div>

</body>
</html>

