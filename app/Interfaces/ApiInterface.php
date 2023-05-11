<?php

namespace App\Interfaces;

use App\Collections\PaginatedCollection;
use App\Models\Model;

interface ApiInterface
{
    /* Performs a GET request using cURL */
    public function get(string $url): array;

    /* Returns paginated model collection */
    public function paginate(int $page, int $perPage): PaginatedCollection;
    
    /* Get single model */
    public function getOne(string $id): Model;
}