<?php

namespace App\Collections;

use App\Collections\PaginatedCollection;
use App\Models\Product;

class ProductCollection extends PaginatedCollection
{

    public function __construct(array $data)
    {

        /* Exit function if items are empty */
        if(count($data['products']) == 0) {
            return;
        }

        /* Set items property */
        foreach($data['products'] as $product) {
            $this->items[] = new Product($product);
        }

    }

}