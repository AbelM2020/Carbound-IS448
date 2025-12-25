<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$sql = "SELECT * FROM cars ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carbound - Aiden Torque</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- NAVBAR (Home + Admin ONLY) -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="logo">Carbound</div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="admin/login.php">Admin</a>
            </div>
        </div>
    </div>

    <!-- HERO SECTION -->
    <header class="hero">
        <div class="hero-image">
            <img src="images/hero.jpg" alt="Aiden standing by a tuned Skyline">
        </div>

        <div class="hero-text">
            <h1>Aiden Torque – The Rogue Mechanic</h1>
            <p>
                Aiden grew up in a small industrial town where the sound of engines
                was the soundtrack of everyday life. Now he’s known as “The Rogue Mechanic,”
                tuning and restoring cars across the underground racing scene.
            </p>

            <a href="contact.php" class="btn">Contact Aiden</a>
        </div>
    </header>

    <!-- CAR CATALOG -->
    <main>
        <section class="car-section">
            <h2>Car Catalog</h2>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($car = mysqli_fetch_assoc($result)): ?>

                    <div class="car-card">

                        <div class="car-info">
                            <h3><?php echo htmlspecialchars($car['title']); ?></h3>
                            <p>
                                <?php echo htmlspecialchars($car['make']); ?>
                                <?php echo htmlspecialchars($car['model']); ?>
                                (<?php echo htmlspecialchars($car['year']); ?>)
                            </p>

                            <p><?php echo nl2br(htmlspecialchars($car['description'])); ?></p>
                        </div>

                        <?php if (!empty($car['image'])): ?>
                            <div class="car-photo">
                                <img
                                    src="images/<?php echo htmlspecialchars($car['image']); ?>"
                                    alt="<?php echo htmlspecialchars($car['title']); ?>"
                                    class="car-image"
                                >
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>
                <p>No cars added yet.</p>
            <?php endif; ?>
        </section>
    </main>

</body>
</html>
