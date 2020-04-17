        <!doctype html>
        <html lang="en">

        <head>
            <title>Nova Disciplina</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                crossorigin="anonymous">
                <style>
        p,
        h1,
        label {
            color:#4169E1;
        }
        input{
opacity: 0.9;

        }
    </style>
        </head>

        <body>
            <div class="container">
                <?php   
            require_once("Cabecalho.php");
            require_once("Conexao.php");
            $sql = "select * from curso";
            $resultadoSql = mysqli_query($conexao, $sql);
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            $vetorTodosRegistros = array();
            while($vetorUmregistro != null){
                array_push($vetorTodosRegistros, $vetorUmregistro);
                $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            }
            
            if(isset($_POST["id_disciplina"])){
                $idDisciplina = $_POST["id_disciplina"];
            }else{
                $idDisciplina =0;
            }
            $sql = "select * from disciplina where id_disciplina =$idDisciplina";
            $resultadoSql = mysqli_query($conexao,$sql);
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            ?>
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-header"><p>Disciplinas</p></div>
                            <div class="card-body">
                                <form action="SalvarDisciplina.php" method="POST">
                                    <div class="form-row">
                                        <div class="col-4">
                                            <label>
                                                <h5 class="text-primary">Id da Disciplina</h5>
                                            </label><br>
                                            <input type="text" class="form-control" name="idDisc"
                                                placeholder="Automatico" readonly="true"
                                                value="<?=$vetorUmregistro["id_disciplina"];?>">
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-8">
                                            <label class="validationDefault01">
                                                <h5 class="text-primary">Nome da Disciplina</h5>
                                            </label><br>
                                            <input type="text" class="form-control" name="nomeDisc" id="validationDefault01"
                                                value="<?=$vetorUmregistro["nome_disciplina"];?>" required>
                                        </div><br>
                                        <div class="col-4">
                                            <label class="validationDefault02">
                                                <h5 class="text-primary">Carga Horaria</h5>
                                            </label><br>
                                            <input type="text" class="form-control" name="cargaHoraria" id="validationDefault02"
                                                value="<?=$vetorUmregistro["carga_horaria"];?>" required>
                                        </div>
                                    </div><br>
                                    <div>
                                    <label class="validationDefault03">
                                        <h5 class="text-primary">Ementa</h5>
                                    </label><br>
                                    <textarea name="ementa" class="char valid form-control" rows="4" id="validationDefault03" required><?=$vetorUmregistro["ementa"];?></textarea>
                                    </div>
                                    <div>
                                        <label class="validationDefault04">
                                            <h5 class="text-primary">Objetivos gerais</h5>
                                        </label><br>
                                            <textarea name="objetivosG" class="char valid form-control" rows="4" id="validationDefault04" required><?=$vetorUmregistro["objetivosG"];?></textarea>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <label class="validationDefault05">
                                                <h5 class="text-primary">Nº de Semanas</h5>
                                            </label><br>
                                            <input type="text" class="form-control" name="numeroSemana" id="validationDefault05"
                                                value="<?=$vetorUmregistro["numero_semanas"];?>" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="validationDefault06">
                                                <h5 class="text-primary">Período do Curso</h5>
                                            </label><br>
                                            <input type="text" class="form-control" name="periodoCurso" id="validationDefault06"
                                                value="<?=$vetorUmregistro["periodo_curso"];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col-md-12 mt-4">
                                        <label class="validationDefault07">
                                            <h5 class="text-primary">Bibliografia Básica</h5>
                                        </label><br>
                                        <input type="text" class="form-control" name="referencias" id="validationDefault07"
                                            value="<?=$vetorUmregistro["referencias"];?>" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="validationDefault08">
                                            <h5 class="text-primary"> Selecionar o Curso</h5>
                                        </label>
                                        <select name="id_curso" class="form-control" id="validationDefault08" required>
                                        <option selected disabled value="">Escolha o curso</option>
                                            <?php foreach ($vetorTodosRegistros as $umRegistro){ ?>
                                            <option value="<?=$umRegistro["id_curso"];?>">
                                                <?=$umRegistro["nome_curso"];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                                </form>
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
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        </body>

        </html>