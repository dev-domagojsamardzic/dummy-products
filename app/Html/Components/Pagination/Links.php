<?php

namespace App\Html\Components\Pagination;

use App\Html\Component;
use App\Models\Pagination;

class Links extends Component
{
    protected Pagination $pagination;
    
    public function __construct(Pagination $pagination)
    {
        $this->pagination = $pagination;
        $this->generate();
    }

    /**
     * Generate component HTML
     * @return string
     */
    protected function generate(): void
    {
        $this->html =   '<div class="w-full d-flex align-items-center justify-content-center py-4">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">' 
                                    . $this->previousButton() 
                                    . $this->paginationButtons() 
                                    . $this->nextButton() . 
                                '</ul>
                            </nav>
                        </div>';
    }

    /**
     * Generate previous pagination button
     * @return string
     */
    protected function previousButton(): string
    {
        /* Check if button should be disabled disabled */
        $disabled = ($this->pagination->getPreviousPageUrl() === null) ? 'disabled' : '';
        return '<li class="page-item ' . $disabled . '"><a class="page-link" href="' . $this->pagination->getPreviousPageUrl() . '">Previous</a></li>';
    }

    /**
     * Generate numeric pagination buttons
     * @return string
     */
    protected function paginationButtons(): string
    {
        /* Init buttons array */
        $buttons = [];

        for($i = 1; $i <= $this->pagination->getMaxPages(); $i++) {
            /* Check if button is active */
            $active = ($this->pagination->getCurrentPage() == $i) ? 'active' : '';
            /* Append button to array */
            $buttons[] = '<li class="page-item ' . $active . '"><a class="page-link" href="' . $this->pagination->getPageUrl($i) . '">' . $i . '</a></li>';
        }

        return implode($buttons);
    }

    /**
     * Generate next pagination button
     * @return string
     */
    protected function nextButton()
    {
        /* Check if button should be disabled */
        $disabled = ($this->pagination->getNextPageUrl() === null) ? 'disabled' : '';
        return '<li class="page-item ' . $disabled . '"><a class="page-link" href="' . $this->pagination->getNextPageUrl() . '">Next</a></li>';
    }
    
}