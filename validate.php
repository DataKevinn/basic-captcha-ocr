<?php
header("Content-Type: application/json");

// Configuração da sessão
if (version_compare(PHP_VERSION, '7.3.0', '>=')) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => $_SERVER['HTTP_HOST'],
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
} else {
    session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
}

session_start();
require "config.php";

// Captura os dados JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!is_array($data)) {
    echo json_encode(["success" => false, "message" => "Dados inválidos!"]);
    exit;
}

// Sanitização de entrada
$username = strtolower(trim($data["username"] ?? ""));
$password = trim($data["password"] ?? "");
$captcha = trim($data["captcha"] ?? "");

if (empty($username) || empty($password) || empty($captcha)) {
    echo json_encode(["success" => false, "message" => "Preencha todos os campos!"]);
    exit;
}

// Validação do CAPTCHA
if (strcasecmp($captcha, $_SESSION['captcha_code'] ?? '') !== 0) {
    echo json_encode(["success" => false, "message" => "CAPTCHA incorreto!"]);
    exit;
}

// Prepara consulta segura
$stmt = $pdo->prepare("SELECT id, username, password, cargo, expiracao FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Comparação sem criptografia
if ($user && !empty($user["password"]) && $password === $user["password"]) {
    // Verifica se a conta está expirada
    $dataAtual = date("Y-m-d");
    if (!empty($user["expiracao"]) && strtotime($user["expiracao"]) < strtotime($dataAtual)) {
        echo json_encode(["success" => false, "message" => "Usuário expirado!"]);
        exit;
    }

    // Define sessão
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["cargo"] = $user["cargo"];
    $_SESSION["expiracao"] = $user["expiracao"];

    echo json_encode(["success" => true, "message" => "Login realizado com sucesso!"]);
} else {
    echo json_encode(["success" => false, "message" => "Usuário ou senha inválidos!"]);
}

exit;
?>
