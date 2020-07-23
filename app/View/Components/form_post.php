<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form_post extends Component
{
    public string $action_route;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $action_route = '#')
    {
        $this->action_route = $action_route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form_post');
    }
}
