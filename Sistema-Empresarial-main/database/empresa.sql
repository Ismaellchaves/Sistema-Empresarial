-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14/05/2024 às 16:04
-- Versão do servidor: 8.0.36-2ubuntu3
-- Versão do PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Banco de dados: `empresa`

-- --------------------------------------------------------

-- Estrutura para tabela `funcionarios`

CREATE TABLE `funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `data_nascimento` varchar(50) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Despejando dados para a tabela `funcionarios`
INSERT INTO `funcionarios` (`id`, `nome`, `data_nascimento`, `funcao`) VALUES
(1, 'Thainan', '2005-12-10', 'Pasteleiro'),
(2, 'Yago', '2000-10-17', 'Logística'),
(3, 'Karol', '2005-04-15', 'Designer de Interiores'),
(4, 'Otavio', '1992-07-08', 'Desenvolvedor Web'),
(5, 'Márcio', '1966-06-14', 'Professor Universitário'),
(6, 'Andressa', '2006-10-25', 'Maquiadora'),
(7, 'Lucas', '1990-03-12', 'Cozinheiro'),
(8, 'Fernanda', '1995-11-04', 'Gerente'),
(9, 'Carlos', '1988-02-28', 'Auxiliar de Escritório'),
(10, 'Beatriz', '1992-07-14', 'Recepcionista'),
(11, 'Pedro', '1984-06-21', 'Designer Gráfico'),
(12, 'Julia', '2000-05-17', 'Analista de TI'),
(13, 'Rafael', '1986-01-22', 'Motorista'),
(14, 'Mariana', '1994-09-30', 'Secretária'),
(15, 'Gustavo', '1985-08-25', 'Consultor'),
(16, 'Sabrina', '1991-04-18', 'Contadora'),
(17, 'Vinicius', '1993-06-10', 'Assessor de Imprensa'),
(18, 'Renata', '1997-07-05', 'Assistente Administrativo'),
(19, 'Carla', '1982-09-01', 'Diretora Financeira'),
(20, 'Fábio', '1989-11-28', 'Vendedor');

-- --------------------------------------------------------

-- Estrutura para tabela `registro_horas`

CREATE TABLE `registro_horas` (
  `id_ponto` int NOT NULL AUTO_INCREMENT,
  `id_funcionario` int NOT NULL,
  `data_ponto` date NOT NULL,
  `entrada_1` time NOT NULL,
  `saida_1` time NOT NULL,
  `entrada_2` time NOT NULL,
  `saida_2` time NOT NULL,
  `horas_totais` time DEFAULT NULL,
  PRIMARY KEY (`id_ponto`),
  KEY `id_funcionario` (`id_funcionario`),
  CONSTRAINT `registro_horas_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Despejando dados para a tabela `registro_horas`
INSERT INTO `registro_horas` (`id_ponto`, `id_funcionario`, `data_ponto`, `entrada_1`, `saida_1`, `entrada_2`, `saida_2`, `horas_totais`) VALUES
(1, 1, '2024-05-08', '08:00:00', '12:00:00', '13:00:00', '15:00:00', '08:00:00'),
(2, 2, '2024-05-13', '08:00:00', '12:00:00', '13:00:00', '17:00:00', '08:00:00'),
(3, 3, '2024-05-13', '09:00:00', '13:00:00', '14:00:00', '18:00:00', '08:00:00'),
(4, 4, '2024-05-13', '08:00:00', '12:00:00', '13:00:00', '17:00:00', '08:00:00'),
(5, 5, '2024-05-13', '10:00:00', '14:00:00', '15:00:00', '19:00:00', '07:00:00'),
(6, 6, '2024-05-10', '07:00:00', '11:00:00', '12:00:00', '16:00:00', '07:00:00'),
(7, 7, '2024-05-12', '08:30:00', '12:30:00', '13:00:00', '17:00:00', '07:00:00'),
(8, 8, '2024-05-14', '09:00:00', '13:00:00', '14:00:00', '18:00:00', '07:00:00'),
(9, 9, '2024-05-12', '07:30:00', '11:30:00', '12:30:00', '16:30:00', '07:00:00'),
(10, 10, '2024-05-09', '08:00:00', '12:00:00', '13:00:00', '17:00:00', '08:00:00'),
(11, 11, '2024-05-11', '10:00:00', '14:00:00', '15:00:00', '19:00:00', '08:00:00'),
(12, 12, '2024-05-15', '09:00:00', '13:00:00', '14:00:00', '18:00:00', '08:00:00'),
(13, 13, '2024-05-14', '08:00:00', '12:00:00', '13:00:00', '17:00:00', '08:00:00'),
(14, 14, '2024-05-13', '09:00:00', '13:00:00', '14:00:00', '18:00:00', '08:00:00'),
(15, 15, '2024-05-14', '07:30:00', '11:30:00', '12:30:00', '16:30:00', '08:00:00'),
(16, 16, '2024-05-12', '08:00:00', '12:00:00', '13:00:00', '17:00:00', '08:00:00'),
(17, 17, '2024-05-10', '09:00:00', '13:00:00', '14:00:00', '18:00:00', '05:00:00'),
(18, 18, '2024-05-09', '10:00:00', '14:00:00', '15:00:00', '19:00:00', '05:00:00'),
(19, 19, '2024-05-13', '08:30:00', '12:30:00', '13:30:00', '17:30:00', '05:00:00'),
(20, 20, '2024-05-11', '07:00:00', '11:00:00', '12:00:00', '16:00:00', '05:00:00');

-- --------------------------------------------------------

-- Estrutura para tabela `superior`

CREATE TABLE `superior` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `superior`
--

CREATE TABLE `superior` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `superior`
--

INSERT INTO `superior` (`id`, `username`, `password`) VALUES
(1, 'usuario', '123'),
(2, 'Ismaell', '123456'),
(3, 'Admin', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registro_horas`
--
ALTER TABLE `registro_horas`
  ADD PRIMARY KEY (`id_ponto`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Índices de tabela `superior`
--
ALTER TABLE `superior`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `registro_horas`
--
ALTER TABLE `registro_horas`
  MODIFY `id_ponto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `superior`
--
ALTER TABLE `superior`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `registro_horas`
--
ALTER TABLE `registro_horas`
  ADD CONSTRAINT `registro_horas_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
