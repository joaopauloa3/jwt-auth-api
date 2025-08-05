<?php
include("../../../config.php");
require_once ("../../../vendor/autoload.php");

use Firebase\JWT\JWT;
header('Content-Type: application/json');
$id_store = $_POST['id_store'];
$secretKey = 'secret_key123';
$payload = [
    'iat' => time(), 
    'exp' => time() + (60 * 60),
    'sub' => "search_products",
    'data' => [
        $id_store
    ]
];

try {
    $jwt = JWT::encode($payload, $secretKey, 'HS256');
    $data = [
        "success" => true,
        "token" => $jwt
    ];

    die(json_encode($data));


} catch (Exception $e) {
    echo "Erro ao gerar o token: " . $e->getMessage();
    exit;
}

?>