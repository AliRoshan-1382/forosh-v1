<?php 

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;
class User extends MysqlBaseModel{
    protected $table = "users";
    protected $pageSize = 500000000;
}

?>