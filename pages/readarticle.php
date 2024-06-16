<?php
require_once '../db/dbConnection.php';

// Verbindung zur Datenbank herstellen
$conn = DBConn::getConn();

// Artikel-Daten anhand der ID aus der URL abrufen
if (isset($_GET['artikel_id'])) {
    $article_id = $_GET['artikel_id'];
    $sql = "SELECT ueberschrift, artikel FROM news WHERE artikel_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $article_title = htmlspecialchars($row['ueberschrift']);
        $article_content = htmlspecialchars($row['artikel']);
        // Bildpfad basierend auf der Artikel-ID
        $article_image = '../public/headlines/' . $article_id . '.jpg'; // Korrekter Pfad mit Slash am Ende
    } else {
        // Fallback oder Fehlerbehandlung, falls Artikel nicht gefunden wurde
        $article_title = 'Artikel nicht gefunden';
        $article_content = 'Der angeforderte Artikel konnte nicht gefunden werden.';
        $article_image = ''; // Leeres Bild oder Default-Bild anzeigen
    }
} else {
    // Fehlerbehandlung, falls keine Artikel-ID übergeben wurde
    $article_title = 'Fehler';
    $article_content = 'Es wurde keine Artikel-ID übergeben.';
    $article_image = ''; // Leeres Bild oder Default-Bild anzeigen
}

// HTML-Template für readarticle.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article_title; ?></title>
    <link rel="stylesheet" href="../styles/newsstyle.css">
    <link rel="stylesheet" href="../styles/newstyles.css"> <!-- Neues CSS für den Zurück-Button -->
</head>
<body>
    <header>
        <div class="container">
            <h1>News Hub</h1>

        </div>
    </header>

    <div class="content">
        <section class="article-content">
            <div class="container">
                <h2><?php echo $article_title; ?></h2>
                <?php if (!empty($article_image) && file_exists($article_image)): ?>
                    <img src="<?php echo $article_image; ?>" alt="Article Image">
                <?php endif; ?>
                <p><?php echo $article_content; ?></p>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 News Hub. All rights reserved.</p>
        </div>
    </footer>

    <!-- Zurück-Button über dem Footer -->
    <a href="#" onclick="history.back();" class="back-button">&larr; Zurück</a>

</body>
</html>

<?php
// Verbindung zur Datenbank schließen, wenn sie nicht mehr benötigt wird
DBConn::closeConn();
?>
