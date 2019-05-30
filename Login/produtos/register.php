<?php
    require __DIR__ . '/../autoload.php';

    use App\Categories_products;
    use App\Categories_productsDAO;
    use App\Product;
    use App\ProductDAO;

    $c = new Categories_products();
    $p= new Product();
    $p->setName($_REQUEST['name']);
    $p->setPrice($_REQUEST['price']);
    $p->setDescription($_REQUEST['descricao']);
      
    $statusProduct = ProductDAO::register($p);
    
    $id = ProductDAO::lastProduct();

    $p->setId($id['last']);

    $c->setIdProduct($p->getId());
    

    foreach($_REQUEST['categories'] as $categories){
        $c->setIdCategories($categories);
        $statusProduct_categories = Categories_productsDAO::register($c);

        if(!$statusProduct_categories){
            break;
        }
    }

    if ($statusProduct_categories && $statusProduct) {
        $_SESSION['msg']['success'] = "Produto foi cadastrado com sucesso.";
        header("Location: ../produtos");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao cadastrar este produto, tente novamente.";
        header("Location: ../produtos");
    }

?>