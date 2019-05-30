<?php
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');
    
    use App\ProductDAO;

    $products = ProductDAO::all();
    
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

                <h3>
                    Produtos
                    <a href="/produtos/new.php" class="float-right btn btn-success">Novo Produto</a>
                </h3>
                
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                    </tr>
                    <?php foreach($products as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['name'] ?></td>
                             <td> <?= $product['price'] ?> </td>
                             <td> <?= $product['descricao'] ?> </td>
                            <td>
                                <a href="produtos/editar.php?id=<?= $product['id'] ?>" class="btn btn-warning">
                                    Editar
                                </a>
                                <a href="produtos/deletar.php?id=<?= $product['id'] ?>" class="btn btn-danger" onClick="return confirm('Você realmente deseja excluir esse produto?')">
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