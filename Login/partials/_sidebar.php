<div class="col-md-3">
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <?php if ($_SESSION['user_profile_image']) : ?>
                <img src="/img/profiles/<?= $_SESSION['user_profile_image'] ?>" class="img-responsive" alt="">
            <?php else : ?>
                <img src="/img/placeholder.png" class="img-responsive" alt="">
            <?php endif ?>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?= $_SESSION["user"] ?>
            </div>
            <div class="profile-usertitle-job">
                <?= $_SESSION["user_role"] ?>
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <a href="/perfil/editar.php" class="btn btn-warning btn-sm">Editar Perfil</a>
            
        </div>
        <!-- END SIDEBAR BUTTONS -->                    
    </div>
    <hr />
    <h3>Navegação</h3>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/produtos">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/categorias">Categorias</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/usuarios">Usuários</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/funcoes">Funções</a>
        </li>
    </ul>
</div>