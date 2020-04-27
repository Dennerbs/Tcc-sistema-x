
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
        p,
        h1 {
            color:#4169E1;
        }
        input{
opacity: 0.6; 
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        require_once("Cabecalho.php");
        ?>
        <div class="row my-2">
            <div class="col-md-12">
                <h1 class="text-center font-italic">Login</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8 mt-3">
                <div class="card border-black">
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION["erro"])):
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION["erro"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["erro"]);
                            endif
                        ?>
                        <?php
                            if(isset($_SESSION["erroc"])):
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION["erroc"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["erroc"]);
                            endif
                        ?>

                        <form method="POST" action="Validacao.php">
                            <div class="form-group">
                                <label for="validationServer01"><h5 class="text-primary">Email</h5></label>
                                <input type="text" class="form-control" id="validationServer01" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="validationServer02"><h5 class="text-primary">Senha</h5></label>
                                <input type="password" class="form-control" id="validationServer02" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                            <a class="text-right ml-2" href="RecupSenha.php">Esqueci minha senha</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card w-100" style="width: 18rem;">
                    <img src="imagens/educacao.jpg" class="card-img-top" alt="Bandeira de Coxim-MS">
                    <div class="card-body">
                        <p class="card-text text-justify">Esta é uma aplicação web desenvolvida por acadêmicos
                            para auxiliar o corpo educacional do Instituto Federal de Mato Grosso do Sul- Campus Coxim</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("Footer.php"); 
        
    ?>

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