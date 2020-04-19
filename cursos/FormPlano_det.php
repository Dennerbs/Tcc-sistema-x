<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <?php require_once('Cabecalho.php');
    require_once('Conexao.php');



    ?>
        <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Planos de Ensino</h6>
        </div>
        <div class="card-body">
        
        <?php if(isset($_SESSION["erroPlano"])):?>
        <div class="alert alert-danger" role="alert">
            <?=$_SESSION["erroPlano"]; ?>
        </div>
        <?php unset($_SESSION["erroPlano"]);endif?>
        <?php if(isset($_SESSION["inseridoPlano"])):?>
        <div class="alert alert-success" role="alert">
            <?=$_SESSION["inseridoPlano"]; ?>
        </div>
        <?php unset($_SESSION["inseridoPlano"]); endif?>

        <form method="POST" action="SalvarPlano_det.php">
  <table id="employee_table" align="center">

        <tr><th><h5 class="text-primary">mes</h5></th>
        <th><h5 class="text-primary">Data Inicial</h5></th>
        <th><h5 class="text-primary">Data Final</h5></th>
        <th><h5 class="text-primary">Conteudo</h5></th></tr>
   <tr id="row1">
   <td><input type='text' class='form-control' name='mes'></td>
   <td><input type='date' class='form-control' name='dI'></td>
   <td><input type='date' class='form-control' name='dF'></td>
   <td><input type='text' class='form-control' name='con'></td>
    
   </tr>
  </table>
  <input type="button" class="btn btn-success mt-4" onclick="add_row();" value="ADD ROW">
  <button type="submit" class="btn btn-success mt-4">Salvar</button>
  
 </form>
</div>
</div>
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
<script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+
 "'><td><input type='text' class='form-control' name='mes'></td><td><input type='date' class='form-control' name='dI'></td><td><input type='date' class='form-control' name='dF'></td><td><input type='text' class='form-control' name='con'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
</html>