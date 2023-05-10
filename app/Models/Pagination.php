<?php

namespace App\Models;

use App\Models\Model;

class Pagination extends Model
{

    /* URL */
    protected $url;

    /* Total items */
    protected int $total;
    
    /* Skip items */
    protected int $skip;

    /* Limit property (per page) */
    protected int $limit;

    public function __construct(string $url, int $total, int $skip = 0, int $limit = 10)
    {
        $this->url = $url;
        $this->total = $total;
        $this->skip = $skip;
        $this->limit = $limit;
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