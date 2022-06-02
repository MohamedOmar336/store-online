<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SEO extends Component
{
    public $title_ar='';
    public $title_en='';
    public $desc_ar='';
    public $desc_en='';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data = null)
    {
        if($data){
            $this->title_ar = $data->title_ar;
            $this->title_en = $data->title_en;
            $this->desc_ar = $data->desc_ar;
            $this->desc_en = $data->desc_en;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.s-e-o');
    }
}
