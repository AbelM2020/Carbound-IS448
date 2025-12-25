<?php
include 'db.php';

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $error = "Please fill in all fields.";
    } else {
        $stmt = mysqli_prepare($conn,
          "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

        if (mysqli_stmt_execute($stmt)) {
            $success = "Message sent!";
        } else {
            $error = "Something went wrong. Try again.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Aiden</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="brand">Carbound</div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="contact.php">Contact</a>
                <a href="admin/login.php">Admin</a>
            </div>
        </div>
    </div>

    <main>
        <h1>Contact Aiden</h1>

<?php if ($success): ?><p class="success"><?php echo $success; ?></p><?php endif; ?>
<?php if ($error): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>

<form method="post" action="contact.php">
  <label>Name:<br><input type="text" name="name"></label><br>
  <label>Email:<br><input type="email" name="email"></label><br>
  <label>Message:<br><textarea name="message"></textarea></label><br>
  <button type="submit">Send</button>
</form>

<nav>
  <a href="index.php">Back to Home</a>
</nav>
 <main>
</body>
</html>
