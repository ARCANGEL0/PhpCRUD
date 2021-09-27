-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/09/2021 às 00:25
-- Versão do servidor: 10.5.12-MariaDB-1
-- Versão do PHP: 7.4.21
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Banco de dados: `SistemaPHP`
--
-- --------------------------------------------------------
--
-- Estrutura para tabela `Categoria`
--
CREATE TABLE `Categoria` (
    `ID` int(11) NOT NULL,
    `Nome_Categoria` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Despejando dados para a tabela `Categoria`
--
INSERT INTO `Categoria` (`ID`, `Nome_Categoria`)
VALUES (1, 'Cosméticos'),
    (2, 'Celular e Acessórios'),
    (3, 'Audio e Eletrônicos'),
    (4, 'Brinquedos e Lazer'),
    (5, 'Limpeza e Produtos');
-- --------------------------------------------------------
--
-- Estrutura para tabela `Imagens`
--
CREATE TABLE `Imagens` (
    `ID` int(11) NOT NULL,
    `Imagem` longblob NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Estrutura para tabela `Info_Produto`
--
CREATE TABLE `Info_Produto` (
    `ID` int(11) NOT NULL,
    `Visualizacoes` int(11) NOT NULL DEFAULT 0,
    `Likes` int(11) NOT NULL DEFAULT 0,
    `Preco` int(11) NOT NULL,
    `Vendas` int(11) NOT NULL DEFAULT 0,
    `Categoria` int(11) NOT NULL,
    `Condicao` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Estrutura para tabela `Login`
--
CREATE TABLE `Login` (
    `Usuario` varchar(255) NOT NULL,
    `Senha` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Despejando dados para a tabela `Login`
--
INSERT INTO `Login` (`Usuario`, `Senha`)
VALUES ('admin', 'senha');
-- --------------------------------------------------------
--
-- Estrutura para tabela `Postagem`
--
CREATE TABLE `Postagem` (
    `ID` int(11) NOT NULL,
    `Logistica` varchar(255) NOT NULL,
    `Peso` double NOT NULL,
    `Largura` double NOT NULL,
    `Comprimento` double NOT NULL,
    `Altura` double NOT NULL,
    `Dias_PEntrega` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Estrutura para tabela `Produtos`
--
CREATE TABLE `Produtos` (
    `ID` int(11) NOT NULL,
    `Nome` varchar(255) NOT NULL,
    `Descricao` varchar(255) NOT NULL,
    `Create_Time` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Índices para tabelas despejadas
--
--
-- Índices de tabela `Imagens`
--
ALTER TABLE `Imagens`
ADD KEY `Imagens_ibfk_1` (`ID`);
--
-- Índices de tabela `Info_Produto`
--
ALTER TABLE `Info_Produto`
ADD PRIMARY KEY (`ID`);
--
-- Índices de tabela `Postagem`
--
ALTER TABLE `Postagem`
ADD PRIMARY KEY (`ID`),
    ADD KEY `ID` (`ID`);
--
-- Índices de tabela `Produtos`
--
ALTER TABLE `Produtos`
ADD PRIMARY KEY (`ID`);
--
-- Restrições para tabelas despejadas
--
--
-- Restrições para tabelas `Imagens`
--
ALTER TABLE `Imagens`
ADD CONSTRAINT `Imagens_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Produtos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Restrições para tabelas `Info_Produto`
--
ALTER TABLE `Info_Produto`
ADD CONSTRAINT `Info_Produto_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Produtos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Restrições para tabelas `Postagem`
--
ALTER TABLE `Postagem`
ADD CONSTRAINT `Postagem_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Produtos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;