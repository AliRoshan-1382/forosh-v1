<?php

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;

class factor extends MysqlBaseModel
{
    protected $table = "factor";
    protected $pageSize = 50000000000;
}
