<?php
// esse arquivo é muito essencial para conectar o php ao banco de dados MySQL.

//Ele será incluído nos outros arquivosw sempre que precisar de acesso ao banco.

$servername = "127.0.0.1";  // aqui ele esta definindo o nome do servidor no MySQL.
$username = "root"; // Aqui ta pedindo o usuário do banco de dados, geralmente é "root" mesmo.
$password = "aluno"; // Senha do Servidor 
$dbname = "prontuario_medico"; // nome do banco de dados que queremos conectar

// criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// A função `new mysqli` cria uma nova conexão com o banco de dados, usando os parâmetros definidos (servidor, usuário, senha e nome do banco)

// chegando a conexão
// O código verifica se houve um erro de conexão.
// Se houver, a função `die()` para a execução do script e exibe a mensagem de erro

if($conn -> connect_error){

    die("Conexão falhou: " . $conn -> connect_error);
}

?>