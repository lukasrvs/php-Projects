<?php
    require __DIR__ . '/../autoload.php';

    use App\Categories;
    use App\CategoriesDAO;

    $c = new Categories();
    $c->setName($_REQUEST['name']);
      
    $status = CategoriesDAO::register($c);

    if ($status) {
        $_SESSION['msg']['success'] = "Categoria cadastrada com sucesso.";
        header("Location: index.php");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao cadastrar a categoria, tente novamente.";
        header("Location: index.php");
    }

?>