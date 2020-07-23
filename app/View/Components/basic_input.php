<?php

namespace App\View\Components;

use Illuminate\View\Component;

class basic_input extends Component
{
    public string $attr_name;
    public string $input_type;
    public string $input_name;
    public string $step_calculus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $attr_name, string $input_type, string $input_name, $step_calculus = 0.1)
    {
        $this->attr_name = $attr_name;
        $this->input_type = $input_type;
        $this->input_name = $input_name;
        $this->step_calculus = $step_calculus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.basic_input');
    }
}
