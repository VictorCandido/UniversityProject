-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 10-Abr-2019 às 19:43
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `cargoID` int(11) NOT NULL,
  `codigo` varchar(256) NOT NULL,
  `cargo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`cargoID`, `codigo`, `cargo`) VALUES
(17, 'prof', 'Professor'),
(18, 'al', 'Aluno'),
(19, 'dir', 'Diretor'),
(20, 'coord', 'Coordenador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE `materias` (
  `materiaID` int(11) NOT NULL,
  `codigo` varchar(128) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `professores` varchar(256) DEFAULT NULL,
  `alunos` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nascimento` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(128) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(128) DEFAULT NULL,
  `complemento` varchar(256) DEFAULT NULL,
  `cidade` varchar(128) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuarioID`, `nome`, `cpf`, `nascimento`, `email`, `usuario`, `senha`, `cep`, `logradouro`, `numero`, `bairro`, `complemento`, `cidade`, `uf`) VALUES
(49, '1@1', '1@1', '06/03/2019', '1@1', '1@1', '1@1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Víctor Evandro Cândido da Silva', '420.863.048-54', '23/11/1998', 'victorev@outlook.com', 'Victor', '159357victor', '13295-000', 'Travessa Gumercindo Comoti', 102, 'Cafezal 2', '', 'Itupeva', 'SP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`cargoID`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materiaID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `cargoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
