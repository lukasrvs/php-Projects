<?php
    require __DIR__ . '/../autoload.php';

    include('../partials/verify_auth.inc.php');
    
    use App\UserDAO;

    $users = UserDAO::all();
    
    //include('partials/debug_session.inc.php');
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
    <title>Editar Perfil</title>
</head>
<body class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Image and text -->
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                        Projeto Login
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="/dashboard.php">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="/sair.php">Sair</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <h3>Editar Perfil</h3>
                <hr />

                <form action="/perfil/atualizar.php" method="POST" enctype="multipart/form-data">
                    <label for="photo">Foto:</label>
                    <input type="file" name="photo" id="photo">


                    <input type="submit" value="Salvar" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>