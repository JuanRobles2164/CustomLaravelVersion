<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form_select_list extends Component
{
    public string $attr_name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $attr_name)
    {
        $this->attr_name = $attr_name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form_select_list');
    }
}
