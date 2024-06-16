<?php
require_once '../db/dbConnection.php';

// Verbindung zur Datenbank herstellen
$conn = DBConn::getConn();

// Artikel aus der Datenbank abrufen (Beispiel: alle Artikel sortiert nach Wichtigkeit)
$sql = "SELECT artikel_id, ueberschrift, artikel FROM news ORDER BY wichtigkeit DESC";
$result = $conn->query($sql);

// HTML-Template beginnen
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Hub</title>
    <link rel="stylesheet" href="../styles/newsstyle.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>News Hub</h1>
            <nav>
                <ul>
                    <li><a href="news.php">Home</a></li>
                    <li><a href="#">Kategorien</a></li>
                    <li>
                    <form action="search.php" method="GET">
    <input type="text" name="query" placeholder="Suchen...">
    <button type="submit">Suchen</button>
</form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="content">
        <section class="featured">
            <div class="container">
                <h2>Featured News</h2>
                <!-- Artikel aus der Datenbank einfügen -->
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="article">';
                        echo '<h3>' . htmlspecialchars($row['ueberschrift']) . '</h3>';
                        // Vorschau des Artikels mit Bild aus ../public/artikel_id.png
                        $image_path = '../public/headlines/' . $row['artikel_id'] . '.jpg'; // Corrected path
                        if (file_exists($image_path)) {
                            echo '<div class="article-preview">';
                            echo '<img src="' . $image_path . '" alt="Article Image">';
                            echo '<p>' . substr(htmlspecialchars($row['artikel']), 0, 200) . '...</p>';
                            echo '<a href="readarticle.php?artikel_id=' . $row['artikel_id'] . '">Read more</a>'; // Corrected parameter
                            echo '</div>';
                        } else {
                            // Wenn Bild nicht gefunden wurde, ohne Bild anzeigen
                            echo '<p>' . substr(htmlspecialchars($row['artikel']), 0, 200) . '...</p>';
                            echo '<a href="readarticle.php?artikel_id=' . $row['artikel_id'] . '">Read more</a>'; // Corrected parameter
                        }
                        echo '</div>';
                    }
                } else {
                    echo '<p>Keine Artikel gefunden.</p>';
                }
                ?>
            </div>
        </section>

        <section class="categories">
            <div class="container">
                <h2>Categories</h2>
                <ul>
                    <li><a href="#">Welt</a></li>
                    <li><a href="#">Politik</a></li>
                    <li><a href="#">Technologie</a></li>
                    <li><a href="#">Sport</a></li>
                    <!-- Weitere Kategorien -->
                </ul>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 News Hub. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

<?php
// Verbindung zur Datenbank schließen, wenn sie nicht mehr benötigt wird
DBConn::closeConn();
?>
