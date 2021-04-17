
<?php IDEA:
    require_once(__DIR__."/../db_config/connection.php");
    class ContactUs{
        public $contactID;
        public $Name;
        public $Email;
        public $Message;

        public function __construct($name,$mail,$mess)
        {
            $this->Name=$name;
            $this->Email=$mail;
            $this->Message = $mess;
        }

        public function insert_contact(){
            $db = new Db();
            $sql = "INSERT INTO ContactMessage(Name,Email,Message) VALUES('$this->Name','$this->Email','$this->Message')";
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function list_contact(){
            $db = new Db();
            $sql = "SELECT * FROM ContactMessage ORDER BY ContactID";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public static function update_contact($id,$name,$email,$message){
            $db = new Db();
            $sql = "UPDATE  ContactMessage SET Name='$name' , Email='$email', Message = '$message' WHERE ContactID=$id";
            
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function delete_contact($id){
            $db = new Db();
            $sql = "DELETE FROM ContactMessage WHERE ContactID =$id ";
            $result = $db->query_execute($sql);
            return $result;
        }
        
    }
?>