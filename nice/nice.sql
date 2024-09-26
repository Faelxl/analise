-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/09/2024 às 16:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nice`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` char(80) NOT NULL,
  `cargo` char(80) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `imagem` varchar(225) NOT NULL,
  `nome_servico` char(80) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuários`
--

CREATE TABLE `usuários` (
  `id` int(11) NOT NULL,
  `nome` char(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices de tabela `usuários`
--
ALTER TABLE `usuários`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuários`
--
ALTER TABLE `usuários`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
