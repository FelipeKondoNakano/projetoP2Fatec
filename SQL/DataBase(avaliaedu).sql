create DATABASE IF NOT EXISTS avaliaedu;
USE avaliaedu;

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

#TABELA DE AVALIZAÇÃO DAS INSTITUIÇÕES, CURSOS E MATERIAS
CREATE TABLE IF NOT EXISTS avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    instituicao_id INT DEFAULT NULL,
    curso_id INT DEFAULT NULL,
    materia_id INT DEFAULT NULL,
    comentario TEXT,
    avaliacao INT CHECK (avaliacao BETWEEN 0 AND 5),
    data DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (instituicao_id) REFERENCES instituicoes(id),
    FOREIGN KEY (curso_id) REFERENCES cursos(id),
    FOREIGN KEY (materia_id) REFERENCES materias(id),
    CONSTRAINT check_single_foreign_key CHECK (
        (instituicao_id IS NOT NULL AND curso_id IS NULL AND materia_id IS NULL) OR
        (instituicao_id IS NULL AND curso_id IS NOT NULL AND materia_id IS NULL) OR
        (instituicao_id IS NULL AND curso_id IS NULL AND materia_id IS NOT NULL)
    )
);

#Observação: Apenas a tabela de usuários possui uma primary-key, pois nas outras tabelas ocorrerá uma violação de chave primária;