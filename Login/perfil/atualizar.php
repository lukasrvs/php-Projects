<?php
    require __DIR__ . '/../autoload.php';

    // import the Intervention Image Manager Class
    use Intervention\Image\ImageManager;
    use App\UserDAO;

    $id = $_SESSION['user_id'];

    $filename = $id . '.jpg';

    $target = '../img/profiles/' . $filename;

    move_uploaded_file($_FILES['photo']['tmp_name'], $target);

    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));

    // open an image file
    $img = $manager->make($target)->fit(150, 150);

    $img->save($target);

    $return = UserDAO::updateProfileImage($id, $filename);

    if ($return) {
        $_SESSION['msg']['success'] = "Imagem salva com sucesso.";
        $_SESSION['user_profile_image'] = $filename;
        header("location: /dashboard.php");
    } else {
        $_SESSION['msg']['error'] = "Erro ao salvar a imagem, favor tentar novamente.";
        header("location: /perfil/editar.php");
    }
    

?>