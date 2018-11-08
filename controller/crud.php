<?php 

require '../connect/userDAO.php';

$action = $_POST['action'];

$model = new UserDAO();

$pergunta = '';

switch ($action) {
    case 'inserirUser':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $model->inserirUser($nome, $email, $senha);
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
        $pergunta = $_POST['pergunta'];
        $model->inserirMsg($pergunta);
    break;

    case 'inserirResp':
        $resposta = $_POST['resposta'];
        $model->inserirResp($resposta);
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
}