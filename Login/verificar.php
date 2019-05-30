<?php
    require __DIR__ . '/autoload.php';

    use App\User;
    use App\UserDAO;

    $u = new User();
    $u->setEmail($_REQUEST['username']);
    $u->setPassword($_REQUEST['password']);
    
    $exist = UserDAO::verificaCredenciais($u);

    if ($exist) {
        $_SESSION['user'] = $u->getEmail();
        $_SESSION['user_id'] = $exist['id'];
        $_SESSION['user_role'] = $exist['name'];
        $_SESSION['user_profile_image'] = $exist['profile_image'];
        header("Location: dashboard.php");
    } else {
        $_SESSION['msg']['error'] = "As credenciais estão incorretas, tente novamente.";
        header("Location: index.php");
    }

?>