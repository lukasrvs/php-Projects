<?php 
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');

    use App\ProductDAO;
    use App\CategoriesDAO;
    use App\Categories_productsDAO;

    $allCategories = CategoriesDAO::all();
    $categories = Categories_productsDAO::getCategories($_REQUEST['id']);

    $product = ProductDAO::only($_REQUEST['id']);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="/css/style.css">
    <title>Produtos</title>
</head>
<body class="dashboard">
    <div class="container">
        <?php include('../partials/_header.php') ?>
        <hr />
        <div class="row">
            <?php include('../partials/_sidebar.php') ?>
            <div class="col-md-9">
                <?php include('../partials/_alert.php') ?>
                <h3>Editar Produto</h3>
                <hr />
                <form action="./edit.php" method="POST">
                    <div class="form-group row">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>" />
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>"/>
                        </div>
                        <label for="category" class="col-sm-2 col-form-label mt-4">Categoria</label>
                        <div class="col-sm-10 mt-4">
                            <div class="form-group">
                                <?php foreach($allCategories as $cat): ?>
                                <?php $checked = "" ?>
                                    <?php foreach($categories as $category): ?>
                                        <?php 
                                            if($cat['id'] == $category['id']){
                                                $checked = "checked";
                                                break;
                                            }
                                        ?>
                                    <?php endforeach; ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="<?= $cat['name'] ?>" value="<?= $cat['id'] ?>" name="categories[]" <?= $checked ?> />
                                        <label class="form-check-label" for="<?= $cat['name'] ?>"><?= $cat['name'] ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="/produtos" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>