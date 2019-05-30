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
                    Categorias
                    <a href="/categorias/new.php" class="float-right btn btn-success">Nova Categoria</a>
                </h3>
                
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        
                        <th></th>
                    </tr>
                    <?php foreach($categories as $categorie): ?>
                        <tr>
                            <td><?= $categorie['id'] ?></td>
                            <td><?= $categorie['name'] ?></td>
                            
                            <td>
                                <a href="/categorias/editar.php?id=<?= $categorie['id'] ?>" class="btn btn-warning">
                                    Editar
                                </a>
                                <a href="/categorias/deletar.php?id=<?= $categorie['id'] ?>" class="btn btn-danger" onClick="return confirm('Você realmente deseja excluir essa categoria?')">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>

            </div>
        </div>
    </div>
    
</body>
</html>