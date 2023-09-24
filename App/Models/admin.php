<?php 

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;
class admin extends MysqlBaseModel{
    protected $table = "admin";
    protected $pageSize = 500000000;
}

?>