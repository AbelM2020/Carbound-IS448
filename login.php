<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === 'admin' && $pass === 'password123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Admin Login</h1>

<?php if ($error): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>

<form method="post">
  <label>Username:<br><input type="text" name="username"></label><br>
  <label>Password:<br><input type="password" name="password"></label><br>
  <button type="submit">Log In</button>
</form>

</body>
</html>
