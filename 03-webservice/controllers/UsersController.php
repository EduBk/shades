<?php

require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function createUser($nombre, $correo, $password, $edad) {
        $result = $this->userModel->createUser($nombre, $correo, $password, $edad);
        return json_encode($result, JSON_PRETTY_PRINT);
    }

    public function getUser($user_id) {
            $result = $this->userModel->getUser($user_id);
            return json_encode($result, JSON_PRETTY_PRINT);
    }

    public function updateUser($user_id, $nombre, $edad, $correo) {
        $result = $this->userModel->updateUser($user_id, $nombre, $edad, $correo);
        return json_encode($result, JSON_PRETTY_PRINT);
    }

    public function deleteUser($user_id) {
        $result = $this->userModel->deleteUser($user_id);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
}

?>