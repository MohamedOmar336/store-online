<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Add extends Component
{
    public $route;
    public $flag;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route = '#', $flag = 0)
    {
        $this->route = $route;
        $this->flag = $flag;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add');
    }
}
