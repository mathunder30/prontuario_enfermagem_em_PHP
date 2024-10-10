<?php
session_start();
include "conexao.php";

// Consulta todos os pacientes
$sql = "SELECT * FROM dados_pacientes";
$result = $conn->query($sql);

// Verifica se o paciente ID foi passado via sessão
if (!isset($_SESSION['paciente_id'])) {
    $_SESSION['mensagem'] = "Nenhum paciente encontrado!";
    header("Location: index.php");
    exit();
}

// Busca o ID do paciente na sessão
$paciente_id = $_SESSION['paciente_id'];

// Consulta SQL para pegar os dados do paciente
$sql = "SELECT * FROM pacientes WHERE id = '$paciente_id'";
$result = mysqli_query($conn, $sql);

// Verifica se há resultados
if (mysqli_num_rows($result) > 0) {
    // Converte o resultado em um array associativo
    $paciente = mysqli_fetch_assoc($result);
} else {
    $_SESSION['mensagem'] = "Paciente não encontrado!";
    header("Location: index.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Paciente</title>
</head>
<body>
    <h1>Dados do Paciente</h1>
    
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($paciente['nome']); ?></p>
    <p><strong>Data de nascimento:</strong> <?php echo htmlspecialchars($paciente['data_de_nascimento']); ?></p>
    <p><strong>Idade:</strong> <?php echo htmlspecialchars($paciente['idade']); ?></p>
    <p><strong>Gênero:</strong> <?php echo htmlspecialchars($paciente['genero']); ?></p>
    <p><strong>CPF:</strong> <?php echo htmlspecialchars($paciente['cpf']); ?></p>
    <p><strong>Telefone:</strong> <?php echo htmlspecialchars($paciente['telefone']); ?></p>
    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($paciente['endereco']); ?></p>
    <a href="index.php">Voltar ao início</a>
</body>
</html>
