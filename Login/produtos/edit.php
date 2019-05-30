<?php 
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');

    use App\Product;
    use App\ProductDAO;
    use App\Categories_productsDAO;
    use App\Categories_products;

    $p = new Product();

    $pc = new Categories_products();

    $p->setID($_REQUEST['id']);
    $p->setName($_REQUEST['name']);
    $pc->setIdProduct($_REQUEST['id']);

    Categories_productsDAO::delete($p);

    foreach($_REQUEST['categories'] as $category){
        $pc->setIdCategories($category);
        $statusProduct_category = Categories_productsDAO::register($pc);

        if(!$statusProduct_category){
            break;
        }
    }

    $status = ProductDAO::edit($p);

    if ($status && $statusProduct_category) {
        $_SESSION['msg']['success'] = "Produto editado com sucesso.";
        header("Location: ../produtos");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao editar o produto, tente novamente.";
        header("Location: ../produtos");
    }
?>