<?php

namespace App\Collections;

use App\Collections\Collection;
use App\Models\Pagination;

class PaginatedCollection extends Collection
{
    /* Collection paginator */
    public Pagination $pagination;

    public function __construct(array $data)
    {
        $this->pagination = new Pagination($data['total'], $data['limit'], $data['skip']);
    }
}