<?php

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;

class product extends MysqlBaseModel
{
    protected $table = "product";
    protected $pageSize = 50000000000;
}
