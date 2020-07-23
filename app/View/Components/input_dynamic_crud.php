<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input_dynamic_crud extends Component
{
    public $model;
    public array $model_attributes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Object $model)
    {
        $this->model = $model;
        $this->model_attributes = $model->GetCrudableAttributes();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input_dynamic_crud');
    }
}
