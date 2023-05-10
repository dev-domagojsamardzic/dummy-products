<?php

namespace App\Controllers;

use App\Clients\ApiClient;
use App\Clients\ProductApiClient;
use App\Collections\ProductCollection;

class ProductController extends Controller
{
    /* API client */
    protected ApiClient $apiClient;
    
    public function __construct()
    {
        parent::__construct();

        $this->apiClient = new ProductApiClient();
    }
    
    /**
     * Get all products 
     * @return ProductCollection
    */
    public function index(): ProductCollection
    {
        /* Get pagination parameters */
        $page = $this->request->getQueryStringParam('page');
        $perPage = $this->request->getQueryStringParam('per_page');

        /* Get paginated collection of products */
        $result = $this->apiClient->paginate($page, $perPage);
        
        return $result;
    }
}