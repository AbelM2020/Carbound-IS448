<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
include '../db.php';

$success = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $make = trim($_POST['make'] ?? '');
    $model = trim($_POST['model'] ?? '');
    $year = intval($_POST['year'] ?? 0);
    $description = trim($_POST['description'] ?? '');

    $stmt = mysqli_prepare($conn,
        "INSERT INTO cars (title, make, model, year, description) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssds", $title, $make, $model, $year, $description);
    if (mysqli_stmt_execute($stmt)) {
        $success = "Car added!";
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Car</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Add New Car</h1>

<?php if ($success): ?><p class="success"><?php echo $success; ?></p><?php endif; ?>

<form method="post">
  <label>Title:<br><input type="text" name="title"></label><br>
  <label>Make:<br><input type="text" name="make"></label><br>
  <label>Model:<br><input type="text" name="model"></label><br>
  <label>Year:<br><input type="number" name="year"></label><br>
  <label>Description:<br><textarea name="description"></textarea></label><br>
  <button type="submit">Add Car</button>
</form>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
