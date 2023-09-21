<?php 

namespace App\Models\Contracts;
use Medoo\Medoo;
class MysqlBaseModel extends BaseModel{

    public function __construct($id = null)
    {
        try {
            // $this->connection = new \PDO("mysql:dbname={$_ENV['MainDataBase']};host={$_ENV['DBHost']}",$_ENV['Username'],$_ENV['Password']);
            // $this->connection->exec("set names utf8;");

            $this->connection  = new Medoo([
                'type'=>'mysql',
                'host'=>$_ENV['DBHost'],
                'database'=>$_ENV['MainDataBase'],
                'username'=>$_ENV['Username'],
                'password'=>$_ENV['Password'],


                'charset'=>'utf8mb4',
                'collation'=>'utf8mb4_general_ci',
                'port'=>3306,


                'prefix'=>'',


                'logging'=>true,


                'error'=> \PDO::ERRMODE_EXCEPTION,


                'command'=>[
                    'SET SQL_MODE=ANSI_QUOTES'
                ],
                
            ]);
        } 
        catch (PDOException $e) {
            echo "mother fucker";
        }
        if (!is_null($id)) {
            return $this->find($id);   
        }
    }

    public function remove(): int
    {
        $record_id = $this->{$this->primaryKey};
        return $this->delete([$this->primaryKey => $record_id]);
    }

    public function save()
    {
        $record_id = $this->{$this->primaryKey};
        $this->update($this->attributes,[$this->primaryKey => $record_id]);
        return $this->find($record_id);
    }

    public function create(array $data) : int //Insert
    {
        $this->connection->insert($this->table ,$data);
        return $this->connection->id();
    }
    
    public function find($id) : object //Select
    {
        $record = $this->connection->get($this->table , '*' , [$this->primaryKey => $id]);
        
        if (is_null($record)) 
            return new \stdClass;
        
        foreach ($record as $col => $val) 
            $this->attributes[$col] = $val;
        return $this;
    }

    public function getAll() : array //Select
    {
        return $this->get('*', []);
    }

    public function get($columns ,array $where) : array //Select
    {
        $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
        $start = ($page-1) * $this->pageSize;
        $where['LIMIT'] = [$start,$this->pageSize];
        return $this->connection->select($this->table, $columns,$where);
    }

    public function update(array $data ,array $where) : int
    { 
        $result = $this->connection->update($this->table, $data, $where);
        return $result->rowCount();
    }

    public function delete(array $where) : int
    {
        $result = $this->connection->delete($this->table, $where);
        return $result->rowCount(); 
    }

    public function count(array $where) : int
    {
        return $this->connection->count($this->table, $where);
    }

    public function sum($column, array $where) : int
    {
        return $this->connection->sum($this->table,$column , $where);
    }
}

?>