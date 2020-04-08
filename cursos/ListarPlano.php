<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        require_once("Conexao.php");
        require_once("Cabecalho.php");
        $sql = "select nome_plano,situacao from planos where nome_docente=?";
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
        ?>
        <div class="row">
            <div class="col-md-6 mt-4">
                <div class="card" style="width: 28rem;">
                    <div class="card-header">
                        Planos de Ensino
                    </div>
                    <div class="list-group">
                        <?php foreach ($vetorTodosregistro as $umRegistro){ 

                    if($umRegistro["situacao"]=="Novo"){
                    ?>
                        <a href="#"
                            class="list-group-item list-group-item-action list-group-item-primary"><?=$umRegistro["nome_plano"]; ?></a>

                        <?php }if($umRegistro["situacao"]=="Corrigir"){ ?>

                        <a href="#"
                            class="list-group-item list-group-item-action list-group-item-warning"><?=$umRegistro["nome_plano"]; ?></a>

                        <?php }if($umRegistro["situacao"]=="Aguardando"){ ?>

                        <a href="#"
                            class="list-group-item list-group-item-action list-group-item-danger"><?=$umRegistro["nome_plano"]; ?></a>

                        <?php }if($umRegistro["situacao"]=="Aprovado"){ ?>

                        <a href="#"
                            class="list-group-item list-group-item-action list-group-item-success"><?=$umRegistro["nome_plano"]; ?></a>

                        <?php }
        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <p class="text-center"><em>Fique atento às etapas por qual os planos de ensino percorrem até sua aprovação.</em></p>
                <div class="card h-50 text-white bg-warning mb-3 float-right ml-1" style="max-width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Aguardando sugestões</h5>
                        <p class="card-text text-justify">O plano de ensino foi direcionado e aguarda as sugestões do colegiado</p>
                    </div>
                </div>
                <div class="card h-50  text-white bg-info mb-3 float-right" style="max-width: 16rem;">

                    <div class="card-body">
                        <h5 class="card-title">Novo</h5>
                        <p class="card-text text-justify">Seu plano de ensino acaba de ser criado, e ainda não foi enviado para 
                        receber sugestões ou a aprovação do colegiado</p>
                    </div>
                </div>
                <div class="card h-50  text-white bg-success mb-3 float-right ml-1" style="max-width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Aprovado!!</h5>
                        <p class="card-text text-justify">Seu plano de ensino passou pelas mãos do colegiado e foi considerado
                        suficiente</p>
                    </div>
                </div>
                <div class="card h-50 text-white bg-danger mb-3 float-right" style="max-width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Aguardando sua correção</h5>
                        <p class="card-text text-justify">O colegiado recebeu seu plano de ensino e retornou-o,
                        para que você possa fazer algumas alterações em certos pontos,e então enviá-lo novamente</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once("Footer.php");
        ?>
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