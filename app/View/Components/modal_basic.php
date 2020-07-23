<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal_basic extends Component
{
    public string $modal_title;
    public string $modal_type;
    public string $modal_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $modal_title = 'Agregar', string $modal_type = 'create', string $modal_id = '#')
    {
        $this->modal_title = $modal_title;
        $this->modal_type = $modal_type;
        $this->modal_id = $modal_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal_basic');
    }
}
