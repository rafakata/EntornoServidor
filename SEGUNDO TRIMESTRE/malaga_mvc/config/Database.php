<?php
require_once 'config.php';

class Database {
    private static $instance = null;

    private function __construct() {}

    public static function conectar() {
        global $db_config;
        if (self::$instance === null) {
            try {
                $dsn = $db_config['driver'] . ':host=' . $db_config['host'] . ';dbname=' . $db_config['dbname'] . ';charset=utf8mb4';
                self::$instance = new PDO($dsn, $db_config['user'], $db_config['pass']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                die('Error de Conexión: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }

    private function __clone() {}
    public function __wakeup() {}
}
?>