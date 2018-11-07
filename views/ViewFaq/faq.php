<?php 
    require '../../connect/userDAO.php';

    $model = new UserDAO();

    $dados = $model->grid();

    //session_start();    

    /*if (!$_SESSION['user']) {
        header('Location: ./template.php');
    }*/
?>

<!doctype html>
<html lang="pt-br" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/semantic/semantic.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/font-awesome/fontawesome-all.css">

    <link rel="shortcut icon" href="../../images/faq.png" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/reset.css">
    <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Resource style -->
    <script src="../js/modernizr.js"></script>
    <!-- Modernizr -->
    <title>FAQ Online | Home</title>
</head>
<style>

.checked {
    color: orange;
}

h1::after {
    content: '|';
    margin-left: 5px;
    opacity: 1;
    animation: pisca .5s infinite;
}

@keyframes pisca {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}
</style>
<body>

    <header>
        <h1>FAQ Online</h1>
    </header>
    <section class="cd-faq">
        <ul class="cd-faq-categories">
            <!-- <li><a href="#duvidas">Dúvidas?</a></li> -->
            <li><a class="selected" href="#basics">Programação</a></li>
            <!-- <li><a href="#mobile">Mobile</a></li> -->
            <!-- <li><a href="#account">Sistemas Web</a></li> -->
            <!-- <li><a href="#payments">Lógica de programação</a></li> -->
            <!-- <li><a href="#privacy">Banco de dados</a></li> -->
            <!-- <li><a href="#delivery">Levantameno de requisitos</a></li> -->
        </ul>
        <!-- cd-faq-categories -->
	
	 <div class="cd-faq-items">
        <ul id="basics" class="cd-faq-group">
            <li class="cd-faq-title">
                <h2>Dúvidas?</h2>
            </li>
        <li>
        <form id="form-cad-msg" class="container" id="needs-validation">
        <input type="hidden" name="action" value="">
            <div id="msg-valida"></div>
            <a class="cd-faq-trigger" href="#0">Poste aqui sua Dúvida</a>
            <div class="cd-faq-content">
                <textarea class="form-control" rows="5" style="resize: none" id="pergunta" name="content" cols="50" rows="15" placeholder="Digite sua dúvida sobre qualquer assunto..."></textarea>
                <br>
                <button href="#" class="btn btn-primary" type="submit" role="button">Postar dúvida</button>
            </div>	                   
                </li>
            </div>
            <!-- cd-faq-content -->
            </form>
        </li>
        </ul>

        <div class="form-group">
            <a class="cd-faq-trigger" href="#0">Dúvidas?</a>
            <div class="cd-faq-content">
                <textarea class="form-control" rows="10" id="comment" style="resize: none" placeholder="Digite sua dúvida sobre qualquer assunto..."></textarea>
			    <br>
			    <a href="#" class="btn btn-primary" role="button">Postar dúvida</a>
			</div>	                     
	    </div>

        <div class="cd-faq-items">
            <ul id="basics" class="cd-faq-group">
                <li class="cd-faq-title">
                    <h2>Perguntas</h2>
                </li>
                 <?php foreach ($dados as $key => $value): ?>
                <li>
                    <a class="cd-faq-trigger" href="#0"><?php echo $value['pergunta']; ?></a>
                    <div class="cd-faq-content">
                        <br>
                        <div class="form-group">
                            <!-- <label for="comment">Responder Dúvida:</label> -->
                            <!-- <br> -->
                            <textarea class="form-control" rows="10" id="comment" style="resize: none" placeholder="Digite sua opinião sobre o assunto..."></textarea>
                        </div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <br><br>
                        <a href="#" class="btn btn-primary" role="button">Responder</a>
                        
                    </div>
                    <!-- cd-faq-content -->
                </li>
                <?php endforeach; ?>
            </ul>
            <!-- cd-faq-group -->

        <!-- cd-faq-items -->
        <a href="#0" class="cd-close-panel">Close</a>
    </section>   
    
    <!-- cd-faq -->
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.js"></script>
    <script type="text/javascript" src="../js/tinymce/tinymce4.min.js"></script>
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/jquery.mobile.custom.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- Resource jQuery -->
    <script>

    function typeWriter(elemento) {
        const textoArray = elemento.innerHTML.split('');
        elemento.innerHTML = '';
        textoArray.forEach((letra, i) =>{ 
            setTimeout(() => elemento.innerHTML += letra, 250 * i);
        });
    }

    const titulo = document.querySelector('h1');
    typeWriter(titulo);

    tinyMCE.init({
        mode : "textareas"
    });

         //CADASTRAR Pergunta
        $('#form-cad-msg').unbind('submit').submit(function(e) {
            e.preventDefault();

            $('[name="action"]').val('inserirMsg');

            let dadosForm = $(this).serialize();
       
            let pergunta = $('#pergunta').val();

            console.log(pergunta);

            /*if (!pergunta){
                $('#msg-valida').html(`
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-exclamation-circle"></i> <strong> Campo Pergunta obrigatório! </strong>
                    </div>                        
                `);
                return false;
            }*/

            $.ajax({
                type: 'POST',
                url: '../../controller/crud.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {
                    //    $.toast('Toast message to be shown')
                        window.location.href = '../faq.php';
                    }
                }
            });
        });

    </script>
</body>

</html>