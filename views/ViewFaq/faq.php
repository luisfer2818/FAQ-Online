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

    <!-- CADASTRAR PERGUNTAS -->
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
                        <!-- <div id="msg-valida"></div> -->
                            <textarea class="form-control" rows="5" style="resize:none" id="pergunta" name="pergunta" cols="150" rows="25" placeholder=""></textarea>
                        <br>
                        <button class="small ui secondary button" type="submit" role="button">Postar dúvida</button>
                    </form>
                </div>
            </li>
        </ul>
    <br>

     <!-- LISTAR PERGUNTAS -->
    <ul id="basics" class="cd-faq-group">
        <li class="cd-faq-title">
            <h2>Perguntas</h2>
        </li>
        
            <?php foreach ($dados as $key => $value): ?>
            <?php //echo '<pre>'; print_r($user); ?>
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
                            </div>
                            <button class="small ui secondary button" type="submit" role="button">Responder</button>                     
                            <hr>
                            <?php foreach ($value['no_respostas'] as $resposta): ?>
                            <?php //var_dump($dados); ?>
                                <div class="container">
                                    <div class="row">
                                        <!-- <i class="add icon"></i> -->                                  
                                        <div class="col-md-2">
                                            <!-- <div class="field"> -->
                                                <div data-tooltip="<?php echo $resposta['nome']; ?>"> 
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>                                               
                                                <b>Resposta:</b>
                                                 </div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-md-10"><a class="resposta-grid" href="#0"> <?php echo $resposta['no_resposta']; ?> </a></div>
                                    </div>                                                              
                                </div>               
                                <hr>                               
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
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/toastr/jquery.toast.min.js"></script>
    <script src="../js/jquery.mobile.custom.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
    <!-- SCRIPT DA PAGINA -->
    <?php include '../Template/loader.php'; ?>
    <!-- FIM SCRIPT -->

    <script>

    $(document).ready(function() {
        //MENSAGEM - CONFIGURAÇÃO DO TOASTR(POPUP -> NOTIFICAÇÃO)
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
                    "timeOut": "4500",
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
            mode : "textareas",
            paste_auto_cleanup_on_paste : true,
            paste_remove_styles: true,
            paste_remove_styles_if_webkit: true,
            paste_strip_class_attributes: "all",
        });

        //CADASTRAR PERGUNTA
        $('#form-cad-msg').unbind('submit').submit(function(e) {
            e.preventDefault();
            $('[name="action"]').val('inserirMsg');
            $('[name="pergunta"]').val(tinyMCE.activeEditor.getContent());

            let dadosForm = $('#form-cad-msg').serialize();
            let pergunta = $('#pergunta').val();

            if (!pergunta){
               return message('error', 'Campo pergunta vazio!');
            }

            //MANDA O AJAX DE PERGUNTA
            $.ajax({
                type: 'POST',
                url: '../../controller/crud.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {
                        //toastr.success("Pergunta cadastrada com Sucesso!");                    
                        $('#form-cad-msg')[0].reset();
                        setTimeout(() => {
                            window.location.href = './faq.php';
                        }, 4500);
                        return message('success', json.msg);
                        //window.location.href = './faq.php';
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
                         setTimeout(() => {
                            window.location.href = './faq.php';
                        }, 4500);
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