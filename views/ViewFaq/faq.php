<?php 
    require '../../connect/userDAO.php';

    $model = new UserDAO();

    $dados = $model->grid();

    session_start();    

    if (!$_SESSION['user']) {
        header('Location: ./faq.php');
    }
    //echo '<pre>';
    //var_dump($_SESSION['user']);
    //var_dump($dados);
?>

<!doctype html>
<html lang="pt-br" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/semantic/semantic.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/font-awesome/fontawesome-all.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/toastr/jquery.toast.min.css">

    <link rel="stylesheet" type="text/css" href="../css/faq.css">

    <link rel="shortcut icon" href="../../images/faq.png" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/> -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!-- CSS reset -->
    <link rel="stylesheet" href="../css/reset.css">
    <!-- Resource style -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Modernizr -->
    <script src="../js/modernizr.js"></script>
    <!-- Title -->
    <title>FAQ Online | Home | Usuário</title>
</head>

<body>
    <!-- MENU -->
    <ul class="menu">
        <li class="menu-li"><a href="faq.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <!-- <li class="menu-li"><a href="#news"><i class="fa fa-question" aria-hidden="true"></i> Perguntas</a></li> -->
        <li class="menu-li" style="float:right">
            <a id="sair" href="../../controller/logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sair</a>
        </li>
    </ul>

    <!-- TITLE -->
    <header>
        <h1>🤔 FAQ Online</h1>
    </header>
    
    <!-- MENU LATERAL -->
    <section class="cd-faq">
        <ul class="cd-faq-categories">
            <li><a href="#duvida">Perguntas 🤔</a></li>
            <!-- <li><a href="#mobile">Perguntas <i class="fa fa-question" aria-hidden="true"></i></a></li> -->
            <li><a class="selected" href="#basics">Dúvidas Frequentes <i class="fa fa-question" aria-hidden="true"></i></a></li>
        </ul>
	    <br>

    <div class="cd-faq-items">
        <ul id="duvida" class="cd-faq-group">
        <li class="cd-faq-title">
            <h2>Dúvidas? Só perguntar 🤔</h2>
        </li>
        <li>
            <a href="#0" class="cd-faq-trigger">Poste sua Dúvida</a>
            <div class="cd-faq-content">
               <form id="form-cad-msg" class="container" id="needs-validation">
                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                    <input type="hidden" name="action" value="">
                    <div id="msg-valida"></div>
                        <textarea class="form-control" rows="5" style="resize:none" id="pergunta" name="pergunta" cols="50" rows="15" placeholder="Digite sua dúvida sobre qualquer assunto..."></textarea>
                    <br>
                    <button class="small ui secondary button" type="submit" role="button">Postar dúvida</button>
                </form>
            </div>
        </li>
        </ul>
    <br>

        <!-- CADASTRAR PERGUNTAS 
        <div class="faq-textarea">
            <ul id="basics" class="cd-faq-group">
                <form id="form-cad-msg" class="container" id="needs-validation">
                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                    <input type="hidden" name="action" value="">
                    <li class="cd-faq-title">
                        <h2>Poste sua dúvida</h2>
                    </li>
                    <div id="msg-valida"></div>
                        <textarea class="form-control" rows="5" style="resize: none" id="pergunta" name="pergunta" cols="50" rows="15" placeholder="Digite sua dúvida sobre qualquer assunto..."></textarea>
                    <br>
                    <button class="small ui secondary button" type="submit" role="button">Postar dúvida</button>
                </form>
            </ul>
        </div> -->

     <!-- LISTAR PERGUNTAS -->
        <ul id="basics" class="cd-faq-group">
        <li class="cd-faq-title">
            <h2>Perguntas</h2>
        </li>
        <?php //echo '<pre>'; print_r($dados); ?>
            <?php foreach ($dados as $key => $value): ?>
                <li>
                    <a class="cd-faq-trigger" href="#0"><?php echo $value['no_pergunta']; ?></a>
                    <div class="cd-faq-content">
                        <form class="container form-cad-resposta">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                            <input type="hidden" name="id_pergunta" value="<?php echo $value['id_pergunta']; ?>">
                            <input type="hidden" name="action" value="">                                                       
                            <br>                     
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="resposta-text" name="respostas" style="resize:none" placeholder="Digite sua opinião sobre o assunto..."></textarea>
                                <div id="msg-valida"></div>
                            </div>
                            <button class="small ui secondary button" type="submit" role="button">Responder</button>                     
                            <hr>
                            <?php foreach ($value['no_respostas'] as $resposta ): ?>
                                <a class="resposta-grid" href="#0"><?php echo $resposta['no_resposta']; ?></a><hr>                                
                            <?php endforeach; ?>
                        </form>
                    </div>                  
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

        <!-- cd-faq-items -->
        <a href="#0" class="cd-close-panel">Close</a>
    </section>   

    <script type="text/javascript" src="../js/tinymce/tinymce4.min.js"></script>
    <script src="../js/jquery-2.1.1.js"></script>
    <!-- <script src="../../vendor/jquery/jquery-3.2.1.min.js"></script> -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/toastr/jquery.toast.min.js"></script>
    <script src="../js/jquery.mobile.custom.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
    <!-- SCRIPT DA PAGINA -->
    <?php include '../Template/loader.php'; ?>
    <!-- FIM SCRIPT -->

    <script>

        //CONFIGURAÇÃO DO TOASTR(POPUP -> NOTIFICAÇÃO)
        $(document).ready(function() {

        //MENSAGEM
        function message(type, msg) {
            if (msg) {
                //CONFIG MENSAGEM
                toastr.options = {
                    //"closeButton": true,
                    "closeButton": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "showDuration": "600",
                    "progressBar": true,
                    "hideDuration": "500",
                    "timeOut": "5500",
                    "extendedTimeOut": "1000",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "positionClass": "toast-top-center",
                }
            }
            //EXIBE MENSAGEM
            Command:toastr[type]('<strong>'+msg+'</strong>');
        }

            /*toastr.options.timeOut = 5000; // 1.5s
            toastr.options.showMethod = 'slideDown';
            toastr.options.hideMethod = 'slideUp';
            toastr.options.closeMethod = 'slideUp';
            toastr.options.closeButton = true;*/
            //toastr.options.positionClass = "toast-center";
            //toastr.info('Seja Bem Vindo! ');

        // FUNÇÃO QUE FAZ O EFEITO DE ESCREVENDO NA TELA
        function typeWriter(elemento) {
            const textoArray = elemento.innerHTML.split('');
            elemento.innerHTML = '';
            textoArray.forEach((letra, i) =>{ 
                setTimeout(() => elemento.innerHTML += letra, 270 * i);
            });
        }
        const titulo = document.querySelector('h1');
        typeWriter(titulo);

        // INICIA O TINYMCE -> (TEXTAREA)
        tinyMCE.init({
           mode : "textareas"
        });

        //CADASTRAR PERGUNTA
        $('#form-cad-msg').unbind('submit').submit(function(e) {
            e.preventDefault();
            $('[name="action"]').val('inserirMsg');
            $('[name="pergunta"]').val(tinyMCE.activeEditor.getContent());

            let dadosForm = $('#form-cad-msg').serialize();
            let pergunta = $('#pergunta').val();

            if (!pergunta){
                   $('#msg-valida').html(`
                    <div class="alert alert-danger" role="alert">                  
                        <i class="fa fa-exclamation-circle"></i> <strong> Campo Pergunta Vazio! </strong>
                    </div>                        
                `);
                tiraMsg()
                return false;
            }

            //MANDA O AJAX DE PERGUNTA
            $.ajax({
                type: 'POST',
                url: '../../controller/crud.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {
                        //alert('Pergunta cadastrada com Sucesso!');
                        //toastr.success("Pergunta cadastrada com Sucesso!");                    
                        $('#form-cad-msg')[0].reset()
                        return message('success', json.msg);
                        //window.location.href = '../ViewFaq/faq.php';
                    } else {
                        //toastr.error("Error ao cadastrar Pergunta!");
                         return message('error', json.msg);
					}
                }
            });
            function tiraMsg (){
                setTimeout(() => {
                    $('.alert-danger').css('display', 'none')
                }, 3000);
            }
            
        });

        //CADASTRAR RESPOSTA
        $('.form-cad-resposta').unbind('submit').submit(function(e) {
            e.preventDefault();
            $('[name="action"]').val('inserirResp');
            $('[name="respostas"]').val(tinyMCE.activeEditor.getContent());

            let dadosForm = $('.form-cad-resposta').serialize();
            let resposta = $('#resposta-text').val();

            if (!resposta){
               return message('error', 'Campo resposta vazio!');
            }
            
            //MANDA O AJAX DE RESPOSTA
            $.ajax({
                type: 'POST',
                url: '../../controller/crud.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {
                        //alert('Resposta cadastrada com Sucesso!');
                        //toastr.success("Resposta cadastrada com Sucesso!");
                        $('.form-cad-resposta')[0].reset()
                        return message('success', json.msg);
                        //window.location.href = '../ViewFaq/faq.php';
                    } else {
                        //toastr.error("Error ao cadastrar Resposta!");
                        return message('error', json.msg);
                        /*$('.alert-danger').css('display', 'block');
                        $('.alert-danger').html(json.msg);
                        tiraMsg()*/
					}
                }
            });
            function tiraMsg (){
                setTimeout(() => {
                    $('.alert-danger').css('display', 'none')
                }, 3000);
            }
        });
    });

    </script>
</body>

</html>