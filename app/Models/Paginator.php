<?php

namespace App\Models;

use App\Models\Model;

class Paginator extends Model
{

    protected int $total;
    protected int $skip;
    protected int $limit;

    public function __construct(int $total, int $skip = 0, int $limit = 10)
    {
        $this->total = $total;
        $this->skip = $skip;
        $this->limit = $limit;
    }
}