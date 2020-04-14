<!doctype html>
<html>

<head>
    <title>Novo Plano</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        p,
        h1,
        label {
            color:#4169E1;
        }
        input{
opacity: 1.0;

        }
    </style>

</head>

<body style="background-color: #1C1C1C;">
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
            <div class="col-md-12 mt-4">
                <div class="card" style="background-color: #212529;">
                    <div class="card-header">
                        <h6 class="text-primary">Planos de Ensino</h6>
                    </div>
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
                                <option>Em branco</option>
                            </select>

                            <button type="submit" class="btn btn-primary my-1">Confirmar</button>

                        </form>
                        <?php 
                            $nome ="";
                            $disc ="";
                            $carga ="";
                            $ementa ="";
                            $semanas ="";
                            $periodoCurso="";
                            $referencias ="";
                            $objetivosG ="";
                            $nomeCurso="";

                         $sql = "select * from disciplina where nome_disciplina=?";

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
                            $nomeCurso=$valor["id_curso"];
                        endforeach;

                        $sql = "select nome_curso from curso where id_curso =?";
                        $sqlprep = $conexao->prepare($sql);
                        $sqlprep->bind_param("i",$curso);
                        $sqlprep->execute();
                        $cursoCapturado = $sqlprep->get_result();
                        $vetorCurso= mysqli_fetch_assoc($cursoCapturado);
                         $vetorTodosCursos = array();
                         while($vetorCurso !=null){
                             array_push($vetorTodosCursos,$vetorCurso);
                             $vetorCurso = mysqli_fetch_assoc($cursoCapturado);
                         }
                        foreach($vetorTodosCursos as $valor):
                            $nomeCurso = $valor["nome_curso"];
                        endforeach;

                        ?>
                        <form class="mt-4" action="SalvarPlano.php" method="POST">
                        <div>
                            <input type="hidden" class="form-control" name="id_plano" 
                            value="">
                            </div>
                            <div>
                                <label class="validationDefault01">
                                    <h5 class="text-primary">Nome do plano de ensino</h5>
                                </label><br>
                                <input type="text" class="form-control" name="nomePlano" id="validationDefault01"
                                    placeholder=" Exemplo: Plano-Portugues 1027" required>
                            </div><br>
                            <div>
                                <label class="validationDefault02">
                                    <h5 class="text-primary">Nome do docente</h5>
                                </label><br>
                                <input type="text" class="form-control" name="nomeDocente" id="validationDefault02"
                                    value="<?=$_SESSION["nome"]; ?>" required>
                            </div><br>
                            <div class="form-row">
                                <div class="col-9">
                                    <label>
                                        <h5 class="text-primary">Curso</h5>
                                    </label><br>

                                    <input type="text" class="form-control" name="nomeCurso" value="<?=$nomeCurso ?>"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <label>
                                        <h5 class="text-primary">Período do Curso</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="periodoC"
                                        value="<?=$periodoCurso; ?>° semestre" readonly>
                                </div>
                            </div>
                            <div class="form-row mt-4">

                                <div class="col-4">
                                    <label>
                                        <h5 class="text-primary">Nome da Disciplina</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$nome; ?>" name="nomeDisc"
                                        readonly>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <h5 class="text-primary">Carga Horária</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$carga?> horas" name="cargaDisc"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <h5 class="text-primary">N° de semanas aula </h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$semanas; ?>" name="semanaDisc"
                                        placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-3">
                                    <label class="validationDefault03">
                                        <h5 class="text-primary">Aulas teóricas</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="aulasT" id="validationDefault03" required>
                                </div>
                                <div class="col-3">
                                    <label class="validationDefault04">
                                        <h5 class="text-primary">Aulas práticas</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="aulasP" id="validationDefault04" required>
                                </div>
                                <div class="col-3">
                                    <label class="validationDefault05">
                                        <h5 class="text-primary">Aulas no laboratório</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="aulasL" id="validationDefault05" required>
                                </div>
                                <div class="col-3">
                                    <label class="validationDefault06">
                                        <h5 class="text-primary">Laboratório</h5>
                                    </label><br>
                                    <select class="custom-select" name="laboratorio" id="validationDefault06" required>
                                        <option selected disabled value="">Laboratório</option>
                                        <option>69</option>
                                        <option>Em sala</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-md mt-4">
                                    <label class="validationDefault07">
                                    <h5 class="text-primary">Ementa</h5>
                                    </label><br>
                                    <textarea name="ementaDisc" class="char valid form-control" rows="4" id="validationDefault07" required><?=$nome; ?></textarea>
                                </div>
                                
                                <div class="col-12 mt-4">
                                    <label class="validationDefault08">
                                        <h5 class="text-primary">Objetivos gerais</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$objetivosG; ?>" name="objetivosG" id="validationDefault08" required>
                                </div>
                                <div class="col-12 mt-4">
                                    <label class="validationDefault09">
                                        <h5 class="text-primary">Objetivos especificos</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="objetivosE" id="validationDefault09"
                                    required>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-12">
                                    <label class="validationDefault10">
                                        <h5 class="text-primary">Avaliação da aprendizagem</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="avaliacaoA" id="validationDefault10"
                                    required>
                                </div>
                                <div class="col-12 mt-2">
                                    <label class="validationDefault11">
                                        <h5 class="text-primary">Rerencias Bibliograficas</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="referenciasB"
                                        value="<?=$referencias; ?>" id="validationDefault11" readonly required>
                                </div>
                                <div class="col-12 mt-2">
                                    <label class="validationDefault12">
                                        <h5 class="text-primary">Rerencias Complementares</h5>
                                    </label><br>
                                    <input type="text" class="form-control" name="referenciasC" id="validationDefault12"
                                    required>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-5">
                                    <h5 class="text-primary text-center">1° Bimestre</h5>
                                </div>
                                <div class="col-2">
                                </div>

                                <div class="col-5">
                                    <h5 class="text-primary text-center">2° Bimestre</h5>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-5">
                                    <label class="validationDefault13">
                                        <h5 class="text-primary text-center">P1</h5>
                                    </label><br>
                                    <input type="date" class="form-control" name="p1primeiro"
                                        id="validationDefault13" required><br>
                                    <label class="validationDefault14">
                                        <h5 class="text-primary text-center">P2</h5>
                                    </label><br>
                                    <input type="date" class="form-control" name="p2primeiro"
                                        id="validationDefault14" required><br>
                                
                                </div>
                                <div class="col-2">

                                </div>
                                <div class="col-5">
                                    <label class="validationDefault16">
                                        <h5 class="text-primary text-center">P1</h5>
                                    </label><br>
                                    <input type="date" class="form-control" name="p1segundo"
                                        id="validationDefault16" required><br>
                                    <label class="validationDefault17">
                                        <h5 class="text-primary text-center">P2</h5>
                                    </label><br>
                                    <input type="date" class="form-control" name="p2segundo"
                                        id="validationDefault17" required><br>
                                    
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>

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