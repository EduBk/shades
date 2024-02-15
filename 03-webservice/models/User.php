<?php
require_once 'C:\xampp\htdocs\shades\03-webservice\models\User.php';

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "shades");
        if ($this->conn->connect_error) {
            die("Error al conectar: " . $this->conn->connect_error);
        }
    }

    public function createUser($nombre, $edad, $correo, $password) {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, edad, correo, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $edad, $correo, $password);
        
        if ($stmt->execute()) {
            $user_id = $stmt->insert_id;
            $stmt->close();
            return ['id' => $user_id, 'mensaje' => 'Usuario creado con éxito'];
        } else {
            return ['error' => 'Error al crear el usuario'];
        }
    }

    public function getUser($user_id) {
        $stmt = $this->conn->prepare("SELECT id, nombre, correo, password FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return ['error' => 'Usuario no encontrado'];
        }
    }

    public function updateUser($user_id, $nombre, $edad, $correo) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET nombre = ?, edad = ?, correo = ? WHERE id = ?");
        $stmt->bind_param("sisi", $nombre, $edad, $correo, $user_id);

        if ($stmt->execute()) {
            $stmt->close();
            return ['mensaje' => 'Usuario ' . $user_id . ' actualizado con éxito'];
        } else {
            return ['error' => 'Error al actualizar el usuario ' . $user_id];
        }
    }

    public function deleteUser($user_id) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $stmt->close();
            return ['mensaje' => 'Usuario ' . $user_id . ' eliminado con éxito'];
        } else {
            return ['error' => 'Error al eliminar el usuario' . $user_id];
        }
    }
}

?>