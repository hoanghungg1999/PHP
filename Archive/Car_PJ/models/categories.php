<?php IDEA:
    require_once(__DIR__."/../db_config/connection.php");

    class Category{
        public $cateID;
        public $categoryName;
        public $description;
        public $logo_link;
        
        public function __construct($cate_name,$desc,$logo)
        {
            $this->categoryName = $cate_name;
            $this->description = $desc;            
            $this->logo_link = $logo;            
        }
        public static function list_category(){
            $db  = new Db();
            $sql = "SELECT* FROM Category";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function get_category($id){
            $db  = new Db();
            $sql = "SELECT * FROM category WHERE CateID=$id";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function get_categorybyname($name){
            $db  = new Db();
            $sql = "SELECT CateID FROM category WHERE CategoryName='$name'";
            $result = $db->select_to_aray($sql);
            return $result[0]['CateID'];
        }

        public static function update_category($id,$name,$desc,$logo){
            $db = new Db();
            $sql = "UPDATE category SET CategoryName='$name' , Description='$desc', CategoryLogo='$logo' WHERE CateID=$id";
            
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function delete_category($id){
            $db = new Db();
            $sql = "DELETE FROM category WHERE CateID =$id ";
            $result = $db->query_execute($sql);
            return $result;
        }

        public function save(){
            $db = new Db();
            $sql = "INSERT INTO category(CategoryName,Description,CategoryLogo) VALUES('$this->categoryName','$this->description','$this->logo_link ')";
            $result = $db->query_execute($sql);
            return $result;
        }
        
        
    }
?>