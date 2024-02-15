<?php
require_once './controllers/UsersController.php';

$controller = new UserController();
var_dump($_SERVER["REQUEST_METHOD"]);
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $response = $controller->createUser($data['nombre'], $data['edad'], $data['correo'], $data['password']);
    print_r($response);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = isset($_GET['id']) ? $_GET['id'] : null;

    $response = $controller->getUser($user_id);
    print_r($response);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    $response = $controller->updateUser($data['id'], $data['nombre'], $data['edad'], $data['correo']);
    print_r($response);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $user_id = isset($_GET['id']) ? $_GET['id'] : null;
    
    $response = $controller->deleteUser($user_id);
    print_r($response);
} else {
    echo json_encode(['error' => 'Método no permitido']);
}
?>