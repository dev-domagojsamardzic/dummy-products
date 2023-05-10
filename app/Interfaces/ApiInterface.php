<?php

namespace App\Interfaces;

use App\Collections\Collection;
use App\Models\Model;

interface ApiInterface
{
    /* Performs a GET request using cURL */
    public function get(string $url): array;
    
    /* Returns a model collection */
    public function getAll(): Collection;
    
    /* Get single model */
    public function getOne(string $id): Model;
}