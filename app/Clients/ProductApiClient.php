<?php

namespace App\Clients;

use App\Collections\ProductCollection;
use App\Models\Model;
use App\Models\Product;

class ProductApiClient extends ApiClient
{
    /* API Base URL */
    private const BASE_URL = 'https://dummyjson.com';

    /**
     * Performs a GET request and returns a Product collection
     * @return App\Collections\ProductCollection
    */    
    public function getAll(): ProductCollection
    {
        /* Create url */
        $url = self::BASE_URL . "/products";

        /* Send get request */
        $response = $this->get($url);

        /* Make a product collection */
        $collection = new ProductCollection($response);

        return $collection;
    }

    public function getOne(string $id): Model
    {

        return new Product([]);
    }
}