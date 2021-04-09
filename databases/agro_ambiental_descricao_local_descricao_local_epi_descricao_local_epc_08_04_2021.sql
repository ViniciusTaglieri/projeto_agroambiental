-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Abr-2021 às 02:12
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agro_ambiental`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao_epc_local`
--

CREATE TABLE `descricao_epc_local` (
  `id` int(4) NOT NULL,
  `id_titulo_epc` int(4) NOT NULL,
  `descricao` text NOT NULL,
  `destaque` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao_epi_local`
--

CREATE TABLE `descricao_epi_local` (
  `id` int(4) NOT NULL,
  `id_titulo_epi` int(4) NOT NULL,
  `descricao` text NOT NULL,
  `destaque` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao_local`
--

CREATE TABLE `descricao_local` (
  `id` int(4) NOT NULL,
  `id_titulo` int(3) NOT NULL,
  `descricao` text NOT NULL,
  `destaque` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `descricao_epc_local`
--
ALTER TABLE `descricao_epc_local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `descricao_epi_local`
--
ALTER TABLE `descricao_epi_local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `descricao_local`
--
ALTER TABLE `descricao_local`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `descricao_epc_local`
--
ALTER TABLE `descricao_epc_local`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `descricao_epi_local`
--
ALTER TABLE `descricao_epi_local`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `descricao_local`
--
ALTER TABLE `descricao_local`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
