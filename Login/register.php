<?php
    require __DIR__ . '/autoload.php';

    use App\User;
    use App\UserDAO;

    $u = new User();
    $u->setEmail($_REQUEST['username']);
    $u->setPassword($_REQUEST['password']);
    
    $status = UserDAO::register($u);

    if ($status) {
        $_SESSION['msg']['success'] = "Usuário cadastrado com sucesso.";
        header("Location: index.php");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao cadastrar o usuário, tente novamente.";
        header("Location: index.php");
    }

?>