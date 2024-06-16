<?php
// Ensure the db connection and other necessary includes are in place
require_once '../db/dbConnection.php';

if (isset($_GET['query'])) {
    // Sanitize and prepare the search query
    $search = htmlspecialchars($_GET['query']);
    
    // Perform a search query on articles that match the search query
    $conn = DBConn::getConn();
    $search_sql = "SELECT artikel_id, ueberschrift, artikel FROM news WHERE ueberschrift LIKE '%$search%' OR artikel LIKE '%$search%' ORDER BY wichtigkeit DESC";
    $search_result = $conn->query($search_sql);

    // HTML Template for displaying search results
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
        <link rel="stylesheet" href="../styles/newsstyle.css">
    </head>
    <body>
        <header>
            <div class="container">
                <a style="color: white;" href="news.php"><h1>News Hub - Search Results</h1></a>
                <nav>
                    <ul>
                        <li>
                            <form action="search.php" method="GET">
                                <input type="text" name="query" value="<?php echo $search; ?>" placeholder="Suchen...">
                                <button type="submit">Suchen</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="content">
            <section class="search-results">
                <div class="container">
                    <h2>Suchergebnisse für "<?php echo $search; ?>"</h2>
                    <?php
                    if ($search_result->num_rows > 0) {
                        while ($row = $search_result->fetch_assoc()) {
                            echo '<div class="article">';
                            echo '<h3>' . htmlspecialchars($row['ueberschrift']) . '</h3>';
                            echo '<p>' . substr(htmlspecialchars($row['artikel']), 0, 200) . '...</p>';
                            echo '<a href="readarticle.php?artikel_id=' . $row['artikel_id'] . '">Read more</a>'; // Corrected parameter
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Keine Artikel gefunden.</p>';
                    }
                    ?>
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
    // Close the database connection
    DBConn::closeConn();
    exit; // Ensure that no further HTML is output after this point
}
?>
