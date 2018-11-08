<style>

.vote label {
    cursor:pointer;
}
.vote label input{
    display:none;
}
.vote label i {
    font-family:FontAwesome;
    font-size:18px;
    -webkit-transition-property:color, text;
    -webkit-transition-duration: .2s, .2s;
    -webkit-transition-timing-function: linear, ease-in;
    -moz-transition-property:color, text;
    -moz-transition-duration:.2s;
    -moz-transition-timing-function: linear, ease-in;
    -o-transition-property:color, text;
    -o-transition-duration:.2s;
    -o-transition-timing-function: linear, ease-in;
}
.vote label i:before {
    content:'\f005';
}
.vote label i.active {
    color:gold;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="vote">
<label>
    <input type="radio" name="fb" value="1" />
    <i class="fa"></i>
</label>
<label>
    <input type="radio" name="fb" value="2" />
    <i class="fa"></i>
</label>
<label>
    <input type="radio" name="fb" value="3" />
    <i class="fa"></i>
</label>
<label>
    <input type="radio" name="fb" value="4" />
    <i class="fa"></i>
</label>
<label>
    <input type="radio" name="fb" value="5" />
    <i class="fa"></i>
</label>
</div>

<div id="voto">
    
</div>

<script>

$('.vote label i.fa').on('click mouseover',function(){
    // remove classe ativa de todas as estrelas
    $('.vote label i.fa').removeClass('active');
    // pegar o valor do input da estrela clicada
    var val = $(this).prev('input').val();
    //percorrer todas as estrelas
    $('.vote label i.fa').each(function(){
        /* checar de o valor clicado é menor ou igual do input atual
        *  se sim, adicionar classe active
        */
        var $input = $(this).prev('input');
        if($input.val() <= val){
            $(this).addClass('active');
        }
    });
    $("#voto").html(val); // somente para teste
});
//Ao sair da div vote
$('.vote').mouseleave(function(){
    //pegar o valor clicado
    var val = $(this).find('input:checked').val();
    //se nenhum foi clicado remover classe de todos
    if(val == undefined ){
        $('.vote label i.fa').removeClass('active');
    } else { 
        //percorrer todas as estrelas
        $('.vote label i.fa').each(function(){
            /* Testar o input atual do laço com o valor clicado
            *  se maior, remover classe, senão adicionar classe
            */
            var $input = $(this).prev('input');
            if($input.val() > val){
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
        });
    }
    $("#voto").html(val); // somente para teste
});

</script>