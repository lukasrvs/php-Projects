<?php    
    namespace App;

    use App\utils\LoginDB;
    use \PDO;    

    class RoleDAO {

        /**
        * Esse método é responsável pela validação das credenciais do usuário.
        * @param Role $role
        * @return boolean
        */

        public static function register($role) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("INSERT INTO roles (id, name) values (default, :name)");
            $stmt->bindValue(':name',    $role->getName(),    PDO::PARAM_STR);
            
            return $stmt->execute();
        }

        public static function all() {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT * FROM roles");
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }

        public function delete($role){
            $conn = LoginDB::getConnection();
            
            $stmt = $conn->prepare("DELETE FROM roles WHERE id = :id");
            $stmt->bindValue(':id', $role->getID(), PDO::PARAM_INT);

            print_r($role);
            
            return $stmt->execute();
        }

        public function only($role){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT * from roles WHERE id = :id");
            $stmt->bindValue(":id", $role->getID());
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        public static function edit($role) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("UPDATE roles SET name = :name WHERE id = :id");
            $stmt->bindValue(':name', $role->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $role->getID(), PDO::PARAM_INT);

            print_r($role);
            
            return $stmt->execute();
        }

    }

?>