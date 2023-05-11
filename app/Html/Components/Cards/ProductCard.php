<?php

namespace App\Html\Components\Cards;

use App\Html\Components\Card;

class ProductCard extends Card
{
    public function __construct($model)
    {
        $this->model = $model;
        
        $this->generate();
    }

    protected function generate()
    {
        $this->html = '<div class="col">
                            <div class="card h-100">
                                <a href="product.php?id=' . $this->model->id . '">
                                    <img style="height:250px; overflow:hidden; object-fit:cover;" src="' . $this->model->thumbnail . '" class="card-img-top" alt="' . $this->model->title . '">
                                </a>    
                                <div class="card-body d-flex flex-column">
                                    <span class="badge bg-danger position-absolute top-0 end-0 mt-2 me-2">-' . ceil($this->model->discountPercentage) . '%</span>
                                    <a href="product.php?id=' . $this->model->id . '">
                                        <h5 class="card-title">' . $this->model->title . '</h5>
                                    </a>    
                                    <p class="card-text pt-2 pb-4">' . $this->model->description . '</p>
                                    <div class="d-flex justify-content-end align-items-center justify-self-end mt-auto">
                                        <div class="price__container fs-5">$<span class="price fw-bold">' . $this->model->price . '</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>';
    }
}