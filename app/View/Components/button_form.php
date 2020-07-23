<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button_form extends Component
{
    public string $button_type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $button_type = 'create')
    {
        $this->button_type = $button_type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button_form');
    }
}
