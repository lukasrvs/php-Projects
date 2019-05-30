<?php
    require __DIR__ . '/../autoload.php';

    use App\Role;
    use App\RoleDAO;

    $c = new Role();
    $c->setID($_REQUEST['id']);
    echo "<pre>";
    print_r($c);
    echo "</pre>";
    
    $status = RoleDAO::delete($c);
    
    if ($status) {
        $_SESSION['msg']['success'] = "Função deletada com sucesso.";
        header("Location: index.php");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao deletar a função, tente novamente.";
        header("Location: index.php");
    }

?>