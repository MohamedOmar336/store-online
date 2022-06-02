<?php

namespace App\View\Components;

use Illuminate\View\Component;

class changeStatusActive extends Component
{
    public $id;
    public $name;
    public $oldStatus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id , $name ,$oldStatus)
    {
        $this->id = $id;
        $this->name = $name;
        $this->oldStatus = $oldStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.change-status-active');
    }
}
