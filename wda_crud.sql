-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Abr-2024 às 14:38
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wda_crud`
--

CREATE DATABASE wda_crud;
USE wda_crud;

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `birthdate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `hood` varchar(100) NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `cpf_cnpj`, `birthdate`, `address`, `hood`, `zip_code`, `city`, `state`, `phone`, `mobile`, `ie`, `created`, `modified`) VALUES
(1, 'Maria Eduarda', '33287641903', '2006-06-10 00:00:00', 'Rua Presidente Getúlio Vargas, 54', 'Jd. Faculdade', '18079562', 'Sorocaba', 'SP', '32322323', '15998765432', '111111112', '2024-04-16 09:23:50', '2024-04-16 09:24:55'),
(2, 'Vitor Hugo', '54332198716', '2008-07-05 00:00:00', 'Rua João Goulart, 197', 'Parque São Bento', '12345678', 'Sorocaba', 'SP', '32232233', '15998765942', '123122111', '2024-04-16 09:27:05', '2024-04-16 09:27:05'),
(3, 'Paulo Arthur', '33344455566', '2003-11-04 00:00:00', 'Rua Natal, 178', 'Jd. Paulistano', '11111111', 'Sorocaba', 'SP', '33333333', '15999999999', '123412534', '2024-04-16 09:29:46', '2024-04-16 09:29:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `user`, `password`, `foto`) VALUES
(1, 'admin', 'admin', '$2a$08$CflfllePArKlBJomM0F6a.e9wMGIXjP.shQQi7ABJAW3X.ep8BNru', 'admin.jpg'),
(2, 'Fujiru Nakombi', 'fujiru', '$2a$08$CflfllePArKlBJomM0F6a.oJ1F9Dc56ur4yQAxgf7u496qXB9QLA.', '661e70e202c9d.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `formapgto` varchar(20) NOT NULL,
  `datavenda` datetime NOT NULL,
  `dataentrega` datetime NOT NULL,
  `obs` text DEFAULT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `formapgto`, `datavenda`, `dataentrega`, `obs`, `foto`) VALUES
(1, 'Débito', '2023-03-10 00:00:00', '2023-03-12 00:00:00', 'Entrega via SEDEX.', '661e6fa46403e.png'),
(2, 'Crédito, 3x', '2023-10-12 00:00:00', '2023-10-17 00:00:00', 'Retirada na loja.', '661e6fccb57d1.png'),
(3, 'Boleto', '2024-04-14 00:00:00', '2024-04-16 00:00:00', 'Entrega via SEDEX.', '661e6ffcb470c.png'),
(4, 'Dinheiro', '2024-04-16 00:00:00', '2024-04-21 00:00:00', 'Entrega via SEDEX.', '661e702940873.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
