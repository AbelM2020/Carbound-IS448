<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
include '../db.php';

$result = mysqli_query($conn, "SELECT * FROM cars ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">

  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Admin Dashboard</h1>

<a href="add_car.php">Add New Car</a> | 
<a href="../index.php">View Public Site</a>

<table>
  <tr>
    <th>ID</th><th>Title</th><th>Make</th><th>Model</th><th>Year</th><th>Actions</th>
  </tr>
  <?php while ($car = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?php echo $car['id']; ?></td>
    <td><?php echo htmlspecialchars($car['title']); ?></td>
    <td><?php echo htmlspecialchars($car['make']); ?></td>
    <td><?php echo htmlspecialchars($car['model']); ?></td>
    <td><?php echo htmlspecialchars($car['year']); ?></td>
    <td>
      <a href="delete_car.php?id=<?php echo $car['id']; ?>"
         onclick="return confirm('Delete this car?');">Delete</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
