
<?php IDEA:
    require_once(__DIR__."/../db_config/connection.php");
    class Product{
        public $productID;
        public $productName;
        public $cateID;
        public $typeID;
        public $price;
        public $quantity;
        public $description;
        public $picture;
        public $discount;

        public function __construct($pd_name,$cate_id,$type_id,$_price,$_quantity,$desc,$pic,$discount_pd)
        {
            $this->productName = $pd_name;
            $this->cateID=$cate_id;
            $this->typeID=$type_id;
            $this->price = $_price;
            $this->quantity = $_quantity;
            $this->description=$desc;
            $this->picture = $pic;
            $this->discount = $discount_pd;
        }
        public function get_ProductName() {
            return $this->productName;
        }

        public function get_ProductCate() {
            return $this->cateID;
        }
        
        public function get_ProductType() {
            return $this->typeID;
        }

        public function get_ProductPrice() {
            return $this->price;
        }

        public function get_ProductQuantity() {
            return $this->quantity;
        }

        public function get_ProducDesc() {
            return $this->description;
        }

        public function get_ProductPic() {
            return $this->picture;
        }

        public function get_ProductDiscount() {
            return $this->discount;
        }


        public function save(){
            $db = new Db();
            $sql = "INSERT INTO product(ProductName,CateID,TypeID,Price,Quantity,Description,Picture,Discount) VALUES('$this->productName','$this->cateID','$this->typeID','$this->price','$this->quantity','$this->description','$this->picture','$this->discount')";
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function list_product(){
            $db = new Db();
            $sql = "SELECT * FROM product ORDER BY ProductName";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function list_product_limit(){
            $db = new Db();
            $sql = "SELECT * FROM product ORDER BY ProductID DESC LIMIT 10";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function list_product_byCateID($ID){
            $db = new Db();
            $sql = "SELECT * FROM Product WHERE CateID='".$ID."'" ;
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function list_sale_product(){
            $db = new Db();
            $sql = "SELECT * FROM Product WHERE Discount!='0'" ;
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function list_related_product_by_type($type){
            $db = new Db();
            $sql = "SELECT * FROM Product WHERE TypeID=$type" ;
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function new_arrival_list(){
            $db = new Db();
            $sql = "SELECT * FROM product ORDER by ProductID DESC LIMIT 5";
            $result = $db->select_to_aray($sql);
            return $result;
        }
        
        public static function get_product_detail($id){
            $db = new Db();
            $sql = "SELECT * FROM product WHERE ProductID =$id ";
            $result = $db->select_to_aray($sql);
            return $result;
            }

        public static function list_product_byCate($cateid){
            $db = new Db();
            $sql = "SELECT * FROM Product WHERE CateID='".$cateid."'" ;
            $result = $db->select_to_aray($sql);
            return $result;
        }
        public static function list_product_byType($typeid){
            $db = new Db();
            $sql = "SELECT * FROM Product WHERE TypeID='".$typeid."'" ;
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function list_manage_product(){
            $db = new Db();
            $sql = "SELECT * FROM product ORDER BY ProductID";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public function update_prod($id){
            $db = new Db();
            $sql = "UPDATE  product SET ProductName='$this->productName', CateID=$this->cateID, TypeID=$this->typeID, Price=$this->price, Quantity=$this->quantity, Description='$this->description', Picture='$this->picture', Discount=$this->discount WHERE ProductID=$id";
            $result = $db->query_execute($sql);
            return $sql;
        }
        public static function delete_product($id){
            $db = new Db();
            $sql = "DELETE FROM product WHERE ProductID =$id ";
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function list_productSearchWithCategory($input,$cateid){
            $db = new Db();
            $sql = "SELECT * FROM product where CateID=$cateid and ProductName LIKE '%$input%'";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function list_productSearchWithInputOnly($input){
            $db = new Db();
            $sql = "SELECT * FROM product where ProductName LIKE '%$input%'";
            $result = $db->select_to_aray($sql);
            return $result;
        }
    }
?>