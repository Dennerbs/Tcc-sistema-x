<!doctype html>
<html lang="en">

<head>
    <title>Inicial</title>
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

<body style="background-color: #1C1C1C;">
    <div class="container">
        <?php
        require_once("Cabecalho.php");
        ?>
        <div class="row my-2">
            <div class="col-md-12">
                <h1 class="text-center font-italic">Recuperação de Senha</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8 mt-3">
                <div class="card" style="background-color: #212529;">
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

                        <form method="POST" action="NovaSenha.php">
                            <div class="form-group">
                                <label for="validationServer01">
                                    <h5 class="text-primary">Email</h5>
                                </label>
                                <input type="email" class="form-control" id="validationServer01" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Enviar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Nossa equipe enviou um código para alteração de senha no Email
                                            informado, por gentileza, verifique sua caixa de mensagens
                                        </div>
                                        <div class="modal-footer">
                                                <a class="btn btn-primary" href="" role="button" 
                                                data-dismiss="modal">Entendi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card w-100" style=" background-color: #212529;width: 18rem;">
                    <img src="imagens/frifaire.png" class="card-img-top" alt="Bandeira de Coxim-MS">
                    <div class="card-body">style="background-color: #212529;"
                        <p class="card-text text-justify">Não compartilhe seu Email e sua Senha com
                            terceiros, proteja seus dados, o acesso ao sistema, e acima de tudo você.
                        </p>
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