
<?php IDEA:
    require_once(__DIR__."/../db_config/connection.php");
    class Admin_Login{
        public $ad_ID;
        public $ad_Name;
        public $ad_Email;
        public $ad_Address;
        public $ad_Phonenumber;
        public $ad_Username;
        public $ad_Password;
        public $ad_Level;

        public function __construct($name,$mail,$add,$phone,$pass)
        {
           $this->ad_Name = $name;
           $this->ad_Email = $mail;
           $this->ad_Address = $add;
           $this->ad_Phonenumber = $phone;
           $this->ad_Password = $pass;
           $this->ad_Level =0;
        }

        public static function login($username,$password){
            $password = md5($password);
            $db = new Db();
            $sql = "SELECT * FROM login WHERE Email='$username' AND Password='$password'";
            $result =  $db->select_to_aray($sql);
            return $result;
        }
        public static function get_admin_info($id){
            $db = new Db();
            $sql = "SELECT * FROM login WHERE ID='$id'";
            $result =  $db->select_to_aray($sql);
            return $result;
        }
        public static function get_all_login_able($id){
            $db = new Db();
            $sql = "SELECT ID,HoTen,Email,DiaChi,SDT,Level FROM login WHERE Level != 0 and ID != $id";
            $result =  $db->select_to_aray($sql);
            return $result;
        }



        
        public function insert_customer(){
            $db = new Db();
            $sql = "INSERT INTO login(HoTen,Email,DiaChi,SDT,Password,Level) VALUES('$this->ad_Name','$this->ad_Email','$this->ad_Address','$this->ad_Phonenumber','".md5($this->ad_Password)."','$this->ad_Level')";
            echo $sql;
            $result = $db->query_execute($sql);
            return $result;
        }
        
        public static function forgot_password_cus($name,$mail,$phone){
            $db = new Db();
            $sql = "SELECT Password FROM login WHERE HoTen='$name' AND Email='$mail' AND SDT='$phone'";
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function list_customer(){
            $db = new Db();
            $sql = "SELECT * FROM login WHERE Level=0";
            $result = $db->select_to_aray($sql);
            return $result;
        }

        public function update_permission($id,$level){
            $db = new Db();
            $sql = "UPDATE  Login SET HoTen='$this->ad_Name' , Email='$this->ad_Email', DiaChi = '$this->ad_Address', SDT='$this->ad_Phonenumber', Level='$level' WHERE ID=$id";
            
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function delete_permission($id){
            $db = new Db();
            $sql = "DELETE FROM login WHERE ID =$id ";
            $result = $db->query_execute($sql);
            return $result;
        }
    }
?>