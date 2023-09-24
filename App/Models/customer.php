<?php 

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;
class customer extends MysqlBaseModel{
    protected $table = "customer";
    protected $pageSize = 50000000000;
}

?>