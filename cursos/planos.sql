-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Abr-2020 às 23:23
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(255) NOT NULL,
  `descricao_curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`, `descricao_curso`) VALUES
(2, 'TÃ©cnico em informÃ¡tica', 'Mecher com softwares'),
(7, 'Alimentos', 'Fazer pÃ£o'),
(9, 'Engenharia de pesca', 'Criar peixes');

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
(26, 'FÃ­sica 1', 60, 'Leis de Newton; Velocidade mÃ©dia; TermodinÃ¢mica', 'Estudar os fenÃ´menos bÃ¡sicos da fÃ­sica', '', 20, 2, 'Isaac Newton', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id_plano` int(11) NOT NULL,
  `nome_plano` varchar(255) NOT NULL,
  `nome_docente` varchar(255) NOT NULL,
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
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id_plano`, `nome_plano`, `nome_docente`, `curso_plano`, `periodoC_plano`, `nomeDisc_plano`, `carga_plano`, `semanas_plano`, `aulasT_plano`, `aulasP_plano`, `aulasL_plano`, `laboratorio`, `ementa_plano`, `objetivosG_plano`, `objetivosE_plano`, `aprendizagem`, `referencias_plano`, `complementares`, `p1_primeiro`, `p2_primeiro`, `p1_segundo`, `p2_segundo`, `situacao`, `comentario`) VALUES
(1, 'PE LinguagemP 1025', 'Gilson Saturnino', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de ProgramaÃ§Ã£o I', 60, 20, 20, 20, 40, 69, 'Classes e Objetos, mÃ©todos e seus fundamentos', 'Fazer com que os discentes entendam a parte lÃ³gica da Ã¡rea de programaÃ§Ã£o orientada a objetos', 'Fazer atividades no computador com os discentes, ajudando e orientando-os a respeito do desenvolvimento com foco na teoria', 'Utilizarei duas provas por bimestre e uma recuperaÃ§Ã£o por bimestre', 'ASS', 'Alan Turing, ateu e Homossexual, e pai da ciencia da computaÃ§Ã£o', '2020-03-05', '2020-03-05', '2020-03-06', '2020-03-06', 'Aguardando', 'Sem comentÃ¡rios por eqnto'),
(2, 'PE Portugues I 1027', 'Gilson Saturnino', 'Alimentos', 1, 'Portugues', 60, 20, 40, 0, 0, 0, 'Crase, RegÃªncia Verbal e Nominal, Substantivo e Adverbios', 'Estimular o desenvolvimento da Ã¡rea gramatical dos discentes', 'Dar uma aula show', 'Utilizarei duas provas por bimestre e uma recuperaÃ§Ã£o por bimestre', 'Machado de Assis', 'Nenhuma', '2020-03-18', '2020-03-27', '2020-03-04', '2020-03-27', 'Novo', ''),
(3, 'TESTE', 'Gilson Saturnino', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de programaÃ§Ã£o I', 60, 20, 1, 2, 3, 69, 'IDE NetBens e lÃ³gica de programaÃ§Ã£o', 'Ensinar os discentes a mecher no Netbeans', 'A', 'A', 'Sommervile', 'A', '2020-04-10', '2020-04-24', '2020-04-08', '2020-04-26', 'Sucesso', ''),
(4, 'Plano-HistÃ³ria ALTERADO', 'Gilson Saturnino', 'TÃ©cnico em informÃ¡tica', 2, 'HistÃ³ria I', 60, 20, 1, 1, 1, 69, 'Primeira Guerra Mundial e RevoluÃ§Ã£o Francesa', 'Apresentar acontecimentos histÃ³ricos de relevÃ¢ncia', 'a', 'a', 'Livro de HistÃ³ria do ensino mÃ©dio', 'a', '2020-04-15', '2020-04-11', '2020-04-21', '2020-04-22', 'Sucesso', ''),
(5, 'ABA', 'Gilson Saturnino', '7', 1, 'Portugues', 60, 55, 1, 1, 1, 69, 'Portugues', 'EsmiuÃ§ar os principais tÃ³picos das classes gramaticais existentes na lÃ­ngua portuguesa', 'A', 'A', 'Livro de portuguÃªs do ensino mÃ©dio', 'A', '2020-04-16', '2020-04-17', '2020-04-20', '2020-04-09', 'Sucesso', ''),
(6, 'PE LinguagemP 1025', 'Gilson Saturnino', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de ProgramaÃ§Ã£o I', 60, 20, 20, 20, 40, 69, 'Classes e Objetos, mÃ©todos e seus fundamentos', 'Fazer com que os discentes entendam a parte lÃ³gica da Ã¡rea de programaÃ§Ã£o orientada a objetos', 'Fazer atividades no computador com os discentes, ajudando e orientando-os a respeito do desenvolvimento com foco na teoria', 'Utilizarei duas provas por bimestre e uma recuperaÃ§Ã£o por bimestre', 'ASS', 'Alan Turing, ateu e Homossexual, e pai da ciencia da computaÃ§Ã£oAAAAAAAAAAAAAAAAAAAAAA', '2020-03-05', '2020-03-05', '2020-03-06', '2020-03-06', 'Aguardando', ''),
(7, 'TESTE FINAL ULTIMATE STONKSSSSSSSSSSSSS', 'Gilson Saturnino', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de programaÃ§Ã£o I', 60, 20, 4, 4, 4, 0, 'Linguagem de programaÃ§Ã£o I', 'Ensinar os discentes a mecher no Netbeans', '', 'AAA', 'Sommervile', 'AAA', '2020-04-04', '2020-04-24', '2020-04-08', '2020-04-27', 'Sucesso', ''),
(8, 'LKKKK', 'Gilson Saturnino', 'TÃ©cnico em informÃ¡tica', 4, 'Linguagem de programaÃ§Ã£o I', 60, 20, 2, 2, 2, 0, 'Linguagem de programaÃ§Ã£o I', 'Ensinar os discentes a mecher no Netbeans', 'AAA', 'AAA', 'Sommervile', 'AAA', '2020-04-16', '2020-04-17', '2020-04-30', '2020-04-07', 'Novo', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `senha`, `perfil`) VALUES
(2, 'gilson@docente.edu.br', 'Gilson Saturnino', '1234', 'Docente'),
(3, 'adriana@pedagoga.edu.br', 'Adriana Assis', '1234', 'Pedagogo'),
(4, 'edilson@coordenador.edu.br', 'Palminha', '102030', 'Coordenador'),
(5, 'denner@discente.edu.br', 'Denner Basilio', '105420', 'Discente do Colegiado'),
(8, 'hugo@docente.edu.br', 'Hugo Pimentel', '105421', 'Docente'),
(9, 'cadu@discente.edu.br', 'pato', '102031', 'Discente do Colegiado'),
(10, 'maria@docente.edu.br', 'Maria denise', '12345', 'Docente'),
(11, 'a', 'a', 'a', 'Docente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id_plano`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
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
