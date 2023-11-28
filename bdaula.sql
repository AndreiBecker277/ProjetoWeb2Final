-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2023 às 02:17
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdaula`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `id` int(11) NOT NULL,
  `nomecategoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`id`, `nomecategoria`) VALUES
(1, 'Fones'),
(2, 'Cadeiras'),
(3, 'Monitores'),
(4, 'Mouses'),
(5, 'Teclados'),
(6, 'Gabinetes'),
(7, 'Peças internas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfeedback`
--

CREATE TABLE `tbfeedback` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfeedback`
--

INSERT INTO `tbfeedback` (`id`, `nome`, `feedback`) VALUES
(1, 'fd', 'sfsf'),
(2, 'nnnnn', ' nnnnnn'),
(3, 'xiru', 'adad'),
(4, 'zzzz', 'ffffffff'),
(5, 'ggggg', '6uk6k');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoriaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`id`, `nome`, `preco`, `descricao`, `imagem`, `categoriaid`) VALUES
(2, 'monitor', '1', 'tela ultra curciva ', 'uploads/monitor.jpg', 3),
(3, 'fone', '1', 'fonezinho podre', 'uploads/fone.jfif', 1),
(4, 'fone gaymer', '12', 'fone rosa', 'uploads/fone.png', 1),
(5, 'cadeira gayder', '1233', 'cadeira boiola ', 'uploads/cadeira.jpg', 2),
(6, 'armario gaymer', '200', 'fodao', 'uploads/armario gaimer.jpg', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbrelacionamentos`
--

CREATE TABLE `tbrelacionamentos` (
  `id` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkfeedback` int(11) NOT NULL,
  `fkproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbrelacionamentos`
--

INSERT INTO `tbrelacionamentos` (`id`, `fkusuario`, `fkfeedback`, `fkproduto`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 2, 2, 1),
(4, 0, 1, 3),
(5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `nome`, `email`, `endereco`, `senha`) VALUES
(9, 'joao', 'j@gmail.com', 'a', '1'),
(10, 'joao', 'j@gmail.com', 'a', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbfeedback`
--
ALTER TABLE `tbfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Índices para tabela `tbrelacionamentos`
--
ALTER TABLE `tbrelacionamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkproduto` (`fkproduto`),
  ADD KEY `fkfeedback` (`fkfeedback`),
  ADD KEY `fkusuario` (`fkusuario`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbfeedback`
--
ALTER TABLE `tbfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbrelacionamentos`
--
ALTER TABLE `tbrelacionamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD CONSTRAINT `tbproduto_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `tbcategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
