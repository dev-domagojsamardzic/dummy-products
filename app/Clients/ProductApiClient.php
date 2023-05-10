<?php

namespace App\Clients;

use App\Collections\ProductCollection;
use App\Models\Model;
use App\Models\Product;
use App\Handlers\PaginationHandler;

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

    /**
     * Performs a GET request and returns a paginated Product collection
     * @return App\Collections\ProductCollection
    */  
    public function paginate(int $page, int $perPage): ProductCollection
    {

        $paginationHandler = new PaginationHandler($page, $perPage);
        
        $url = self::BASE_URL . "/products?limit=" . $paginationHandler->getLimit() . "&skip=" . $paginationHandler->getSkip();
        
        $response = $this->get($url);
        
        return new ProductCollection($response);
    }

    public function getOne(string $id): Model
    {

        return new Product([]);
    }
}