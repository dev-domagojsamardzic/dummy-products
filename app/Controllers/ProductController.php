<?php

namespace App\Controllers;

use App\Clients\ApiClient;
use App\Clients\ProductApiClient;
use App\Collections\Collection;
use App\Collections\ProductCollection;

class ProductController
{
    /* API client */
    protected ApiClient $apiClient;
    
    public function __construct()
    {
        $this->apiClient = new ProductApiClient();
    }
    
    /**
     * Get all products 
     * @return ProductCollection
    */
    public function index(): ProductCollection
    {
        /* Get collection of products */
        $result = $this->apiClient->getAll();
        
        return $result;
    }
}