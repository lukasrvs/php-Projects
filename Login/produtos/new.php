<?php
    require __DIR__ . '/../autoload.php';
    
    include('../partials/verify_auth.inc.php');
    
    use App\CategoriesDAO;
    
    $categories = CategoriesDAO::all();

    // include('partials/debug_session.inc.php');
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
    <title>Novo produto</title>
</head>
<body class="dashboard">
    <div class="container">
        <?php include('../partials/_header.php') ?>
        <hr />
        <div class="row">
            <?php include('../partials/_sidebar.php') ?>
            <div class="col-md-9">
                <?php include('../partials/_alert.php') ?>
                <h3>Novo Produto</h3>
                <hr />
                <form action="./register.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" />
                        </div><br><br>
                        <label for="price" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" name="price" />
                        </div><br><br>
                        <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descricao" name="descricao" />
                        </div>
                        <label for="categories" class="col-sm-2 col-form-label mt-4">Categoria</label>
                        <div class="col-sm-10 mt-4">
                            <div class="form-group">
                                <?php foreach($categories as $category): ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="<?= $category['name'] ?>" value="<?= $category['id'] ?>" name="categories[]">
                                        <label class="form-check-label" for="<?= $category['name'] ?>"><?= $category['name'] ?></label>
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