<?php

$user = $_SESSION['user'] ?? null;

if (! $user) {
    $_SESSION['msg']['error'] = "É necessário logar para efetuar essa ação.";
    header('Location: index.php');
}

?>