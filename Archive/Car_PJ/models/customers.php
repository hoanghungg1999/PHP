
<?php IDEA:
    require_once(__DIR__."/../db_config/connection.php");
    class Custommer{
        public $cusID;
        public $Name;
        public $Email;
        public $Address;
        public $Phonenumber;
        public $Password;

        public function __construct($name,$mail,$add,$phone,$pass)
        {
            $this->Name=$name;
            $this->Email=$mail;
            $this->Address = $add;
            $this->Phonenumber = $phone;
            $this->Password=$pass;
        }

        public function insert_customer(){
            $db = new Db();
            $sql = "INSERT INTO Customer(Name,Email,Address,Phonenumber,Password) VALUES('$this->Name','$this->Email','$this->Address','$this->Phonenumber','$this->Password')";
            $result = $db->query_execute($sql);
            return $result;
        }
        
        public static function forgot_password_cus($name,$mail,$phone){
            $db = new Db();
            $sql = "SELECT Password FROM Customer WHERE Name='$name' AND Email='$mail' AND Phonenumber='$phone'";
            $result = $db->query_execute($sql);
            return $result;
        }
        
    }
?>