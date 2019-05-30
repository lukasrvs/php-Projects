<?php
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');
    
    use App\UserDAO;
    use App\User;

    $user = new User();
    $user->setId($_REQUEST['id']);
    
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
    <title>Editar usuario</title>
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
                    Editar Usuario
                </h3>
                <hr />
                
                <form action="edit.php" method="POST">
                    <div class="form-group">
                        <label for="username" class="text-info">Username:</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="roles">Função</label>
                        <select name="roles" class="form-control" id="roles_id">
                            <option>--SELECIONE--</option>
                            <option value="1">comum</option>
                            <option value="2">admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="/usuarios" class="btn btn-danger">Cancelar</a>
                    
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>