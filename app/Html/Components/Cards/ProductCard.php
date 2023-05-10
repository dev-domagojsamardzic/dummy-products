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
                                <img style="height:250px; overflow:hidden; object-fit:cover;" src="' . $this->model->thumbnail . '" class="card-img-top" alt="' . $this->model->title . '">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">' . $this->model->title . '</h5>
                                    <p class="card-text pt-2 pb-4">' . $this->model->description . '</p>
                                    <a href="#" class="btn btn-primary justify-self-end mt-auto">View</a>
                                </div>
                            </div>
                        </div>';
    }
}