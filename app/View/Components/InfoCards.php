<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoCards extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name, $icon, $count, $color;
    public function __construct($name, $icon, $count, $color)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->count = $count;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.info-cards');
    }
}
