<?php

namespace App\Models;

use App\Html\Components\Cards\ProductCard;
use App\Models\Model;

class Product extends Model
{    
    public int $id;

    public string $title;

    public int $price;

    public float $discountPercentage;

    public float $rating;

    public int $stock;

    public string $brand;

    public string $category;

    public string $thumbnail;

    public array $images = [];

    public ProductCard $card;

    
    public function __construct(array $product)
    {
        /* Set model properties */
        foreach($product as $key => $value) {
            $this->{$key} = $value;
        }

        /* Set product card */
        $this->card = new ProductCard($this);
    }
}