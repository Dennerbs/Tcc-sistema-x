<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
    require_once("Cabecalho.php");
    require_once("Conexao.php");
    $sql = "select * from disciplina";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    $vetorTodosregistro = array();
    while($vetorUmregistro != null){
         array_push($vetorTodosregistro, $vetorUmregistro);
         $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
        }
    
    
?>
         <a type="submit" class="btn btn-success btn-lg btn-block mt-4" href="FormDisc.php" role="button">Cadastrar</a>
        <table class="table mt-4">
            <tr>
                <th class="text-success">Nome Disciplina</th>
                <th class="text-success">Carga Horaria</th>
                <th class="text-success">Ementa</th>
                <th class="text-success">Objetivos gerais</th>
                <th class="text-success">Nº Semanas</th>
                <th class="text-success">Periodo do Curso</th>
                <th class="text-success">Referencias</th>
                <th class="text-success">Curso</th>

                <th colspan="2" class="text-success text-center">Alterações</th>
            </tr>
            <?php
    
        foreach ($vetorTodosregistro as $umRegistro){
    ?>
            <tr>

                <td><?=$umRegistro["nome_disciplina"];?></td>
                <td><?=$umRegistro["carga_horaria"];?></td>
                <td><?=$umRegistro["ementa"];?></td>
                <td><?=$umRegistro["objetivosG"];?></td>
                <td><?=$umRegistro["numero_semanas"];?></td>
                <td><?=$umRegistro["periodo_curso"];?></td>
                <td><?=$umRegistro["referencias"];?></td>
                <td>
                    <?php
                    $idC =$umRegistro["id_curso"];
                    $sql = "select nome_curso from curso  where id_curso = $idC";
                    $resultadoSql = mysqli_query($conexao, $sql);
                    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
                    echo $vetorUmregistro["nome_curso"];
                ?>
                </td>
                <td>
                    <form action="RemoverDisciplina.php" method="POST">
                        <input type="hidden" name="id" value="<?= $umRegistro["id_disciplina"]; ?>">
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </td>
                <td>
                    <form action="FormDisc.php" method="POST">
                        <input type="hidden" name="id_disciplina" value="<?= $umRegistro["id_disciplina"]; ?>">
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </td>

            </tr>
            <?php
        }
    ?>
        </table>
    </div>
    <?php require_once("Footer.php"); 
        
        ?>
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