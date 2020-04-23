<!doctype html>
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
             <a type="submit" class="btn btn-lg btn-block mt-4" style="background-color:#04b826;" href="FormCurso.php" role="button">Cadastrar</a>
             <table class="table mt-4" style="background-color:#FFFFFF;">
                    <tr>
                        <th class="text-primary text-left" style="font-size:10px;">Nome do Curso</th>
                        <th class="text-primary text-left" style="font-size:10px;">Duração Anos / Semestres</th>
                        <th class="text-primary text-left" style="font-size:10px;">Carga Horária</th>
                        <th class="text-primary text-left" style="font-size:10px;">Campus</th>
                        <th class="text-primary text-left" style="font-size:10px;">Descrição do Curso</th>
                        <th class="text-primary text-left" style="font-size:10px;">Ementa</th>
                        <th class="text-primary text-left" style="font-size:10px;">Coordenador</th>
                        <th colspan="2" class="text-primary text-center">Alterações</th>
                    </tr>
                    <?php
        foreach ($vetorTodosregistro as $umRegistro){
    ?>
                    <tr>

                        <td class="text-left" style="font-size:10px;"><?=$umRegistro["nome_curso"];?></td>
                        <td class="text-left" style="font-size:10px;"><?=$umRegistro["duracao"];?></td>
                        <td class="text-left" style="font-size:10px;"><?=$umRegistro["cargahoraria"];?></td>
                        <td class="text-left" style="font-size:10px;"><?=$umRegistro["campus"];?></td>
                        <td class="text-left" style="font-size:10px;"><?=$umRegistro["descricao_curso"];?></td>
                        <td class="text-left" style="font-size:10px;"><?=$umRegistro["ementa"];?></td>
                        <td class="text-left" style="font-size:10px;"><?=$umRegistro["coordenador"];?></td>
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