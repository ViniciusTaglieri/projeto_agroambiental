-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Abr-2021 às 03:49
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
-- Estrutura da tabela `agentes_ambientais`
--

CREATE TABLE `agentes_ambientais` (
  `id` int(3) NOT NULL,
  `agente` varchar(60) NOT NULL,
  `norma` varchar(225) NOT NULL,
  `metodologia` varchar(255) NOT NULL,
  `equipamento` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexo`
--

CREATE TABLE `anexo` (
  `id` int(3) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `id_ghe` int(5) NOT NULL,
  `id_funcao` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_empresas`
--

CREATE TABLE `cad_empresas` (
  `cnpj` bigint(14) NOT NULL,
  `razao_social` varchar(255) DEFAULT NULL,
  `fantasia` varchar(70) DEFAULT NULL,
  `insc_estadual` varchar(30) DEFAULT NULL,
  `insc_municip` bigint(14) DEFAULT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `distrito` varchar(100) NOT NULL,
  `secao` varchar(3) NOT NULL,
  `grupo` varchar(10) NOT NULL,
  `economica` varchar(180) NOT NULL,
  `numero` mediumint(6) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  `uf` tinyint(2) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `telefone` bigint(13) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `cnae` int(7) DEFAULT NULL,
  `id_grau_risco` tinyint(2) NOT NULL,
  `trab_admin` mediumint(7) DEFAULT NULL,
  `trab_operac` mediumint(7) DEFAULT NULL,
  `carga_horaria_admin` tinyint(2) DEFAULT NULL,
  `carga_horaria_operac` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carga_horaria`
--

CREATE TABLE `carga_horaria` (
  `id` tinyint(2) NOT NULL,
  `horas` tinyint(2) DEFAULT NULL,
  `entrada1` varchar(50) NOT NULL,
  `saida1` varchar(50) NOT NULL,
  `entrada2` varchar(50) NOT NULL,
  `saida2` varchar(50) NOT NULL,
  `id_tipo_trabalho` tinyint(2) DEFAULT NULL,
  `jornada` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categ_risco_indicea`
--

CREATE TABLE `categ_risco_indicea` (
  `id` tinyint(2) NOT NULL,
  `condicao` varchar(30) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `pontos` tinyint(2) DEFAULT NULL,
  `recomendacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cbo`
--

CREATE TABLE `cbo` (
  `id` int(6) NOT NULL,
  `nome` varchar(136) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cnae`
--

CREATE TABLE `cnae` (
  `id_cnae` int(16) NOT NULL,
  `codigo_cnae` varchar(16) NOT NULL,
  `desc_cnae` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao_epc_local`
--

CREATE TABLE `descricao_epc_local` (
  `id` int(4) NOT NULL,
  `id_titulo_epc` int(4) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao_epi_local`
--

CREATE TABLE `descricao_epi_local` (
  `id` int(4) NOT NULL,
  `id_titulo_epi` int(4) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao_local`
--

CREATE TABLE `descricao_local` (
  `id` int(4) NOT NULL,
  `id_titulo` int(3) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `id` int(3) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `emailEnvia` varchar(60) NOT NULL,
  `senhaEnvia` varchar(40) NOT NULL,
  `emailRecebe` varchar(60) NOT NULL,
  `nomeRecebe` varchar(60) NOT NULL,
  `smtp` varchar(60) NOT NULL,
  `portaSmtp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_contratada`
--

CREATE TABLE `empresa_contratada` (
  `id` int(3) NOT NULL,
  `razao_social` varchar(60) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `fantasia` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `complemento` varchar(60) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `municipio` int(11) NOT NULL,
  `uf` int(11) NOT NULL,
  `cep` int(9) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `epc`
--

CREATE TABLE `epc` (
  `id` int(3) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `epi`
--

CREATE TABLE `epi` (
  `id` int(3) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `id` int(3) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `descricao` text NOT NULL,
  `id_cbo` int(6) NOT NULL,
  `id_epi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao_ghe`
--

CREATE TABLE `funcao_ghe` (
  `id` int(3) NOT NULL,
  `id_ghe` int(5) NOT NULL,
  `id_funcao` int(3) NOT NULL,
  `qt` varchar(2) NOT NULL,
  `resp_cargo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ghe`
--

CREATE TABLE `ghe` (
  `id` int(5) NOT NULL,
  `id_empresa` bigint(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `setor` int(2) NOT NULL,
  `local` tinyint(2) NOT NULL,
  `carga_horaria` tinyint(2) NOT NULL,
  `desc_ambiente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventario_riscos`
--

CREATE TABLE `inventario_riscos` (
  `id` int(3) NOT NULL,
  `id_ghe` int(5) NOT NULL,
  `natureza` varchar(40) NOT NULL,
  `agente` varchar(60) DEFAULT NULL,
  `fonte_geradora` varchar(150) DEFAULT NULL,
  `propagacao` varchar(60) DEFAULT NULL,
  `danos_saude` varchar(60) DEFAULT NULL,
  `avaliacao` varchar(60) DEFAULT NULL,
  `metodologia` varchar(40) DEFAULT NULL,
  `intensidade` varchar(60) DEFAULT NULL,
  `tolerancia` varchar(10) DEFAULT NULL,
  `anexo` varchar(40) NOT NULL,
  `risco` varchar(2) NOT NULL,
  `protecao` varchar(2) NOT NULL,
  `tempo` varchar(2) NOT NULL,
  `grau_risco` varchar(40) NOT NULL,
  `codigo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id` int(2) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medidas_controle`
--

CREATE TABLE `medidas_controle` (
  `id` int(4) NOT NULL,
  `id_ghe` int(5) NOT NULL,
  `epc` text NOT NULL,
  `epi` text NOT NULL,
  `insalubridade` int(1) NOT NULL,
  `periculosidade` int(1) NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `meio_ambiental`
--

CREATE TABLE `meio_ambiental` (
  `id` int(3) NOT NULL,
  `documento` int(3) NOT NULL,
  `empresa` bigint(14) NOT NULL,
  `emissao` date NOT NULL,
  `vencimento` date NOT NULL,
  `lembrete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ppra`
--

CREATE TABLE `ppra` (
  `id` int(4) NOT NULL,
  `controle` varchar(60) NOT NULL,
  `local` varchar(60) NOT NULL,
  `ghe` varchar(40) NOT NULL,
  `cbo` int(6) NOT NULL,
  `qt` int(2) NOT NULL,
  `id_funcao` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prevencao`
--

CREATE TABLE `prevencao` (
  `id` int(3) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resp_tecnico`
--

CREATE TABLE `resp_tecnico` (
  `id` int(3) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `crea` varchar(12) NOT NULL,
  `func` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `riscos`
--

CREATE TABLE `riscos` (
  `id` int(3) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `id_subcategoria` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(2) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(3) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_trabalho`
--

CREATE TABLE `tipo_trabalho` (
  `id` tinyint(2) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulo_epc_local`
--

CREATE TABLE `titulo_epc_local` (
  `id` int(4) NOT NULL,
  `id_local` int(3) NOT NULL,
  `titulo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulo_epi_local`
--

CREATE TABLE `titulo_epi_local` (
  `id` int(4) NOT NULL,
  `id_local` int(3) NOT NULL,
  `titulo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulo_local`
--

CREATE TABLE `titulo_local` (
  `id` int(3) NOT NULL,
  `id_local` int(3) NOT NULL,
  `titulo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo_usuario` varchar(40) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `tipo_usuario`, `nome`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'Usuario', 'viniciuslol.vm@gmail.com'),
(2, 'func', 'func', 'func', '', ''),
(3, 'email', 'email', 'func', 'Email', 'loirovinicius360@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agentes_ambientais`
--
ALTER TABLE `agentes_ambientais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `anexo`
--
ALTER TABLE `anexo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_empresas`
--
ALTER TABLE `cad_empresas`
  ADD PRIMARY KEY (`cnpj`),
  ADD KEY `cnae` (`cnae`),
  ADD KEY `carga_horaria_admin` (`carga_horaria_admin`),
  ADD KEY `carga_horaria_operac` (`carga_horaria_operac`),
  ADD KEY `id_grau_risco` (`id_grau_risco`),
  ADD KEY `fk_id_cidades` (`id_cidade`);

--
-- Índices para tabela `carga_horaria`
--
ALTER TABLE `carga_horaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_trabalho` (`id_tipo_trabalho`);

--
-- Índices para tabela `categ_risco_indicea`
--
ALTER TABLE `categ_risco_indicea`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cidades_estados1` (`estados_id`);

--
-- Índices para tabela `cnae`
--
ALTER TABLE `cnae`
  ADD PRIMARY KEY (`id_cnae`);

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
-- Índices para tabela `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa_contratada`
--
ALTER TABLE `empresa_contratada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipio` (`municipio`),
  ADD KEY `fk_uf` (`uf`);

--
-- Índices para tabela `epc`
--
ALTER TABLE `epc`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `epi`
--
ALTER TABLE `epi`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`,`sigla`),
  ADD UNIQUE KEY `sigla_UNIQUE` (`sigla`);

--
-- Índices para tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcao_ghe`
--
ALTER TABLE `funcao_ghe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ghe`
--
ALTER TABLE `ghe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `inventario_riscos`
--
ALTER TABLE `inventario_riscos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medidas_controle`
--
ALTER TABLE `medidas_controle`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `meio_ambiental`
--
ALTER TABLE `meio_ambiental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_documento` (`documento`),
  ADD KEY `fk_empresa` (`empresa`);

--
-- Índices para tabela `ppra`
--
ALTER TABLE `ppra`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prevencao`
--
ALTER TABLE `prevencao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resp_tecnico`
--
ALTER TABLE `resp_tecnico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `riscos`
--
ALTER TABLE `riscos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcategoria` (`id_subcategoria`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_trabalho`
--
ALTER TABLE `tipo_trabalho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `titulo_epc_local`
--
ALTER TABLE `titulo_epc_local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `titulo_epi_local`
--
ALTER TABLE `titulo_epi_local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `titulo_local`
--
ALTER TABLE `titulo_local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agentes_ambientais`
--
ALTER TABLE `agentes_ambientais`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `anexo`
--
ALTER TABLE `anexo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `carga_horaria`
--
ALTER TABLE `carga_horaria`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categ_risco_indicea`
--
ALTER TABLE `categ_risco_indicea`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cnae`
--
ALTER TABLE `cnae`
  MODIFY `id_cnae` int(16) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT de tabela `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `epc`
--
ALTER TABLE `epc`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `epi`
--
ALTER TABLE `epi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcao_ghe`
--
ALTER TABLE `funcao_ghe`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ghe`
--
ALTER TABLE `ghe`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inventario_riscos`
--
ALTER TABLE `inventario_riscos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `local`
--
ALTER TABLE `local`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medidas_controle`
--
ALTER TABLE `medidas_controle`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `meio_ambiental`
--
ALTER TABLE `meio_ambiental`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ppra`
--
ALTER TABLE `ppra`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prevencao`
--
ALTER TABLE `prevencao`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `resp_tecnico`
--
ALTER TABLE `resp_tecnico`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `riscos`
--
ALTER TABLE `riscos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_trabalho`
--
ALTER TABLE `tipo_trabalho`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `titulo_epc_local`
--
ALTER TABLE `titulo_epc_local`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `titulo_epi_local`
--
ALTER TABLE `titulo_epi_local`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `titulo_local`
--
ALTER TABLE `titulo_local`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cad_empresas`
--
ALTER TABLE `cad_empresas`
  ADD CONSTRAINT `cad_empresas_ibfk_2` FOREIGN KEY (`carga_horaria_admin`) REFERENCES `carga_horaria` (`id`),
  ADD CONSTRAINT `cad_empresas_ibfk_3` FOREIGN KEY (`carga_horaria_operac`) REFERENCES `carga_horaria` (`id`),
  ADD CONSTRAINT `cad_empresas_ibfk_4` FOREIGN KEY (`id_grau_risco`) REFERENCES `categ_risco_indicea` (`id`),
  ADD CONSTRAINT `fk_id_cidades` FOREIGN KEY (`id_cidade`) REFERENCES `cidades` (`id`);

--
-- Limitadores para a tabela `carga_horaria`
--
ALTER TABLE `carga_horaria`
  ADD CONSTRAINT `carga_horaria_ibfk_1` FOREIGN KEY (`id_tipo_trabalho`) REFERENCES `tipo_trabalho` (`id`);

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empresa_contratada`
--
ALTER TABLE `empresa_contratada`
  ADD CONSTRAINT `fk_municipio` FOREIGN KEY (`municipio`) REFERENCES `cidades` (`id`),
  ADD CONSTRAINT `fk_uf` FOREIGN KEY (`uf`) REFERENCES `estados` (`id`);

--
-- Limitadores para a tabela `meio_ambiental`
--
ALTER TABLE `meio_ambiental`
  ADD CONSTRAINT `fk_documento` FOREIGN KEY (`documento`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`empresa`) REFERENCES `cad_empresas` (`cnpj`);

--
-- Limitadores para a tabela `riscos`
--
ALTER TABLE `riscos`
  ADD CONSTRAINT `fk_subcategoria` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
