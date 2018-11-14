<?php 
    require '../../connect/userDAO.php';

    $model = new UserDAO();

    $dados = $model->grid();

    session_start();    

    if (!$_SESSION['user']) {
        header('Location: ./faq.php');
    }

    // var_dump($_SESSION['user']['id_usuario']);
?>

<!doctype html>
<html lang="pt-br" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/semantic/semantic.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/font-awesome/fontawesome-all.css">

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
        <ul class="menu">
            <li class="menu-li"><a href="faq.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li class="menu-li"><a href="#news"><i class="fa fa-question" aria-hidden="true"></i> Perguntas</a></li>
            <li class="menu-li" style="float:right">
                <a id="sair" href="../../controller/logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sair</a>
            </li>
        </ul>
    <header>
        <h1>FAQ Online</h1>
    </header>
    
    <section class="cd-faq">
        <ul class="cd-faq-categories">
            <li><a class="selected" href="#basics">Dúvidas Frequentes <i class="fa fa-question" aria-hidden="true"></i></a></li>
        </ul>
	    <br><br><br><br>

        <!-- CADASTRAR PERGUNTAS -->
        <div class="faq-textarea">
            <ul id="basics" class="cd-faq-group">
                <form id="form-cad-msg" class="container" id="needs-validation">
                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                    <input type="hidden" name="action" value="">
                    <li class="cd-faq-title">
                        <h2>Poste sua dúvida</h2>
                    </li>
                    <div id="msg-valida" style="display:none;"></div>
                        <textarea class="form-control" rows="5" style="resize: none" id="pergunta" name="pergunta" cols="50" rows="15" placeholder="Digite sua dúvida sobre qualquer assunto..."></textarea>
                    <br>
                    <button class="small ui secondary button" type="submit" role="button">Postar dúvida</button>
                </form>
            </ul>
        </div>

    <!-- LISTAR PERGUNTAS 
    <div class="cd-faq-items">
        <ul id="basics" class="cd-faq-group">
        <li class="cd-faq-title">
            <h2>Perguntas</h2>
        </li>
            <?php foreach ($dados as $key => $value): ?>
                <li>
                    <a class="cd-faq-trigger" href="#0"><?php echo $value['pergunta']; ?></a>
                    <div class="cd-faq-content">
                        <form id="form-cad-resp" class="container" id="needs-validation">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                            <input type="hidden" name="id_pergunta" value="<?php echo $_SESSION['user']['id_pergunta']; ?>">
                            <input type="hidden" name="action" value="">                              
                            <div id="msg-valida" style="display:none;"></div>
                            <br>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="resposta" name="resposta" style="resize: none" placeholder="Digite sua opinião sobre o assunto..."></textarea>
                            </div>
                            <?php //include '../Template/avaliacao.php'; ?>
                            <br>
                            <button class="small ui secondary button" type="submit" role="button">Responder</button>                     
                            <br><br>
                            <a class="resposta-grid" href="#0"><?php echo $value['respostas']; ?></a>
                        </form>
                    </div>                  
                </li>
            <?php endforeach; ?>
        </ul>
    </div> -->


     <!-- LISTAR PERGUNTAS -->
    <div class="cd-faq-items">
        <ul id="basics" class="cd-faq-group">
        <li class="cd-faq-title">
            <h2>Perguntas</h2>
        </li>
            <?php foreach ($dados as $key => $value): ?>
                <li>
                    <a class="cd-faq-trigger" href="#0"><?php echo $value['pergunta']; ?></a>
                    <div class="cd-faq-content">
                        <form id="form-cad-resp" class="container" id="needs-validation">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                            <input type="hidden" name="id_pergunta" value="<?php echo $_SESSION['user']['id_pergunta']; ?>">
                            <input type="hidden" name="action" value="">                              
                            <div id="msg-valida" style="display:none;"></div>
                            <br>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="resposta" name="resposta" style="resize: none" placeholder="Digite sua opinião sobre o assunto..."></textarea>
                            </div>
                            <br>
                            <button class="small ui secondary button" type="submit" role="button">Responder</button>                     
                            <br><br>
                            <a class="resposta-grid" href="#0"><?php echo $value['respostas']; ?></a>
                        </form>
                    </div>                  
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

        <!-- cd-faq-items -->
        <a href="#0" class="cd-close-panel">Close</a>
    </section>   
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.js"></script> -->
    <script type="text/javascript" src="../js/tinymce/tinymce4.min.js"></script>
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../Template/script.js"></script>
    <!-- <script src="../../vendor/jquery/jquery-3.2.1.min.js"></script> -->
    <!-- <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../js/jquery.mobile.custom.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- SCRIPT DA PAGINA -->
    <?php include '../Template/script.php'; ?>
    <!-- FIM SCRIPT -->

    <script>

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
            /*let pergunta = $('#pergunta').val();

            if (!pergunta){
                $('#msg-valida').html(`
                    <div class="alert alert-danger" role="alert">                  
                        <i class="fa fa-exclamation-circle"></i> <strong> Campo Pergunta Vazio! </strong>
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
                        //window.location.href = '../ViewFaq/faq.php';
                    } else {
                        $('.alert-danger').css('display', 'block');
                        $('.alert-danger').html(json.msg);
                        tiraMsg()
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
        $('#form-cad-resp').unbind('submit').submit(function(e) {
            e.preventDefault();
            $('[name="action"]').val('inserirResp');
            $('[name="resposta"]').val(tinyMCE.activeEditor.getContent());

            let dadosForm = $('#form-cad-resp').serialize();
            /*let resposta = $('#resposta').val();

            if (!resposta){
                $('#msg-valida').html(`
                    <div class="alert alert-danger" role="alert">                  
                        <i class="fa fa-exclamation-circle"></i> <strong> Campo Resposta Vazio! </strong>
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
                        window.location.href = '../ViewFaq/faq.php';
                    } else {
                        $('.alert-danger').css('display', 'block');
                        $('.alert-danger').html(json.msg);
                        tiraMsg()
					}
                }
            });
            function tiraMsg (){
                setTimeout(() => {
                    $('.alert-danger').css('display', 'none')
                }, 3000);
            }
        });

    </script>
</body>

</html>