-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Maio-2023 às 07:26
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `NomeCliente` varchar(100) NOT NULL,
  `EmailCliente` varchar(100) NOT NULL,
  `cpfCliente` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pedCliente` varchar(100) NOT NULL,
  `telCliente` varchar(100) NOT NULL,
  `statusCliente` int NOT NULL,
  `Usuario_idUsuario` int NOT NULL,
  `dataRegCliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `NomeCliente`, `EmailCliente`, `cpfCliente`, `pedCliente`, `telCliente`, `statusCliente`, `Usuario_idUsuario`, `dataRegCliente`) VALUES
(9, 'Matheus Henrique', 'mathhenry395@gmail.com', '23769929829', '0', '', 1, 3, '2020-07-27 19:11:51'),
(10, 'Fabrício Rodrigues', 'fabriciocliente@cliente.com', '12345678910', '', '', 1, 3, '2020-08-07 17:54:48'),
(15, 'Diego Tales Silva', 'diogo@cliente.com', '46849588156', '', '', 1, 3, '2023-04-27 22:09:39'),
(16, 'Abel Braga', 'abel@palmeiras.com', '98561248925', '', '', 1, 3, '2023-04-27 22:44:30'),
(17, 'Rogério Ceni', 'rogerio@spfc.com', '66425318759', '', '', 1, 3, '2023-04-27 22:45:12'),
(18, 'João Paulo', 'joaopaulo@gmail.com', '15948746856', '', '', 1, 3, '2023-04-28 21:42:48'),
(19, 'Rodrigo Caio Silva', 'rodrigo@cliente.net', '55544488822', '', '', 1, 3, '2023-04-28 21:45:36'),
(20, 'João Paulo Silva', 'joaopaulo@gmail.com', '44466688899', '', '', 1, 3, '2023-04-28 21:49:49'),
(21, 'José Rodrigues Silva', 'jose@cliente.com', '44566877599', '', '', 1, 3, '2023-04-28 22:01:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idFornecedor` int NOT NULL AUTO_INCREMENT,
  `NomeFornecedor` varchar(75) NOT NULL,
  `CNPJFornecedor` varchar(75) NOT NULL,
  `EmailFornecedor` varchar(75) NOT NULL,
  `EnderecoFornecedor` varchar(75) NOT NULL,
  `TelefoneFornecedor` varchar(75) NOT NULL,
  `Public` int NOT NULL,
  `Ativo` int NOT NULL,
  `Usuario_idUser` int NOT NULL,
  PRIMARY KEY (`idFornecedor`),
  KEY `fk_Fornecedor_Usuario1_idx` (`Usuario_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idFornecedor`, `NomeFornecedor`, `CNPJFornecedor`, `EmailFornecedor`, `EnderecoFornecedor`, `TelefoneFornecedor`, `Public`, `Ativo`, `Usuario_idUser`) VALUES
(22, 'Trocafone', '20.553.221/0001-02', 'trocafone@comercial.com', 'Rua Frei Galvão, 91, Jardim Paulistano, São Paulo - SP. CEP 01454-060', '(11) 4003-1641', 1, 1, 3),
(23, 'CenterCell', '03.956.519/0001-36', 'atendimento@centercell.com.br', 'AV LIBERDADE, 4565 - BLOCOS M13, N14, E G07 CEP 18087-170 | SOROCABA - SP |', '+55(15) 4009-0880', 1, 1, 3),
(24, 'Liquidacell', '15.436.940/0001-03', 'liquidacell@comercial.com', 'Av. Juscelino Kubitschek, 2041, Torre E, 18° andar - São Paulo', '(11)91234-5678', 0, 1, 3),
(30, 'Casas Bahia Smartphones', '01.444.567/0001-08', 'casasbahia@cnpj.com', 'Rua 2, bairro Santa Maria - Campinas, SP', '1145897455', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `idItens` int NOT NULL AUTO_INCREMENT,
  `Image` varchar(250) NOT NULL,
  `QuantItens` decimal(10,0) NOT NULL,
  `QuantItensVend` decimal(10,0) NOT NULL,
  `ModeloItens` varchar(100) NOT NULL,
  `MarcaItens` varchar(80) NOT NULL,
  `MemoriaItens` varchar(10) NOT NULL,
  `CorItens` varchar(100) NOT NULL,
  `GradeItens` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `LocalItens` varchar(50) NOT NULL,
  `ItensAtivo` tinyint NOT NULL,
  `ItensPublic` int NOT NULL,
  `Produto_CodRefProduto` int NOT NULL,
  `Fornecedor_idFornecedor` int NOT NULL,
  `Usuario_idUser` int NOT NULL,
  `DataRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idItens`),
  KEY `fk_Itens_Produto1_idx` (`Produto_CodRefProduto`),
  KEY `fk_Itens_Fornecedor1_idx` (`Fornecedor_idFornecedor`),
  KEY `fk_Itens_Usuario1_idx` (`Usuario_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`idItens`, `Image`, `QuantItens`, `QuantItensVend`, `ModeloItens`, `MarcaItens`, `MemoriaItens`, `CorItens`, `GradeItens`, `LocalItens`, `ItensAtivo`, `ItensPublic`, `Produto_CodRefProduto`, `Fornecedor_idFornecedor`, `Usuario_idUser`, `DataRegistro`) VALUES
(24, 'dist/img/iphone5sred.jpg', '25', '0', 'iPhone 5s', 'Apple', '64gb', 'Vermelho', 'B', 'Prateleira B', 1, 1, 9, 22, 3, '2023-04-28 00:21:00'),
(25, 'dist/img/ip11red.jpg', '10', '0', 'iPhone 11', 'Apple', '128gb', 'Vermelho', 'C', 'Prateleira C', 1, 1, 46, 22, 3, '2023-04-28 00:21:34'),
(29, 'dist/img/OIP.jpg', '5', '0', 'iPhone 11', 'Apple', '128gb', 'Azul', 'B', 'Prateleira 2', 1, 1, 46, 23, 3, '2023-05-13 01:35:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
--

DROP TABLE IF EXISTS `manutencao`;
CREATE TABLE IF NOT EXISTS `manutencao` (
  `idManutencao` int NOT NULL AUTO_INCREMENT,
  `ModeloManutencao` varchar(100) NOT NULL,
  `GradeManutencao` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `IMEIManutencao` varchar(50) NOT NULL,
  `StatusManutencao` varchar(50) NOT NULL,
  `ObsManutencao` varchar(50) NOT NULL,
  `ManutencaoAtivo` tinyint NOT NULL,
  `ManutencaoPublic` int NOT NULL,
  `Produto_CodRefProduto` int NOT NULL,
  `Fornecedor_idFornecedor` int NOT NULL,
  `Usuario_idUser` int NOT NULL,
  `DataManutencao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idManutencao`),
  KEY `fk_Manutencao_Produto1_idx` (`Produto_CodRefProduto`),
  KEY `fk_Manutencao_Fornecedor1_idx` (`Fornecedor_idFornecedor`),
  KEY `fk_Manutencao_Usuario1_idx` (`Usuario_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `manutencao`
--

INSERT INTO `manutencao` (`idManutencao`, `ModeloManutencao`, `GradeManutencao`, `IMEIManutencao`, `StatusManutencao`, `ObsManutencao`, `ManutencaoAtivo`, `ManutencaoPublic`, `Produto_CodRefProduto`, `Fornecedor_idFornecedor`, `Usuario_idUser`, `DataManutencao`) VALUES
(11, 'iPhone 8', 'A', '23154354', 'OK', 'Tudo OK', 1, 1, 9, 22, 3, '2023-05-12 20:03:48'),
(31, 'Galaxy S23 Ultra 512gb', 'A', '897524', 'OK', 'OK', 1, 1, 9, 22, 0, '2023-05-13 01:39:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `CodRefProduto` int NOT NULL AUTO_INCREMENT,
  `skuProduto` varchar(75) NOT NULL,
  `NomeProduto` varchar(75) NOT NULL,
  `Ativo` int NOT NULL,
  `PublicProduto` int NOT NULL,
  `Usuario_idUser` int NOT NULL,
  PRIMARY KEY (`CodRefProduto`),
  KEY `fk_Produto_Usuario_idx` (`Usuario_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`CodRefProduto`, `skuProduto`, `NomeProduto`, `Ativo`, `PublicProduto`, `Usuario_idUser`) VALUES
(9, 'GA1626RED64GB', 'iPhone 5s 64gb RED', 1, 1, 3),
(46, 'GA5548BLUE128gb', 'iPhone 11 128gb Azul', 1, 1, 3),
(51, 'SMGLS23U512GB', 'Samsung Galaxy S23 Ultra Violeta 512GB', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

DROP TABLE IF EXISTS `teste`;
CREATE TABLE IF NOT EXISTS `teste` (
  `idTeste` int NOT NULL AUTO_INCREMENT,
  `ModeloTeste` varchar(100) NOT NULL,
  `GradeTeste` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `IMEITeste` varchar(50) NOT NULL,
  `StatusTeste` varchar(50) NOT NULL,
  `ObsTeste` varchar(50) NOT NULL,
  `Wifi` varchar(50) NOT NULL,
  `ConectorUSB` varchar(50) NOT NULL,
  `ConectorP2` varchar(50) NOT NULL,
  `Bateria` varchar(50) NOT NULL,
  `Display` varchar(50) NOT NULL,
  `Touch` varchar(50) NOT NULL,
  `Biometria` varchar(50) NOT NULL,
  `Botoes` varchar(50) NOT NULL,
  `Vibracall` varchar(50) NOT NULL,
  `CamT` varchar(50) NOT NULL,
  `CamF` varchar(50) NOT NULL,
  `Flash` varchar(50) NOT NULL,
  `Chip1` varchar(50) NOT NULL,
  `Chip2` varchar(50) NOT NULL,
  `AntRede` varchar(50) NOT NULL,
  `Mic1` varchar(50) NOT NULL,
  `Mic2` varchar(50) NOT NULL,
  `Sensor` varchar(50) NOT NULL,
  `VivaVoz` varchar(50) NOT NULL,
  `SiriGoogle` varchar(50) NOT NULL,
  `Carcaca` varchar(50) NOT NULL,
  `Tela` varchar(50) NOT NULL,
  `Traseira` varchar(50) NOT NULL,
  `TesteAtivo` int NOT NULL,
  `TestePublic` int NOT NULL,
  `Produto_CodRefProduto` int NOT NULL,
  `Fornecedor_idFornecedor` int NOT NULL,
  `Usuario_idUser` int NOT NULL,
  `DataTeste` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTeste`),
  KEY `fk_Teste_Produto1_idx` (`Produto_CodRefProduto`),
  KEY `fk_Teste_Fornecedor1_idx` (`Fornecedor_idFornecedor`),
  KEY `fk_Teste_Usuario1_idx` (`Usuario_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`idTeste`, `ModeloTeste`, `GradeTeste`, `IMEITeste`, `StatusTeste`, `ObsTeste`, `Wifi`, `ConectorUSB`, `ConectorP2`, `Bateria`, `Display`, `Touch`, `Biometria`, `Botoes`, `Vibracall`, `CamT`, `CamF`, `Flash`, `Chip1`, `Chip2`, `AntRede`, `Mic1`, `Mic2`, `Sensor`, `VivaVoz`, `SiriGoogle`, `Carcaca`, `Tela`, `Traseira`, `TesteAtivo`, `TestePublic`, `Produto_CodRefProduto`, `Fornecedor_idFornecedor`, `Usuario_idUser`, `DataTeste`) VALUES
(12, 'iPhone 12', 'A', '1324512', 'OK', 'Tudo funcionando corretamente', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 'Funcionando', 1, 1, 9, 22, 3, '2023-05-13 03:33:45'),
(30, 'Galaxy S23 Ultra', 'S', '234423', 'OK', 'Novo Lacrado', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 'Funcionando', 'Defeituoso', 1, 1, 9, 22, 0, '2023-05-13 07:11:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(75) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `senha` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `Dataregistro` date NOT NULL,
  `Permissao` tinyint NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `Username`, `Email`, `senha`, `imagem`, `Dataregistro`, `Permissao`) VALUES
(3, 'Administrador', 'admin@estoque.com', '21232f297a57a5a743894a0e4a801fc3', 'dist/img/avatar5.png', '2023-04-03', 1),
(4, 'Vendedor', 'vendedor@estoque.com', '0407e8c8285ab85509ac2884025dcf42', 'dist/img/avatar04.png', '2023-04-05', 2),
(6, 'Fabrício Silva', 'fabricio@estoque.com', 'cabe789b3751afc7bacf5b3748f3e8cd', 'dist/img/iconePerfil.png', '2023-04-13', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
