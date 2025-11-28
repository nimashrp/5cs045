<?php
session_start();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Your Secret Key
    $secret = '6LetUhosAAAAAO1UaVo9bwdt3fVKioMBtCwzDMuI';

    // Verify reCAPTCHA
    $verify = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha_response}"
    );

    $responseData = json_decode($verify);

    if (!$responseData->success) {
        $message = 'Captcha verification failed. Please try again.';
    } else {

        // -------------------------------------------
        // Replace with your database credential check
        // Example login check (TEMPORARY)
        // -------------------------------------------

        if ($email === "test@example.com" && $password === "123456") {

            $_SESSION['user_email'] = $email;

            // Redirect after successful login
            header("Location: Index.php");
            exit;

        } else {
            $message = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Load Google reCAPTCHA v2 -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-4">

<?php if($message): ?>
<div class="alert alert-danger"><?=$message?></div>
<?php endif; ?>

<form method="post">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <!-- Google reCAPTCHA widget -->
    <div class="mb-3">
        <div class="g-recaptcha" data-sitekey="6LetUhosAAAAADYiowPGonyyG5vooz2xhCoRYDtM"></div>
    </div>

    <button class="btn btn-primary w-100">Login</button>
</form>

<p class="text-center mt-3">
Don't have an account? <a href="signup.php">Sign Up</a>
</p>

</div>
</div>
</div>
</body>
</html>
