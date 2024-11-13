create DATABASE IF NOT EXISTS avaliaedu;
use avaliaedu;

#CRIANDO TABELA DE USUÁRIOS
CREATE TABLE IF NOT EXISTS usuarios(
	nome VARCHAR(100) NOT NULL,
	id VARCHAR(10) NOT NULL,
	email VARCHAR(200) NOT NULL,
	pk_Ra VARCHAR(15) NOT NULL PRIMARY KEY,
	instituicao VARCHAR(100) NOT NULL,
	curso VARCHAR(150) NOT NULL,
	periodo VARCHAR(50) NOT NULL,
	senha VARCHAR(150) NOT NULL
);

#CRIANDO TABELA DE INSTITUIÇÕES
CREATE TABLE IF NOT EXISTS instituicoes(
	nome VARCHAR(100) NOT NULL,
    cidade VARCHAR(150) NOT NULL,
    estado VARCHAR(150) NOT NULL,
    texto VARCHAR(500) NOT NULL,
    avaliacao INT NOT NULL
);

#CRIANDO TABELA DE MATERIAS
CREATE TABLE IF NOT EXISTS materias(
	materia VARCHAR(100) NOT NULL,
    periodo VARCHAR(100) NOT NULL,
    texto VARCHAR(500) NOT NULL,
    avaliacao INT NOT NULL
);

#CRIANDO TABELA DE CURSOS
CREATE TABLE IF NOT EXISTS cursos(
	curso VARCHAR(100) NOT NULL,
    texto VARCHAR(500) NOT NULL,
    avaliacao INT NOT NULL
);

#Observação: Apenas a tabela de usuários possui uma primary-key, pois nas outras tabelas ocorrerá uma violação de chave primária;