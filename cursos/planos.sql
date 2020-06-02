-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2020 às 20:40
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `planos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `data` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id_chat`, `id_sala`, `id_usuario`, `nome_usuario`, `mensagem`, `data`) VALUES
(1, 16, 2, ' Gilson Saturnino', 'eaee', '00:44:02'),
(2, 27, 5, ' Denner Basilio', 'kkkkk', '00:44:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `horario` datetime NOT NULL,
  `id_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario`, `perfil`, `comentario`, `horario`, `id_plano`) VALUES
(4, 'Edilson Palma', 'Coordenador', 'Especifique melhor sua maneira de avaliaÃ§Ã£o.', '2020-04-24 11:52:00', 14),
(5, 'Edilson Palma', 'Coordenador', 'Melhorar objetivos Especificos', '2020-04-24 11:55:00', 15),
(6, 'pato', 'Discente do Colegiado', 'Concordo com o Palma', '2020-04-24 11:58:00', 15),
(7, 'Edilson Palma', 'Coordenador', 'Adicionar tambÃ©m o campus e ano / semestre', '2020-04-26 13:54:00', 15),
(8, 'Adriana Assis', 'Pedagogo', 'Ok', '2020-04-27 12:38:00', 18),
(9, 'pato', 'Discente do Colegiado', 'Ok', '2020-04-27 12:40:00', 18),
(10, 'Denner Basilio', 'Docente do Colegiado', 'ok', '2020-04-27 12:41:00', 18),
(11, 'Janaina', 'Tecnico do Colegiado', 'ok', '2020-04-27 12:42:00', 18),
(12, 'Edilson Palm', 'Coordenador', 'todos concordam, entÃ£o estÃ¡ aprovado', '2020-04-27 12:42:00', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(255) NOT NULL,
  `duracao` varchar(255) NOT NULL,
  `cargahoraria` int(11) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `descricao_curso` varchar(255) NOT NULL,
  `ementa` varchar(255) NOT NULL,
  `coordenador` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`, `duracao`, `cargahoraria`, `campus`, `descricao_curso`, `ementa`, `coordenador`) VALUES
(2, 'TÃ©cnico em informÃ¡tica', '3 anos e meio (7 semestres)', 36000, 'Coxim', 'VocÃª se tornarÃ¡ um bom desenvolvedor ', 'Um monte de coisa', 'Edilson Palma'),
(7, 'Alimentos', '3 anos e meio (7 semestres)', 3600, 'Coxim', 'Se tornarÃ¡ um profissional qualificado em mÃ©todos para gestÃ£o de alimentos', 'um monte de coisa', 'Angela Kiwisiseoeiso'),
(9, 'Engenharia de pesca', '5 anos (10 semestres)', 6250, 'CorumbÃ¡', 'SerÃ¡ um Aquiculturista ', 'vÃ¡rias coisas', 'Ribeirinho Beiramar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhamento`
--

CREATE TABLE `detalhamento` (
  `id_det` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `conteudo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `detalhamento`
--

INSERT INTO `detalhamento` (`id_det`, `id_plano`, `mes`, `conteudo`) VALUES
(1, 17, 'Agosto', 'Guerra 1'),
(2, 17, 'Setembro', 'Guerra 2'),
(3, 17, 'outubro', 'Guerra 3'),
(8, 14, 'Fevereiro', 'Java basico'),
(9, 14, 'Marco', 'Java basico'),
(10, 14, 'Abril', 'Java basico'),
(11, 14, 'Maio', 'Java basico'),
(12, 14, 'Junho', 'Java basico'),
(13, 14, 'julho', 'Java basico'),
(14, 15, 'Fevereiro', 'Java Medio'),
(15, 15, 'Marco', 'Java Medio'),
(16, 15, 'Abril', 'Java Medio'),
(17, 15, 'Maio', 'Java Medio'),
(18, 15, 'Junho', 'Java Medio'),
(19, 15, 'Julho', 'Java Medio'),
(20, 16, 'Julho', 'Java Avancado'),
(21, 16, 'Agosto', 'Java Avancado'),
(22, 16, 'Setembro', 'Java Avancado'),
(23, 16, 'Outubro', 'Java Avancado'),
(24, 16, 'Novembro', 'Java Avancado'),
(25, 16, 'Dezembro', 'Java Avancado'),
(26, 18, 'Jan', 'a'),
(27, 18, 'Fev', 'b'),
(28, 18, 'Mar', 'c'),
(29, 18, 'Abr', 'd'),
(30, 18, 'Mai', 'e'),
(31, 18, 'Jun', 'f');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(255) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `ementa` varchar(255) NOT NULL,
  `objetivosG` varchar(255) NOT NULL,
  `objetivosE` varchar(255) NOT NULL,
  `numero_semanas` int(11) NOT NULL,
  `periodo_curso` int(11) NOT NULL,
  `referencias` varchar(255) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome_disciplina`, `carga_horaria`, `ementa`, `objetivosG`, `objetivosE`, `numero_semanas`, `periodo_curso`, `referencias`, `id_curso`) VALUES
(20, 'Linguagem de programaÃ§Ã£o I', 60, 'IDE NetBens e lÃ³gica de programaÃ§Ã£o', 'Ensinar os discentes a mecher no Netbeans', '', 20, 4, 'Sommervile', 2),
(24, 'Portugues', 60, 'Classes gramaticais, regÃªncia verbal e regÃªncia nominal', 'EsmiuÃ§ar os principais tÃ³picos das classes gramaticais existentes na lÃ­ngua portuguesa', '', 55, 1, 'Livro de portuguÃªs do ensino mÃ©dio', 7),
(25, 'HistÃ³ria I', 60, 'Primeira Guerra Mundial e RevoluÃ§Ã£o Francesa', 'Apresentar acontecimentos histÃ³ricos de relevÃ¢ncia', '', 20, 2, 'Livro de HistÃ³ria do ensino mÃ©dio', 2),
(26, 'FÃ­sica 1', 60, 'Leis de Newton; Velocidade mÃ©dia; TermodinÃ¢mica', 'Estudar os fenÃ´menos bÃ¡sicos da fÃ­sica', '', 20, 2, 'Isaac Newton', 2),
(27, 'IKA', 2, 'IKA', 'IKA', 'IKA', 2, 2, 'IKA', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupocorrecao`
--

CREATE TABLE `grupocorrecao` (
  `id_grupo` int(11) NOT NULL,
  `codigo_grupo` varchar(5) NOT NULL,
  `nome_grupo` varchar(150) NOT NULL,
  `id_usuario` varchar(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `id_plano` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupocorrecao`
--

INSERT INTO `grupocorrecao` (`id_grupo`, `codigo_grupo`, `nome_grupo`, `id_usuario`, `nome_usuario`, `id_plano`) VALUES
(1, '31388', 'Grupo 2', '5,9,14', 'Denner Basilio,pato,Bruno Elias', '15,18'),
(2, '20178', 'Grupo 3', '2,6,11', 'Gilson Saturnino,Hugo Pimentel,Janaina', ''),
(3, '53588', 'Grupo 3', '3,13', 'Adriana Assis,Renan Lima', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome`, `id_usuario`) VALUES
(3, 'WhatsApp Image 2020-04-22 at 21.04.05.jpeg', 12),
(4, 'WhatsApp Image 2020-04-22 at 21.04.04.jpeg', 12),
(5, 'pp.jpg', 12),
(6, '', 12),
(7, 'WhatsApp Image 2020-04-22 at 21.04.04.jpeg', 12),
(8, 'pp.jpg', 12),
(9, 'WhatsApp Image 2020-04-22 at 21.04.05.jpeg', 3),
(10, 'Desert.jpg', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id_plano` int(11) NOT NULL,
  `nome_plano` varchar(255) NOT NULL,
  `nome_docente` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `anoSemestre` varchar(255) NOT NULL,
  `curso_plano` varchar(255) NOT NULL,
  `periodoC_plano` int(11) NOT NULL,
  `nomeDisc_plano` varchar(255) NOT NULL,
  `carga_plano` int(11) NOT NULL,
  `semanas_plano` int(11) NOT NULL,
  `aulasT_plano` int(11) NOT NULL,
  `aulasP_plano` int(11) NOT NULL,
  `aulasL_plano` int(11) NOT NULL,
  `laboratorio` int(11) NOT NULL,
  `ementa_plano` varchar(255) NOT NULL,
  `objetivosG_plano` varchar(255) NOT NULL,
  `objetivosE_plano` varchar(255) NOT NULL,
  `aprendizagem` varchar(255) NOT NULL,
  `referencias_plano` varchar(255) NOT NULL,
  `complementares` varchar(255) NOT NULL,
  `p1_primeiro` date NOT NULL,
  `p2_primeiro` date NOT NULL,
  `p1_segundo` date NOT NULL,
  `p2_segundo` date NOT NULL,
  `situacao` varchar(255) NOT NULL,
  `codigo_grupo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id_plano`, `nome_plano`, `nome_docente`, `campus`, `anoSemestre`, `curso_plano`, `periodoC_plano`, `nomeDisc_plano`, `carga_plano`, `semanas_plano`, `aulasT_plano`, `aulasP_plano`, `aulasL_plano`, `laboratorio`, `ementa_plano`, `objetivosG_plano`, `objetivosE_plano`, `aprendizagem`, `referencias_plano`, `complementares`, `p1_primeiro`, `p2_primeiro`, `p1_segundo`, `p2_segundo`, `situacao`, `codigo_grupo`) VALUES
(14, 'Linguagem de ProgramaÃ§Ã£o | - cx 2020', 'Gilson Saturnino', 'Coxim', '2019 / 2', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de programaÃ§Ã£o I', 60, 20, 10, 30, 40, 69, 'Linguagem de programaÃ§Ã£o I', 'Ensinar os discentes a mecher no Netbeans', 'os melhores', 'Trabalhos + Atividades + Provas', 'Sommervile', 'Youtube', '2020-03-11', '2020-03-25', '2020-05-06', '2020-05-27', 'Sucesso', ''),
(15, 'Linguagem de ProgramaÃ§Ã£o || - cx 2020', 'Renan Lima', 'Coxim', '2020 / 1', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de programaÃ§Ã£o I', 60, 20, 10, 30, 35, 69, 'Linguagem de programaÃ§Ã£o I', 'Ensinar os discentes a mecher no Netbeans', 'Os melhores', 'Atividades e Provas', 'Sommervile', 'Topicos da internet', '2020-03-12', '2020-03-26', '2020-04-16', '2020-05-21', 'Corrigir Colegiado', '31388'),
(16, 'Linguagem de ProgramaÃ§Ã£o ||| - cx 2020', 'Gilson Saturnino', 'Coxim', '2020 / 2', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de programaÃ§Ã£o I', 60, 20, 10, 20, 30, 0, 'Linguagem de programaÃ§Ã£o I', 'Ensinar os discentes a mecher no Netbeans', '', 'Prova', 'Sommervile', 'youtube', '2020-08-11', '2020-09-08', '2020-09-29', '2020-10-13', 'Aguardando', ''),
(17, 'PE Historia 2023A', 'Maria denise', 'Coxim', '2020 / 2', 'TÃ©cnico em informÃ¡tica', 2, 'HistÃ³ria I', 60, 20, 10, 20, 30, 0, 'HistÃ³ria I', 'Apresentar acontecimentos histÃ³ricos de relevÃ¢ncia', '', 'prova', 'Livro de HistÃ³ria do ensino mÃ©dio', 'youtube', '2020-09-09', '2020-10-07', '2020-11-11', '2020-12-09', 'Novo', ''),
(18, 'HistÃ³ria I - CX - 1027', 'Gilson Saturnino', 'Coxim', '2020 / 2', 'TÃ©cnico em informÃ¡tica', 2, 'HistÃ³ria I', 60, 20, 10, 10, 10, 69, 'HistÃ³ria I', 'Apresentar acontecimentos histÃ³ricos de relevÃ¢ncia', '', 'Encaminhar os discentes aos plantÃµes', 'Livro de HistÃ³ria do ensino mÃ©dio', 'nenhuma', '2020-04-02', '2020-04-03', '2020-04-04', '2020-04-05', 'Corrigir Colegiado', '31388');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `colegiado` varchar(3) NOT NULL,
  `codigo_grupo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `senha`, `perfil`, `colegiado`, `codigo_grupo`) VALUES
(1, 'edilson@coordenador.edu.br', 'Edilson Palma', '102030', 'Coordenador', 'sim', ''),
(2, 'gilson@docente.edu.br', 'Gilson Saturnino', '1234', 'Docente', 'nao', '20178'),
(3, 'adriana@pedagoga.edu.br', 'Adriana Assis', '123', 'Pedagogo', 'sim', '53588'),
(5, 'denner@discente.edu.br', 'Denner Basilio', '105420', 'Discente do Colegiado', 'sim', '31388'),
(6, 'hugo@docente.edu.br', 'Hugo Pimentel', '105421', 'Docente', 'nao', '20178'),
(9, 'cadu@discente.edu.br', 'pato', '102031', 'Discente do Colegiado', 'sim', '31388'),
(10, 'maria@docente.edu.br', 'Maria denise', '12345', 'Docente', 'nao', ''),
(11, 'Janaina@tecnico.edu.br', 'Janaina', '10203040', 'Tecnico do Colegiado', 'sim', '20178'),
(13, 'Renan@docente.edu.br', 'Renan Lima', '100200', 'Docente do Colegiado', 'sim', '53588'),
(14, 'bruno@docente.edu.br', 'Bruno Elias', '110220', 'Docente do Colegiado', 'sim', '31388');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `detalhamento`
--
ALTER TABLE `detalhamento`
  ADD PRIMARY KEY (`id_det`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Índices para tabela `grupocorrecao`
--
ALTER TABLE `grupocorrecao`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id_plano`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `detalhamento`
--
ALTER TABLE `detalhamento`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `grupocorrecao`
--
ALTER TABLE `grupocorrecao`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
