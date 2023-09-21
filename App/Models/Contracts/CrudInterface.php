<?php 

namespace App\Models\Contracts;

interface CrudInterface{

    public function create(array $data) : int; //Insert
    
    public function find($id) : object; //Select
    public function get($columns ,array $where) : array; //Select


    public function update(array $data ,array $where) : int;


    public function delete(array $where) : int;
}

?>