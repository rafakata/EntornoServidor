<?php
require_once __DIR__ . '/../config/Database.php';

class Jugador {
    public static function listarTodos() {
        $pdo = Database::conectar();
        $stmt = $pdo->query('SELECT * FROM plantilla ORDER BY dorsal');
        return $stmt->fetchAll();
    }

    public static function obtenerPorId($id) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare('SELECT * FROM plantilla WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function crear($nombre, $dorsal, $posicion, $foto = 'sin_foto.png') {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare('INSERT INTO plantilla (nombre, dorsal, posicion, foto) VALUES (:nombre, :dorsal, :posicion, :foto)');
        return $stmt->execute([
            ':nombre' => $nombre,
            ':dorsal' => $dorsal,
            ':posicion' => $posicion,
            ':foto' => $foto
        ]);
    }

    public static function actualizar($id, $nombre, $dorsal, $posicion, $foto, $goles) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare('UPDATE plantilla SET nombre=:nombre, dorsal=:dorsal, posicion=:posicion, foto=:foto, goles=:goles WHERE id=:id');
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':dorsal' => $dorsal,
            ':posicion' => $posicion,
            ':foto' => $foto,
            ':goles' => $goles
        ]);
    }

    public static function eliminar($id) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare('DELETE FROM plantilla WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>