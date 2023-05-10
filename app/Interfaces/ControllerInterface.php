<?php

namespace App\Interfaces;

use App\Collections\Collection;
use App\Models\Model;

interface ControllerInterface
{
    /* Returns model collection */
    public function index(): Collection;

    /* Returns single model by id */
    // public function show(int $id): Model;
}