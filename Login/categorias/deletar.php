<?php
    require __DIR__ . '/../autoload.php';

    use App\Categories;
    use App\CategoriesDAO;

    $c = new Categories();
    $c->setId($_REQUEST['id']);
    
    $status = CategoriesDAO::delete($c);
    
    if ($status) {
        $_SESSION['msg']['success'] = "Categoria foi deletada com sucesso.";
        header("Location: ../categorias");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao deletar essa categoria, tente novamente.";
        header("Location: ../categorias");
    }

?>