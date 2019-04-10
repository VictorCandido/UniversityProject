-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 10-Abr-2019 às 19:44
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
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `clienteID` int(11) NOT NULL,
  `clienteNome` varchar(128) NOT NULL,
  `clienteCPF` varchar(128) NOT NULL,
  `clienteEmail` varchar(128) NOT NULL,
  `clienteOperadoraID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`clienteID`, `clienteNome`, `clienteCPF`, `clienteEmail`, `clienteOperadoraID`) VALUES
(8, 'Victor Evandro Cândido da Silva', '420.863.048-54', 'victorev@outlook.com', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operadora`
--

CREATE TABLE `operadora` (
  `operadoraID` int(11) NOT NULL,
  `operadoraNome` varchar(128) NOT NULL,
  `operadoraCNPJ` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `operadora`
--

INSERT INTO `operadora` (`operadoraID`, `operadoraNome`, `operadoraCNPJ`) VALUES
(1, 'VIVO', '111.111.111.11-11'),
(2, 'TIM', '2222222'),
(3, 'CLARO', '333333333'),
(4, 'Nextel', '444444444444'),
(5, 'OI', '55555555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`clienteID`);

--
-- Indexes for table `operadora`
--
ALTER TABLE `operadora`
  ADD PRIMARY KEY (`operadoraID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `operadora`
--
ALTER TABLE `operadora`
  MODIFY `operadoraID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
