
<html lang="en">
  <head>


    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        td{
            font-size: 14px;
            opacity: 1.0;
        }
    </style>
  </head>
  <body>
        <div class="container">
            <?php
            require_once("Cabecalho.php");
            require_once("Conexao.php");
            $sql = "select * from curso";
            $resultadoSql = mysqli_query($conexao,$sql);
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            $vetorTodosregistro = array();
            while($vetorUmregistro != null){
                array_push($vetorTodosregistro, $vetorUmregistro);
                $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
                } 
            ?>
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                  Cursos<a class="float-right text-success" href="GrupoCorrecao.php"> Adicionar Curso</a>
                </div>
                <div class="card-body">
             <table class="table mt-4" style="background-color:#FFFFFF;">
                    <tr>
                        <th class="text-primary text-left" >Nome do Curso</th>
                        <th class="text-primary text-left" >Duração Anos / Semestres</th>
                        <th class="text-primary text-left" >Carga Horária</th>
                        <th class="text-primary text-left" >Campus</th>
                        <th class="text-primary text-left" >Descrição do Curso</th>
                        <th class="text-primary text-left" >Ementa</th>
                        <th class="text-primary text-left" >Coordenador</th>
                        <th colspan="2" class="text-primary text-center">Alterações</th>
                    </tr>
                    <?php
        foreach ($vetorTodosregistro as $umRegistro){
    ?>
                    <tr>

                        <td class="text-left" ><?=$umRegistro["nome_curso"];?></td>
                        <td class="text-left" ><?=$umRegistro["duracao"];?></td>
                        <td class="text-left" ><?=$umRegistro["cargahoraria"];?></td>
                        <td class="text-left" ><?=$umRegistro["campus"];?></td>
                        <td class="text-left" ><?=$umRegistro["descricao_curso"];?></td>
                        <td class="text-left" ><?=$umRegistro["ementa"];?></td>
                        <td class="text-left" ><?=$umRegistro["coordenador"];?></td>
                        <td>
                            <form action="RemoverCurso.php" method="post">
                                <input type="hidden" name="id_curso" value="<?= $umRegistro["id_curso"]; ?>">
                                <button type="submit" class="btn" style="background-color:#fc6c5a">Remover</button>
                            </form>
                        </td>
                        <td>
                            <form action="FormCurso.php" method="post">
                                <input type="hidden" name="id_curso" value="<?= $umRegistro["id_curso"]; ?>">
                                <button type="submit" class="btn" style="background-color:#ADD8E6;">Atualizar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
        }
    ?>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php require_once("Footer.php"); ?>
    </div>

    </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>