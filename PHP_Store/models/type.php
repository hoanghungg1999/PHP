<?php IDEA:
    require_once(__DIR__."/../db_config/connection.php");

    class Type{
        public $typeID;
        public $typeName;
        public $typeDesc;
        
        public function __construct($type_name,$type_desc)
        {
            $this->categoryName = $type_name;
            $this->description = $type_desc;          
        }
        public static function list_type(){
            $db  = new Db();
            $sql = "SELECT * FROM type_category";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function get_type($id){
            $db  = new Db();
            $sql = "SELECT * FROM type_category WHERE TypeID=$id";
            $result = $db->select_to_aray($sql);
            return $result;
        }
        public static function get_typebyname($name){
            $db  = new Db();
            $sql = "SELECT TypeID FROM type_category WHERE TypeName='$name'";
            $result = $db->select_to_aray($sql);
            return $result[0]['TypeID'];
        }

        public static function update_type($id,$name,$desc){
            $db = new Db();
            $sql = "UPDATE type_category SET TypeName='$name' , TypeDescription='$desc' WHERE TypeID=$id";
            
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function delete_type($id){
            $db = new Db();
            $sql = "DELETE FROM type_category WHERE TypeID =$id ";
            $result = $db->query_execute($sql);
            return $result;
        }

        public function save(){
            $db = new Db();
            $sql = "INSERT INTO type_category(TypeName,TypeDescription) VALUES('$this->categoryName','$this->description')";
            $result = $db->query_execute($sql);
            return $result;
        }
        
        
    }
?>