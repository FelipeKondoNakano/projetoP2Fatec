CREATE DATABASE IF NOT EXISTS avaliaedu;
USE avaliaedu;

-- CRIANDO TABELA DE INSTITUIÇÕES
CREATE TABLE IF NOT EXISTS instituicoes (
    pk_instituicao VARCHAR(100) NOT NULL,
    cidade VARCHAR(150) NOT NULL,
    estado VARCHAR(150) NOT NULL,
    CONSTRAINT pk_instituicao PRIMARY KEY(pk_instituicao)
);

-- CRIANDO TABELA DE CURSOS
CREATE TABLE IF NOT EXISTS cursos (
    pk_curso VARCHAR(100) NOT NULL,
    fk_instituicao VARCHAR(100) NOT NULL,
    CONSTRAINT pk_curso PRIMARY KEY(pk_curso),
    CONSTRAINT fk_instituicao FOREIGN KEY(fk_instituicao) REFERENCES instituicoes(pk_instituicao)
);

-- CRIANDO TABELA DE MATÉRIAS
CREATE TABLE IF NOT EXISTS materias (
    pk_materia VARCHAR(100) NOT NULL,
    periodo VARCHAR(100) NOT NULL,
    fk_curso VARCHAR(100) NOT NULL,
    CONSTRAINT pk_materia PRIMARY KEY(pk_materia),
    CONSTRAINT fk_curso FOREIGN KEY(fk_curso) REFERENCES cursos(pk_curso)
);

-- CRIANDO TABELA DE USUÁRIOS
CREATE TABLE IF NOT EXISTS usuarios (
    nome VARCHAR(100) NOT NULL,
    id VARCHAR(10) NOT NULL,
    email VARCHAR(200) NOT NULL,
    pk_Ra VARCHAR(15) NOT NULL,
    fk_instituicao VARCHAR(100) NOT NULL, 
    fk_curso VARCHAR(100) NOT NULL, 
    periodo VARCHAR(50) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    CONSTRAINT pk_Ra PRIMARY KEY(pk_Ra),
    CONSTRAINT instituicao_fk FOREIGN KEY(fk_instituicao) REFERENCES instituicoes(pk_instituicao),
    CONSTRAINT curso_fk FOREIGN KEY(fk_curso) REFERENCES cursos(pk_curso)
);

-- CRIANDO TABELA DE AVALIAÇÕES
CREATE TABLE IF NOT EXISTS avaliacoes (
    pk_id_avaliacao INT AUTO_INCREMENT, -- Chave primária para identificar avaliações
    texto VARCHAR(1000) NOT NULL,
    avaliacao INT NOT NULL CHECK(avaliacao >= 1 AND avaliacao <= 5), -- Avaliações de 1 a 5
    fk_instituicao VARCHAR(100) NOT NULL,
    fk_materia VARCHAR(100) NOT NULL,
    fk_curso VARCHAR(100) NOT NULL,
    PRIMARY KEY (pk_id_avaliacao), -- Definindo chave primária
    CONSTRAINT fk_avaliacao_instituicao FOREIGN KEY (fk_instituicao) REFERENCES instituicoes(pk_instituicao) ON DELETE CASCADE,
    CONSTRAINT fk_avaliacao_materia FOREIGN KEY (fk_materia) REFERENCES materias(pk_materia) ON DELETE CASCADE,
    CONSTRAINT fk_avaliacao_curso FOREIGN KEY (fk_curso) REFERENCES cursos(pk_curso) ON DELETE CASCADE
);

<<<<<<< HEAD
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

=======
>>>>>>> 2ece80220898c14d7292d31452d72309bd3c7702
#Observação: Apenas a tabela de usuários possui uma primary-key, pois nas outras tabelas ocorrerá uma violação de chave primária;