<!doctype html>
<html lang="en">

<head>
    <title>Cabecalho</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            body{
                background-image:url("imagens/triangulo.jpg");
            }
        </style>
</head>

<body>
    <div class="container">
        <?php
            require_once("Conexao.php");
            require_once("Cabecalho.php");

            $usuario = null;
            $start = 0;
            $url= 'http://localhost/github/Tcc-sistema-x/cursos/Chat.php';

            $document.ready(function(){
                $remetente = prompt("Por favor, informe seu nome");
                carregarMensagem();
                $form.submit(function(e){
                    $.POST($url,{
                        $mensagem: $('mensagem').val();
                        $remetente:$remetente;
                });
                $('mensagem').val('');
                return false;
                })
            });


            function carregarMensagem(){
                $get($url + '?start=' + start, function(resultado){
                    if(resultado.mensagens){
                        resultado.mensagens.forEach(mensagem =>{
                            start = mensagem.id;
                            $('#mensagens').append(exibirMensagem(mensagem));
                        })
                    };
                    carregarMensagem();
                });
            }
            function exibirMensagem{
            return '<div class="mensagens"><p>$(mensagem.remetente)</p>$(mensagem.mensagem)</div>'
        }
        ?>
        <div class="mensagens mt-4" style="width:750px; height:600px; background-color:#FFFFFF;"></div>
        <form action="SalvarMensagem.php" method="POST">
            <input type="text" name="mensagem" placeholder="Digite sua mensagem...">
            <input type="hidden" name="usuario" value="<?=$_SESSION['nome']; ?>">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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