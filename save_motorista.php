<?php
// Configurações do banco de dados
$host = 'localhost'; // Verifique o host do MySQL na Hostinger
$dbname = 'u482109239_motoristas'; // Nome do banco de dados
$username = 'u482109239_root'; // Substitua pelo usuário correto fornecido na Hostinger
$password = 'Fupii062@'; // Senha do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Coleta de dados do formulário
    $nome = $_POST['nome'];
    $whatsapp = $_POST['whatsapp'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $experiencia = $_POST['experiencia'];
    $proprio = $_POST['proprio'];

    // Inserção no banco de dados
    $query = "INSERT INTO motoristas (nome, whatsapp, modelo, ano, experiencia, proprio) VALUES (:nome, :whatsapp, :modelo, :ano, :experiencia, :proprio)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nome' => $nome,
        ':whatsapp' => $whatsapp,
        ':modelo' => $modelo,
        ':ano' => $ano,
        ':experiencia' => $experiencia,
        ':proprio' => $proprio
    ]);

    echo "Cadastro realizado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao salvar os dados: " . $e->getMessage();
}
?>