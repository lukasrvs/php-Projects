<?php 

    require __DIR__ . '/autoload.php';

    use App\User;
    use App\UserDAO;

    $u = new User();
    $u->setEmail($_REQUEST['username']);
    $u->setRoles_id($_REQUEST['roles']);


    $status = UserDAO::editar($u);

    if ($status) {
        $_SESSION['msg']['success'] = "Usuário editado com sucesso.";
        header("Location: ../usuarios");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao editar o usuário, tente novamente.";
        header("Location: ../usuarios");
    }

?>