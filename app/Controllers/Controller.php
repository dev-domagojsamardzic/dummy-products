<?php

namespace App\Controllers;

use App\Http\Request;
use App\Interfaces\ControllerInterface;

abstract class Controller implements ControllerInterface
{
    /* Request object */
    protected Request $request;
    
    public function __construct()
    {
        $this->request = new Request();
    }
}