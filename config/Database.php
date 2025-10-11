<?php
class Database
{
    protected $host = "localhost";
    protected $dbname = "final_pro_oop";
    protected $user = "root";
    protected $password = "";
    protected $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // عرض الأخطاء كاستثناءات
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // وضع الجلب الافتراضي كمصفوفة
                PDO::ATTR_EMULATE_PREPARES   => false,                  // تعطيل المحاكاة لتحسين الأمان والأداء
            ];
            $this->conn=new PDO($dsn,$this->user,$this->password,$options);
        } catch (PDOException $e) {
            header("location: ./views/maintenance.php");
            exit;
        }
        
        
    }
    public function getConnection(){
        return $this->conn;
    }

    protected function query($sql,$params=[]){
        try {
            $stmt=$this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("quary failded:". $e->getMessage());
        }
    }

    protected function fetchAll($sql,$params=[]){
        $stmt=$this->query($sql,$params);
        return $stmt->fetchAll();
    }

    protected function fetch($sql,$params=[]){
        $stmt=$this->query($sql,$params);
        return $stmt->fetch();
    }
    protected function execute($sql,$params=[]){
        $stmt=$this->query($sql,$params);
        return $stmt->rowCount();
    }
    protected function lastInsertId(){
        return $this->conn->lastInsertId();
    }

}