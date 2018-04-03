<?php
/**
 * Created by PhpStorm.
 * User: xx
 * Date: 2017/10/18
 * Time: 23:35
 */

class Db
{
    private $dbConfig=[
        'db' => 'mysql' ,
        'host' => 'localhost',
        'port'=>'3306',
        'user'=>'root',
        'pass'=>'root',
        'charset' => 'utf8',
        'dbname' => 'dlgl',
    ];

    public $insertId = null;

    public $num = 0;

    private static $instance = null;

    private $conn = null;

    private function __construct($params)
    {
        $this->dbConfig=array_merge($this->dbConfig,$params);
        $this -> connect();
    }
    private  function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance($params=[])
    {
        if(!self::$instance instanceof self){
            self::$instance=new self($params);
        }
        return self::$instance;
    }

    private function connect()
    {
        try{
            $dsn = "{$this->dbConfig['db']}:host={$this->dbConfig['host']};
            port={$this->dbConfig['port']};
            dbname={$this->dbConfig['dbname']};charset={$this->dbConfig['charset']}";

            $this->conn=new PDO($dsn,$this->dbConfig['user'],$this->dbConfig['pass']);

            $this->conn->query("SET NAMES {$this->dbConfig['charset']}");
        }catch (PDOException $e){
            die("数据库链接失败".$e->getMessage());
        }
    }

    public function exec($sql)
    {
       $num= $this->conn->exec($sql);
        if($num>0){
            if(null != $this->conn->lastInsertId()){

                $this->insertId = $this->conn->lastInsertId();
            }
            $this ->num = $num;
        }else{
            $error =  $this->conn->errorInfo();
            print '操作是失败'.$error[0].':'.$error[1].':'.$error[2];
        }
    }

    public function fetch($sql)
    {
        return $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql)
    {
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}