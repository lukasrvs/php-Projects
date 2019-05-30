<?php    
    namespace App;

    use App\User;
    use App\utils\LoginDB;
    use \PDO;    

    class UserDAO {

        /**
        * Esse método é responsável pela validação das credenciais do usuário.
        * @param User $user
        * @return boolean
        */
        public static function verificaCredenciais($user) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT u.id, u.email, u.profile_image, r.name FROM users u " .
                                   "JOIN roles r ON (u.roles_id = r.id) " .
                                   "WHERE u.email = :email AND u.password = :password");
            $stmt->bindValue(':email',    $user->getEmail(),    PDO::PARAM_STR);
            $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
            $stmt->execute();

            $rows = $stmt->fetch(PDO::FETCH_ASSOC);

            return $rows;
        }

        public static function register($user) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("INSERT INTO users (id, email, password, roles_id) values (default, :email, :password, 1)");
            $stmt->bindValue(':email',    $user->getEmail(),    PDO::PARAM_STR);
            $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
            
            return $stmt->execute();
        }

        public static function all() {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT * FROM users");
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }

        public static function allR() {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT u.id AS id, u.email AS email, r.name AS role_name FROM users AS u INNER JOIN roles AS r WHERE r.id = u.roles_id;");
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }

        public static function updateProfileImage($id, $image) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("UPDATE users SET profile_image = :image where id = :id");
            $stmt->bindValue(':id',    $id,    PDO::PARAM_STR);
            $stmt->bindValue(':image', $image, PDO::PARAM_STR);
            
            return $stmt->execute();       
        }

        public static function delete($user){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindValue(':id', $user->getId(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        public static function editar($user){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("UPDATE users SET email = :email, roles_id = :roles WHERE id = :id");
            $stmt->bindValue(':email',    $user->getEmail(),    PDO::PARAM_STR);
            $stmt->bindValue(':roles',    $user->getRoles_id(),    PDO::PARAM_INT);
        
            return $stmt->execute();
        }

    }

?>