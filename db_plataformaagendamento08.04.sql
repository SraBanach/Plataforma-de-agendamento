-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/04/2025 às 08:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
  `valor` double NOT NULL,
  `horario` time NOT NULL,
  `data_agendamento` date NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_agendamento`
--

INSERT INTO `tb_agendamento` (`id`, `servico`, `valor`, `horario`, `data_agendamento`, `observacoes`, `id_login`, `id_empresa`) VALUES
(1, 'Extensão de Cílios', 120, '10:00:00', '2025-04-11', 'teste mesmo dia e horario ', NULL, NULL),
(2, 'Extensão de Cílios', 120, '10:00:00', '2025-04-05', '', NULL, NULL),
(3, 'Design de Sobrancelhas', 50, '11:00:00', '2025-04-11', '', NULL, NULL),
(4, 'Hidratação Capilar', 80, '12:00:00', '2025-04-11', 'teste', NULL, NULL),
(5, 'Design Tradicional', 50, '10:00:00', '2025-04-06', '', NULL, NULL),
(7, 'Design de Sobrancelhas', 50, '10:00:00', '2025-04-05', '', NULL, NULL),
(8, 'Hidratação Capilar', 80, '10:00:00', '2025-04-05', '', NULL, NULL),
(9, 'Design de Sobrancelhas', 50, '10:00:00', '2025-04-05', 'testando filtro se esta correto ', NULL, NULL),
(10, 'Design de Sobrancelhas', 50, '13:00:00', '2025-04-08', 'teste', NULL, NULL),
(11, 'Design de Sobrancelhas', 50, '10:00:00', '2025-04-05', '', NULL, NULL),
(12, 'Aromaterapia', 90, '10:00:00', '2025-04-06', '', NULL, NULL),
(13, 'Spa das Mãos', 60, '10:00:00', '2025-04-06', '', NULL, NULL),
(14, 'Design de Sobrancelhas', 50, '10:00:00', '2025-04-07', 'teste meusAgendamentos.php', NULL, NULL),
(17, 'Combo Sobrancelha & Henna', 110, '11:00:00', '2025-04-12', 'tenho alergia a latex', 9, 5),
(18, 'Reflexologia', 100, '10:00:00', '2025-04-08', '', NULL, 7),
(19, 'Pedicure', 50, '10:00:00', '2025-04-08', '', 19, 10),
(20, 'Depilação Facial', 40, '12:00:00', '2025-04-08', '', 19, 2);

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

INSERT INTO `tb_cad_empresas` (`id`, `razaoSocial`, `nomeFantasia`, `cnpj`, `servicos`, `telefone`, `cep`, `estado`, `cidade`, `rua`, `numero`, `complemento`, `sobreEmpresa`, `fotoEmpresa1`, `fotoEmpresa2`, `fotoEmpresa3`, `fotoLogo`) VALUES
(2, 'Beleza Pura Ltda', 'Beleza Pura', '12.345.678/0001-90', 'Sobrancelhas, Cílios', '(11) 91234-5678', '13465-000', 'SP', 'Americana', 'Rua das Flores', '123', 'Sala 2', 'Especialistas em design de sobrancelhas.', 'beleza1.jpg', 'beleza2.jpg', 'beleza3.jpg', 'logobeleza.jpg'),
(3, 'Estética Premium Ltda', 'Estética Premium', '98.765.432/0001-23', 'Estética Facial e Corporal', '(11) 98765-4321', '13465-001', 'SP', 'Americana', 'Av. Brasil', '456', 'Loja 5', 'Tratamentos estéticos personalizados.', 'estetica1.jpg', 'estetica2.jpg', 'estetica3.jpg', 'logoestetica.jpg'),
(4, 'Glow Studio ME', 'Glow Studio', '23.456.789/0001-45', 'Micropigmentação', '(11) 94567-8910', '13465-002', 'SP', 'Americana', 'Rua das Palmeiras', '789', 'Sala 1', 'Especialistas em micropigmentação e harmonização.', 'glow1.jpg', 'glow2.jpg', 'glow3.jpg', 'logoglow.jpg'),
(5, 'Sobrancelhas de Rainha', 'Rainha Beauty', '34.567.890/0001-56', 'Design de Sobrancelha', '(11) 95678-9012', '13465-003', 'SP', 'Americana', 'Rua XV de Novembro', '321', 'Andar 2', 'Design de sobrancelhas com técnicas exclusivas.', 'rainha1.jpg', 'rainha2.jpg', 'rainha3.jpg', 'logorainha.jpg'),
(6, 'Estética & Beleza', 'E&B Studio', '45.678.901/0001-67', 'Massagem, Estética Corporal', '(11) 96789-0123', '13465-004', 'SP', 'Americana', 'Av. Campos Sales', '987', 'Sala 8', 'Tratamentos estéticos inovadores.', 'eb1.jpg', 'eb2.jpg', 'eb3.jpg', 'logoeb.jpg'),
(7, 'Spa dos Sonhos', 'Dream Spa', '56.789.012/0001-78', 'Spa, Massoterapia', '(11) 97890-1234', '13465-005', 'SP', 'Americana', 'Rua do Comércio', '852', 'Prédio A', 'Um refúgio de relaxamento e bem-estar.', 'spa1.jpg', 'spa2.jpg', 'spa3.jpg', 'logospas.jpg'),
(8, 'Estética Avançada', 'Esteticlin', '67.890.123/0001-89', 'Harmonização Facial', '(11) 98901-2345', '13465-006', 'SP', 'Americana', 'Rua São Paulo', '369', 'Loja 12', 'Especialistas em harmonização facial.', 'esteticlin1.jpg', 'esteticlin2.jpg', 'esteticlin3.jpg', 'logoesteticlin.jpg'),
(9, 'Arte na Sobrancelha', 'Arte Brow', '78.901.234/0001-90', 'Design de Sobrancelha e Cílios', '(11) 99012-3456', '13465-007', 'SP', 'Americana', 'Av. Europa', '147', 'Sala 5', 'Aprimorando olhares com arte e técnica.', 'artebrow1.jpg', 'artebrow2.jpg', 'artebrow3.jpg', 'logoartebrow.jpg'),
(10, 'Luxo e Beleza Estética', 'Lux Beauty', '89.012.345/0001-01', 'Manicure, Pedicure, Estética', '(11) 90123-4567', '13465-008', 'SP', 'Americana', 'Rua das Acácias', '753', 'Andar 1', 'Beleza e cuidado para unhas e pele.', 'luxbeauty1.jpg', 'luxbeauty2.jpg', 'luxbeauty3.jpg', 'logoluxbeauty.jpg'),
(11, 'Natural Estética', 'Natural Spa', '90.123.456/0001-12', 'Massagem Terapêutica', '(11) 91234-5678', '13465-009', 'SP', 'Americana', 'Rua Central', '258', 'Sala 3', 'Técnicas naturais para bem-estar.', 'naturalspa1.jpg', 'naturalspa2.jpg', 'naturalspa3.jpg', 'logonaturalspa.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cad_servicos`
--

CREATE TABLE `tb_cad_servicos` (
  `id_servico` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `servico` varchar(244) NOT NULL,
  `categoria` varchar(244) NOT NULL,
  `valor` varchar(11) NOT NULL,
  `descricao` varchar(244) NOT NULL,
  `foto_servico1` varchar(244) NOT NULL,
  `foto_servico2` varchar(244) NOT NULL,
  `foto_servico3` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cad_servicos`
--

INSERT INTO `tb_cad_servicos` (`id_servico`, `id_empresa`, `servico`, `categoria`, `valor`, `descricao`, `foto_servico1`, `foto_servico2`, `foto_servico3`) VALUES
(1, 2, 'unha', 'Manicure ', ' 50.00', 'sghsfj', '', '', ''),
(2, 3, 'Design de Sobrancelhas', 'Estética', ' 50,00', 'Design de sobrancelhas, natural e duradouro.', 'foto1.jpg', 'foto2.jpg', 'foto3.jpg'),
(3, 4, 'Extensão de Cílios', 'Estética', ' 120,00', 'Extensão de cílios volumosa e natural.', 'extensao1.jpg', 'extensao2.jpg', 'extensao3.jpg'),
(4, 5, 'Hidratação Capilar', 'Beleza', ' 80,00', 'Hidratação profunda para fios danificados.', 'hidratacao1.jpg', 'hidratacao2.jpg', 'hidratacao3.jpg'),
(5, 6, 'Limpeza de Pele', 'Estética', ' 90,00', 'Limpeza profunda da pele, ideal para todos os tipos.', 'limpeza1.jpg', 'limpeza2.jpg', 'limpeza3.jpg'),
(6, 7, 'Corte de Cabelo Masculino', 'Corte de Cabelo', '40,00', 'Corte de cabelo moderno, com estilo.', 'corte1.jpg', 'corte2.jpg', 'corte3.jpg'),
(7, 1, 'Corte Feminino', '', '50.00', '', '', '', ''),
(8, 1, 'Escova', '', '40.00', '', '', '', ''),
(9, 1, 'Coloração', '', '120.00', '', '', '', ''),
(10, 2, 'Design de Sobrancelhas', 'Estética', '50.00', 'Design natural e simétrico.', 'sob1.jpg', 'sob2.jpg', 'sob3.jpg'),
(11, 2, 'Tinta de Henna', 'Estética', '60.00', 'Coloração com henna para sobrancelhas.', 'henna1.jpg', 'henna2.jpg', 'henna3.jpg'),
(12, 2, 'Brow Lamination', 'Estética', '70.00', 'Alinhamento e definição das sobrancelhas.', 'lam1.jpg', 'lam2.jpg', 'lam3.jpg'),
(13, 2, 'Depilação Facial', 'Depilação', '40.00', 'Remoção de pelos do rosto.', 'dep1.jpg', 'dep2.jpg', 'dep3.jpg'),
(14, 2, 'Coloração de Cílios', 'Estética', '55.00', 'Pigmentação natural para cílios.', 'cilios1.jpg', 'cilios2.jpg', 'cilios3.jpg'),
(15, 3, 'Limpeza de Pele', 'Estética', '90.00', 'Limpeza profunda da pele.', 'limpeza1.jpg', 'limpeza2.jpg', 'limpeza3.jpg'),
(16, 3, 'Peeling Químico', 'Estética', '120.00', 'Renovação celular com ácidos.', 'peeling1.jpg', 'peeling2.jpg', 'peeling3.jpg'),
(17, 3, 'Massagem Facial', 'Estética', '70.00', 'Relaxamento e drenagem facial.', 'massagem1.jpg', 'massagem2.jpg', 'massagem3.jpg'),
(18, 3, 'Microagulhamento', 'Estética', '150.00', 'Estimula colágeno e elasticidade.', 'micro1.jpg', 'micro2.jpg', 'micro3.jpg'),
(19, 3, 'Máscara de Ouro', 'Estética', '100.00', 'Tratamento revitalizante com ouro.', 'ouro1.jpg', 'ouro2.jpg', 'ouro3.jpg'),
(20, 4, 'Micropigmentação Labial', 'Micropigmentação', '300.00', 'Realce da cor natural dos lábios.', 'labial1.jpg', 'labial2.jpg', 'labial3.jpg'),
(21, 4, 'Micropigmentação de Sobrancelha', 'Micropigmentação', '350.00', 'Fios realistas e harmônicos.', 'micro-sob1.jpg', 'micro-sob2.jpg', 'micro-sob3.jpg'),
(22, 4, 'Remoção de Micropigmentação', 'Micropigmentação', '200.00', 'Remoção segura com laser.', 'remove1.jpg', 'remove2.jpg', 'remove3.jpg'),
(23, 4, 'Design com Pigmento', 'Micropigmentação', '180.00', 'Design e pigmentação suave.', 'design1.jpg', 'design2.jpg', 'design3.jpg'),
(24, 4, 'Retoque de Micropigmentação', 'Micropigmentação', '150.00', 'Ajustes de cor e forma.', 'retoque1.jpg', 'retoque2.jpg', 'retoque3.jpg'),
(25, 5, 'Design Tradicional', 'Sobrancelha', '50.00', 'Técnica exclusiva de design.', 'rainha1.jpg', 'rainha2.jpg', 'rainha3.jpg'),
(26, 5, 'Henna Premium', 'Sobrancelha', '70.00', 'Fixação e cor intensas.', 'henna-premium1.jpg', 'henna-premium2.jpg', 'henna-premium3.jpg'),
(27, 5, 'Lifting de Sobrancelhas', 'Sobrancelha', '85.00', 'Efeito de elevação natural.', 'lifting1.jpg', 'lifting2.jpg', 'lifting3.jpg'),
(28, 5, 'Avaliação Visagista', 'Sobrancelha', '30.00', 'Análise facial personalizada.', 'visagismo1.jpg', 'visagismo2.jpg', 'visagismo3.jpg'),
(29, 5, 'Combo Sobrancelha & Henna', 'Sobrancelha', '110.00', 'Pacote completo.', 'combo1.jpg', 'combo2.jpg', 'combo3.jpg'),
(30, 6, 'Massagem Relaxante', 'Massagem', '90.00', 'Alívio do estresse e dores.', 'relax1.jpg', 'relax2.jpg', 'relax3.jpg'),
(31, 6, 'Drenagem Linfática', 'Massagem', '100.00', 'Redução de inchaço e retenção.', 'drenagem1.jpg', 'drenagem2.jpg', 'drenagem3.jpg'),
(32, 6, 'Limpeza Corporal', 'Estética Corporal', '130.00', 'Esfoliação e hidratação profunda.', 'limpeza-corpo1.jpg', 'limpeza-corpo2.jpg', 'limpeza-corpo3.jpg'),
(33, 6, 'Massagem Modeladora', 'Massagem', '110.00', 'Modelagem corporal intensa.', 'modeladora1.jpg', 'modeladora2.jpg', 'modeladora3.jpg'),
(34, 6, 'Tratamento Anti-Celulite', 'Estética Corporal', '140.00', 'Redução de celulite.', 'celulite1.jpg', 'celulite2.jpg', 'celulite3.jpg'),
(35, 7, 'Massagem com Pedras Quentes', 'Spa', '120.00', 'Relaxamento profundo.', 'pedras1.jpg', 'pedras2.jpg', 'pedras3.jpg'),
(36, 7, 'Aromaterapia', 'Spa', '90.00', 'Terapia com óleos essenciais.', 'aroma1.jpg', 'aroma2.jpg', 'aroma3.jpg'),
(37, 7, 'Reflexologia', 'Spa', '100.00', 'Pressão nos pontos dos pés.', 'reflex1.jpg', 'reflex2.jpg', 'reflex3.jpg'),
(38, 7, 'Spa dos Pés', 'Spa', '80.00', 'Relaxamento e cuidado dos pés.', 'pés1.jpg', 'pés2.jpg', 'pés3.jpg'),
(39, 7, 'Massagem com Velas', 'Spa', '110.00', 'Toque suave com vela aquecida.', 'velas1.jpg', 'velas2.jpg', 'velas3.jpg'),
(40, 8, 'Harmonização Facial', 'Estética', '500.00', 'Rejuvenescimento completo.', 'harmonizacao1.jpg', 'harmonizacao2.jpg', 'harmonizacao3.jpg'),
(41, 8, 'Preenchimento Labial', 'Estética', '450.00', 'Lábios mais definidos.', 'labios1.jpg', 'labios2.jpg', 'labios3.jpg'),
(42, 8, 'Botox', 'Estética', '600.00', 'Redução de linhas de expressão.', 'botox1.jpg', 'botox2.jpg', 'botox3.jpg'),
(43, 8, 'Bioestimulador', 'Estética', '700.00', 'Estimula produção de colágeno.', 'bio1.jpg', 'bio2.jpg', 'bio3.jpg'),
(44, 8, 'Fios de PDO', 'Estética', '800.00', 'Lifting sem cirurgia.', 'pdo1.jpg', 'pdo2.jpg', 'pdo3.jpg'),
(45, 9, 'Design de Sobrancelhas', 'Sobrancelha', '50.00', 'Realce do olhar com simetria.', 'designarte1.jpg', 'designarte2.jpg', 'designarte3.jpg'),
(46, 9, 'Lash Lifting', 'Cílios', '90.00', 'Curvatura dos cílios naturais.', 'lash1.jpg', 'lash2.jpg', 'lash3.jpg'),
(47, 9, 'Extensão de Cílios', 'Cílios', '150.00', 'Cílios longos e volumosos.', 'extensaoarte1.jpg', 'extensaoarte2.jpg', 'extensaoarte3.jpg'),
(48, 9, 'Coloração de Sobrancelhas', 'Sobrancelha', '60.00', 'Cor intensa e natural.', 'colortint1.jpg', 'colortint2.jpg', 'colortint3.jpg'),
(49, 9, 'Manutenção de Cílios', 'Cílios', '80.00', 'Reforço e ajustes.', 'manutencao1.jpg', 'manutencao2.jpg', 'manutencao3.jpg'),
(50, 10, 'Manicure', 'Manicure', '40.00', 'Corte, esmaltação e cuidado.', 'mani1.jpg', 'mani2.jpg', 'mani3.jpg'),
(51, 10, 'Pedicure', 'Pedicure', '50.00', 'Cuidados completos para os pés.', 'pedi1.jpg', 'pedi2.jpg', 'pedi3.jpg'),
(52, 10, 'Spa das Mãos', 'Manicure', '60.00', 'Esfoliação e hidratação.', 'spamaos1.jpg', 'spamaos2.jpg', 'spamaos3.jpg'),
(53, 10, 'Alongamento de Unhas', 'Manicure', '90.00', 'Unhas longas e resistentes.', 'along1.jpg', 'along2.jpg', 'along3.jpg'),
(54, 10, 'Design de Unhas', 'Manicure', '80.00', 'Arte e estilo nas unhas.', 'designnail1.jpg', 'designnail2.jpg', 'designnail3.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cad_usuario`
--

CREATE TABLE `tb_cad_usuario` (
  `id_usuario` int(3) NOT NULL,
  `nome` varchar(144) NOT NULL,
  `telefone` text NOT NULL,
  `dat_nasc` date NOT NULL,
  `cpf` int(15) NOT NULL,
  `endereco` int(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cad_usuario`
--

INSERT INTO `tb_cad_usuario` (`id_usuario`, `nome`, `telefone`, `dat_nasc`, `cpf`, `endereco`) VALUES
(1, 'kenya banach chrominski jaques', '+5565999614598', '0000-00-00', 2147483647, 0),
(2, 'kenya banach chrominski jaques', '+5565999614598', '0000-00-00', 2147483647, 0),
(3, '', '', '0000-00-00', 0, 0),
(4, 'kenya banach', '65999614598', '0000-00-00', 2147483647, 0),
(5, 'kenya banach', '65999614598', '0000-00-00', 2147483647, 0),
(6, 'kenya banach', '65999614598', '0000-00-00', 2147483647, 0),
(7, 'ana vitoria', '65999614598', '0000-00-00', 2147483647, 0),
(8, 'ana vitoria', '65999614598', '0000-00-00', 2147483647, 0),
(9, 'ana vitoria', '65999614598', '0000-00-00', 2147483647, 0),
(10, 'walmir sousa', '99999999999', '0000-00-00', 0, 0),
(11, '', '', '0000-00-00', 0, 0),
(12, 'walmir sousa', '99999999999', '0000-00-00', 2147483647, 0),
(13, 'kenya banach', '65999614598', '0000-00-00', 2147483647, 0),
(14, 'kenya banach', '65999614598', '0000-00-00', 2147483647, 0),
(15, 'ana vitoria', '65999614598', '0000-00-00', 2147483647, 0),
(16, 'davi lucas', '19999614598', '0000-00-00', 2147483647, 0),
(17, 'davi lucas', '19999614598', '0000-00-00', 2147483647, 0),
(18, 'davi lucas abreu', '19999614598', '0000-00-00', 2147483647, 0),
(19, 'davi lucas abreu', '19999614598', '0000-00-00', 2147483647, 0),
(20, 'aline', '44444444444444444444444', '0000-00-00', 2147483647, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(3) NOT NULL,
  `email` varchar(144) NOT NULL,
  `senha` varchar(144) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `email`, `senha`, `id_usuario`) VALUES
(39, 'daviAbreu@gmail.com', '123', 18),
(40, 'davichrominski@gmail.com', '123', 19),
(41, 'aline@gmail.com', '123', 20);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_cad_empresas`
--
ALTER TABLE `tb_cad_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_cad_servicos`
--
ALTER TABLE `tb_cad_servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tb_cad_usuario`
--
ALTER TABLE `tb_cad_usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
