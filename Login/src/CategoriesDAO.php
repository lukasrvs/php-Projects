<?php    
    namespace App;

    use App\Categories;
    use App\utils\LoginDB;
    use \PDO;    

    class CategoriesDAO {

        /**
        * Esse método é responsável pela validação das credenciais do usuário.
        * @param Categories $categories
        * @return boolean
        */

        public static function register($categories) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("INSERT INTO categories (id, name) values (default, :name)");
            $stmt->bindValue(':name',    $categories->getName(),    PDO::PARAM_STR);
            
            return $stmt->execute();
        }

        public static function all() {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT * from categories");
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }

        public static function edit($categories) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("UPDATE categories SET name = :name WHERE id = :id");
            $stmt->bindValue(':name', $categories->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $categories->getId(), PDO::PARAM_INT);

            print_r($category);
            
            return $stmt->execute();
        }

        public static function delete($categories){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("DELETE FROM categories_products WHERE category_id = :id");
            $stmt->bindValue(':id', $categories->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt1 = $conn->prepare("DELETE FROM categories WHERE id = :id");
            $stmt1->bindValue(':id', $categories->getId(), PDO::PARAM_INT);
            print_r($categories);
            
            return $stmt1->execute();
        }

        public static function only($categories){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT * FROM categories WHERE id = :id");
            $stmt->bindValue(":id", $categories->getID());
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

    }

?>