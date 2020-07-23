<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button_create extends Component
{
    /**
     * El nombre de la ruta a la que va conectada. Ej: docente.index
     * @var string
     */
    public $action_route;

    /**
     * El id del modal si posee uno
     * @var string
     */
    public $modal_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action_route = '#', $modal_id = null)
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
        return view('components.button_create');
    }
}
