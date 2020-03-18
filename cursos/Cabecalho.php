<!doctype html>
<html lang="en">

<head>
    <title>Cabecalho</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
        session_start();
    ?>
    <nav class="navbar navbar-expand-lg  bg-dark border border-info mt-3">
        <a class="navbar-brand" href="index.php">Sistema x</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
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
                    <a class="nav-link" href="ListarDisciplina.php">Disciplina </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FormCadastro.php">Adicionar membro</a>
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
                }if($_SESSION["perfil"]=="Discente do Colegiado"){
                            ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chorar</a>
                </li>
                <?php 
                }if($_SESSION["perfil"]=="Pedagogo"){
                            ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ajudar</a>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>