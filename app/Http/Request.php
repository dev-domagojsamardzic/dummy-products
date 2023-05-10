<?php

namespace App\Http;


class Request
{
    private string $method;
    private string $queryString;
    private string $path;
    private array $queryParams = [];

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->queryString = $_SERVER['QUERY_STRING'];
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        parse_str($this->queryString, $this->queryParams);
    }

    /**
     * Get request method
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Get query string
     * @return string
     */
    public function getQueryString(): string
    {
        return $this->queryString;
    }

    /**
     * Get path
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get array of request parameters
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /** 
     * Return query string parameter by key
     * @return string|null
    */
    public function getQueryStringParam(string $key): ?string {
        return isset($this->queryParams[$key]) ? $this->queryParams[$key] : null;
    }
}
