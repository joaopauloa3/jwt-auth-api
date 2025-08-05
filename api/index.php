<?php

header('Content-Type: application/json');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','master_products');
class MySql {
        private static $pdo;


        public static function connect() {
            if (self::$pdo == null) {
                try {
                    self::$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Erro na conexão: " . $e->getMessage();
                    echo '<h2>Erro ao conectar com o db</h2>';
                }
            }
            return self::$pdo;
        }
};

$data = [];


require_once __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = 'secret_key123';

try {

    $headers = getallheaders();
    if (!isset($headers['Authorization'])) {
        throw new Exception("Token de acesso não fornecido");
    }

    $token = $headers["Authorization"];
    list($jwt) = sscanf($token, "Bearer %s");
    
    if(!$jwt){
        throw new Exception("Formato do token é inválido");
    }

    $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));



} catch (Exception $e){
    http_response_code(401);
    $data = ['success' => false, 'message' => 'Acesso negado: ' . $e->getMessage()];
    die(json_encode($data));
}


$eanSearch = $_GET['ean'] ?? null;

if (!$eanSearch) {
    http_response_code(400);
    $data = ['success' => false, 'message' => 'Campo de busca em branco.'];
    die(json_encode($data));
}

try {
    $sql = MySql::connect()->prepare("SELECT * FROM `products` WHERE `ean` = ? OR `sku` = ?");
    $sql->execute([$eanSearch, $eanSearch]);

    if ($sql->rowCount() == 1) {
        $product = $sql->fetch(PDO::FETCH_ASSOC);
        $data = ['success' => true, 'product' => $product];
        echo json_encode($data);
    } else {
        http_response_code(404);
        $data = ['success' => false, 'message' => 'Produto não encontrado.'];
        echo json_encode($data);
    }

} catch (PDOException $e) {
    http_response_code(500); 
        $data = ['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()];
    echo json_encode($data);
}

?>
