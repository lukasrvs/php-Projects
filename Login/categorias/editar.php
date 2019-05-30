<?php
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');
    
    use App\CategoriesDAO;
    use App\Categories;

    $category = new Categories();
    $category->setId($_REQUEST['id']);
    $categories = CategoriesDAO::only($categories);
    
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
    <title>Categorias</title>
</head>
<body class="dashboard">
    <div class="container">
        <?php include('../partials/_header.php') ?>
        <hr />
        <div class="row">
            <?php include('../partials/_sidebar.php') ?>
            <div class="col-md-9">
                <?php include('../partials/_alert.php') ?>

                <h3>
                    Editar Categoria
                </h3>
                <hr />
                
                <form action="edit.php" method="POST">
                    <div class="form-group row">
                        <input type="hidden" name="id" value="<?= $categories->getId() ?>"/>
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $categories['name'] ?>" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="/categorias" class="btn btn-danger">Cancelar</a>
                
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>