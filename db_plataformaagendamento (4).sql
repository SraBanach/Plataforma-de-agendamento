-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/04/2025 às 15:02
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
-- Estrutura para tabela `tb_agendamento`
--

CREATE TABLE `tb_agendamento` (
  `id` int(3) NOT NULL,
  `servico` varchar(244) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `id_empresa` int(244) NOT NULL,
  `id_profissional` int(244) NOT NULL,
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

INSERT INTO `tb_cad_empresas` (`id`, `razaoSocial`, `nomeFantasia`, `cnpj`, `servicos`, `telefone`, `nomeContato`, `cep`, `estado`, `cidade`, `rua`, `numero`, `complemento`, `sobreEmpresa`, `fotoEmpresa1`, `fotoEmpresa2`, `fotoEmpresa3`, `fotoLogo`) VALUES
(2, 'Beleza Pura Ltda', 'Beleza Pura', '12.345.678/0001-90', 'Sobrancelhas, Cílios', '(11) 91234-5678', 'Ana Silva', '13465-000', 'SP', 'Americana', 'Rua das Flores', '123', 'Sala 2', 'Especialistas em design de sobrancelhas.', 'beleza1.jpg', 'beleza2.jpg', 'beleza3.jpg', 'logobeleza.jpg'),
(3, 'Estética Premium Ltda', 'Estética Premium', '98.765.432/0001-23', 'Estética Facial e Corporal', '(11) 98765-4321', 'Carlos Mendes', '13465-001', 'SP', 'Americana', 'Av. Brasil', '456', 'Loja 5', 'Tratamentos estéticos personalizados.', 'estetica1.jpg', 'estetica2.jpg', 'estetica3.jpg', 'logoestetica.jpg'),
(4, 'Glow Studio ME', 'Glow Studio', '23.456.789/0001-45', 'Micropigmentação', '(11) 94567-8910', 'Fernanda Costa', '13465-002', 'SP', 'Americana', 'Rua das Palmeiras', '789', 'Sala 1', 'Especialistas em micropigmentação e harmonização.', 'glow1.jpg', 'glow2.jpg', 'glow3.jpg', 'logoglow.jpg'),
(5, 'Sobrancelhas de Rainha', 'Rainha Beauty', '34.567.890/0001-56', 'Design de Sobrancelha', '(11) 95678-9012', 'Juliana Souza', '13465-003', 'SP', 'Americana', 'Rua XV de Novembro', '321', 'Andar 2', 'Design de sobrancelhas com técnicas exclusivas.', 'rainha1.jpg', 'rainha2.jpg', 'rainha3.jpg', 'logorainha.jpg'),
(6, 'Estética & Beleza', 'E&B Studio', '45.678.901/0001-67', 'Massagem, Estética Corporal', '(11) 96789-0123', 'Mariana Lima', '13465-004', 'SP', 'Americana', 'Av. Campos Sales', '987', 'Sala 8', 'Tratamentos estéticos inovadores.', 'eb1.jpg', 'eb2.jpg', 'eb3.jpg', 'logoeb.jpg'),
(7, 'Spa dos Sonhos', 'Dream Spa', '56.789.012/0001-78', 'Spa, Massoterapia', '(11) 97890-1234', 'Ricardo Lopes', '13465-005', 'SP', 'Americana', 'Rua do Comércio', '852', 'Prédio A', 'Um refúgio de relaxamento e bem-estar.', 'spa1.jpg', 'spa2.jpg', 'spa3.jpg', 'logospas.jpg'),
(8, 'Estética Avançada', 'Esteticlin', '67.890.123/0001-89', 'Harmonização Facial', '(11) 98901-2345', 'Patrícia Alves', '13465-006', 'SP', 'Americana', 'Rua São Paulo', '369', 'Loja 12', 'Especialistas em harmonização facial.', 'esteticlin1.jpg', 'esteticlin2.jpg', 'esteticlin3.jpg', 'logoesteticlin.jpg'),
(9, 'Arte na Sobrancelha', 'Arte Brow', '78.901.234/0001-90', 'Design de Sobrancelha e Cílios', '(11) 99012-3456', 'Beatriz Nunes', '13465-007', 'SP', 'Americana', 'Av. Europa', '147', 'Sala 5', 'Aprimorando olhares com arte e técnica.', 'artebrow1.jpg', 'artebrow2.jpg', 'artebrow3.jpg', 'logoartebrow.jpg'),
(10, 'Luxo e Beleza Estética', 'Lux Beauty', '89.012.345/0001-01', 'Manicure, Pedicure, Estética', '(11) 90123-4567', 'Camila Rocha', '13465-008', 'SP', 'Americana', 'Rua das Acácias', '753', 'Andar 1', 'Beleza e cuidado para unhas e pele.', 'luxbeauty1.jpg', 'luxbeauty2.jpg', 'luxbeauty3.jpg', 'logoluxbeauty.jpg'),
(11, 'Natural Estética', 'Natural Spa', '90.123.456/0001-12', 'Massagem Terapêutica', '(11) 91234-5678', 'Renato Farias', '13465-009', 'SP', 'Americana', 'Rua Central', '258', 'Sala 3', 'Técnicas naturais para bem-estar.', 'naturalspa1.jpg', 'naturalspa2.jpg', 'naturalspa3.jpg', 'logonaturalspa.jpg');

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
(3, 'Beatriz Almeida22', '15/03/1990', '123.456.789-00', '(11)98765-4321', 'Estética', 'Certificado em Design de Sobrancelhas', 'Especialista em micropigmentação', 'beatriz1.jpg', 'beatriz2.jpg', 'beatriz3.jpg'),
(4, 'Carlos Mendes', '22/07/1985', '987.654.321-00', '(19)99876-5432', 'Cabelos', 'Certificado em Corte e Colorimetria', 'Atende todos os tipos de cabelo', 'carlos1.jpg', 'carlos2.jpg', 'carlos3.jpg'),
(5, 'Mariana Costa', '10/12/1993', '159.357.468-00', '(65)99999-9999', 'Estética', 'Certificado em Limpeza de Pele', 'Experiência com pele sensível', 'mariana1.jpg', 'mariana2.jpg', 'mariana3.jpg'),
(6, 'Joana Silva', '05/06/1988', '789.456.123-00', '(21)99654-3210', 'Estética', 'Especialista em Extensão de Cílios', 'Trabalha com fios sintéticos e naturais', 'joana1.jpg', 'joana2.jpg', 'joana3.jpg'),
(7, 'Ricardo Oliveira', '30/09/1980', '258.147.369-00', '(31)99547-8520', 'Corte de Cabelo', 'Certificado de Barbearia', 'Cortes modernos e clássicos', 'ricardo1.jpg', 'ricardo2.jpg', 'ricardo3.jpg'),
(8, 'Fernanda Lima', '18/04/1995', '654.987.321-00', '(47)99874-1256', 'Maquiagem', 'Curso Profissional de Maquiagem', 'Especialista em maquiagem para eventos', 'fernanda1.jpg', 'fernanda2.jpg', 'fernanda3.jpg'),
(9, 'Thiago Souza', '27/11/1987', '321.654.987-00', '(61)99658-7412', 'Cabelos', 'Especialista em Hidratação Capilar', 'Trabalha com hidratação profunda', 'thiago1.jpg', 'thiago2.jpg', 'thiago3.jpg'),
(10, 'Amanda Duarte', '12/08/1992', '852.963.741-00', '(85)99478-5214', 'Estética', 'Certificação Internacional', 'Técnicas avançadas de peeling facial', 'amanda1.jpg', 'amanda2.jpg', 'amanda3.jpg'),
(11, 'Lucas Pereira', '02/02/1984', '741.852.963-00', '(92)99258-9631', 'Massoterapia', 'Curso de Massagem Terapêutica', 'Massagens relaxantes e terapêuticas', 'lucas1.jpg', 'lucas2.jpg', 'lucas3.jpg'),
(12, 'Tatiane Rocha', '09/05/1991', '369.741.258-00', '(13)99365-7412', 'Manicure', 'Curso Profissional de Manicure', 'Experiência com alongamento de unhas', 'tatiane1.jpg', 'tatiane2.jpg', 'tatiane3.jpg');

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
  `previsao_retorno` varchar(244) NOT NULL,
  `descricao` varchar(244) NOT NULL,
  `foto_servico1` varchar(244) NOT NULL,
  `foto_servico2` varchar(244) NOT NULL,
  `foto_servico3` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cad_servicos`
--

INSERT INTO `tb_cad_servicos` (`id_servico`, `servico`, `tempo`, `categoria`, `valor`, `previsao_retorno`, `descricao`, `foto_servico1`, `foto_servico2`, `foto_servico3`) VALUES
(1, 'unha', '45 min ', 'Manicure ', 'R$ 50.00', '15 dias', 'sghsfj', '', '', ''),
(2, 'Design de Sobrancelhas', '30 minutos', 'Estética', 'R$ 50,00', '1 semana', 'Design de sobrancelhas, natural e duradouro.', 'foto1.jpg', 'foto2.jpg', 'foto3.jpg'),
(3, 'Extensão de Cílios', '60 minutos', 'Estética', 'R$ 120,00', '10 dias', 'Extensão de cílios volumosa e natural.', 'extensao1.jpg', 'extensao2.jpg', 'extensao3.jpg'),
(4, 'Hidratação Capilar', '40 minutos', 'Beleza', 'R$ 80,00', '2 semanas', 'Hidratação profunda para fios danificados.', 'hidratacao1.jpg', 'hidratacao2.jpg', 'hidratacao3.jpg'),
(5, 'Limpeza de Pele', '50 minutos', 'Estética', 'R$ 90,00', '1 mês', 'Limpeza profunda da pele, ideal para todos os tipos.', 'limpeza1.jpg', 'limpeza2.jpg', 'limpeza3.jpg'),
(6, 'Corte de Cabelo Masculino', '30 minutos', 'Corte de Cabelo', 'R$ 40,00', '1 semana', 'Corte de cabelo moderno, com estilo.', 'corte1.jpg', 'corte2.jpg', 'corte3.jpg');

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
(2, 'admin@gmail.com', 'admin'),
(3, 'admin@gmail.com', 'admin'),
(4, 'admin@gmail.com', 'admin'),
(5, 'admin@gmail.com', 'admin'),
(6, 'admin@gmail.com', 'admin'),
(7, 'admin@gmail.com', 'admin'),
(8, 'admin@gmail.com', 'admin');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_cad_empresas`
--
ALTER TABLE `tb_cad_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_cad_profissional`
--
ALTER TABLE `tb_cad_profissional`
  MODIFY `id_profissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id_login` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
