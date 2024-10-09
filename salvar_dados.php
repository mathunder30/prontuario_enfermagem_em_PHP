<?php
//Neste arquivo, os dados do paciente preenchidos são exibidos na tela, recuperando-os da sessão.

// Inicia a sessão, permitindo o uso de variáveis de sessão
session_start();

// Inclui o arquivo que estabelece a conexão com o banco de dados
include('conexao.php');

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
    if(mysqli_query($conn, $sql)){

        // Armazena uma mensagem de sucesso na sessão
        $_SESSION['mensagem'] = 'Paciente cadastrado com sucesso!';

        // Armazena os dados do paciente na sessão para uso posterior
        $_SESSION['dados_paciente'] = [
            'nome' => $nome,
            'data_de_nascimento' => $data_de_nascimento,
            'idade' => $idade,
            'genero' => $genero,
            'cpf' => $cpf,
            'telefone' => $telefone,
            'endereco' => $endereco 
        ];

        // Redireciona para a página onde os dados do paciente serão exibidos
        header('Location: exibir_paciente.php');
        exit(); // Encerra o script após o redirecionamento
    } else{
        // Se houver um erro na execução da consulta, armazena uma mensagem de erro
        $_SESSION['mensagem'] = 'Erro ao cadastrar o paciente: ' . mysqli_error($conn);

        // Redireciona de volta para a página do formulário
        header("Location: index.php");  
        exit();
    }

    mysqli_close($conn);  // Encerra o script após o redirecionamento
 

}

?>