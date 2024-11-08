-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2024 às 14:25
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `avaliaedu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroaluno`
--

CREATE TABLE `cadastroaluno` (
  `RA` varchar(20) NOT NULL,
  `nome` text NOT NULL,
  `iD` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nomeInstituicao` varchar(150) NOT NULL,
  `nomeCurso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrocurso`
--

CREATE TABLE `cadastrocurso` (
  `nomeCurso` varchar(80) NOT NULL,
  `comentario` varchar(5000) NOT NULL,
  `avaliacao` varchar(4) NOT NULL,
  `nomeMateria` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroinstituicao`
--

CREATE TABLE `cadastroinstituicao` (
  `nomeInstituicao` varchar(100) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `comentario` varchar(5000) NOT NULL,
  `avaliacao` float NOT NULL,
  `nomeCurso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastromateria`
--

CREATE TABLE `cadastromateria` (
  `nomeMateria` varchar(80) NOT NULL,
  `comentario` varchar(5000) NOT NULL,
  `avaliacao` varchar(4) NOT NULL,
  `nomeCurso` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `email` varchar(80) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastroaluno`
--
ALTER TABLE `cadastroaluno`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `cadastrocurso`
--
ALTER TABLE `cadastrocurso`
  ADD PRIMARY KEY (`nomeCurso`);

--
-- Índices para tabela `cadastroinstituicao`
--
ALTER TABLE `cadastroinstituicao`
  ADD PRIMARY KEY (`nomeInstituicao`);

--
-- Índices para tabela `cadastromateria`
--
ALTER TABLE `cadastromateria`
  ADD PRIMARY KEY (`nomeMateria`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
