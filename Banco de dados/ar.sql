-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/09/2023 às 12:28
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cestas`
--

CREATE TABLE `cestas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `outros` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome_fornecedor` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome_fornecedor`, `senha`, `email`, `endereco`) VALUES
(1, '', 'm', 'm', ''),
(2, '', 'm', 'm', ''),
(3, '', 'a', 'a', 'a'),
(4, 'a', 'a', 'a', 'a'),
(5, 'a', 'a', 'a', 'a'),
(6, 'Doces Fronteira', '123456', 'fronteira@gmail.com', 'Rua Mate Laranjeira'),
(7, 'Doces Fronteira', '123456', 'fronteira@gmail.com', 'Rua Mate Laranjeira'),
(8, 'Copagril', '123456', 'copagril@gmail.com', 'Rua Guaira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `preco` varchar(10) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `tipo`, `imagem`) VALUES
(36, 'a', '2', 'doces', 'img/64fee6531cd01.png'),
(40, 'Bolo', '5', 'Bolos', 'img/650034a401d15.jpg'),
(41, 'bolo2', '5', 'Bolos', 'img/650034b187808.jpg'),
(42, 'bolo3', '8', 'Bolos', 'img/650035bb78340.jpg'),
(43, 'Bolo', '9', 'Bolos', 'img/6500387c93ff9.jpg'),
(44, 'bolo', '3', 'Bolos', 'img/650038a30f5d0.jpg'),
(45, 'Bolo De Chocolate', '25', 'Bolos', 'img/65017ef5bc2a7.jpg'),
(46, 'Bolo de Laranja', '29', 'Bolos', 'img/65017f09377dd.jpg'),
(47, 'Flan de vinho', '10', 'Sobremesas', 'img/650182234a5bf.jpg'),
(48, 'Mousse de Maracujá', '9', 'Sobremesas', 'img/650182405dd54.jpg'),
(49, 'Bolo de pote', '15', 'Sobremesas', 'img/6501825626000.jpg'),
(50, 'Pudim', '10', 'Sobremesas', 'img/65018269ae04e.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`) VALUES
(1, 'cleiton', 'mallmann', 'cleiton@gmail.com', '123456'),
(2, 'Adriana', 'Lima', 'adriana@gmail.com', '123456'),
(3, 'Trento', '', 'Trento@trento.com', 'Rua Monjoli'),
(4, 'Trento', '', 'Trento@trento.com', 'Rua Monjoli'),
(5, 'Trento', '', 'Trento@trento.com', 'Rua Monjoli'),
(6, 's', 's', 's', 's'),
(7, 'a', 'a', 'a', 'a');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
