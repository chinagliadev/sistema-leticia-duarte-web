-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/10/2025 às 16:56
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
(1, '2131231231', 'sadasdasd', 123, 'asdasdas', 'd123123', 'asdasdasd'),
(2, '', '', 0, '', '', ''),
(3, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(4, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(5, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(6, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(7, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(8, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(9, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(10, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(11, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(12, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(13, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(14, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(15, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(16, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(17, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(18, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(19, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(20, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(21, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(22, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(23, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd'),
(24, '13470070', 'Rua Florindo Cibin', 2, 'asdasda', 'Americana', 'dasdasd');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_alunos`
--

CREATE TABLE `tb_alunos` (
  `ra_aluno` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
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

INSERT INTO `tb_alunos` (`ra_aluno`, `nome`, `data_nascimento`, `etnia`, `turma`, `autorizacao_febre`, `remedio`, `gotas`, `permissao_foto`, `data_cadastro`, `endereco_id`, `funcionario_id`) VALUES
(1, 'dasdas', '0000-00-00', 'parda', 'Maternal I A', 0, NULL, NULL, 0, '2025-10-01 00:06:50', 1, 3),
(2, 'dsfsdfsdfsd', '0000-00-00', NULL, 'Bercario 2 C', 0, NULL, NULL, 0, '2025-10-01 11:52:59', 2, 3),
(3, 'VICTOR CHINAGLIA NETO', '0000-00-00', 'parda', 'Bercario 2 C', 0, NULL, NULL, 0, '2025-10-01 11:57:57', 3, 3),
(4, 'VICTOR CHINAGLIA NETO', '0000-00-00', 'parda', 'Bercario 2 C', 1, '', 0, 1, '2025-10-01 12:41:42', 4, 1),
(24, 'VICTOR CHINAGLIA NETO', '2025-10-14', 'parda', 'Bercario 2 C', 1, '', 0, 1, '2025-10-08 13:44:53', 24, 3);

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
  `doenca_cardiaca` tinyint(1) DEFAULT NULL,
  `doenca_catapora` tinyint(1) DEFAULT NULL,
  `doenca_diabetes` tinyint(1) DEFAULT NULL,
  `doenca_hepatite` tinyint(1) DEFAULT NULL,
  `doenca_meningite` tinyint(1) DEFAULT NULL,
  `doenca_pneumonia` tinyint(1) DEFAULT NULL,
  `doenca_caxumba` tinyint(1) DEFAULT NULL,
  `doenca_convulsao` tinyint(1) DEFAULT NULL,
  `doenca_dengue` tinyint(1) DEFAULT NULL,
  `doenca_desidratacao` tinyint(1) DEFAULT NULL,
  `doenca_refluxo` tinyint(1) DEFAULT NULL,
  `doenca_rubeola` tinyint(1) DEFAULT NULL,
  `doenca_sarampo` tinyint(1) DEFAULT NULL,
  `doenca_verminose` tinyint(1) DEFAULT NULL,
  `transporte_carro` tinyint(1) DEFAULT 0 COMMENT '1=Carro, 0=Não',
  `transporte_van` tinyint(1) DEFAULT 0 COMMENT '1=Van, 0=Não',
  `transporte_a_pe` tinyint(1) DEFAULT 0 COMMENT '1=A Pé, 0=Não',
  `transporte_outros_desc` varchar(255) DEFAULT NULL COMMENT 'Descrição do meio de transporte "Outros"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_estrutura_familiar`
--

INSERT INTO `tb_estrutura_familiar` (`id`, `pais_vivem_juntos`, `numero_filhos`, `recebe_bolsa_familia`, `valor`, `possui_alergia`, `especifique_alergia`, `possui_convenio`, `qual_convenio`, `portador_necessidade_especial`, `qual_necessidade_especial`, `problemas_visao`, `ja_fez_cirurgia`, `qual_cirurgia`, `vacina_catapora_varicela`, `doenca_anemia`, `doenca_bronquite`, `doenca_cardiaca`, `doenca_catapora`, `doenca_diabetes`, `doenca_hepatite`, `doenca_meningite`, `doenca_pneumonia`, `doenca_caxumba`, `doenca_convulsao`, `doenca_dengue`, `doenca_desidratacao`, `doenca_refluxo`, `doenca_rubeola`, `doenca_sarampo`, `doenca_verminose`, `transporte_carro`, `transporte_van`, `transporte_a_pe`, `transporte_outros_desc`) VALUES
(1, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL),
(2, 0, 12, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, NULL),
(8, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(9, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(10, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(25, 0, 4, 1, 1000.00, 0, 'DASDA', 1, 'Cartão de Todos', 0, 'DASDASDAS', 0, 0, NULL, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '0');

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
(1, 'victor chinaglia', 'neto@neto', '$2y$10$Tz1QRAkbDkW4YLB6zk0mR.CSGF3qH/S3FSsOBXzy/IsPoGiF.FphK', '(21) 31231-2313', '231.231.231-23'),
(2, 'VICTOR CHINAGLIA NETO', 'victor@sistema.com', '$2y$10$28FI7QcRf2iv0AdTkqfLG.o7cQInhCZNn47eie9RWmTTrg1ZHqKZu', '(12) 31231-2312', '312.312.312-31'),
(3, 'dasda', 'teste@testepedro.com', '$2y$10$bFY.7R/rnZP1RwmQlgyEeO.TNrBWoWOIHPFCyEI8Mdu4xVBBj33Su', '(12) 31231-2312', '123.123.123-12'),
(4, 'dasdasd', 'victor@sistemas.com', '$2y$10$PFJwrIpOE622MXA94Tdjs.JrijXu.yh0kV8Fhc.LqIAWQQeOq2VUu', '(12) 31231-2313', '123.123.123-12');

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
  `responsavel_2_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_matricula`
--

INSERT INTO `tb_matricula` (`id_matricula`, `aluno_id`, `estrutura_familiar_id`, `funcionario_id`, `data`, `responsavel_1_id`, `responsavel_2_id`) VALUES
(20, 24, 25, 3, '2025-10-08 10:44:53', 24, NULL);

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
(20, 24);

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
(1, 'sdasdas', 'd123123123', 'asdasdasda', 'Irmão'),
(2, 'asdasdas', '21312312', '3123123123', 'Avó'),
(3, 'sadasda', '12312323123', '123123123123', 'Avó'),
(4, 'VICTOR CHINAGLIA NETO', '23423423423423', '19983541308', 'Irmã'),
(5, 'VICTOR CHINAGLIA NETO', 'd123123123', '19983541308', 'Irmão'),
(6, 'VICTOR CHINAGLIA NETO', 'd123123123', '19983541308', 'Irmão'),
(7, 'VICTOR CHINAGLIA NETO', 'd123123123', '19983541308', 'Irmão'),
(8, 'VICTOR CHINAGLIA NETO', 'd123123123', '19983541308', 'Irmão'),
(9, 'VICTOR CHINAGLIA NETO', 'd123123123', '19983541308', 'Irmão'),
(10, 'Keno Stockler', '45601938870', '109283908123', 'Mãe'),
(11, 'asdasd', '1231231231', '123123123123', 'Irmão'),
(12, 'VICTOR CHINAGLIA NETO', '21312312', '19983541308', 'Irmão'),
(13, 'VICTOR CHINAGLIA NETO', 'asdasdasda', '19983541308', 'Avó'),
(14, 'VICTOR CHINAGLIA NETO', '12312323123', '19983541308', 'Irmão'),
(15, 'VICTOR CHINAGLIA NETO', '23423423423423', '19983541308', 'Irmã'),
(16, 'VICTOR CHINAGLIA NETO', '23423423423423', '19983541300', 'Irmã'),
(17, 'VICTOR CHINAGLIA NETO', '31312312313', '19983541308', 'Irmão'),
(18, 'VICTOR CHINAGLIA NETO', '23423423423423', '19983541308', 'Irmão'),
(19, 'VICTOR CHINAGLIA NETO', '12312323123', '19983541308', 'Irmão'),
(20, 'VICTOR CHINAGLIA NETO', '45601938870', '19983541308', 'Irmão'),
(21, 'VICTOR CHINAGLIA NETO', '12312323123', '19983541308', 'Irmão'),
(22, 'VICTOR CHINAGLIA NETO', '12312323123', '19983541308', 'Irmão'),
(23, 'VICTOR CHINAGLIA NETO', '12312323123', '19983541308', 'Avô'),
(24, 'VICTOR CHINAGLIA NETO', '23423423423423', '19983541308', 'Avó');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_responsaveis`
--

CREATE TABLE `tb_responsaveis` (
  `id_responsavel` int(11) NOT NULL,
  `tipo_responsavel` enum('Pai','Mãe','Avô','Avó','Irmão','Irmã','Tio','Tia','Outro') NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `estado_civil` enum('Solteiro','Casado','Divorciado','Viuvo') NOT NULL,
  `escolaridade` enum('Fundamental','Médio','Técnico','Superior','Pós-graduação','Outro') NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nome_empresa` varchar(100) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `telefone_trabalho` varchar(20) DEFAULT NULL,
  `horario_trabalho` time DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `renda_extra` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_responsaveis`
--

INSERT INTO `tb_responsaveis` (`id_responsavel`, `tipo_responsavel`, `nome`, `data_nascimento`, `estado_civil`, `escolaridade`, `celular`, `email`, `nome_empresa`, `profissao`, `telefone_trabalho`, `horario_trabalho`, `salario`, `renda_extra`) VALUES
(1, 'Avô', 'dasdasdas', '2020-02-02', 'Divorciado', '', '123123123123', 'asdadsasdasd@asdasdasd', 'sadasdasdasda', 'sdasdasdasd', '12312312312', '838:59:59', 99999999.99, 0),
(2, 'Avô', 'asdasdas', '0000-00-00', 'Divorciado', '', '3213123123123', '', '', '', '', '00:00:00', 0.00, 0),
(3, 'Avô', 'asdasdasdasd', '0000-00-00', 'Casado', '', '19983541308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Avô', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', '', '19983541308', 'asdadsasdasd@asdasdasd', 'sadasdasdasda', 'sdasdasdasd', NULL, NULL, NULL, 0),
(24, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-06', 'Solteiro', '', '19983541308', 'asdadsasdasd@asdasdasd', 'Microsof', NULL, NULL, NULL, NULL, 1);

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
  ADD PRIMARY KEY (`ra_aluno`),
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
  ADD KEY `responsavel_pai_id` (`responsavel_2_id`);

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
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `ra_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_estrutura_familiar`
--
ALTER TABLE `tb_estrutura_familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_matricula`
--
ALTER TABLE `tb_matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_pessoas_autorizadas`
--
ALTER TABLE `tb_pessoas_autorizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_responsaveis`
--
ALTER TABLE `tb_responsaveis`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `tb_matricula_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `tb_alunos` (`ra_aluno`),
  ADD CONSTRAINT `tb_matricula_ibfk_2` FOREIGN KEY (`estrutura_familiar_id`) REFERENCES `tb_estrutura_familiar` (`id`),
  ADD CONSTRAINT `tb_matricula_ibfk_3` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `tb_matricula_ibfk_4` FOREIGN KEY (`responsavel_1_id`) REFERENCES `tb_responsaveis` (`id_responsavel`),
  ADD CONSTRAINT `tb_matricula_ibfk_5` FOREIGN KEY (`responsavel_2_id`) REFERENCES `tb_responsaveis` (`id_responsavel`);

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
