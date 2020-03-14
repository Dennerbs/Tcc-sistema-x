<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php 
        require_once("Cabecalho.php");
        require_once("Conexao.php");
    ?>
        <div class="row">
            <?php
        $sql = "select * from disciplina";
        $resultadoSql = mysqli_query($conexao,$sql);
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
        $vetorTodosRegistros = array();
        while($vetorUmregistro != null){
            array_push($vetorTodosRegistros, $vetorUmregistro);
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
        }
    ?>
            <div class="col-md-10 mt-4">
                <div class="card">
                    <div class="card-header">Planos de Ensino</div>
                    <div class="card-body">
                    <?php
                            if(isset($_SESSION["erroPlano"])):
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION["erroPlano"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["erroPlano"]);
                            endif
                        ?>
                        <?php
                            if(isset($_SESSION["inseridoPlano"])):
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?=$_SESSION["inseridoPlano"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["inseridoPlano"]);
                            endif
                        ?>
                        <form method="POST" action="EscolhaDisc.php" class="form-inline">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Disciplinas</label>
                            <select class="custom-select my-1 mr-sm-2" id="selecionar" name="idDisc">
                                <option selected disabled>Disciplinas</option>
                                <?php foreach ($vetorTodosRegistros as $umRegistro){ ?>
                                <option value="<?=$umRegistro["id_disciplina"];?>">
                                    <?=$umRegistro["nome_disciplina"];?>
                                </option>
                                <?php } ?>
                            </select>

                            <button type="submit" class="btn btn-primary my-1">Confirmar</button>
<<<<<<< HEAD
                         </form>
                         <?php 

                         $sql = "select * from disciplina where id=?";
=======
                        </form>
                        <?php 
                        $nome = "";
                        $disc = "";
                        $carga = "";
                        $ementa = "";
                        $semanas = "";
                        $periodoCurso= "";
                        $referencias = "";
                        $objetivosG = "";
                         $sql = "select * from disciplina where nome_disciplina = ?";
>>>>>>> 3f4a350703ed10426f1fe604afe2ff4e8b3e1522
                         $sqlprep = $conexao->prepare($sql);
                         $sqlprep->bind_param("s",$_SESSION["nomeDisc"]);
                         $sqlprep->execute();
                         $resultadoSql = $sqlprep->get_result();
                         $registro= mysqli_fetch_assoc($resultadoSql);
                         $vetorRegistros = array();
                         while($registro !=null){
                             array_push($vetorRegistros,$registro);
                             $registro = mysqli_fetch_assoc($resultadoSql);
                         }
                        foreach($vetorRegistros as $valor):
                            $nome =$valor["nome_disciplina"];
                            $disc =$valor["id_disciplina"];
                            $carga =$valor["carga_horaria"];
                            $ementa =$valor["ementa"];
                            $semanas =$valor["numero_semanas"];
                            $periodoCurso=$valor["periodo_curso"];
                            $referencias =$valor["referencias"];
                            $objetivosG =$valor["objetivosG"];
                        endforeach;
                        ?>
<<<<<<< HEAD
                   
                        <form action="SalvarPlano.php" method="POST">
=======

                        <form action="SalvarPlano.php" method="POST" class="mt-3">
                        <div>
                                    <label>
                                        <h5 class="text-primary">Nome do plano de Ensino</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="nomePlano">
                                </div><br>
>>>>>>> 3f4a350703ed10426f1fe604afe2ff4e8b3e1522
                            <div class="form-row">
                                <div class="col-4">
                                    <label>
                                        <h5 class="text-primary">Nome da Disciplina</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$nome; ?>" name="nomeDisc">
                                </div><br>
                                <div class="col-4">
                                    <label>
                                        <h5 class="text-primary">Carga Horária</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$carga?>" name="cargaDisc"
                                        placeholder="">
                                </div><br>
                                <div class="col-4">
                                    <label>
                                        <h5 class="text-primary">N° de semanas aula </h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$semanas; ?>" name="semanaDisc" placeholder="">
                                </div><br>
                                <div class="col-12 mt-2">
                                <label>
                                        <h5 class="text-primary">Ementa</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$ementa?>" name="ementaDisc"
                                        placeholder="">
                                 </div>
                                <div class="col-12 mt-2">
                                    <label>
                                        <h5 class="text-primary">Objetivos gerais</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$objetivosG; ?>"name="objetivosDisc"
                                        placeholder="">
                                </div>
                                
                            </div><br>

                            <div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            require_once("Footer.php");
            ?>
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