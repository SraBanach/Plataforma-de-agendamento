-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/03/2025 às 15:59
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
-- Banco de dados: `db_plataformaagendamento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(244) NOT NULL,
  `senha` varchar(244) NOT NULL,
  `nome` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_agendamento`
--

CREATE TABLE `tb_agendamento` (
  `id` int(3) NOT NULL,
  `servico` varchar(244) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `empresa` varchar(244) NOT NULL,
  `profissional` varchar(244) NOT NULL,
  `observacoes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cad_empresas`
--

CREATE TABLE `tb_cad_empresas` (
  `id` int(11) NOT NULL,
  `razaoSocial` varchar(244) NOT NULL,
  `nomeFantasia` varchar(244) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `servicos` varchar(244) NOT NULL,
  `horario` time NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nomeContato` varchar(244) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(244) NOT NULL,
  `rua` varchar(244) NOT NULL,
  `numero` varchar(24) NOT NULL,
  `complemento` varchar(244) NOT NULL,
  `sobreEmpresa` text NOT NULL,
  `fotoEmpresa1` varchar(244) NOT NULL,
  `fotoEmpresa2` varchar(244) NOT NULL,
  `fotoEmpresa3` varchar(244) NOT NULL,
  `fotoLogo` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cad_empresas`
--

INSERT INTO `tb_cad_empresas` (`id`, `razaoSocial`, `nomeFantasia`, `cnpj`, `servicos`, `horario`, `telefone`, `nomeContato`, `cep`, `estado`, `cidade`, `rua`, `numero`, `complemento`, `sobreEmpresa`, `fotoEmpresa1`, `fotoEmpresa2`, `fotoEmpresa3`, `fotoLogo`) VALUES
(1, 'jadjfk', 'sfgsfg', '11,111,111/1111-11', 'sdgdsfg', '00:00:00', '(11)11111-1111', 'fsgfdsg', '11,111-111', 'AP', 'sfdf', 'sgfs', 'fsagfs', 'sfgfsgfg', 'fgafgdf', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cad_profissional`
--

CREATE TABLE `tb_cad_profissional` (
  `id_profissional` int(11) NOT NULL,
  `nome_profissional` varchar(244) NOT NULL,
  `dat_nasc` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `area` varchar(50) NOT NULL,
  `certificado` varchar(244) NOT NULL,
  `anotacoes` text NOT NULL,
  `foto_profissional1` varchar(244) NOT NULL,
  `foto_profissional2` varchar(244) NOT NULL,
  `foto_profissional3` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cad_profissional`
--

INSERT INTO `tb_cad_profissional` (`id_profissional`, `nome_profissional`, `dat_nasc`, `cpf`, `telefone`, `area`, `certificado`, `anotacoes`, `foto_profissional1`, `foto_profissional2`, `foto_profissional3`) VALUES
(1, 'sdfgdsg', '11/11/1111', '039,248,851-50', '(65)99961-4598', 'sdgsfg', 'fsgfg', 'sfgsfg', '', '', ''),
(2, 'vitor frazatto barduco', '22/08/2005', '459,493,398-00', '(19)99798-2887', 'dsgfs', 'dfhdfh', 'chato da sala', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cad_servicos`
--

CREATE TABLE `tb_cad_servicos` (
  `id_servico` int(11) NOT NULL,
  `servico` varchar(244) NOT NULL,
  `tempo` varchar(11) NOT NULL,
  `categoria` varchar(244) NOT NULL,
  `valor` varchar(11) NOT NULL,
  `nome_profissional` varchar(244) NOT NULL,
  `previsao_retorno` varchar(244) NOT NULL,
  `descricao` varchar(244) NOT NULL,
  `foto_servico1` varchar(244) NOT NULL,
  `foto_servico2` varchar(244) NOT NULL,
  `foto_servico3` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cad_servicos`
--

INSERT INTO `tb_cad_servicos` (`id_servico`, `servico`, `tempo`, `categoria`, `valor`, `nome_profissional`, `previsao_retorno`, `descricao`, `foto_servico1`, `foto_servico2`, `foto_servico3`) VALUES
(1, 'unha', '45 min ', 'Manicure ', 'R$ 50.00', 'kenya', '15 dias', 'sghsfj', '', '', ''),
(2, 'Design de Sobrancelhas', '30 minutos', 'Estética', 'R$ 50,00', 'Ana Souza', '1 semana', 'Design de sobrancelhas, natural e duradouro.', 'foto1.jpg', 'foto2.jpg', 'foto3.jpg'),
(3, 'Extensão de Cílios', '60 minutos', 'Estética', 'R$ 120,00', 'Joana Silva', '10 dias', 'Extensão de cílios volumosa e natural.', 'extensao1.jpg', 'extensao2.jpg', 'extensao3.jpg'),
(4, 'Hidratação Capilar', '40 minutos', 'Beleza', 'R$ 80,00', 'Carlos Mendes', '2 semanas', 'Hidratação profunda para fios danificados.', 'hidratacao1.jpg', 'hidratacao2.jpg', 'hidratacao3.jpg'),
(5, 'Limpeza de Pele', '50 minutos', 'Estética', 'R$ 90,00', 'Mariana Costa', '1 mês', 'Limpeza profunda da pele, ideal para todos os tipos.', 'limpeza1.jpg', 'limpeza2.jpg', 'limpeza3.jpg'),
(6, 'Corte de Cabelo Masculino', '30 minutos', 'Corte de Cabelo', 'R$ 40,00', 'Ricardo Oliveira', '1 semana', 'Corte de cabelo moderno, com estilo.', 'corte1.jpg', 'corte2.jpg', 'corte3.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cad_usuario`
--

CREATE TABLE `tb_cad_usuario` (
  `id_usuario` int(3) NOT NULL,
  `nome` varchar(144) NOT NULL,
  `telefone` text NOT NULL,
  `dat_nasc` int(11) NOT NULL,
  `cpf` int(15) NOT NULL,
  `endereco` int(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cad_usuario`
--

INSERT INTO `tb_cad_usuario` (`id_usuario`, `nome`, `telefone`, `dat_nasc`, `cpf`, `endereco`) VALUES
(1, 'kenya banach chrominski jaques', '+5565999614598', 17, 2147483647, 0),
(2, 'kenya banach chrominski jaques', '+5565999614598', 17, 2147483647, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(3) NOT NULL,
  `email` varchar(144) NOT NULL,
  `senha` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `email`, `senha`) VALUES
(1, 'hulk@gmail.com', 'smash123'),
(2, 'hulk@gmail.com', 'smash123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices de tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_cad_empresas`
--
ALTER TABLE `tb_cad_empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_cad_profissional`
--
ALTER TABLE `tb_cad_profissional`
  ADD PRIMARY KEY (`id_profissional`);

--
-- Índices de tabela `tb_cad_servicos`
--
ALTER TABLE `tb_cad_servicos`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices de tabela `tb_cad_usuario`
--
ALTER TABLE `tb_cad_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_cad_empresas`
--
ALTER TABLE `tb_cad_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_cad_profissional`
--
ALTER TABLE `tb_cad_profissional`
  MODIFY `id_profissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_cad_servicos`
--
ALTER TABLE `tb_cad_servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_cad_usuario`
--
ALTER TABLE `tb_cad_usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
