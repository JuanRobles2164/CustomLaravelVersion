<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button_delete extends Component
{
    /**
     * Cadena que representa la acción a ejecutar
     * @var string
     */
    public $action_route;
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
        return view('components.button_delete');
    }
}
