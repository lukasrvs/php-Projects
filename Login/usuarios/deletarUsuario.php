<?php
    require __DIR__ . '/../autoload.php';

    use App\User;
    use App\UserDAO;

    $u = new User();
    $u->setId($_REQUEST['id']);
    
    $status = UserDAO::delete($u);
    
    if ($status) {
        $_SESSION['msg']['success'] = "Usuário deletado com sucesso.";
        header("Location: ../usuarios");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao deletar o usuário, tente novamente.";
        header("Location: ../usuarios");
    }

?>