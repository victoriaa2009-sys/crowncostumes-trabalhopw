-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/11/2026 às 15:32
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
-- Banco de dados: `crowncostumes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `foto`, `categoria`) VALUES
(1, 'Minions', 'Acessório Minions', 87.90, 'fotos/acessorios/acessorios1.jpg', 'Acessórios'),
(2, 'Espião', 'Acessório Espião', 87.90, 'fotos/acessorios/acessorios2.jpg', 'Acessórios'),
(3, 'Mágico', 'Acessório Mágico', 87.90, 'fotos/acessorios/acessorios4.jpeg', 'Acessórios'),
(4, 'Chapéu de Bruxa', 'Acessório Chapéu de Bruxa', 87.90, 'fotos/acessorios/acessorios6.jpeg', 'Acessórios'),
(6, 'Fantasia de Harry Potter', 'Fantasia completa de Harry Potter', 200.00, 'fotos/unissex/uni7.webp', 'Unissex'),
(7, 'Fantasia do Máskara', 'Fantasia completa do Máskara', 148.98, 'fotos/masculinas/mascara.jpg', 'Masculino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `cpf`, `data_nascimento`, `email`) VALUES
(1, 'victoria', 'victoria', 'victoria', '08858662903', '2009-05-20', 'victoria@gmail.com'),
(3, 'oriana', 'oriana', '$2y$10$CsRGQp2MN45no2rj.xT5y.aoKwD9J.r/93B3h1tg7tyVr4cWVzmMm', '11111111111', '2008-08-22', 'oriana@gmail.com'),
(5, 'bia', 'bia', '$2y$10$m5mL/l2l0EpzKXHsJgjXI../7asmvyMMPNBHjCgK3aXDo.RfRR1VW', '22222222222', '2008-12-12', 'bia@gmail.com'),
(7, 'sophie', 'sophie', '$2y$10$Yh80aYWJ0WUlpU8/.HO8rOoxreLTO/Pdez57WrDJ5FAwTgrNGe.Am', '33333333333', '2008-06-06', 'sophie@gmai.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
