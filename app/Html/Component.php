<?php

namespace App\Html;

use App\Interfaces\HtmlInterface;
use App\Models\Model;

abstract class Component implements HtmlInterface
{
    /* Model attribute */
    protected Model $model;
    
    /* HTML attribute */
    public string $html;

    /**
     * Render HTML component
     * @return void
    */
    public function render(): void
    {
        echo $this->html;
    }
}