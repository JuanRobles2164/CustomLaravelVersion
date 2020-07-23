<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form_button_create extends Component
{
    public string $content_phrase;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $content_phrase = 'Crear')
    {
        $this->content_phrase = $content_phrase;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form_button_create');
    }
}
