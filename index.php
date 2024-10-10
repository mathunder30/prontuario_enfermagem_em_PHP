<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Paciente</title>
   
    
</head>
<body>
    <section class="container">
        <div>
        <h2>Dados do Paciente</h2>
        <form action="salvar_dados.php" method="POST"  id="editarFormulario">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="data_de_nascimento">Data de Nascimento</label>
            <input type="date" id="data_de_nascimento" name="data_de_nascimento" required>

            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" required>

            <label for="genero">Gênero</label>
            <input type="text" id="genero" name="genero" required>

            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf"  required>

            <label for="telefone">Telefone de Contato</label>
            <input type="text" id="telefone" name="telefone"  required>

            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco"  required>
            
            <button type="submit">Salvar</button>
        </form> 
        </div>

        <div class="click">
            
            <button><a href="exibir_dados.php" id="verDados">Ver Dados enviados</a></button> 
        </div>


    </section>

 
</body>
</html>