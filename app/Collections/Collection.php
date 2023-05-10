<?php

namespace App\Collections;

use App\Interfaces\CollectionInterface;
use App\Models\Paginator;

abstract class Collection implements CollectionInterface
{
    /* Collection items */
    public array $items = [];

    /* Collection paginator */
    public Paginator $paginator;

    /**
     * Check if collection is empty
     * @return bool
    */
    public function isEmpty(): bool
    {
        return count($this->items) == 0;
    }
}