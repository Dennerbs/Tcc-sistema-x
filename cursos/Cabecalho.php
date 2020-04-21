<!doctype html>
<html lang="en">

<head>
    <title>Cabecalho</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            body{
            background-image:url("imagens/triangulo.jpg");
        }
        </style>
</head>

<body>
    <?php
        session_start();
    ?>
    <nav class="navbar navbar-expand-lg  bg-light border border-info mt-4">
        <a class="navbar-brand" href="index.php">Cordélia</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php
                if(isset($_SESSION["nome"])){
                    if($_SESSION["perfil"]=="Coordenador"){
                 ?>
                <li class="nav-item">
                    <a class="nav-link" href="ListarCurso.php">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListarDisciplina.php">Disciplinas </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListarPlano.php">Planos de Ensino</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="FormCadastro.php">Adicionar membro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Chat.php">Chat</a>
                </li>
                <?php
                }if($_SESSION["perfil"]=="Docente"){
                        ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Planos de Ensino
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="FormPlano.php">Novo plano</a>
                        <a class="dropdown-item" href="ListarPlano.php">Meus planos</a>
                    </li>
                <?php
                }if($_SESSION["perfil"]=="Discente do colegiado"){
                            ?>
                <li class="nav-item">
                    <a class="nav-link" href="ListarPlano.php">Planos de Ensino</a>
                </li>
                <?php 
                }if($_SESSION["perfil"]=="Pedagogo"){
                            ?>
                <li class="nav-item">
                    <a class="nav-link" href="ListarPlano.php">Planos de Ensino</a>
                </li>
                <?php
                }if($_SESSION["perfil"]=="Docente do colegiado"){
                            ?>
                <li class="nav-item">
                    <a class="nav-link" href="ListarPlano.php">Planos de Ensino</a>
                </li>
                <?php
                }if($_SESSION["perfil"]=="Tecnico do colegiado"){
                            ?>
                <li class="nav-item">
                    <a class="nav-link" href="ListarPlano.php">Planos de Ensino</a>
                </li>
                <?php

                }
                }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">Login</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <?php
        if(isset($_SESSION["nome"])){
        ?>
        <span class="align-baseline mr-4"><h6 class="text-primary">Usuário: <?= $_SESSION["nome"]; ?></h6></span>
        <a href="MataSessao.php" class="text-decoration-none">Desconectar</a>
        <?php
        }
        ?>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>