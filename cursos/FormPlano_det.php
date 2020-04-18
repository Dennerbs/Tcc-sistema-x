<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <?php require_once('Cabecalho.php');
    require_once('Conexao.php');

    $idplano=$_SESSION["id_plan"];

    $sql = "select * from planos where id_plano = $idplano";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    ?>
        <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Planos de Ensino</h6>
        </div>
        <div class="card-body">
        
        <?php if(isset($_SESSION["erroPlano"])):?>
        <div class="alert alert-danger" role="alert">
            <?=$_SESSION["erroPlano"]; ?>
        </div>
        <?php unset($_SESSION["erroPlano"]);endif?>
        <?php if(isset($_SESSION["inseridoPlano"])):?>
        <div class="alert alert-success" role="alert">
            <?=$_SESSION["inseridoPlano"]; ?>
        </div>
        <?php unset($_SESSION["inseridoPlano"]); endif?>

            <form class="mt-4" action="SalvarPlano_det.php" method="POST">
            <div class="row">
            <div>
                <input type="text" class="form-control" name="id_plano" id="validationDefault01" 
                 value="<?php $vetorUmregistro['id_plano'] ?>"    placeholder=" " hidden >
            </div>
            <div class="col-md-4">
                <label class="validationDefault02">
                <h5 class="text-primary">Mes</h5>
                </label><br>
                <input type="text" class="form-control" name="mes" id="validationDefault02"
                    placeholder=" " >
            </div><br>
            <div class="col-md-4">
                <label class="validationDefault03">
                <h5 class="text-primary">Data Inicial</h5>
                </label><br>
                <input type="date" class="form-control" name="dI" id="validationDefault03"
                    placeholder=" " >
            </div><br>
            <div class="col-md-4">
                <label class="validationDefault04">
                <h5 class="text-primary">Data Final</h5>
                </label><br>
                <input type="date" class="form-control" name="dF" id="validationDefault04"
                    placeholder=" " >
            </div><br>
            <div class="col-md-12"> 
                <label class="validationDefault05">
                <h5 class="text-primary">Conteudo</h5>
                </label><br>
                <input type="text" class="form-control" name="con" id="validationDefault05"
                    placeholder=" " >
            </div><br>
            <button type="submit" class="btn btn-success mt-4">Salvar</button>
            </div>
            </form>
        </div>
    </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</html>