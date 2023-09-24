<?php

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;

class category extends MysqlBaseModel
{
    protected $table = "category";
    protected $pageSize = 50000000000;
}
