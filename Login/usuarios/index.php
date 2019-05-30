<?php
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');
    
    use App\UserDAO;

    $users = UserDAO::allR();
    
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
    <title>Usuários</title>
</head>
<body class="dashboard">
    <div class="container">
        <?php include('../partials/_header.php') ?>
        <hr />
        <div class="row">
            <?php include('../partials/_sidebar.php') ?>
            <div class="col-md-9">
                <?php include('../partials/_alert.php') ?>
                
                <h3>Usuários</h3>
                
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Perfil</th>
                        <th></th>
                    </tr>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['role_name'] ?></td>
                            <td>
                                <a href="/usuarios/editar.php?id=<?= $user['id'] ?>" class="btn btn-warning">
                                    Editar
                                </a>
                                <a href="/usuarios/deletarUsuario.php?id=<?= $user['id'] ?>" class="btn btn-danger" onClick="return confirm('Você realmente deseja excluir esse usuário?')">
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