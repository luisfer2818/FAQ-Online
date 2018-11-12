<?php 
    include '../connect/userDAO.php';

    $usuarioDAO = new UserDAO();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $user = $usuarioDAO->logar($email, $senha);
    $tipoUsuarioLogado = $user['usuario_tipo'];

    //var_dump($tipoUsuarioLogado);

    if ($user == true && $tipoUsuarioLogado === 'A') {
        session_start();

        $_SESSION['user'] = $user;
        //die('admin');

        echo json_encode(['type' => 'success', 'tipoUsuarioLogado' => $tipoUsuarioLogado]);
        exit;

        header('Location: ../views/template.php');

    }
    
    if ($user == true && $tipoUsuarioLogado === 'U') {
        session_start();

        $_SESSION['user'] = $user;
        //die('user');

        echo json_encode(['type' => 'success', 'tipoUsuarioLogado' => $tipoUsuarioLogado]);
        exit;

        header('Location: ../views/ViewFaq/faq.php');

    }

    if ($user == false) {
        echo json_encode(['type' => 'error', 'msg' => 'Dados inválidos']);
        exit;
        // header('Location: ../index.php?erro=senha');
    }

?>