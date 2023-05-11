<?php

namespace App\Models;

use App\Models\Model;
use App\Html\Components\Pagination\Links;

class Pagination extends Model
{

    /* Skip items */
    protected int $skip;

    /* Total number of items */
    protected int $total;

    /* Current page property */
    protected int $currentPage;

    /* Previous page property */
    protected int $previousPage;
    
    /* Next page property */
    protected int $nextPage;

    /* Current page URL */
    protected $currentPageUrl;

    /* Previous page URL */
    protected $previousPageUrl;

    /* Next page URL */
    protected $nextPageUrl;

    /* Items per page */
    protected int $perPage;

    /* Max number of pages */
    protected int $maxPages;

    /* Pagination links */
    public Links $links;

    public function __construct(int $total, int $limit = 10, int $skip = 0)
    {
        $this->total = $total;
        $this->perPage = $limit;
        $this->skip = $skip;
        $this->currentPage = $this->setCurrentPage();
        $this->maxPages = $this->setMaxPages();
        $this->previousPage = $this->setPreviousPage();
        $this->nextPage = $this->setNextPage();
        $this->previousPageUrl = $this->setPreviousPageUrl();
        $this->nextPageUrl = $this->setNextPageUrl();

        $this->links = new Links($this);
    }


    /**
     * Set current page property
     * @return int
    */
    protected function setCurrentPage(): int
    {
        return ceil(($this->skip + 1) / $this->perPage);
    }

    /**
     * Set maxPages property
     * @return int
    */
    protected function setMaxPages(): int
    {
        return ceil($this->total / $this->perPage);
    }
    
    /**
     * Set previousPage property
     * @return int
    */
    protected function setPreviousPage(): int
    {
        return $this->currentPage - 1;
    }

    /**
     * Set nextPage property
     * @return int
    */
    protected function setNextPage(): int
    {
        return $this->currentPage + 1;
    }

    /**
     * Set previousPageUrl property
     * @return string
    */
    protected function setPreviousPageUrl(): ?string
    {    
        if($this->previousPage == 0) {
            return null;
        }

        return $this->getPageUrl($this->previousPage);
    }

    /**
     * Set nextPageUrl property
     * @return string
    */
    protected function setNextPageUrl(): ?string
    {
        if($this->nextPage > $this->maxPages) {
            return null;
        }
        return $this->getPageUrl($this->nextPage);
    }

    /**
     * Calculate skip property (static function)
     * @return int 
     */
    public static function calculateSkip(int $page, int $perPage): int
    {
        return ($page - 1) * $perPage;
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
     * Get skip property
     * @return int 
     */
    public function getMaxPages(): int
    {
        return $this->maxPages;
    }

    /**
     * Get the current page number.
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * Get the next page number.
     *
     * @return int
     */
    public function getNextPage(): int
    {
        return $this->nextPage;
    }

    /**
     * Get the previous page number.
     *
     * @return int
     */
    public function getPreviousPage(): int
    {
        return $this->previousPage;
    }

    /**
     * Get the URL for the next page of results.
     *
     * @return string|null
     */
    public function getNextPageUrl(): ?string
    {
        return $this->nextPageUrl;
    }

    /**
     * Get the URL for the previous page of results.
     *
     * @return string|null
     */
    public function getPreviousPageUrl(): ?string
    {
        return $this->previousPageUrl;
    }

    /**
     * Get the URL for the current page of results.
     *
     * @return string
     */
    public function getCurrentPageUrl(): string
    {
        return $this->getPageUrl($this->currentPage);
    }

    /**
     * Get the URL for a specific page of results.
     *
     * @param int $skip
     * @return string
     */
    public function getPageUrl(int $page): string
    {
        /* Build base URL */
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['SCRIPT_NAME']}";
        /* Append query string and return */
        return $baseUrl . "?page={$page}&per_page={$this->perPage}";
    }
}