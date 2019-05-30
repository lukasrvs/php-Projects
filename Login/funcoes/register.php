<?php 
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');
    
    use App\RoleDAO;
    use App\Role;

    $r = new Role();

    $r->setName($_REQUEST['name']);

    $status = RoleDAO::register($r);

    if ($status) {
        $_SESSION['msg']['success'] = "Função cadastrada com sucesso.";
        header("Location: ../funcoes");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao cadastrar a função, tente novamente.";
        header("Location: ../funcoes");
    }

?>