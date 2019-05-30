<?php
    require __DIR__ . '/../autoload.php';

    use App\Product;
    use App\ProductDAO;

    $p = new Product();
    $p->setId($_REQUEST['id']);
    
    $status = ProductDAO::delete($p);
    
    if ($status) {
        $_SESSION['msg']['success'] = "Produto deletado com sucesso.";
        header("Location: ../produtos");
    } else {
        $_SESSION['msg']['error'] = "Ocorreu um erro ao deletar o produto, tente novamente.";
        header("Location: ../produtos");
    }

?>