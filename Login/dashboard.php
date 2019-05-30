<?php
    require __DIR__ . '/autoload.php';

    include('partials/verify_auth.inc.php');
    
    use App\UserDAO;

    $users = UserDAO::all();
    
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
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body class="dashboard">
    <div class="container">
        <?php include('partials/_header.php') ?>
        <hr />
        <div class="row">
            <?php include('partials/_sidebar.php') ?>
            <div class="col-md-9">
                <?php include('partials/_alert.php') ?>

                <h3>Dashboard</h3>
                <hr />

                

            </div>
        </div>
    </div>
    
</body>
</html>