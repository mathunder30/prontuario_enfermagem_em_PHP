create DATABASE prontuario_medico;

USE prontuario_medico;

CREATE TABLE dados_pacientes (
id int auto_increment primary key,
nome VARCHAR (100),
data_de_nascimento timestamp default current_timestamp,
idade int,
genero varchar(10),
cpf varchar(11),
telefone int,
endereco varchar(100)
);



