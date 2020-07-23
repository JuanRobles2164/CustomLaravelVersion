<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button_details extends Component
{
    public string $action_route;
    public $modal_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $action_route = '#', $modal_id = null)
    {
        $this->action_route = $action_route;
        $this->modal_id = $modal_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button_details');
    }
}
