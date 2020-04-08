<!doctype html>
<html lang="en">

<head>
    <title>Title</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        p,
        h1 {
            color:#4169E1;
        }
    </style>
</head>

<body style="background-color: #1C1C1C;">
    <div class="container">
        <?php require_once("Cabecalho.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron-fluid mt-4">
                    <div class="container" style="height: 400px;">
                        <h1 class="display-2 text-center">Bem vindo!!</h1>
                        <p class="lead text-center">Sistema x, o sistema acadêmico para o Instituto Federal de Mato Grosso do Sul- Campus Coxim</p>
                    </div>
                </div>
            </div>
            
            <?php
            if(isset($_SESSION["nome"])){
                if($_SESSION["perfil"]=="Coordenador"){  ?>
                <div class="col-md-12 mt-4">
                    <a href="#.php" type="button" class="btn btn-outline-dark btn-lg btn-block">Vamos lá!! </a>
                </div>
            <?php }if($_SESSION["perfil"]=="Discente do Colegiado"){  ?>
                <div class="col-md-12 mt-4">
                    <a href="#.php" type="button" class="btn btn-outline-dark btn-lg btn-block">Vamos lá!! </a>
                </div> 
            <?php }if($_SESSION["perfil"]=="Docente"){  ?>
                <div class="col-md-12 mt-4">
                    <a href="#.php" type="button" class="btn btn-outline-dark btn-lg btn-block">Vamos lá!! </a>
                </div> 
            <?php }if($_SESSION["perfil"]=="Pedagogo"){  ?>
                <div class="col-md-12 mt-4">
                    <a href="#.php" type="button" class="btn btn-outline-dark btn-lg btn-block">Vamos lá!! </a>
                </div>
            <?php 
                }
            }else{ ?>
            <div class="col-md-12 mt-4">
            <a href="Login.php" type="button" class="btn btn-outline-dark btn-lg btn-block">Entrar </a>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php 
    require_once("Footer.php"); ?>

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