<?php
class DBConn {
    private static $conn;

    public static function getConn() {
        if (self::$conn === null) {
            $host = 'localhost';
            $user = 'root';
            $password = ''; // Standardmäßig ist das Passwort leer bei XAMPP
            $database = 'frostklippensinseln_gov';

            self::$conn = new mysqli($host, $user, $password, $database);

            if (self::$conn->connect_error) {
                die("Verbindung fehlgeschlagen: " . self::$conn->connect_error);
            }
        }

        return self::$conn;
    }

    public static function closeConn() {
        if (self::$conn !== null) {
            self::$conn->close();
            self::$conn = null;
        }
    }
}
?>
