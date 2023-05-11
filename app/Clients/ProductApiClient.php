<?php

namespace App\Clients;

use App\Collections\PaginatedCollection;
use App\Collections\ProductCollection;
use App\Models\Model;
use App\Models\Product;
use App\Models\Pagination;

class ProductApiClient extends ApiClient
{
    /* API Base URL */
    private const BASE_URL = 'https://dummyjson.com';


    /**
     * Performs a GET request and returns a paginated Product collection
     * @return App\Collections\ProductCollection
    */  
    public function paginate(int $page, int $perPage): PaginatedCollection
    {
        /* Calculate skip property */
        $skip = Pagination::calculateSkip($page, $perPage);
        /* Define URL */
        $url = self::BASE_URL . "/products?limit=" . $perPage . "&skip=" . $skip;
        /* Get request */
        $response = $this->get($url);
        /* Create ProductCollection */
        $collection = new ProductCollection($response);

        return $collection;
    }

    public function getOne(string $id): Model
    {
        return new Product([]);
    }
}