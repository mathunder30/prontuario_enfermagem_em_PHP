<?php
//Neste arquivo, os dados do paciente preenchidos são exibidos na tela, recuperando-os da sessão.

// Inicia a sessão, permitindo o uso de variáveis de sessão
session_start();

// Inclui o arquivo que estabelece a conexão com o banco de dados
include 'conexao.php';

// Salvar dados do paciente
// Verifica se o formulário foi submetido (se o botão de submit foi clicado)
// Executa o código se o método for POST, ou seja, se o formulário foi enviado
if($_SERVER['REQUEST_METHOD'] == "POST"){

    // Coleta os dados enviados pelo formulário e armazena nas variáveis
    $nome = $_POST['nome'];
    $data_de_nascimento = $_POST['data_de_nascimento'];
    $idade = $_POST['idade'];
    $genero = $_POST['genero'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];


    // Prepara a instrução SQL para inserir os dados na tabela 'dados_pacientes'.
    $sql = "INSERT INTO dados_pacientes (nome, data_de_nascimento, idade, genero, cpf, telefone, endereco) VALUES ('$nome', '$data_de_nascimento', '$idade', '$genero', '$cpf', '$telefone', '$endereco')";


    // Executa a consulta SQL e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Paciente salvo com sucesso!";
        header("Location: exibir_dados.php"); // Redireciona para a página de exibição
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao salvar o paciente: " . $conn->error;
        header("Location: index.php"); // Redireciona para o formulário
        exit();
    }
}

// Fecha a conexão
$conn->close();

?>