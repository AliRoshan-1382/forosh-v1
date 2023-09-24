<?php

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;

class report extends MysqlBaseModel
{
    protected $table = "reports";
    protected $pageSize = 50000000000;
}
