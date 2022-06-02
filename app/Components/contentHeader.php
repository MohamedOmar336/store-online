<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class contentHeader extends Component
{
    public $pageName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageName = '')
    {
        $this->pageName = $pageName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.content-header');
    }
}
