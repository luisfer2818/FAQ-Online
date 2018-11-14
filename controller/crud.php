<?php 

require '../connect/userDAO.php';

$action = $_POST['action'];

$model = new UserDAO();

switch ($action) {
    case 'inserirUser':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $model->inserirUser($nome, $email, $senha);
    break;

     case 'inserirUserAdmin':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $model->inserirUserAdmin($nome, $email, $senha);
    break;

    case 'editarUser':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaAntiga = $_POST['senhaAntiga'];
        $model->editarUser($id, $nome, $email, $senha, $senhaAntiga);
    break;

    case 'inserirMsg':
        $idUsuario = $_POST['id_usuario'];
        $pergunta = $_POST['pergunta'];
        $model->inserirMsg($idUsuario, $pergunta);
    break;

    case 'inserirResp':
        $idPergunta = $_POST['id_pergunta'];
        $resposta = $_POST['respostas'];
        $model->inserirResp($idPergunta, $resposta);
    break;
    
    case 'editarMsg':
        $id = $_POST['id'];
        $pergunta = $_POST['pergunta'];
        $model->editarMsg($id, $pergunta);
    break;

    case 'excluirMsg':
        $id = $_POST['id'];
        $model->excluirMsg($id);
    break;

    case 'excluirUser':
        $id = $_POST['id'];
        $model->excluirUser($id);
    break;

    case 'gridPergunta':
        $model->grid();
    break;
}