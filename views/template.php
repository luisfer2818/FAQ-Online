<?php 
    require '../connect/userDAO.php';

    $model = new UserDAO();

    $dados = $model->grid();

    $usuarios = $model->gridUsuario();

    //$usuarioTipo = $model->gridUsuarioTipo();

    session_start();    

    if (!$_SESSION['user']) {
        header('Location: ./template.php');
    }
?>
<style>
.button
{
    cursor: pointer;
}

</style>
<!-- =====LINK MENU CSS =====-->
<?php include '../views/Template/link_css.php'; ?>

<!--====== Menu ======-->
<?php include'../views/Template/menu.php';?>

<!--====== Navbar ======-->
<?php include'../views/Template/navbar.php'; ?>
    <!--=========================================================-->
                        <!--CONTEÚDO-->
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
                    <textarea rows="10" id="pergunta" name="pergunta"></textarea>
                </div>
                <button class="positive ui button" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Cadastrar</button>
                </fieldset>
            </form>
        </div>
        <!-- /.container -->
    </div>

    <div id="tab-visualiza-msg" style="display:none;">
        <p class="text-p"> Perguntas</p>
        <table class="ui orange table">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
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
                    <td class="about" data-name="pergunta"><?php echo $value['pergunta']; ?></td>
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

    <div id="tab-usuario" style="display:none;">
        <p class="text-p">Usuários</p>
        <table class="ui orange table">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key => $value) : ?>
                <tr data-id="<?php echo $value['id_usuario'] ?>">
                    <!-- <td>#<?php //echo $value['id']; ?></td> -->
                    <td class="about" data-name="nome"><?php echo $value['nome']; ?></td>
                    <td class="about" data-name="email"><?php echo $value['email']; ?></td>
                    <td>
                        <button class="tiny ui red button btn-excluir-user" action="../controller/crud.php"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div id="tab-perfil" style="display:none;">
        <p class="text-p">Perfil</p>
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
                        <input type="hidden" class="form-control" id="password" name="senhaAntiga" value="<?php echo $_SESSION['user']['senha']; ?>">
                    
                        <!-- <input type="button" id="showPassword" value="" class="mini ui button" /><i id="showPassword" class="fa fa-eye" aria-hidden="true"></i>  -->
                        <a type="button" id="showPassword" class="ui button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>
                </div>
                <button class="positive ui button" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                </fieldset>
            </form>
        </div>
        <!-- /.container -->
    </div>
    <!--=========================================================-->
                        <!--FIM CONTEÚDO-->
    <!--=========================================================-->
</div>

<!-- ===================================================== -->
<!-- SCRIPT DA PAGINA -->
<?php include '../views/Template/script.php'; ?>
<!-- FIM SCRIPT -->

<script>
    $(document).ready(function() {
        $('[href="#tab-visualiza-msg"]').click();

        $('#showPassword').on('click', function(){
    
        var passwordField = $('#password');
        var passwordFieldType = passwordField.attr('type');

        if(passwordFieldType == 'password')
        {   
            passwordField.attr('type', 'text');
            $('#showPassword i').removeClass('fa-eye');
            $('#showPassword i').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $('#showPassword i').removeClass('fa-eye-slash');
            $('#showPassword i').addClass('fa-eye');
        }
    });

        //CADASTRAR
        $('#form-cad-msg').unbind('submit').submit(function(e) {
            e.preventDefault();

            $('[name="action"]').val('inserirMsg');

            let dadosForm = $(this).serialize();

            console.log(dadosForm);
       
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
                    //    $.toast('Toast message to be shown')
                        window.location.href = 'template.php';
                    }
                }
            });
        });

        //CADASTRAR
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

        //EDITAR
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

        //SALVAR
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
        
        //EXCLUIR MENSAGEM
        $('.btn-excluir-msg').unbind('click').click(function(e) {
            e.preventDefault();
            var idMsg = $(e.target).closest('tr').attr('data-id');

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
        $('#tab-perfil').hide();
    });

    //TAB-VISUALIZA-MSG
    $('[href="#tab-visualiza-msg"]').click(function(){
        $('#tab-visualiza-msg').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-perfil').hide();
    });

     //TAB-USUARIO
    $('[href="#tab-usuario"]').click(function(){
        $('#tab-usuario').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-visualiza-msg').hide();
        $('#tab-perfil').hide();
    });

    //TAB-PERFIL
    $('[href="#tab-perfil"]').click(function(){
        $('#tab-perfil').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-visualiza-msg').hide();
    });
</script>