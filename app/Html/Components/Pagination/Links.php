<?php

namespace App\Html\Components\Pagination;

use App\Html\Component;

class Links extends Component
{

    public function __construct($model)
    {
        $this->model = $model;
        
        $this->generate();
    }

    protected function generate()
    {
        $this->html = '<nav aria-label="Page navigation example">
                            <ul class="pagination">' 
                                . $this->previousButton() 
                                . $this->paginationButtons() 
                                . $this->nextButton() . 
                            '</ul>
                        </nav>';
    }

    protected function previousButton()
    {
        return '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
    }

    protected function paginationButtons()
    {
        return '<li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>'; 
    }

    protected function nextButton()
    {
        return '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
    }
    
}