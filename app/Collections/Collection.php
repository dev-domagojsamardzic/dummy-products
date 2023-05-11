<?php

namespace App\Collections;

use App\Interfaces\CollectionInterface;

abstract class Collection implements CollectionInterface
{

    /* Collection items */
    public array $items = [];

    /**
     * Check if collection is empty
     * @return bool
    */
    public function isEmpty(): bool
    {
        return count($this->items) == 0;
    }
}