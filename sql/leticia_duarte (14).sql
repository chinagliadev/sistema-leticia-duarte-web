-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/10/2025 às 10:36
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `leticia_duarte`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT 'Americana',
  `complemento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `complemento`) VALUES
(21, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(22, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(29, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', ''),
(30, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(31, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(32, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(33, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(34, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(35, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_alunos`
--

CREATE TABLE `tb_alunos` (
  `id` int(11) NOT NULL,
  `ra_aluno` varchar(100) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `etnia` varchar(20) DEFAULT NULL,
  `turma` enum('Bercario 2 A','Bercario 2 B','Bercario 2 C','Maternal I A','Maternal I B','Maternal I C','Maternal II A','Maternal II B','Multisseriada M.M','Multisseriada B.M') DEFAULT NULL,
  `autorizacao_febre` tinyint(1) DEFAULT 0 COMMENT 'Autoriza medicar em caso de febre',
  `remedio` varchar(100) DEFAULT NULL COMMENT 'Nome do remédio autorizado',
  `gotas` int(11) DEFAULT NULL COMMENT 'Quantidade de gotas',
  `permissao_foto` tinyint(1) DEFAULT 0 COMMENT 'Autoriza divulgação de imagem',
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `endereco_id` int(11) DEFAULT NULL,
  `funcionario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_alunos`
--

INSERT INTO `tb_alunos` (`id`, `ra_aluno`, `nome`, `cpf`, `rg`, `data_nascimento`, `etnia`, `turma`, `autorizacao_febre`, `remedio`, `gotas`, `permissao_foto`, `data_cadastro`, `endereco_id`, `funcionario_id`) VALUES
(21, '213123e', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '28.349.823-0', '2025-10-13', 'parda', 'Bercario 2 B', 1, 'dasdasd', 123, 0, '2025-10-24 14:07:06', 21, 1),
(22, '213123e', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '28.349.823-0', '2025-10-13', 'parda', 'Bercario 2 B', 1, 'dasdasd', 123, 0, '2025-10-24 14:08:53', 22, 1),
(29, '123v', 'Juvenal da Silva', '473.016.388-50', '28.349.823-0', '2012-05-02', 'preta', 'Bercario 2 A', 1, 'floral', 50, 1, '2025-10-24 14:46:48', 29, 1),
(30, '123123a', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '2025-10-13', 'amarela', 'Maternal I B', 1, 'sdasdasd', 12, 0, '2025-10-24 20:07:27', 30, 1),
(31, '123123asd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-19', 'parda', 'Maternal I B', 1, 'dasdasdas', 123, 1, '2025-10-24 20:22:34', 31, 1),
(32, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-06', 'parda', 'Maternal I A', 0, NULL, NULL, 0, '2025-10-24 20:23:19', 32, 1),
(33, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'parda', 'Maternal I A', 1, 'asdasd', 12, 0, '2025-10-24 20:24:44', 33, 1),
(34, '11234556', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'parda', 'Bercario 2 C', 1, 'asdasda', 123, 0, '2025-10-24 20:25:25', 34, 1),
(35, '12344522222222', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'parda', 'Bercario 2 B', 0, NULL, NULL, 0, '2025-10-24 20:25:54', 35, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_estrutura_familiar`
--

CREATE TABLE `tb_estrutura_familiar` (
  `id` int(11) NOT NULL,
  `pais_vivem_juntos` tinyint(1) DEFAULT NULL,
  `numero_filhos` int(11) DEFAULT NULL,
  `recebe_bolsa_familia` tinyint(1) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `possui_alergia` tinyint(1) DEFAULT NULL,
  `especifique_alergia` varchar(100) DEFAULT NULL,
  `possui_convenio` tinyint(1) DEFAULT NULL,
  `qual_convenio` varchar(100) DEFAULT NULL,
  `portador_necessidade_especial` tinyint(1) DEFAULT NULL,
  `qual_necessidade_especial` varchar(100) DEFAULT NULL,
  `problemas_visao` tinyint(1) DEFAULT NULL,
  `ja_fez_cirurgia` tinyint(1) DEFAULT NULL,
  `qual_cirurgia` varchar(100) DEFAULT NULL,
  `vacina_catapora_varicela` tinyint(1) DEFAULT NULL,
  `tipo_moradia` varchar(255) DEFAULT NULL,
  `valor_aluguel` decimal(10,2) DEFAULT NULL,
  `doenca_anemia` tinyint(1) DEFAULT NULL,
  `doenca_bronquite` tinyint(1) DEFAULT NULL,
  `doenca_catapora` tinyint(1) DEFAULT NULL,
  `doenca_covid` tinyint(4) DEFAULT NULL,
  `doenca_cardiaca` tinyint(1) DEFAULT NULL,
  `doenca_meningite` tinyint(1) DEFAULT NULL,
  `doenca_pneumonia` tinyint(1) DEFAULT NULL,
  `doenca_convulsao` tinyint(1) DEFAULT NULL,
  `doenca_diabete` tinyint(4) DEFAULT NULL,
  `doenca_refluxo` tinyint(1) DEFAULT NULL,
  `outras_doencas` varchar(100) DEFAULT NULL,
  `transporte_carro` tinyint(1) DEFAULT 0 COMMENT '1=Carro, 0=Não',
  `transporte_van` tinyint(1) DEFAULT 0 COMMENT '1=Van, 0=Não',
  `transporte_a_pe` tinyint(1) DEFAULT 0 COMMENT '1=A Pé, 0=Não',
  `transporte_outros_desc` varchar(255) DEFAULT NULL COMMENT 'Descrição do meio de transporte "Outros"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_estrutura_familiar`
--

INSERT INTO `tb_estrutura_familiar` (`id`, `pais_vivem_juntos`, `numero_filhos`, `recebe_bolsa_familia`, `valor`, `possui_alergia`, `especifique_alergia`, `possui_convenio`, `qual_convenio`, `portador_necessidade_especial`, `qual_necessidade_especial`, `problemas_visao`, `ja_fez_cirurgia`, `qual_cirurgia`, `vacina_catapora_varicela`, `tipo_moradia`, `valor_aluguel`, `doenca_anemia`, `doenca_bronquite`, `doenca_catapora`, `doenca_covid`, `doenca_cardiaca`, `doenca_meningite`, `doenca_pneumonia`, `doenca_convulsao`, `doenca_diabete`, `doenca_refluxo`, `outras_doencas`, `transporte_carro`, `transporte_van`, `transporte_a_pe`, `transporte_outros_desc`) VALUES
(4, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, '', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(22, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(23, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(30, 1, 9, 1, 12.31, 1, 'pó', 1, 'Unimed', 1, 'daltonismo', 1, 1, 'medula', 1, 'propria', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', 1, 1, 0, '0'),
(31, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(32, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(33, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(34, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(35, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(36, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `nome`, `email`, `senha`, `celular`, `cpf`) VALUES
(1, 'Victor Chinaglia', 'chinagliavictor@neto.com', '$2y$10$szxlpkPSHG8NXzXOy4m0xeXcqqVCamT6YwmQbH6DPVVJ3rX5Zg/w6', '(12) 31231-3123', '473.016.388-50'),
(2, 'asdasdasd', 'asdasdasdas@dadads.com', '$2y$10$PVXT5F3PW.HWJ6AirsXmFeonOBsmMRtFOirAvks.nw9JlPnK0jXFi', '(13) 23123-1231', '473.016.388-50'),
(3, 'sdaasdas', 'admin@admin.com', '$2y$10$ofBsphT8vz9FtHQtwx8JAu5rLXdP9i2UEA4prIVokhA5zWm6nfe12', '(21) 31231-2312', '473.016.388-50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_matricula`
--

CREATE TABLE `tb_matricula` (
  `id_matricula` int(11) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `estrutura_familiar_id` int(11) DEFAULT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data e hora de criação do registro',
  `responsavel_1_id` int(11) DEFAULT NULL,
  `responsavel_2_id` int(11) DEFAULT NULL,
  `pessoa_autorizada_1_id` int(11) DEFAULT NULL,
  `pessoa_autorizada_2_id` int(11) DEFAULT NULL,
  `pessoa_autorizada_3_id` int(11) DEFAULT NULL,
  `pessoa_autorizada_4_id` int(11) DEFAULT NULL,
  `matricula_ativada` tinyint(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_matricula`
--

INSERT INTO `tb_matricula` (`id_matricula`, `aluno_id`, `estrutura_familiar_id`, `funcionario_id`, `data`, `responsavel_1_id`, `responsavel_2_id`, `pessoa_autorizada_1_id`, `pessoa_autorizada_2_id`, `pessoa_autorizada_3_id`, `pessoa_autorizada_4_id`, `matricula_ativada`) VALUES
(27, 29, 30, 1, '2025-10-24 11:46:48', 35, 36, 49, 50, 51, 52, 0),
(28, 30, 31, 1, '2025-10-24 17:07:27', 37, NULL, 53, NULL, NULL, NULL, NULL),
(29, 31, 32, 1, '2025-10-24 17:22:34', 38, NULL, 54, NULL, NULL, NULL, 0),
(30, 32, 33, 1, '2025-10-24 17:23:19', 39, NULL, 55, NULL, NULL, NULL, 0),
(31, 33, 34, 1, '2025-10-24 17:24:44', 40, NULL, 56, NULL, NULL, NULL, 0),
(32, 34, 35, 1, '2025-10-24 17:25:25', 41, NULL, 57, NULL, NULL, NULL, 1),
(33, 35, 36, 1, '2025-10-24 17:25:54', 42, NULL, 58, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_matricula_pessoas_autorizadas`
--

CREATE TABLE `tb_matricula_pessoas_autorizadas` (
  `matricula_id` int(11) NOT NULL,
  `pessoa_autorizada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_matricula_pessoas_autorizadas`
--

INSERT INTO `tb_matricula_pessoas_autorizadas` (`matricula_id`, `pessoa_autorizada_id`) VALUES
(27, 49),
(28, 53),
(29, 54),
(30, 55),
(31, 56),
(32, 57),
(33, 58);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pessoas_autorizadas`
--

CREATE TABLE `tb_pessoas_autorizadas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `parentesco` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_pessoas_autorizadas`
--

INSERT INTO `tb_pessoas_autorizadas` (`id`, `nome`, `cpf`, `celular`, `parentesco`) VALUES
(23, 'Vanessa Oliveira', '473.016.388-50', '(19) 98354-1308', 'Mãe'),
(24, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1300', 'Pai'),
(25, 'Vanessa Oliveira', '473.016.388-50', '(19) 98354-1308', 'Mãe'),
(26, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1300', 'Pai'),
(31, 'VICTOR CHINAGLIA ', '473.016.388-50', '19983541308', 'Irmão'),
(32, 'Victor Netinho', '473.016.388-50', '19983541308', 'Tia'),
(35, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmão'),
(36, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmã'),
(39, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmão'),
(40, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmã'),
(43, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmão'),
(44, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmã'),
(47, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmão'),
(48, 'Isabelle Santos', '473.016.388-50', '(43) 24234-2342', 'Irmã'),
(49, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Pai'),
(50, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Mãe'),
(51, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '19983541308', 'Mãe'),
(52, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '19983541300', 'Avó'),
(53, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô'),
(54, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Mãe'),
(55, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Pai'),
(56, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô'),
(57, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô'),
(58, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_responsaveis`
--

CREATE TABLE `tb_responsaveis` (
  `id_responsavel` int(11) NOT NULL,
  `tipo_responsavel` enum('Pai','Mãe','Avô','Avó','Irmão','Irmã','Tio','Tia','Outro') NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `estado_civil` enum('Solteiro','Casado','Divorciado','Viuvo','União Estável') DEFAULT NULL,
  `escolaridade` enum('Fundamental','Médio','Técnico','Superior','Pós-graduação','Outro') NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nome_empresa` varchar(100) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `telefone_trabalho` varchar(20) DEFAULT NULL,
  `horario_trabalho` varchar(100) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `renda_extra` tinyint(1) DEFAULT NULL,
  `valor_renda_extra` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_responsaveis`
--

INSERT INTO `tb_responsaveis` (`id_responsavel`, `tipo_responsavel`, `nome`, `data_nascimento`, `estado_civil`, `escolaridade`, `celular`, `email`, `nome_empresa`, `profissao`, `telefone_trabalho`, `horario_trabalho`, `salario`, `renda_extra`, `valor_renda_extra`) VALUES
(23, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Médio', '(19) 98354-1308', 'sadasdasd@dadasda.com', '', '', '', '', NULL, 0, NULL),
(24, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Médio', '(19) 98354-1308', 'sadasdasd@dadasda.com', '', '', '', '', NULL, 0, NULL),
(35, 'Pai', 'VICTOR CHINAGLIA NETO', '2025-05-10', 'Casado', 'Pós-graduação', '(19) 98354-1308', 'vanessa@email.com', 'Microsoft', 'Programador', '(19) 98354-1308', '8h as 17h', 1900.00, 1, 2000.00),
(36, 'Mãe', 'VICTORia CHINAGLIA Filha', '1985-02-13', 'Solteiro', 'Técnico', '(19) 98354-1308', 'victorjunior@yahoot.com', 'Caula', 'Arquiteto', '(19) 98354-1308', '8h as 16h', 1000.00, 1, 100000.00),
(37, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.co', '', '', '', '', NULL, 0, NULL),
(38, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(39, 'Pai', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(40, 'Pai', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(41, 'Pai', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(42, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'ASDASD', 'ASDASDASD', '(19) 98354-1308', '', NULL, 0, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `endereco_id` (`endereco_id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices de tabela `tb_estrutura_familiar`
--
ALTER TABLE `tb_estrutura_familiar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `tb_matricula`
--
ALTER TABLE `tb_matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `estrutura_familiar_id` (`estrutura_familiar_id`),
  ADD KEY `funcionario_id` (`funcionario_id`),
  ADD KEY `responsavel_mae_id` (`responsavel_1_id`),
  ADD KEY `responsavel_pai_id` (`responsavel_2_id`),
  ADD KEY `fk_matricula_pessoa_autorizada1` (`pessoa_autorizada_1_id`),
  ADD KEY `fk_matricula_pessoa_autorizada2` (`pessoa_autorizada_2_id`);

--
-- Índices de tabela `tb_matricula_pessoas_autorizadas`
--
ALTER TABLE `tb_matricula_pessoas_autorizadas`
  ADD PRIMARY KEY (`matricula_id`,`pessoa_autorizada_id`),
  ADD KEY `pessoa_autorizada_id` (`pessoa_autorizada_id`);

--
-- Índices de tabela `tb_pessoas_autorizadas`
--
ALTER TABLE `tb_pessoas_autorizadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_responsaveis`
--
ALTER TABLE `tb_responsaveis`
  ADD PRIMARY KEY (`id_responsavel`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `tb_estrutura_familiar`
--
ALTER TABLE `tb_estrutura_familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_matricula`
--
ALTER TABLE `tb_matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_pessoas_autorizadas`
--
ALTER TABLE `tb_pessoas_autorizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `tb_responsaveis`
--
ALTER TABLE `tb_responsaveis`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD CONSTRAINT `tb_alunos_ibfk_1` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`id_endereco`),
  ADD CONSTRAINT `tb_alunos_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Restrições para tabelas `tb_matricula`
--
ALTER TABLE `tb_matricula`
  ADD CONSTRAINT `fk_matricula_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `tb_alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matricula_pessoa_autorizada1` FOREIGN KEY (`pessoa_autorizada_1_id`) REFERENCES `tb_pessoas_autorizadas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matricula_pessoa_autorizada2` FOREIGN KEY (`pessoa_autorizada_2_id`) REFERENCES `tb_pessoas_autorizadas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matricula_ibfk_2` FOREIGN KEY (`estrutura_familiar_id`) REFERENCES `tb_estrutura_familiar` (`id`),
  ADD CONSTRAINT `tb_matricula_ibfk_3` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `tb_matricula_ibfk_4` FOREIGN KEY (`responsavel_1_id`) REFERENCES `tb_responsaveis` (`id_responsavel`),
  ADD CONSTRAINT `tb_matricula_ibfk_5` FOREIGN KEY (`responsavel_2_id`) REFERENCES `tb_responsaveis` (`id_responsavel`) ON DELETE SET NULL;

--
-- Restrições para tabelas `tb_matricula_pessoas_autorizadas`
--
ALTER TABLE `tb_matricula_pessoas_autorizadas`
  ADD CONSTRAINT `tb_matricula_pessoas_autorizadas_ibfk_1` FOREIGN KEY (`matricula_id`) REFERENCES `tb_matricula` (`id_matricula`),
  ADD CONSTRAINT `tb_matricula_pessoas_autorizadas_ibfk_2` FOREIGN KEY (`pessoa_autorizada_id`) REFERENCES `tb_pessoas_autorizadas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
