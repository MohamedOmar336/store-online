<?php

namespace App\View\Components;

use Illuminate\View\Component;

class changeStatus extends Component
{

    public $route;
    public $id;
    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route = '#', $id=0 , $status=0)
    {
        $this->route = $route;
        $this->id = $id;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.change-status');
    }
}
