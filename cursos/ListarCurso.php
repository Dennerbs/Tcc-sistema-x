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
             <a type="submit" class="btn btn-success btn-lg btn-block mt-4" href="FormCurso.php" role="button">Cadastrar</a>
             <table class="table mt-4" style="background-color:#FFFFFF;">
                    <tr>
                        <th class="text-success text-center">Nome do Curso</th>
                        <th class="text-success text-center">Descrição do Curso</th>
                        <th class="text-success text-center" colspan="2">Alterações</th>
                    </tr>
                    <?php
        foreach ($vetorTodosregistro as $umRegistro){
    ?>
                    <tr>

                        <td class="text-center"><?=$umRegistro["nome_curso"];?></td>
                        <td class="text-center"><?=$umRegistro["descricao_curso"];?></td>
                        <td class="text-center">
                            <form action="RemoverCurso.php" method="post">
                                <input type="hidden" name="id_curso" value="<?= $umRegistro["id_curso"]; ?>">
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="FormCurso.php" method="post">
                                <input type="hidden" name="id_curso" value="<?= $umRegistro["id_curso"]; ?>">
                                <button type="submit" class="btn btn-info">Atualizar</button>
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