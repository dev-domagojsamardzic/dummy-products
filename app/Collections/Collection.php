<?php

namespace App\Collections;

use App\Interfaces\CollectionInterface;
use App\Models\Pagination;

abstract class Collection implements CollectionInterface
{
    /* Collection items */
    public array $items = [];

    /* Collection paginator */
    public Pagination $pagination;

    /**
     * Check if collection is empty
     * @return bool
    */
    public function isEmpty(): bool
    {
        return count($this->items) == 0;
    }
}