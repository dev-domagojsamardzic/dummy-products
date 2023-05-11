<?php

namespace App\Models;

use App\Models\Model;
use App\Html\Components\Pagination\Links;

class Pagination extends Model
{

    /* Current page property */
    protected int $page;

    /* Per page property */
    protected int $perPage;

    /* Limit property (per page) */
    protected int $limit;
    
    /* Skip items */
    protected int $skip;

    /* Total items */
    protected int $total = 0;

    /* Pagination links */
    public Links $links;

    public function __construct(int $total, int $limit = 10, int $skip = 0)
    {
        $this->total = $total;
        $this->limit = $limit;
        $this->skip = $skip;

        $this->links = new Links($this);
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

    /**
     * Calculate skip property
     * @return int 
     */
    public static function calculateSkip(int $page, int $perPage): int
    {
        return ($page - 1) * $perPage;
    }

    /**
     * Get the current page number.
     *
     * @return int
     */
    public function getCurrentPage(): int
    {
        return ceil(($this->skip + 1) / $this->limit);
    }

    /**
     * Get the next page number.
     *
     * @return int
     */
    public function getNextPage(): int
    {
        if ($this->skip + $this->limit >= $this->total) {
            return $this->getCurrentPage();
        }

        return $this->getCurrentPage() + 1;
    }

    /**
     * Get the previous page number.
     *
     * @return int
     */
    public function getPreviousPage(): int
    {
        if ($this->skip - $this->limit < 0) {
            return $this->getCurrentPage();
        }

        return $this->getCurrentPage() - 1;
    }

    /**
     * Get the URL for the next page of results.
     *
     * @return string|null
     */
    public function getNextPageUrl(): ?string
    {
        $nextSkip = $this->skip + $this->limit;
        if ($nextSkip >= $this->total) {
            return null;
        }
        return $this->getPageUrl($nextSkip);
    }

    /**
     * Get the URL for the previous page of results.
     *
     * @return string|null
     */
    public function getPreviousPageUrl(): ?string
    {
        $prevSkip = $this->skip - $this->limit;
        if ($prevSkip < 0) {
            return null;
        }
        return $this->getPageUrl($prevSkip);
    }

    /**
     * Get the URL for the current page of results.
     *
     * @return string
     */
    public function getCurrentPageUrl(): string
    {
        return $this->getPageUrl($this->skip);
    }

    /**
     * Get the URL for a specific page of results.
     *
     * @param int $skip
     * @return string
     */
    protected function getPageUrl(int $skip): string
    {
        return "https://dummyjson.com/products?limit={$this->limit}&skip={$skip}";
    }
}