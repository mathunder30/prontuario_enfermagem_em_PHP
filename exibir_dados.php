<?php
session_start();
include "conexao.php"; // Certifique-se de que esta conexão está funcionando corretamente

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos Pacientes</title>
</head>
<body>
<h2>Dados do Paciente</h2>
<div id="dadosAluno">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Idade</th>
            <th>Gênero</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>
    </div>
    <form method="GET" action="exibir_dados.php">
        <input type="text" name="nome" placeholder="Digite o nome do paciente">
        <button type="submit">Buscar</button>
    </form>

<?php
// Verifica se o parâmetro "nome" foi enviado
if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];

    // Consulta SQL para buscar o paciente cujo nome se parece com o digitado
    $sql = "SELECT * FROM dados_pacientes WHERE nome LIKE ?";
    $stmt = $conn->prepare($sql);

    // Adiciona os percentuais para a busca parcial
    $nome_param = "%" . $nome . "%";

    // Vincula o parâmetro de busca
    $stmt->bind_param("s", $nome_param);

    // Executa a consulta
    $stmt->execute();

    // Obtém os resultados
    $resultado = $stmt->get_result();

    // Verifica se existem resultados
    if ($resultado->num_rows > 0) {
        // Saída dos dados de cada linha
        while($row = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["data_de_nascimento"] . "</td>
                    <td>" . $row["idade"] . "</td>
                    <td>" . $row["genero"] . "</td>
                    <td>" . $row["cpf"] . "</td>
                    <td>" . $row["telefone"] . "</td>
                    <td>" . $row["endereco"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Nenhum dado encontrado</td></tr>";
    }
}
?>
</table>

<!-- Link para retornar à página inicial ou para salvar novos dados -->
<a href="index.php">Adicionar Novo Paciente</a>

</body>
</html>
