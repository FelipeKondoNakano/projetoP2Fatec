create DATABASE IF NOT EXISTS avaliaedu;
USE avaliaedu;

-- CRIANDO TABELA DE USUÁRIOS
CREATE TABLE IF NOT EXISTS usuarios (
    nome VARCHAR(100) NOT NULL,
    id VARCHAR(10) NOT NULL,
    email VARCHAR(200) NOT NULL,
    pk_Ra VARCHAR(15) NOT NULL PRIMARY KEY,
    instituicao_id VARCHAR(100), -- FK para a tabela de instituições
    curso_id VARCHAR(100), -- FK para a tabela de cursos
    periodo VARCHAR(50) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    FOREIGN KEY (instituicao_id) REFERENCES instituicoes(nome),
    FOREIGN KEY (curso_id) REFERENCES cursos(curso)
);

-- CRIANDO TABELA DE INSTITUIÇÕES
CREATE TABLE IF NOT EXISTS instituicoes (
    nome VARCHAR(100) NOT NULL PRIMARY KEY,
    cidade VARCHAR(150) NOT NULL,
    estado VARCHAR(150) NOT NULL
);

-- CRIANDO TABELA DE MATÉRIAS
CREATE TABLE IF NOT EXISTS materias (
    materia VARCHAR(100) NOT NULL PRIMARY KEY,
    periodo VARCHAR(100) NOT NULL,
    curso_id VARCHAR(100) NOT NULL, -- FK para a tabela de cursos
    FOREIGN KEY (curso_id) REFERENCES cursos(curso)
);

-- CRIANDO TABELA DE CURSOS
CREATE TABLE IF NOT EXISTS cursos (
    curso VARCHAR(100) NOT NULL PRIMARY KEY
);

-- CRIANDO TABELA DE AVALIAÇÕES
CREATE TABLE IF NOT EXISTS avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id VARCHAR(15) NOT NULL, -- FK para a tabela de usuários
    tipo_entidade ENUM('instituicao', 'curso', 'materia') NOT NULL, -- Tipo da avaliação
    entidade_id VARCHAR(100) NOT NULL, -- Referência ao nome ou ID da entidade
    nota INT NOT NULL, -- Avaliação numérica (ex: 1 a 5)
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comentario TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(pk_Ra)
);

#TABELA DE AVALIZAÇÃO DAS INSTITUIÇÕES, CURSOS E MATERIAS
#CREATE TABLE avaliacoes (
#    id INT AUTO_INCREMENT PRIMARY KEY,
#    user_id INT NOT NULL,
#    instituicao_id INT NOT NULL,
#    rating TINYINT NOT NULL,
#    comentario TEXT NOT NULL,
#    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
#    UNIQUE(user_id, instituicao_id), -- Garante que o usuário avalie cada instituição apenas uma vez
#    FOREIGN KEY (user_id) REFERENCES usuarios(id),
#    FOREIGN KEY (instituicao_id) REFERENCES instituicoes(id)
#);

/*CREATE TABLE IF NOT EXISTS avaliacoes (
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
);*/

#Observação: Apenas a tabela de usuários possui uma primary-key, pois nas outras tabelas ocorrerá uma violação de chave primária;