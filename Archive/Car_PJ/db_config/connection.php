<?php IDEA:
    class Db{
        protected static $connection;
        public function connnect(){
            if(!isset(self::$connection)){
                self::$connection = new mysqli('localhost','root','root','WebPHP');
            }
            if(self::$connection==false){
                return false;
            }
            return self::$connection;
        }
        public function query_execute($queryString){
            $connection = $this->connnect();
            $connection->query("SET NAMES utf8");
            $result = $connection->query($queryString);
            return $result;
        }
        public function select_to_aray($queryString){
            $rows = array();
            $result = $this->query_execute($queryString);
            if($result==false){
                return false;
            } 
            while($item = $result->fetch_assoc()){
                $rows[] = $item;
            }
            return $rows;
        }
    }
    
?>