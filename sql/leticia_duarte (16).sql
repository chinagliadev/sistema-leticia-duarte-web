-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2025 às 21:15
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
(1, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(2, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(3, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(4, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(5, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(6, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(7, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(8, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(9, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(10, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(11, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(12, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(13, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(14, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(15, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(16, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(17, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(18, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(19, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(20, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(21, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(22, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(23, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(24, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(25, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(26, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(27, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(28, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(29, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(30, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(31, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(32, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(33, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(34, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(35, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(36, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(37, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(38, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(39, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(40, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(41, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(42, '13470-070', 'Rua Florindo Cibin', 2, 'Parque das Nações', 'Americana', 'dasdasd'),
(43, '13470070', 'sdasdasdasdasda', 1231, 'dasdasd asdasda', 'asdasdasdadasda', 'asdasdasdasd'),
(44, '13470070', 'sdaasdasdasd asdasdasdasd', 1231231, 'sdasdasdasd', 'asdasdasd', 'asdasdasd'),
(45, '13470070', 'asdasdasd', 123, 'asdasdasd asdasdasd', 'asdasdasdas', 'asdasdasd'),
(46, '13470070', 'sadasdasdas', 0, 'asdasdasdasd', 'asdasdasdas', 'asdasdasda'),
(47, '13470070', 'sadasdasdas', 0, 'asdasdasdasd', 'asdasdasdas', 'asdasdasda'),
(48, '13470070', 'asdasdasd', 31231, 'sdadasdasd', 'asdasdasd', 'asdasdasd'),
(49, '13470070', 'sadasdasd asdasdasd', 123123, 'asdasdasd asdasdas', 'asdasdasdasd', 'asdasdasdasd'),
(50, '3123123123', 'asdasdasd', 123123, 'asdasdasd', 'asdasdasd', 'asdasdasdasdasd'),
(51, '12312312', 'asdasdasd', 0, 'asdasdasdas', 'asdasdasd', 'asdasdasdasd');

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
(1, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '0000-00-00', 'amarela', 'Maternal II B', 1, 'asdasd', 12, 0, '2025-11-05 04:12:06', 1, 1),
(2, '123445A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-13', 'parda', 'Maternal I A', 1, 'DASDASD', 12, 0, '2025-10-28 20:00:19', 2, 1),
(3, '444444', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'preta', 'Maternal II B', 0, NULL, NULL, 0, '2025-10-28 20:04:52', 3, 1),
(4, '111', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '47.800.994-8', '2025-10-06', 'parda', 'Multisseriada M.M', 0, NULL, NULL, 0, '2025-10-28 20:08:27', 4, 1),
(5, '123445Aa', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'amarela', 'Bercario 2 C', 0, NULL, NULL, 0, '2025-10-28 20:09:00', 5, 1),
(6, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-19', 'amarela', 'Bercario 2 B', 0, NULL, NULL, 0, '2025-10-29 02:59:41', 6, 1),
(7, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-19', 'amarela', 'Bercario 2 A', 1, 'asdasda', 123, 0, '2025-10-29 03:00:49', 7, 1),
(8, '123dddd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'parda', 'Maternal I A', 1, 'asdasd', 123, 0, '2025-10-29 03:01:18', 8, 1),
(9, '123dddffff', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-20', 'preta', 'Maternal I B', 0, NULL, NULL, 0, '2025-10-29 03:01:49', 9, 1),
(10, '123eeedfv', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-13', 'amarela', 'Maternal I C', 0, NULL, NULL, 0, '2025-10-29 03:02:14', 10, 1),
(11, '123445Aaasdasdf', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'amarela', 'Bercario 2 C', 1, 'asdasda', 123, 0, '2025-10-29 03:02:46', 11, 1),
(12, '44532-Aasdasdasd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-20', 'amarela', 'Maternal II A', 1, 'asdadasd', 123123, 0, '2025-10-29 03:03:16', 12, 1),
(13, '123445Aaasdasdasd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'parda', 'Bercario 2 C', 1, 'asdasdasd', 123123, 0, '2025-10-29 03:03:41', 13, 1),
(14, '123445Aaaaadasdasd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-19', 'parda', 'Maternal II B', 1, 'Dipirona', 123123, 0, '2025-10-29 03:04:09', 14, 1),
(15, '444444asdasd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '2025-10-13', 'parda', 'Bercario 2 C', 1, 'asdasd', 123, 0, '2025-10-29 03:04:33', 15, 1),
(16, '123445A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '2025-10-12', 'preta', 'Multisseriada M.M', 0, NULL, NULL, 0, '2025-10-29 03:05:03', 16, 1),
(17, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-20', 'preta', 'Bercario 2 C', 1, 'asdasda', 123, 0, '2025-10-31 03:23:58', 17, 1),
(18, '123teste123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-12', 'amarela', 'Bercario 2 C', 1, 'asdasd', 1123, 0, '2025-10-31 03:33:27', 18, 1),
(19, '444444aasd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-13', 'parda', 'Maternal I A', 1, 'asdasdasd', 123, 0, '2025-10-31 03:59:23', 19, 1),
(20, '44532-Aaaaaaa', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-20', 'preta', 'Maternal I A', 0, NULL, NULL, 0, '2025-10-31 04:05:00', 20, 1),
(21, '123123aaaaaaaaaaaa', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-13', 'parda', 'Maternal I A', 0, NULL, NULL, 0, '2025-10-31 04:17:37', 21, 1),
(22, '123444567', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-20', 'amarela', 'Bercario 2 C', 1, 'asdasdas', 123123, 1, '2025-10-31 04:20:43', 22, 1),
(23, '123123sssdfvvv', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-20', 'parda', 'Bercario 2 C', 1, 'asdasda', 12, 1, '2025-10-31 20:21:02', 23, 1),
(24, '20090220042007', 'Sergio Chinaglia Breviglieri', '473.016.388-50', '23.423.423-4', '2021-10-09', 'branca', 'Bercario 2 A', 1, 'Dipirona', 30, 1, '2025-11-01 16:35:18', 24, 1),
(25, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '0000-00-00', 'amarela', 'Maternal II B', 1, 'asdasd', 12, 0, '2025-11-05 04:12:06', 25, 1),
(26, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '0000-00-00', 'amarela', 'Maternal II B', 1, 'asdasd', 12, 0, '2025-11-05 04:12:06', 26, 1),
(27, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '0000-00-00', 'amarela', 'Maternal II B', 1, 'asdasd', 12, 0, '2025-11-05 04:12:06', 27, 1),
(28, '123445Aaasd12312', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '0000-00-00', '', '', 1, 'asdasdas', 123, 0, '2025-11-05 03:01:46', 28, 1),
(29, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-11-03', 'indigena', 'Maternal I A', 1, 'asdasdasd', 1231, 0, '2025-11-05 03:03:47', 29, 1),
(30, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '0000-00-00', 'amarela', 'Maternal II B', 1, 'asdasd', 12, 0, '2025-11-05 04:12:06', 30, 1),
(31, '44532-A', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-11-03', 'preta', 'Bercario 2 B', 0, NULL, NULL, 0, '2025-11-05 03:14:27', 31, 1),
(32, '123123DeusMeAjuda', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '1996-06-06', 'parda', 'Maternal II B', 1, 'asddasdasd', 1, 0, '2025-11-05 16:17:14', 32, 1),
(33, '11111111111111111111111111erdfggg', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-10-21', 'preta', 'Bercario 2 C', 1, 'asdasdasd', 123123, 0, '2025-11-05 03:17:47', 33, 1),
(34, '44532-Adasda534534gggbbnnnmkkk', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '0000-00-00', 'parda', 'Multisseriada M.M', 0, 'dasdasda', 12312, 0, '2025-11-05 03:50:35', 34, 1),
(35, '44532-Adasda534534gggbbnnnmkkk', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '0000-00-00', 'parda', 'Multisseriada M.M', 0, 'dasdasda', 12312, 0, '2025-11-05 03:50:35', 35, 1),
(36, '44532-Adasda534534gggbbnnnmkkk', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '0000-00-00', 'parda', 'Multisseriada M.M', 0, 'dasdasda', 12312, 0, '2025-11-05 03:50:35', 36, 1),
(37, '123123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '23.423.423-4', '0000-00-00', 'amarela', 'Maternal II B', 1, 'asdasd', 12, 0, '2025-11-05 04:12:06', 37, 1),
(38, 'teste_victor_fodinha', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-11-27', 'indigena', 'Maternal I A', 1, 'asdasda', 1231, 0, '2025-11-05 16:45:20', 38, 1),
(39, '123123DeusMeAjuda123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2001-11-12', 'parda', 'Bercario 2 C', 0, '', 0, 0, '2025-11-05 16:01:21', 39, 1),
(40, '123123DeusMeAjuda123asdasd', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-11-02', 'parda', 'Bercario 2 C', 0, '', 0, 0, '2025-11-05 16:47:46', 40, 1),
(41, '123123DeusMeAjuda123', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', NULL, 'amarela', 'Maternal I A', 1, 'adsasdasd', 12313, 1, '2025-11-05 16:59:22', 41, 1),
(42, '20040909', 'VICTOR CHINAGLIA NETO', '473.016.388-50', '32.423.423-4', '2025-02-11', 'preta', 'Bercario 2 C', 0, '', 0, 0, '2025-11-05 17:02:58', 42, 1),
(43, 'asdasdasd123asd', 'asdasda asdasd', '113,231,231-23', NULL, '0000-00-00', 'parda', 'Maternal I C', 0, '', 0, 0, '2025-11-05 19:17:27', 44, 4),
(44, '123123asdasda.comas', 'asdasdasd', '123,123,123-12', NULL, '0000-00-00', 'indigena', 'Maternal I B', 1, 'asdasdasd', 123, 1, '2025-11-05 19:24:53', 45, 4),
(45, 'asdasdasd123sdaasd', 'asdasda asdasdasd', '132,312,312-31', '12,312,312-3', '0000-00-00', 'amarela', 'Bercario 2 C', 0, '', 0, 0, '2025-11-05 19:38:57', 46, 4),
(46, 'asd', 'asdasda asdasdasd', '132,312,312-31', '12,312,312-3', '0000-00-00', 'amarela', 'Bercario 2 C', 0, '', 0, 0, '2025-11-05 19:39:44', 47, 4),
(47, 'adasda33123', 'asdasasd asdasdasd', '123,123,123-12', '12,231,231-1', '0000-00-00', 'amarela', 'Maternal I A', 1, 'asdasdasdasd', 123123, 1, '2025-11-05 19:51:46', 48, 4),
(48, '123fffvbncczxzx', 'asdasdasd asdasdas', '12312312312', '123121231', '0000-00-00', 'parda', 'Maternal I C', 1, 'asdasdasd', 123, 1, '2025-11-05 20:00:35', 49, 4),
(49, '12312fffgadasd', 'asdasdasd asdasdas', '12312312312', '123123123', '0000-00-00', 'indigena', 'Maternal I A', 1, 'asdasdasdasd', 23, 1, '2025-11-05 20:03:14', 50, 4),
(50, 'sdadasd123123', 'sdasd', '23123123123', '123123123', '2004-02-20', 'parda', 'Maternal I A', 1, 'asdasdasdasd', 123123, 0, '2025-11-05 20:06:46', 51, 4);

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
(1, 0, 0, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, NULL, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL),
(2, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(3, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(4, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(5, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(6, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(7, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(8, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(9, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(10, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(11, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(12, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(13, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(14, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(15, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(16, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(17, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(18, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(19, 1, 0, 0, NULL, 1, 'asdasd', 0, NULL, 1, 'asdasdads', 0, 1, 'asdasd', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(20, 1, 123, 1, 1231.23, 1, 'asdasdasd', 1, '123123', 1, 'asdasdasd', 1, 1, 'asdasdasd', 1, 'alugada', 100.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(21, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, 'alugada', 1000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(22, 1, 123, 1, 1231.23, 1, 'asdasd', 1, 'UNIMED', 1, 'asdasdasd', 1, 1, 'asdasdasd', 1, 'propria', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'ASDASD', 1, 0, 0, '0'),
(23, 1, 0, 1, 1.23, 1, 'asdasdasd', 1, 'asdasdasd', 1, 'asdasd', 1, 1, 'asdasd', 1, 'alugada', 1.23, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 'Aaasdasd', 1, 1, 0, '0'),
(24, 1, 3, 1, 1800.00, 1, 'Pelo de gato', 1, 'Unimed', 0, NULL, 0, 1, 'Ligamento Cruzado', 1, 'propria', NULL, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 'Dengue', 1, 1, 0, '0'),
(25, 0, 0, 1, 2342342.34, 1, 'dasdasd', 1, 'asdasdasd', 1, 'asdasdasd', 0, 1, 'asdasdasd', 0, 'alugada', 10000.00, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 'asdasdasd', 1, 1, 0, '0'),
(26, 0, 0, 1, 2342342.34, 1, 'dasdasd', 1, 'asdasdasd', 1, 'asdasdasd', 0, 1, 'asdasdasd', 0, 'alugada', 10000.00, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 'asdasdasd', 1, 1, 0, '0'),
(27, 0, 0, 1, 2342342.34, 1, 'dasdasd', 1, 'asdasdasd', 1, 'asdasdasd', 0, 1, 'asdasdasd', 0, 'alugada', 10000.00, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 'asdasdasd', 1, 1, 0, '0'),
(28, 1, 23, 1, 42.00, 1, 'Pelo de Gato', 1, 'UNIMED', 1, 'Autismo', 1, 1, 'asdasd', 1, 'alugada', 100.00, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Dengue', 1, 1, 0, '1'),
(29, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(30, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(31, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(32, 0, 0, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, NULL, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL),
(33, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(34, 0, 0, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, NULL, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL),
(35, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(36, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(37, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(38, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(39, 0, 0, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, NULL, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL),
(40, 0, 0, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, NULL, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL),
(41, 0, 0, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL),
(42, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '0'),
(43, 0, 0, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL),
(44, 0, 2, 1, 123123.00, 1, 'asdasdasd asdasdasd', 1, '12312312', 1, 'asdasdasd', 1, 1, 'asdasdasd', 1, 'Alugada', 12313123.00, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', 1, 1, 1, 'Outros'),
(45, 0, 2, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, 'Própria', 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 'Outros'),
(46, 0, 2, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, 'Própria', 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 'Outros'),
(47, 0, 2, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, 'Própria', 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 'Outros'),
(48, 0, 2, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, 'Própria', 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 'Outros'),
(49, 0, 2, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, 'Própria', 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 'Outros'),
(50, 0, 3, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, 'Própria', 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 'Outros'),
(51, 0, 2, 0, 0.00, 0, '', 0, '', 0, '', 0, 0, '', 0, 'Própria', 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 'Outros'),
(52, 1, 1231231, 1, 123123.00, 1, 'asdasasdas', 1, 'asdasdasd', 1, 'asdasasdasd', 1, 1, 'asdasdasdasd', 1, 'Alugada', 99999999.99, 0, 1, 0, 1, 1, 0, 0, 0, 0, 1, '', 1, 0, 0, 'Outros');

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
  `cpf` varchar(14) DEFAULT NULL,
  `reset_token` varchar(6) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `nome`, `email`, `senha`, `celular`, `cpf`, `reset_token`, `token_expira`) VALUES
(1, 'Victor Chinaglia', 'chinagliavictor@victor.com', '$2y$10$oU3f7Y/cbewyGcl3UVuWXOgmUmYxm6VUWbc.i7.XoZibV5NxxzqeS', '(12) 31231-2312', '473.016.388-50', NULL, NULL),
(2, 'Victor Chinaglia Neto', 'victor@chinaglia.com', 'Victor@chinaglia.com123', '234234234234', '23423423423', NULL, NULL),
(3, 'fsdfsdf sdfsdfsdf', 'asdasd@adasda.com', 'victorTeste123.', '342342342342', '23423423423', NULL, NULL),
(4, 'asdasd asdasd', 'teste@teste.com', 'victorTeste123.', '234234234234', '23423423423', NULL, NULL),
(5, 'Victor Chinaglia', 'victor@gmail.com', '$2a$11$0ck4goBTpHxaP6q5efDZ/.37ZFdIY1F.CmXoEfgWzomGp1gdGJTBa', '123123123123', '12312312312', NULL, NULL);

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
(1, 1, 1, 1, '2025-10-28 16:44:39', 1, 50, 1, NULL, NULL, NULL, 0),
(2, 2, 2, 1, '2025-10-28 17:00:19', 2, NULL, 2, NULL, NULL, NULL, 0),
(3, 3, 3, 1, '2025-10-28 17:04:52', 3, NULL, 3, NULL, NULL, NULL, 0),
(4, 4, 4, 1, '2025-10-28 17:08:27', 4, NULL, 4, NULL, NULL, NULL, 0),
(5, 5, 5, 1, '2025-10-28 17:09:00', 5, NULL, 5, NULL, NULL, NULL, 0),
(6, 6, 6, 1, '2025-10-28 23:59:41', 6, NULL, 6, NULL, NULL, NULL, 0),
(7, 7, 7, 1, '2025-10-29 00:00:49', 7, NULL, 7, NULL, NULL, NULL, 0),
(8, 8, 8, 1, '2025-10-29 00:01:18', 8, NULL, 8, NULL, NULL, NULL, 0),
(9, 9, 9, 1, '2025-10-29 00:01:49', 9, NULL, 9, NULL, NULL, NULL, 0),
(10, 10, 10, 1, '2025-10-29 00:02:14', 10, NULL, 10, NULL, NULL, NULL, 0),
(11, 11, 11, 1, '2025-10-29 00:02:46', 11, NULL, 11, NULL, NULL, NULL, 0),
(12, 12, 12, 1, '2025-10-29 00:03:16', 12, NULL, 12, NULL, NULL, NULL, 0),
(13, 13, 13, 1, '2025-10-29 00:03:41', 13, NULL, 13, NULL, NULL, NULL, 0),
(14, 14, 14, 1, '2025-10-29 00:04:09', 14, NULL, 14, NULL, NULL, NULL, 0),
(15, 15, 15, 1, '2025-10-29 00:04:33', 15, NULL, 15, NULL, NULL, NULL, 0),
(16, 16, 16, 1, '2025-10-29 00:05:03', 16, NULL, 16, NULL, NULL, NULL, 0),
(17, 17, 17, 1, '2025-10-31 00:23:58', 17, 18, 17, NULL, NULL, NULL, 0),
(18, 18, 18, 1, '2025-10-31 00:33:27', 19, 20, 18, NULL, NULL, NULL, 0),
(19, 19, 19, 1, '2025-10-31 00:59:23', 21, NULL, 19, NULL, NULL, NULL, 0),
(20, 20, 20, 1, '2025-10-31 01:05:00', 22, NULL, 20, NULL, NULL, NULL, 0),
(21, 21, 21, 1, '2025-10-31 01:17:37', 23, NULL, 21, NULL, NULL, NULL, 0),
(22, 22, 22, 1, '2025-10-31 01:20:43', 24, 25, 22, 23, 24, 25, 0),
(23, 23, 23, 1, '2025-10-31 17:21:02', 26, 27, 26, 27, 28, 29, 0),
(24, 24, 24, 1, '2025-11-01 13:35:18', 28, 29, 30, 31, NULL, NULL, 0),
(25, 25, 25, 1, '2025-11-04 23:55:19', 30, NULL, 32, NULL, NULL, NULL, 0),
(26, 26, 26, 1, '2025-11-04 23:55:48', 31, NULL, 33, NULL, NULL, NULL, 0),
(27, 27, 27, 1, '2025-11-04 23:57:59', 32, NULL, 34, NULL, NULL, NULL, 0),
(28, 28, 28, 1, '2025-11-05 00:00:59', 33, 34, 35, 36, 37, 38, 0),
(29, 29, 29, 1, '2025-11-05 00:03:47', 35, 36, 39, NULL, NULL, NULL, 0),
(30, 30, 30, 1, '2025-11-05 00:13:53', 37, NULL, NULL, NULL, NULL, NULL, 0),
(31, 31, 31, 1, '2025-11-05 00:14:27', 38, NULL, NULL, NULL, NULL, NULL, 0),
(32, 32, 32, 1, '2025-11-05 00:15:03', 39, 41, NULL, NULL, NULL, NULL, 0),
(33, 33, 33, 1, '2025-11-05 00:17:47', 40, NULL, 40, NULL, NULL, NULL, 0),
(34, 34, 34, 1, '2025-11-05 00:29:01', 42, 43, NULL, NULL, NULL, NULL, 0),
(35, 35, 35, 1, '2025-11-05 00:29:34', 44, 45, NULL, NULL, NULL, NULL, 0),
(36, 36, 36, 1, '2025-11-05 00:31:13', 46, 47, NULL, NULL, NULL, NULL, 0),
(37, 37, 38, 1, '2025-11-05 01:10:55', 49, NULL, NULL, NULL, NULL, NULL, 0),
(38, 38, 39, 1, '2025-11-05 01:13:15', 51, 52, NULL, NULL, NULL, NULL, 0),
(39, 39, 40, 1, '2025-11-05 01:14:43', 53, 54, NULL, NULL, NULL, NULL, 0),
(40, 40, 41, 1, '2025-11-05 13:01:47', 55, NULL, NULL, NULL, NULL, NULL, 0),
(41, 41, 42, 1, '2025-11-05 13:59:22', 56, NULL, NULL, NULL, NULL, NULL, 0),
(42, 42, 43, 1, '2025-11-05 14:00:11', 57, NULL, NULL, NULL, NULL, NULL, 1),
(44, 44, 46, 4, '2025-11-05 16:24:53', 62, 63, 1, 1, 1, 1, 1),
(45, 45, 47, 4, '2025-11-05 16:38:57', 64, 65, 1, 1, 1, 1, 1),
(46, 46, 48, 4, '2025-11-05 16:39:44', 66, 67, 1, 1, 1, 1, 1),
(47, 47, 49, 4, '2025-11-05 16:51:46', 68, 69, 1, 1, 1, 1, 1),
(48, 48, 50, 4, '2025-11-05 17:00:35', 70, 71, 1, 1, 1, 1, 1),
(49, 49, 51, 4, '2025-11-05 17:03:14', 72, 73, 1, 1, 1, 1, 1),
(50, 50, 52, 4, '2025-11-05 17:06:46', 74, 75, 1, 1, 1, 1, 1);

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
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 26),
(24, 30),
(27, 34),
(28, 35),
(29, 39),
(33, 40);

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
(1, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô'),
(2, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô'),
(3, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1300', 'Avó'),
(4, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avó'),
(5, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô'),
(6, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avó'),
(7, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avô'),
(8, '', '', '', NULL),
(9, '', '', '', NULL),
(10, '', '', '', NULL),
(11, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avó'),
(12, '', '', '', NULL),
(13, '', '', '', NULL),
(14, '', '', '', NULL),
(15, '', '', '', NULL),
(16, '', '', '', NULL),
(17, '', '', '', NULL),
(18, '', '', '', NULL),
(19, '', '', '', NULL),
(20, '', '', '', NULL),
(21, '', '', '', NULL),
(22, 'ASDAASDAD ASDASDASD', '473.016.388-50', '(19) 98354-1308', 'Mãe'),
(23, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Mãe'),
(24, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '19983541308', 'Avô'),
(25, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '19983541308', 'Irmã'),
(26, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avó'),
(27, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Irmã'),
(28, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '19983541308', 'Tia'),
(29, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '19983541300', 'Tia'),
(30, 'Vanessa Oliveira Lopes', '473.016.388-50', '(32) 42342-3423', 'Avó'),
(31, 'Juliana Santos Breviglieri', '473.016.388-50', '(42) 34234-2342', 'Avó'),
(32, 'asdasd asdasdasd', '473.016.388-50', '(19) 98354-1308', 'Tio'),
(33, 'asdasd asdasdasd', '473.016.388-50', '(19) 98354-1308', 'Tio'),
(34, 'asdasd asdasdasd', '473.016.388-50', '(19) 98354-1308', 'Tio'),
(35, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Tia'),
(36, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Irmão'),
(37, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', ''),
(38, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', ''),
(39, '', '', '', NULL),
(40, 'VICTOR CHINAGLIA NETO', '473.016.388-50', '(19) 98354-1308', 'Avó');

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
(1, 'Avô', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', 0.00, 0, 0.00),
(2, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-06', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(3, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-10-13', 'Solteiro', 'Médio', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'asdasdasdasd', '', '', '', NULL, 0, NULL),
(4, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-19', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(5, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(6, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-20', 'Solteiro', 'Superior', '(19) 98354-1308', 'asdasdasd@asdasd.com', '', '', '', '', NULL, 0, NULL),
(7, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(8, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-10-06', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(9, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(10, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(11, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-10-13', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(12, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-06', 'Solteiro', 'Médio', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(13, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(14, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-19', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(15, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-13', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(16, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(17, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(18, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Técnico', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', '', '', '', '', NULL, 0, NULL),
(19, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-06', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(20, 'Irmão', 'asdasdasdasdasdasdasd asdasd', '2025-10-05', 'Divorciado', 'Superior', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', '', '', '', '', NULL, 0, NULL),
(21, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(22, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-05', 'Solteiro', 'Médio', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(23, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(24, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-20', 'Solteiro', 'Pós-graduação', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'asdasdasdasd', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1.23, 1, 1231.23),
(25, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Superior', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', 'dasdasdasd', 'asdasdasd', '(19) 98354-1308', '8h as 17h', 12312312.31, 1, 1231.23),
(26, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-13', 'Solteiro', 'Pós-graduação', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'ASDASD', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1.23, 1, 1.23),
(27, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-10-12', 'Solteiro', 'Superior', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', 'asdasdasdasdasd', 'asdasdasd', '(19) 98354-1308', '8h as 17h', 12.31, 1, 1.23),
(28, 'Mãe', 'Isabelle Santos Chinaglia', '2007-02-09', 'Casado', 'Pós-graduação', '(19) 98354-1308', 'isabelle@isabelle.com', 'Microsoft', 'Gerente de Programação', '(12) 83238-4938', '8h as 10h', 18900.50, 1, 9000.00),
(29, 'Pai', 'Victor Chinaglia Neto', '2004-02-20', 'Casado', 'Pós-graduação', '(19) 98354-1308', 'victor@victor.com', 'Microsoft', 'Programador Senior', '(19) 98354-1308', '8h as 17h', 10000.00, 1, 1900.00),
(30, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-11-04', 'Viuvo', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(31, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-11-04', 'Viuvo', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(32, 'Irmã', 'VICTOR CHINAGLIA NETO', '2025-11-04', 'Viuvo', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(33, 'Irmão', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'ASDASD', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1.00, 1, 1.00),
(34, 'Irmão', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', 'Superior', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', 'asdasdasdasdasd', 'asdasdasd', '(19) 98354-1300', '8h as 17h', 12.00, 1, 1.00),
(35, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', 'Médio', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'ASDASD', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1231231.23, 1, 23.42),
(36, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', 'Técnico', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', 'asdasdasdasdasd', 'asdasdasd', '(19) 98354-1308', '8h as 17h', 322131.23, 1, 2.34),
(37, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-03', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(38, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-03', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(39, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', '', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'asdasdasd', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1.00, 1, NULL),
(40, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-03', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'ASDASD', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1231231.23, 1, 1231231.23),
(41, '', '', NULL, '', '', '', '', '', '', '', '', NULL, 0, NULL),
(42, 'Irmão', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'asdasdasdasd', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1.00, 0, 0.00),
(43, 'Avô', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', 'Pós-graduação', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', 'asdasdasdasdasd', 'asdasdasd', '(19) 98354-1308', '8h as 17h', 12.00, 1, 42.00),
(44, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'asdasdasdasd', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1231231.23, 1, 242.34),
(45, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', 'Pós-graduação', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', 'asdasdasdasdasd', 'asdasdasd', '(19) 98354-1308', '8h as 17h', 12312312.31, 1, 42342.34),
(46, 'Irmão', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'asdasdasdasd', 'ASDASDASD', '(19) 98354-1308', '8h as 10h', 1231231.23, 1, 242.34),
(47, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', 'Pós-graduação', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', 'asdasdasdasdasd', 'asdasdasd', '(19) 98354-1308', '8h as 17h', 12312312.31, 1, 42342.34),
(48, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-03', 'Solteiro', 'Pós-graduação', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(49, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-03', 'Solteiro', 'Pós-graduação', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(50, 'Mãe', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Solteiro', 'Técnico', '(19) 98354-1308', 'dasdasdasd@asddasdasd.com', '', '', '', '8h as 17h', 12.31, 0, 0.00),
(51, 'Avô', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', 'asdasdasdasdasdasd', 'aaaaaaaa', '(11) 11111-1111', '8h as 10h', 1.00, 1, 1.00),
(52, '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0.00, 0, 0.00),
(53, 'Avô', 'VICTOR CHINAGLIA NETO', '0000-00-00', 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', 0.00, 0, 0.00),
(54, '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0.00, 0, 0.00),
(55, 'Avô', 'VICTOR CHINAGLIA NETO', '2025-11-02', 'Divorciado', '', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(56, 'Avô', 'VICTOR CHINAGLIA NETO', NULL, 'Solteiro', 'Superior', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '', '', NULL, 0, NULL),
(57, 'Mãe', 'VICTOR CHINAGLIA NETO', NULL, 'Solteiro', 'Técnico', '(19) 98354-1308', 'ASDASDASD@ASDASDASDA.com', '', '', '(23) 42342-34', '', NULL, 1, 4234.23),
(58, '', 'asdasdasd asdasdasdasd', '0000-00-00', 'União Estável', 'Superior', '(12) 31231-2312', 'asdasd@dasdasd.com', 'dasdasd asdasdasdasd', 'a sasdasd asdasd asdasd', '(12) 31231-2312', '24323423', 99999999.99, 1, 99999999.99),
(59, '', 'asdasdasd', '0000-00-00', 'Viuvo', 'Superior', '(12) 31231-2313', 'asdasasd@dadasd.com', 'asdasd asdasdas', 'asdasdasdasd', '(31) 23123-1231', 'sdadasd', 99999999.99, 1, 99999999.99),
(60, '', 'asdasdasd asdasda', '0000-00-00', 'Viuvo', 'Superior', '(12) 31231-2312', 'asdads@asdada.com', 'asdasd asdasda', 'asdadads', '(12) 31231-2312', '313123', 99999999.99, 0, 0.00),
(61, '', 'sdasdasdasdasd', '0000-00-00', 'Divorciado', 'Superior', '(12) 31231-2312', 'asdadasd@adsdasdasd.com', 'asdasdasdasdasd', 'asdasdadasdasd', '(12) 31231-2312', '', 0.00, 0, 0.00),
(62, '', 'asdasdasd', '0000-00-00', 'Casado', 'Médio', '(12) 31231-2322', 'sdasdas@adasda.com', 'asdasdasd asdasdasd', 'asdasdasda', '(11) 23123-1231', '5h as 5h', 1231231.00, 1, 12312313.00),
(63, '', 'asdasdasd', '0000-00-00', 'Viuvo', 'Médio', '(31) 23123-1231', 'dadsd@asdasdad.co', 'asdasd asdasdasdasd', 'asdasdasdas', '(12) 31312-3123', '2h as 44h', 12312312.00, 0, 0.00),
(64, 'Avô', 'asdasdasdasd asdasdasda', '0000-00-00', 'Casado', 'Técnico', '(12) 31231-2312', 'asdasdasd@adsdasd.com', '', '', '(  )      -', '', 0.00, 0, 0.00),
(65, 'Pai', 'asdasdasd', '0000-00-00', 'Divorciado', 'Fundamental', '(12) 31231-2312', 'sdasdas@asdasd.com', '', '', '(  )      -', '', 0.00, 0, 0.00),
(66, 'Outro', 'asdasdasdasd asdasdasda', '0000-00-00', 'Casado', 'Técnico', '(12) 31231-2312', 'asdasdasd@adsdasd.com', '', '', '(  )      -', '', 0.00, 0, 0.00),
(67, 'Avô', 'asdasdasd', '0000-00-00', 'Divorciado', 'Fundamental', '(12) 31231-2312', 'sdasdas@asdasd.com', '', '', '(  )      -', '', 0.00, 0, 0.00),
(68, 'Avô', 'asdasdasd', '0000-00-00', 'Divorciado', 'Técnico', '(12) 31231-2312', 'asdasdasd@asddasdasd.com', '', '', '(  )      -', '', 0.00, 0, 0.00),
(69, '', 'sdasdasdasd asdasdasd', '0000-00-00', 'Casado', 'Superior', '(12) 31231-2312', 'asdasdasd@dadasdasd.com', '', '', '(  )      -', '', 0.00, 0, 0.00),
(70, 'Avô', 'asdasdasd asdasdasd', '0000-00-00', 'Solteiro', 'Técnico', '12312312312', 'asdasdasd@asdasdasd.com', '', '', '12312312312', '', 0.00, 0, 0.00),
(71, '', 'asdasdasd asdasdasdasd', '0000-00-00', 'Divorciado', 'Técnico', '12312312312', 'asdasdasdasd@sdadadasd.com', '', '', '', '', 0.00, 0, 0.00),
(72, 'Irmã', 'asdasdasd asdasdasd', '0000-00-00', 'Casado', 'Superior', '12312312312', 'asdassdad@asdasasd.com', 'asdasdasdasdas asdasdasda', 'asdasdasd', '12312312312', '5h as 17h', 123123.00, 1, 99999999.99),
(73, 'Irmão', 'dasdasdasd asdasdasd', '0000-00-00', 'Divorciado', 'Técnico', '12312312312', 'sdasdadasd@adasdadasdas', 'dasdasdasd', 'dasdasdasd', '23123123123', '2131312', 0.00, 1, 99999999.99),
(74, 'Avô', 'asdasdasdasdasdasd', '2004-02-20', 'Casado', 'Superior', '12312312313', 'dasdadasda@dadasd.com', 'asdasdasd', 'asdasdasd', '', '1231213', 12331132.00, 1, 12312312.00),
(75, 'Irmão', 'sdasd asdasdasdasd', '2004-02-20', 'Divorciado', 'Superior', '12312313123', 'asdasd@adsdasd.com', 'asdasdasd', 'asdasdasd', '12312312312', '123123123', 12312312.00, 1, 99999999.99);

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
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `tb_estrutura_familiar`
--
ALTER TABLE `tb_estrutura_familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_matricula`
--
ALTER TABLE `tb_matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `tb_pessoas_autorizadas`
--
ALTER TABLE `tb_pessoas_autorizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tb_responsaveis`
--
ALTER TABLE `tb_responsaveis`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
