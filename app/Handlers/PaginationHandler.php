<?php

namespace App\Handlers;

class PaginationHandler
{
    protected int $page = 1;
    
    protected int $perPage = 10;

    protected int $skip = 0;

    protected int $limit = 10;

    public function __construct(int $page = 1, int $perPage = 10)
    {
        $this->limit = $perPage;
        $this->skip = $page * $perPage;
    }

    /**
     * Get limit property
     * @return int 
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * Get skip property
     * @return int 
     */
    public function getSkip(): int
    {
        return $this->skip;
    }
}