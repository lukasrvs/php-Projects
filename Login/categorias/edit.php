<?php
    require __DIR__ . '/../autoload.php';

    use App\Categories;
    use App\CategoriesDAO;

    $c = new Categories();
    $c->setName($_REQUEST['name']);
    $c->setId($_REQUEST['id']);
    
    $status = CategoriesDAO::edit($c);
    
    
    if ($status) {
        $_SESSION['msg']['success'] = "Categoria foi editada com sucesso.";
        header("Location: ../categorias");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao editar essa categoria, tente novamente.";
        header("Location: ../categorias");
    }

?>