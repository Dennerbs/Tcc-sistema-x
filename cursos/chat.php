<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    
    
    <script>
      function ajx(){
   var ajax = new XMLHttpRequest(); // cria o objeto XHR
   ajax.onreadystatechange = function(){
      // verifica quando o Ajax for completado
      if(ajax.readyState == 4 && ajax.status == 200){
         document.getElementById("chat").innerHTML = ajax.responseText; // atualiza o span
         setTimeout(ajx, 2000); // chama a função novamente após 2 segundos
      }
   }
   ajax.open("GET", "ExibirChat.php"); // página a ser requisitada
   ajax.send(); // envia a requisição
}
ajx();
    </script>


</head>
  <body> 
  <div class="container">
      <?php
        require_once('Cabecalho.php'); 
        require_once('Conexao.php'); 
        if(isset($_POST['id'])){
            $id = $_POST['id']; 
        }
        if(isset($_POST['nome'])){
            $nome = $_POST['nome'];
        }
        
        
        $idl=$_SESSION['id_logado'];
        $nomel=$_SESSION['nome'];
        
        $id_sala = $idl + $id;

        $_SESSION['ids'] = $id_sala;
        
        

          
          ?>
    
        <div id="conteudo">
            <div id="caixa-chat">
                <div class="card">
                <div class="card-header">
                    <?php echo $nome?>
                </div>
                <div class="card-body">
                <div id="chat">
                           
                </div>
                </div>
                </div>
            </div>
        </div>
        <div>
        <input type="hidden" id="ids" value=" <?= $id_sala; ?>">
        <input type="hidden" id="id" value=" <?= $idl?>">
        <input type="hidden" id="nome" value=" <?= $nomel ?>">
        <div class="m">
        <input id="mensagem" placeholder="Sua Mensagem" ></div>
        <div >
        <button class="btn btn-success" type="submit" id="enviar" onclick="inserir_registo();">Enviar</button>
        </div>
        <div id="mens">

        </div>
        
        </div>


    </div>

    <script type="text/javascript">
function inserir_registo()
{
    
 
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
                ids:$("#ids").val(),
                id:$("#id").val(),
                nome:$("#nome").val(),
                mensagem:$("#mensagem").val()
    };
    pageurl = 'SalvChat.php';
    $.ajax({
 
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        beforeSend:function(){
                    $("#mens").html("Enviando....");
                },
                success:function()
                {
                    $("#mens").html("funfou");
                   
                },
                error:function(data){
                    $("#mens").html("Não conseguimos encontrar a pag");
                },
                complete: function() 
        { 
            $('input', "#mensagem").trigger("reset"); //clear text 
        } 

       
        
    });
    
    
}


</script>


    

  </body>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" > </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>