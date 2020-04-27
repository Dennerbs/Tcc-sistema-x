<!doctype html>
<html lang="en">

<head>
    <title>Cordelia</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
            require_once("Conexao.php");
            require_once("Cabecalho.php");

            $sql = "select * from usuarios where nome=?";
            $sqlprep = $conexao->prepare($sql);
            $sqlprep->bind_param("s",$_SESSION["nome"]);
            $sqlprep->execute();
            $resultadoSql = $sqlprep->get_result();
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            $vetorTodosregistro = array();
            while($vetorUmregistro != null){
                array_push($vetorTodosregistro, $vetorUmregistro);
                $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            }
            foreach($vetorTodosregistro as $registro){
                  $email = $registro['email'];
                  $nome = $registro['nome'];
                  $senha = $registro['senha'];
                  $perfil = $registro['perfil'];
            }
        ?>
    <div class="card w-75 mt-3">
        <div class="card-body">
            <form method="POST" action="Atualizar.php">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <img src="imagens/usuario.png" alt="Sua foto de perfil" class="img-thumbnail" style="width:150px;">
                        <footer class="blockquote-footer mt-1">As pessoas irão ver essa foto </footer>
                    </div>
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="validationCustom01">Email</label>
                  <input type="text" class="form-control" id="validationCustom1" placeholder="<?=$email ?>" required readonly>
                </div>
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="validationCustom03">Nome</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="<?=$nome; ?>" required readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="validationCustom04">O seu perfil é de :</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="<?=$perfil; ?>" required readonly>
                    </div>
                </div>
              <button type="submit" class="btn btn-outline-dark">Atualizar meus dados</button>
            </form>
        </div>
    </div>
</div>
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