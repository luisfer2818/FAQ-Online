<?php 
    require '../connect/userDAO.php';

    $model = new UserDAO();

    $dados = $model->grid();

    $usuarios = $model->gridUsuario();

    session_start();    

    if (!$_SESSION['user']) {
        header('Location: ./template.php');
    }

    $usuarioTipo = '';
    //var_dump($usuarioTipo); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME | FAQ ONLINE</title>
    <link rel="icon" type="image/png" href="/images/faq.png"/>
</head>
<body>
<!-- =====LINK MENU CSS =====-->
<?php include '../views/Template/link_css.php'; ?>

<!--========= MENU ==========-->
<?php include '../views/Template/menu.php';?>

<!--========= NAVBAR ========-->
<?php include '../views/Template/navbar.php'; ?>

    <!--=========================================================-->
                        <!--CADASTRAR PERGUNTAS-->
    <!--=========================================================-->
    <div id="tab-cadastro-msg" style="display:none;">
        <p class="text-p">Cadastrar Perguntas</p>
        <div class="container-fluid">
            <form id="form-cad-msg" class="container" id="needs-validation">
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                <input type="hidden" name="action" value="">
                <div id="msg-valida"></div>
                <fieldset>
                    <legend style="width:auto; font-size: 1.3em; color: black; font-weight: bolder;">Dados</legend>
                <div class="form-group">
                    <label for="exampleInputPassword">Nome:</label>
                <div class="ui fluid disabled input">
                    <input type="text" id="nome" tabindex="-1" class="form-control" name="nome" value="<?php echo $_SESSION['user']['nome']; ?>">
                </div>
                </div>
                <label for="msg">Pergunta:*</label>
                <div class="form-group">
                    <textarea rows="10" id="pergunta" name="pergunta" placeholder="Digite sua pergunta"></textarea>
                </div>
                <button class="positive ui button" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Cadastrar</button>
                </fieldset>
            </form>
        </div>
        <!-- /.container -->
    </div>

    <!--=========================================================-->
                        <!--LISTAR PERGUNTAS-->
    <!--=========================================================-->
    <div id="tab-visualiza-msg" style="display:none;">
        <p class="text-p"> Perguntas</p>
        <table class="ui padded table">
            <thead>
                <tr>
                    <!-- <th>Nome</th> -->
                    <th>Perguntas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $key => $value): ?>
                <tr data-id="<?php echo $value['id_pergunta']?>">
                    <!-- <td>#<?php //echo $value['id']; ?></td> -->
                    <!-- <td class="about" data-name="nome"><?php //echo $value['nome']; ?></td> -->

<?php //echo '<pre>'; print_r($dados)?>
                <div class="ui styled fluid accordion">
                <div class="title">
                    <i class="dropdown icon"></i>
                    <?php echo $value['no_pergunta']; ?>
                </div>
                <div class="content">
                <?php foreach ($value['no_respostas'] as $resposta) : ?>
                    <p class="transition hidden"> <?php echo $resposta['no_resposta']; ?></p>
                                                                 
                    <?php endforeach; ?>
                                     
                </div>          
                </div>


                    <td class="about" data-name="pergunta" style="text-align: left;"><?php echo $value['no_pergunta']; ?></td>
                    <td>
                        <button class="tiny ui blue button btn-editar-msg"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button> 
                        <button class="tiny ui red button btn-excluir-msg" action="../controller/crud.php"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
                        <button class="btn btn-success btn-save-msg" action="../controller/crud.php" style="display:none;"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!--=========================================================-->
                        <!--USUÁRIOS/ADMIN-->
    <!--=========================================================-->
    <div id="tab-usuario" style="display:none;">
        <p class="text-p">Usuários</p>
        <div class="ui primary button" id="botao-novo" data-content="Cadastrar novo administrador">
            <i class="fa fa-plus" aria-hidden="true"></i> Novo
        </div>
        <table class="ui padded table">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tipo Usúario</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key => $value) :  
                     $usuarioTipo = $value['usuario_tipo'];

                    if ($usuarioTipo == 'A') {
                        $nomeTipoUsuario = 'Administrador';
                        $tipoUsuarioCor = 'black';
                    } else {
                        $nomeTipoUsuario = 'Usuário';
                        $tipoUsuarioCor = 'blue';
                    } 
                ?>
                <tr data-id="<?php echo $value['id_usuario'] ?>">
                    <!-- <td>#<?php //echo $value['id']; ?></td> -->
                    <td class="about" data-name="nome"><?php echo $value['nome']; ?></td>
                    <td class="about" data-name="email"><?php echo $value['email']; ?></td>
                    <td class="about" data-name="tipo"><a class="ui <?php echo $tipoUsuarioCor; ?> label"><?php echo $nomeTipoUsuario; ?> </a></td>
                    <td>
                        <button class="tiny ui red button btn-excluir-user" action="../controller/crud.php"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
                        <!-- <button class="tiny ui green button" id="botao-modal"> Modal </button> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- ''MODAL EXEMPLO''  <div class="ui mini modal" id="modal-excluir" style="display: none;">
        <div class="header">
            Deseja realmente excluir?
        </div>
        <div class="ui buttons">
            <button class="ui button">Cancelar</button>
        <div class="or" data-text="ou"></div>
            <button class="ui positive button">Salvar</button>
        </div>
    </div> -->

    <!--=========================================================-->
                        <!--ADMINISTRADOR-->
    <!--=========================================================-->
    <div id="tab-usuario-admin" style="display:none;">
        <p class="text-p">Cadastrar Administrador</p>
        <button id="botao-voltar" class="ui black basic button" style="margin-bottom: 15px; margin-left: 65px;">
            <i class="fa fa-reply" aria-hidden="true"></i> Voltar
        </button>
        <div class="container-fluid">
            <form name="formuser" id="form-perfil-admin" class="container" id="needs-validation">
                <!-- <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id_usuario']; ?>"> -->
                <input type="hidden" name="action" value="">
                <div class="alert alert-success" style="display: none;">
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
                        <!-- <span aria-hidden="true">&times;</span> -->
                    <!-- </button> -->
                    <i class="fa fa-check"></i> 
                    <strong></strong>
                </div>
                <fieldset>
                    <legend style="width:auto; font-size: 1.3em; color: black; font-weight: bolder;">Dados</legend>
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="nome" value="">
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="text" class="form-control" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label>Senha:</label>
                        <div class="ui fluid action input">
                            <input type="password" class="form-control" id="password-admin" name="senha">
                            <input type="hidden" class="form-control" name="senhaAntiga">                       
                            <a type="button" id="showPassword-admin" class="ui button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>
                     <div class="form-group">
                        <label>Confirme sua senha:</label>
                        <div class="ui fluid action input">
                            <input type="password" class="form-control" id="admin-password" name="rep-senha">
                            <input type="hidden" class="form-control" name="senhaAntiga">                       
                            <a type="button" id="admin-showPassword" class="ui button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <button class="positive ui button" type="submit" onClick="validar()"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                </fieldset>
            </form>
        </div>
    </div>

    <!--=========================================================-->
                            <!--MEU PERFIL-->
    <!--=========================================================-->
    <div id="tab-perfil">
        <p class="text-p">Meu Perfil</p>
            <div class="container-fluid">
                <form id="form-perfil" class="container" id="needs-validation">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                    <input type="hidden" name="action" value="">
                    <div class="alert alert-success" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-check"></i> 
                        <strong></strong>
                    </div>
                    <fieldset>
                            <legend style="width:auto; font-size: 1.3em; color: black; font-weight: bolder;">Dados</legend>
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" class="form-control" name="nome" value="<?php echo $_SESSION['user']['nome']; ?>">
                        </div>
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Senha:</label>
                            <div class="ui fluid action input">
                                <input type="password" class="form-control" id="password" name="senha">
                                <input type="hidden" class="form-control" name="senhaAntiga">                       
                            <a type="button" id="showPassword-admin" class="ui button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                        </div>
                        <button class="positive ui button" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<!--=========================================================-->
                    <!--FIM CONTEÚDO-->
<!--=========================================================-->


<!-- SCRIPT DA PAGINA -->
<?php include '../views/Template/script.php'; ?>
<!-- FIM SCRIPT -->

<script>

    //FUNCÃO QUE MOSTRA A SENHA NO INPUT
    $(document).ready(function() {
        $('.ui.accordion').accordion();

        /*function validar(){
            var senha = formuser.senha.value;
            var rep_senha = formuser.rep_senha.value;
            
            if(senha == "" || senha.length <= 5){
                alert('Preencha o campo senha com minimo 6 caracteres');
                formuser.senha.focus();
                return false;
            }
            
            if(rep_senha == "" || rep_senha.length <= 5){
                alert('Preencha o campo senha com minimo 6 caracteres');
                formuser.rep_senha.focus();
                return false;
            }
            
            if (senha != rep_senha) {
                alert('Senhas diferentes');
                formuser.senha.focus();
                return false;
            }
        }*/

        $('[href="#tab-visualiza-msg"]').click();
        $('#showPassword-admin, #showPassword').on('click', function(){
    
        var passwordField = $('#password-admin, #password');
        var passwordFieldType = passwordField.attr('type');

        if(passwordFieldType == 'password')
        {   
            passwordField.attr('type', 'text');
            $('#showPassword-admin, #showPassword i').removeClass('fa-eye');
            $('#showPassword-admin, #showPassword i').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $('#showPassword-admin, #showPassword i').removeClass('fa-eye-slash');
            $('#showPassword-admin, #showPassword i').addClass('fa-eye');
        }
    });

    //CADASTRAR PERGUNTA
    $('#form-cad-msg').unbind('submit').submit(function(e) {
        e.preventDefault();
        $('[name="action"]').val('inserirMsg');

        let dadosForm = $(this).serialize();
        //console.log(dadosForm);
        let pergunta = $('#pergunta').val();

        if (!pergunta){
            $('#msg-valida').html(`
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-exclamation-circle"></i> <strong> Campo Pergunta obrigatório! </strong>
                </div>                        
            `);
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '../controller/crud.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(json) {
                if (json.type == 'success') {
                    //window.location.href = 'template.php';
                    console.log(json);
                }
            }
        });
    });

     $('#form-grid-perguntas').unbind('submit').submit(function(e) {
        e.preventDefault();
        $('[name="action"]').val('gridPerguntas');
        //let dadosForm = $(this).serialize();

        $.ajax({
            type: 'GET',
            url: '../controller/crud.php',
            data: {
                action: $('[name="action"]').val('gridPerguntas')
            },
            dataType: 'json',
            success: function(json) {
                if (json.type == 'success') {
                   console.log(json);
                }
            }
        });
    });

    //EDITAR USUARIO/ADMIN
    $('#form-perfil').unbind('submit').submit(function(e) {
        e.preventDefault();
        $('[name="action"]').val('editarUser');
        let dadosForm = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../controller/crud.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(json) {
                if (json.type == 'success') {
                    $('.alert-success').css('display','block');
                    $('.alert-success strong').html(json.msg);
                    $('[name="senhaAntiga"]').val(json.senha);
                }
            }
        });
    });

    //EDITAR PERGUNTA
    $('.btn-editar-msg').unbind('click').click(function(e) {
        e.preventDefault();

        let $trClicada = $(e.target).closest('tr');

        $.each($trClicada.find('td.about'), function(key, rs) { 
            $td = $(rs);

            valorAEditar = $td.text();
            
            $td.html('<div class="field"><input class="form-control" width="50" name="'+$td.attr('data-name')+'" value="'+valorAEditar+'"></div>')
            $($trClicada).find('.btn-editar-msg').hide();
            $($trClicada).find('.btn-excluir-msg').hide();
            //MOSTRAR SAVE
            $($trClicada).find('.btn-save-msg').show();
        });
    });

    //SALVAR PERGUNTA
    $('.btn-save-msg').unbind('click').click(function(e) {
        //EVITAR MAIS DE UMA REQUISIÇÃO
        e.stopImmediatePropagation();

        let $trClicadaQuandoSalvar = $(e.target).closest('tr');
        let $inputsDaTr = $trClicadaQuandoSalvar.find('input')

        //VARIAVEL QUE VAI NO DATA DO AJAX
        let objMensagem = {}
        
        //VARRENDO INPUTS DA TR CLICADA
        $.each($inputsDaTr, function (key, rs) {
            let $input = $(rs)
            let nomeInput = $input.attr('name')

            //PEGANDO VALORES DA PROPRIEDADE NAME
            objMensagem[nomeInput] = $input.val()
        })

            objMensagem.id = $trClicadaQuandoSalvar.attr('data-id')
            objMensagem.action = 'editarMsg';

        //AJAX
        $.ajax({
            type: 'POST',
            url: $('.btn-save-msg').attr('action'),
            data: objMensagem,
            dataType: 'json',
            success: function(json) {
                if (json.type == 'success') {
                    //DISABLE NO INPUT APÓS SALVAR
                    $inputsDaTr.closest('.field').css('opacity', '0.4');
                    $($trClicadaQuandoSalvar).find('.btn-save-msg').css('opacity', '0.4');

                    window.location.href = 'template.php';
                }
            }
        });
    });
    
    //EXCLUIR PERGUNTA
    $('.btn-excluir-msg').unbind('click').click(function(e) {
        e.preventDefault();
        var idMsg = $(e.target).closest('tr').attr('data-id');

        //console.log(idMsg);

        $.ajax({
            type: 'POST',
            url: $('.btn-excluir-msg').attr('action'),
            data: {
                id: idMsg,
                action: 'excluirMsg'
            },
            dataType: 'json',
            success: function(json) {
                $(e.target).closest('tr').hide()
            }
        });
    });

    //CADASTRAR ADMINISTRADOR
    $('#form-perfil-admin').unbind('submit').submit(function(e) {
        e.preventDefault();
        
        $('[name="action"]').val('inserirUserAdmin');

        $.ajax({
            method:'POST',
            url: '../controller/crud.php',
            data: $(this).serialize(),
            dataType:'json',
            success: function(json) {
                if (json.type == 'success') {
                    $('.alert-success').css('display', 'block');
                    $('.alert-success strong').html(json.msg);
                    $('#form-perfil-admin')[0].reset()
                    $('#form-perfil-admin .fa-check').css('display', 'block')
                    setTimeout(() => {
								$('#tab-usuario-admin').css('display', 'none');
								$('#tab-usuario').css('display', 'block');
                                $('.alert-success').css('display', 'none');
							}, 2000);
                } else {
                    $('.alert-success').addClass('alert-danger');
                    $('.alert-danger').removeClass('alert-success');
                    $('.alert-danger').css('display', 'block');
                    $('#form-perfil-admin .fa-check').css('display', 'none')
                    $('.alert-danger strong').html(json.msg);
                    tiraMsg()
                }                        
            }
        })
        function tiraMsg (){
            setTimeout(() => {
                $('.alert-danger').css('display', 'none')
            }, 3000);
        }
    });

    //EXCLUIR USUARIO
    $('.btn-excluir-user').unbind('click').click(function(e) {
        e.preventDefault();
        var idUser = $(e.target).closest('tr').attr('data-id');

        $.ajax({
            type: 'POST',
            url: $('.btn-excluir-user').attr('action'),
            data: {
                id: idUser,
                action: 'excluirUser'
            },
            dataType: 'json',
            success: function(json) {
                $(e.target).closest('tr').hide()
            }
            });
        });
    });

    //TAB-CADASTRO
    $('[href="#tab-cadastro-msg"]').click(function(){
        $('#tab-cadastro-msg').css('display', 'block');
        $('#tab-visualiza-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-usuario-admin').hide();
        $('#tab-perfil').hide();
    });

    //TAB-VISUALIZA-MSG
    $('[href="#tab-visualiza-msg"]').click(function(){
        $('#tab-visualiza-msg').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-usuario-admin').hide();
        $('#tab-perfil').hide();
    });

    //BOTAO-NOVO-USUARIO
    $('#botao-novo').click(function(){
        $('#tab-usuario-admin').css('display', 'block');
        $('#tab-usuario').hide();
    });

    //BOTAO-VOLTAR
    $('#botao-voltar').click(function(){
        $('#tab-usuario').css('display', 'block');
        $('#tab-usuario-admin').hide();
    });

     //TAB-USUARIO
    $('[href="#tab-usuario"]').click(function(){
        $('#tab-usuario').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-visualiza-msg').hide();
        $('#tab-usuario-admin').hide();
        $('#tab-perfil').hide();
    });

    //TAB-BOTAO
    $('[href="#botao-modal"]').click(function(){
        $('#modal-excluir').css('display', 'block');
        $('.mini.modal').modal('show');
    });

    //TAB-USUARIO/ADMIN
    $('[href="#tab-usuario-admin"]').click(function(){
        $('#tab-usuario-admin').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-visualiza-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-perfil').hide();
    });

    //TAB-PERFIL
    $('[href="#tab-perfil"]').click(function(){
        $('#tab-perfil').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-usuario-admin').hide();
        $('#tab-visualiza-msg').hide();
    });

     /*function validarSenha(){
        password-admin = document.getElementById('password-admin').value;
        admin-password = document.getElementById('admin-password').value;
        if (password-admin != admin-password) {
            alert("SENHAS DIFERENTES!\nFAVOR DIGITAR SENHAS IGUAIS"); 
        }else{
            document.FormSenha.submit();
        }
    }*/

</script>

</body>
</html>