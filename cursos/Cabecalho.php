<html lang="en">

<head>
    <title></title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            body{
            background-color:#ffffff;
        }span{
            font-style: italic;
        }
        </style>
</head>

<body>
    <?php
        session_start();
        require_once("Conexao.php");
    ?>
    <nav class="navbar navbar-expand-lg  bg-light border border-info mt-4">
        <a class="navbar-brand" href="index.php">Inicial</a>
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
                    <a class="nav-link" href="ListarUsuarios.php">Membros</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href=" ListarGrupoCorrecao.php">Grupo Correção</a>
                </li>
                <?php
                }if($_SESSION["perfil"]=="Docente" || $_SESSION["cole"] == "sim" && $_SESSION["perfil"] != "Coordenador" && $_SESSION["perfil"] != 'Discente do Colegiado' && $_SESSION["perfil"] != 'Tecnico do Colegiado'){
                        ?>
                    <li class="nav-item">
                    <a class="nav-link" href="FormPlano.php">Novo plano</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="ListarPlanoMeus.php">Meus planos</a>
                    </li>
                <?php
                }if($_SESSION["cole"] == "sim" && $_SESSION["perfil"] != "Coordenador" ){ ?>
                     <li class="nav-item">
                    <a class="nav-link" href="ListarPlano.php">Planos de Ensino</a>
                </li>
               

               <?php } ?>
                   
               <li class="nav-item">
                    <a class="nav-link" href="ListarUsuarios2.php">Chat</a>
                    </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">Login</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <?php
        if(isset($_SESSION["nome"])){
        ?>
        <?php
                        $id_usuario = $_SESSION["id_logado"];
                        $sql = "select id,nome from imagens where id_usuario=?";
                        $sqlprep = $conexao->prepare($sql);
                        $sqlprep->bind_param("i",$id_usuario);
                        $sqlprep->execute();
                        $resultadoSql = $sqlprep->get_result();
                        $registro= mysqli_fetch_assoc($resultadoSql);
                        $vetorRegistros = array();
                        while($registro !=null){
                            array_push($vetorRegistros,$registro);
                            $registro = mysqli_fetch_assoc($resultadoSql);
                            $validacao = 0;
                        }
                        foreach($vetorRegistros as $valor):
                            $id = $valor["id"];
                            $foto =$valor["nome"];                  

                        endforeach;
                        //var_dump($imagens);
                        if(isset($validacao)){ ?>
                            <img src="<?php echo "./imagens/".$foto; ?>" style="width:45px; height:45px;">
                        <?php
                        }else{ ?>
                            <img src="imagens/usuario.png" style="width:45px; height:45px;">
                        <?php
                        } ?>
                        
        <a href="MeuPerfil.php"><span class="mr-4 ml-2 mt-2">Usuário: <?= $_SESSION["nome"]; ?></span></a>
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