$(function(){
    $(".btn btn-warning mt-4").on("click",function(){

        $.ajax({
            url:"PlanoComentarios.php",
            success: function(result){
                $(".result").html(result);
            },
            error:function(){
                $(".result").html("Error");
            }
        });
    });
});


