<?php
    require __DIR__ . '/../autoload.php';

    use App\Role;
    use App\RoleDAO;

    $c = new Role();
    $c->setName($_REQUEST['name']);
    $c->setID($_REQUEST['id']);
    
    $status = RoleDAO::edit($c);
    
    
    if ($status) {
        $_SESSION['msg']['success'] = "Função editada com sucesso.";
        header("Location: ../funcoes");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao editar a função, tente novamente.";
        header("Location: ../funcoes");
    }

?>