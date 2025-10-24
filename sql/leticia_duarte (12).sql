-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2025 às 11:28
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
(9, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(10, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(11, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(12, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(13, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd');

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
(9, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '47.800.994-8', '2025-10-13', 'parda', 'Bercario 2 C', 0, NULL, NULL, 0, '2025-10-23 19:11:40', 9, 1),
(10, '123123asdasd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '2025-10-05', 'amarela', 'Bercario 2 C', 1, 'asdasdas', 12, 0, '2025-10-23 19:14:10', 10, 1),
(11, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-05', 'parda', 'Maternal I A', 0, NULL, NULL, 0, '2025-10-23 19:21:38', 11, 1),
(12, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-05', 'amarela', 'Bercario 2 C', 1, 'Dipirona', 123, 0, '2025-10-23 19:24:30', 12, 1),
(13, 'asdasd1231231', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-05', 'parda', 'Bercario 2 B', 1, 'Dipirona', 12, 0, '2025-10-23 19:25:27', 13, 1);

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

INSERT INTO `tb_estrutura_familiar` (`id`, `pais_vivem_juntos`, `numero_filhos`, `recebe_bolsa_familia`, `valor`, `possui_alergia`, `especifique_alergia`, `possui_convenio`, `qual_convenio`, `portador_necessidade_especial`, `qual_necessidade_especial`, `problemas_visao`, `ja_fez_cirurgia`, `qual_cirurgia`, `vacina_catapora_varicela`, `doenca_anemia`, `doenca_bronquite`, `doenca_catapora`, `doenca_covid`, `doenca_cardiaca`, `doenca_meningite`, `doenca_pneumonia`, `doenca_convulsao`, `doenca_diabete`, `doenca_refluxo`, `outras_doencas`, `transporte_carro`, `transporte_van`, `transporte_a_pe`, `transporte_outros_desc`) VALUES
(4, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(10, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(11, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(12, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(13, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(14, 1, 0, 1, 231.00, 1, 'asdasdasd', 1, 'asdasdasd', 1, 'asdasdasd', 1, 1, 'asdasdasd', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0');

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
  `pessoa_autorizada_2_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_matricula`
--

INSERT INTO `tb_matricula` (`id_matricula`, `aluno_id`, `estrutura_familiar_id`, `funcionario_id`, `data`, `responsavel_1_id`, `responsavel_2_id`, `pessoa_autorizada_1_id`, `pessoa_autorizada_2_id`) VALUES
(9, 9, 10, 1, '2025-10-23 16:11:40', 10, NULL, 10, NULL),
(10, 10, 11, 1, '2025-10-23 16:14:10', 11, 12, 11, NULL),
(11, 11, 12, 1, '2025-10-23 16:21:38', 13, NULL, 12, NULL),
(12, 12, 13, 1, '2025-10-23 16:24:30', 14, NULL, 13, NULL),
(13, 13, 14, 1, '2025-10-23 16:25:27', 15, NULL, 14, NULL);

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
(9, 10),
(10, 11),
(11, 12),
(12, 13),
(13, 14);

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
(10, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Irmã'),
(11, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Irmã'),
(12, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Irmã'),
(13, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Irmã'),
(14, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Irmão');

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
(10, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-13', 'Solteiro', 'Médio', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(11, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Médio', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 1, 1231.23),
(12, 'Mãe', 'VICTOR CHINAGLIA NETO', '2025-10-19', 'União Estável', 'Técnico', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', '', '', '', '', NULL, 0, NULL),
(13, 'Mãe', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Médio', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(14, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(15, 'Mãe', 'VICTOR CHINAGLIA NETO', '2025-05-10', 'Solteiro', 'Fundamental', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL);

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
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_estrutura_familiar`
--
ALTER TABLE `tb_estrutura_familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_matricula`
--
ALTER TABLE `tb_matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_pessoas_autorizadas`
--
ALTER TABLE `tb_pessoas_autorizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_responsaveis`
--
ALTER TABLE `tb_responsaveis`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
