<?php 

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;
class groups extends MysqlBaseModel{
    protected $table = "groups";
    protected $pageSize = 50000000000;
}

?>