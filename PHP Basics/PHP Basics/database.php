<?php 
class Database {
    private static $pdo;

    public static function connect() {
        if (self::$pdo == null) {
            $config = require_once 'config.php';
            try {
                self::$pdo = new PDO($config['dsn'], $config['user'], $config['password'],
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false]);
            } catch(PDOException $e) {
                throw new Exception('Failed to connect to the database: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}