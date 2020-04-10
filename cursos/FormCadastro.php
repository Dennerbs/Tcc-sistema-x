<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        p,
        h1{
            color:#4169E1;
        }
        input,select{
opacity: 0.9;

        }
    </style>
</head>

<body style="background-color: #1C1C1C;">
    <div class="container">
        <?php
        require_once("Cabecalho.php");
        ?>
        <div class="row">
            <div class="col-md-8 mt-3">
                <div class="card" style="background-color: #212529;">
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION["cadastrado"])):
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?=$_SESSION["cadastrado"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["cadastrado"]);
                            endif
                        ?>
                        <form method="POST" action="SalvarCadastro.php">
                            <div class="form-group">
                                <label class="validationDefault01" for="nome"><h5 class="text-primary">Nome</h5></label>
                                <input type="text" class="form-control" name="nome" id="validationDefault01" required>
                            </div>
                            <div class="form-group">
                                <label class="validationDefault02" for="login"><h5 class="text-primary">Email</h5></label>
                                <input type="text" class="form-control" name="email" id="validationDefault02" required>
                            </div>
                            <div class="form-group">
                                <label class="validationDefault03" for="senha"><h5 class="text-primary">Senha</h5></label>
                                <input type="password" class="form-control" name="password" id="validationDefault03" required>
                            </div>
                            <div class="form-group">
                                <label for="selecionar"><h5 class="text-primary">Perfil</h5></label>
                                <select class="form-control" id="selecionar" name="perfil">
                                    <option selected disabled>Perfil do usuário</option>
                                    <option>Docente</option>
                                    <option>Discente do Colegiado</option>
                                    <option>Pedagogo</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card w-100" style="width: 18rem;">
                    <img src="imagens/educacao.jpg" class="card-img-top" alt="Bandeira de Coxim-MS">
                    <div class="card-body">
                        <p class="card-text text-justify">O Sistema x é um sistema desenvolvido por academicos,
                            para auxiliar o corpo educacional do municipio de Coxim-MS</p>
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