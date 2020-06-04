<?php
require_once("Conexao.php");
session_start();
$campo =  $_POST['campo'];


$query = mysqli_query($conexao, "SELECT * FROM disciplina WHERE nome_disciplina LIKE '%$campo%'");
$num   = mysqli_num_rows($query);
if($num >0){ ?>
     <table class="table" style="background-color:#FFFFFF;">

            <tr>
                <th class="text-primary text-left" >Unidade Curricular</th>
                <th class="text-primary text-left" >Carga Horaria</th>
                <th class="text-primary text-left" >Ementa</th>
                <th class="text-primary text-left" >Objetivos gerais</th>
                <th class="text-primary text-left" >Nº Semanas</th>
                <th class="text-primary text-left" >Periodo do Curso</th>
                <th class="text-primary text-left" >Referencias</th>
                <th class="text-primary text-left" >Curso</th>

                <th colspan="2" class="text-primary text-center">Alterações</th>
            </tr>
      <?php
        while($umRegistro = mysqli_fetch_assoc($query)){ ?>
             <tr>

<td class="text-left" ><?= $umRegistro["nome_disciplina"]; ?></td>
<td class="text-left" ><?= $umRegistro["carga_horaria"]; ?></td>
<td class="text-left" ><?= $umRegistro["ementa"]; ?></td>
<td class="text-left" ><?= $umRegistro["objetivosG"]; ?></td>
<td class="text-left" ><?= $umRegistro["numero_semanas"]; ?></td>
<td class="text-left"><?= $umRegistro["periodo_curso"]; ?></td>
<td class="text-left" ><?= $umRegistro["referencias"]; ?></td>
    <td>
    <?php
    $idC = $umRegistro["id_curso"];
    $sql = "select nome_curso from curso  where id_curso = $idC";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    echo $vetorUmregistro["nome_curso"];
    ?>
</td>
<td>
    <form action="RemoverDisciplina.php" method="POST">
        <input type="hidden" name="id" value="<?= $umRegistro["id_disciplina"]; ?>">
        <button type="submit" class="btn" style="background-color:#fc6c5a">Remover</button>
    </form>
</td>
<td>
    <form action="FormDisc.php" method="POST">
        <input type="hidden" name="id_disciplina" value="<?= $umRegistro["id_disciplina"]; ?>">
        <button type="submit" class="btn" style="background-color:#ADD8E6;">Atualizar</button>
    </form>
</td>

</tr>
<?php
}
?>
</table>
        <?php }else{
          echo "Curso não encontrado";
        }






?>