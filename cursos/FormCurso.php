<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
        p,
        h1{
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
    ?>
        <div class="row">
            <?php
        if(isset($_POST["id_curso"])){
            $idCurso = $_POST["id_curso"];
        }else{
            $idCurso=0;
        }
        $sql = "select * from curso where id_curso =$idCurso";
        $resultadoSql = mysqli_query($conexao,$sql);
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);  
    ?>
            <div class="col-md-10 mt-4">
                <div class="card">
                    <div class="card-header"><p>Cursos</p></div>
                    <div class="card-body">
                        <form action="SalvarCurso.php" method="POST" onsubmit="" name="">
                            <div class="form-row">
                                <div class="col-3">
                                    <label>
                                        <h5 class="text-primary">Id do Curso</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$vetorUmregistro["id_curso"]; ?>" name="idCurso" readonly
                                        placeholder="Automático">
                                </div><br>
                                <div class="col-6">
                                    <label class="validationDefault01">
                                        <h5 class="text-primary">Nome do Curso</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$vetorUmregistro["nome_curso"]; ?>" name="nomeCurso"
                                    id="validationDefault01" placeholder="" required> <br>
                                </div><br>
                            </div>
                            <div class="form-row">
                            <div class="col-9">
                                    <label class="validationDefault20">
                                        <h5 class="text-primary">Nome do coordenador</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$vetorUmregistro["coordenador"]; ?>" name="coordenador"
                                    id="validationDefault20" placeholder="" required> <br>
                                </div><br>
                            </div>
                            <div class="form-row">
                                <div class="col-5">
                                    <label class="validationDefault02">
                                        <h5 class="text-primary">Duração do Curso Anos / Semestres</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$vetorUmregistro["duracao"]; ?>" name="duracao"
                                    id="validationDefault02" placeholder="" required> <br>
                                </div><br>
                                <div class="col-4">
                                    <label class="validationDefault02">
                                            <h5 class="text-primary">Carga Horária - horas</h5>
                                    </label><br>
                                    <input type="text" class="form-control" value="<?=$vetorUmregistro["cargahoraria"]; ?> horas" name="cargahoraria"
                                        id="validationDefault02" placeholder="" required> <br>
                                </div>
                                <div class="col-3">
                                    <label class="validationDefault19">
                                        <h5 class="text-primary">Campus</h5>
                                    </label><br>
                                    <select class="custom-select" name="campus" id="validationDefault19" required>
                                        <option selected  value=""></option>
                                        <option>Aquidauana</option>
                                        <option>Campo Grande</option>
                                        <option>Corumbá</option>
                                        <option>Coxim</option>
                                        <option>Dourados</option>
                                        <option>Jardim</option>
                                        <option>Naviraí</option>
                                        <option>Nova Andradina</option>
                                        <option>Ponta porã</option>
                                        <option>Três Lagoas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-9">
                                    <label class="validationDefault04">
                                        <h5 class="text-primary">Descrição do Curso</h5>
                                    </label><br>
                                    <textarea name="descricao" class="char valid form-control" rows="4" id="validationDefault04" required><?=$vetorUmregistro["descricao_curso"];?></textarea>
                                </div>
                            </div><br>
                            <div class="form-row">
                            <div class="col-9">
                                <label class="validationDefault05">
                                    <h5 class="text-primary">Ementa do Curso</h5>
                                </label><br>
                                <textarea name="ementa" class="char valid form-control" rows="4" id="validationDefault05" required><?=$vetorUmregistro["ementa"];?></textarea>
                            </div></div><br>
                            
                            <div>
                            </div>
                            
                            <div>

                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
    <?php require_once("Footer.php"); 
        
    ?>

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