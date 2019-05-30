<?php    
    namespace App;

    use App\Product;
    use App\utils\LoginDB;
    use \PDO;    

    class ProductDAO {

        /**
        * Esse método é responsável pela validação das credenciais do usuário.
        * @param Product $product
        * @return boolean
        */

        public static function register($product) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("INSERT INTO products (id, name, price, descricao) values (default, :name, :price, :descricao)");
            $stmt->bindValue(':name',      $product->getName(),        PDO::PARAM_STR);
            $stmt->bindValue(':price',     $product->getPrice(),       PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $product->getDescription(), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public static function lastProduct(){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT max(id) AS 'last' FROM products");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        public static function all() {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT * FROM products");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }

        public static function only($id) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        public static function delete($product){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("DELETE FROM categories_products WHERE product_id = :id");
            $stmt->bindValue(':id', $product->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt1 = $conn->prepare("DELETE FROM products WHERE id = :id");
            $stmt1->bindValue(':id', $product->getId(), PDO::PARAM_INT);
            print_r($product);
            
            return $stmt1->execute();
        }

        public static function edit($product){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("UPDATE products SET name = :name WHERE id = :id");
            $stmt->bindValue(':name', $product->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $product->getId(), PDO::PARAM_INT);
            
            return $stmt->execute();
        }

    }

?>