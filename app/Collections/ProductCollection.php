<?php

namespace App\Collections;

use App\Collections\Collection;
use App\Models\Product;
use App\Models\Paginator;

class ProductCollection extends Collection
{

    public function __construct(array $response)
    {
        $this->setItems($response['products']);
        $this->setPaginator($response['total'], $response['skip'], $response['limit']);
    }

    /**
     * Set collection $items property
     * @param array $items
     * @return array
    */
    protected function setItems(array $items = []): void
    {
        /* Exit function if items are empty */
        if(count($items) == 0) {
            return;
        }
        /* Set items property */
        foreach($items as $product) {
            $this->items[] = new Product($product);
        }
    }
    /**
     * Set collection paginator
     * @param int $total
     * @param int $skip
     * @param int $limit
    */
    protected function setPaginator(int $total, int $skip, int $limit): void
    {
        $this->paginator = new Paginator($total, $skip, $limit);
    }
}