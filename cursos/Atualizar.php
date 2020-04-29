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
                  $id =  $registro['id'];
                  $email = $registro['email'];
                  $nome = $registro['nome'];
                  $senha = $registro['senha'];
                  $perfil = $registro['perfil'];
            }
        ?>
    <div class="card w-75 mt-3">
        <div class="card-body">
            <form method="POST" action="Atualizardados.php">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <?php
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
                            <img src="<?php echo "./imagens/".$foto; ?>" style="width:180px; height:180px;">
                        <?php
                        }else{ ?>
                            <img src="imagens/usuario.png" style="width:180px; height:180px;">
                        <?php
                        } ?>
                        <footer class="blockquote-footer mt-1">As pessoas irão ver essa foto </footer>
                    </div>
                </div>
                        <?php
                          if(isset($_SESSION["nalterado"])):
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION["nalterado"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["nalterado"]);
                            endif
                        ?>
                <input type="hidden" class="form-control" id="a" name="idusuario" value="<?=$id; ?>">
              <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="validationCustom03">Nome</label>
                        <input type="text" class="form-control" id="validationCustom03" name="nome" value="<?=$nome; ?>" placeholder="<?=$nome; ?>" required>
                    </div>
                <div class="form-group col-md-3">
                        <label for="validationCustom05">Antiga senha</label>
                        <input type="password" class="form-control" id="validationCustom5" name="senhaantiga" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="validationCustom02">Nova senha</label>
                        <input type="password" class="form-control" id="validationCustom02" name="senhanova" required>
                    </div>
              </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="validationCustom01">Email</label>
                  <input type="text" class="form-control" id="validationCustom1" name="email" value="<?=$email ?>" placeholder="<?=$email ?>" required readonly>
                </div>
                    <div class="form-group col-md-6">
                        <label for="validationCustom04">O seu perfil é de :</label>
                        <input type="text" class="form-control" id="validationCustom04" name="perfil" value="<?=$perfil; ?>" placeholder="<?=$perfil; ?>" required readonly>
                    </div>
                </div>
              <button type="submit" class="btn btn-outline-dark">Atualizar</button>
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