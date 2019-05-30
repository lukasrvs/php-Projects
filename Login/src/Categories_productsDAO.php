<?php    
    namespace App;

    use App\Categories;
    use App\utils\LoginDB;
    use \PDO;    

    class Categories_productsDAO {

        /**
        * Esse método é responsável pela validação das credenciais do usuário.
        * @param Categories_products $categories_products
        * @return boolean
        */

        public static function register($categories_products) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("INSERT INTO categories_products (product_id,category_id) values (:id_product, :id_category)");
            $stmt->bindValue(':id_product',    $categories_products->getIdProduct(),    PDO::PARAM_INT);
            $stmt->bindValue(':id_category',   $categories_products->getIdCategories(),    PDO::PARAM_INT);
            

            return $stmt->execute();
        }

        public static function all() {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("select * from categories_products inner join products on categories_products.product_id = products.id inner join categories on categories_products.category_id = categories.id");
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }

        public static function delete($product){
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("DELETE FROM categories_products WHERE product_id = :id");
            $stmt->bindValue(':id', $product->getID(), PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public static function getCategories($id) {
            $conn = LoginDB::getConnection();
            $stmt = $conn->prepare("select c.name, c.id from categories_products as cp inner join products as p on cp.product_id = p.id inner join categories as c on cp.category_id = c.id and p.id = :id");
            $stmt->bindValue(":id", $id, PDO::PARAM_STR);

            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;

        }
    }

?>