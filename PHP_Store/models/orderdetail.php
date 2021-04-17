<?php IDEA:
    require_once(__DIR__."/../db_config/connection.php");
    class Order{
        public $OrderID;
        public $OrderDate;
        public $CustomerID;
        public $Note;
        public $OrderDetail;
        public $Total;

        public function __construct($date,$id,$note,$detail,$sum)
        {
            $this->OrderDate=$date;
            $this->CustomerID = $id;
            $this->Note=$note;
            $this->OrderDetail = $detail;
            $this->Total = $sum;
        }

        public function save(){
            $db = new Db();
            $sql = "INSERT INTO order_detail(OrderDate,CustomerID,Note,OrderDetail,Total) VALUES('$this->OrderDate','$this->CustomerID','$this->Note','$this->OrderDetail','$this->Total')";
            messagebox($sql);
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function list_order(){
            $db  = new Db();
            $sql = "SELECT* FROM order_detail";
            $result = $db->select_to_aray($sql);
            return $result;
        }        
        
    }
?>