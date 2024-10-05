<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChatComponent extends Component
{
    public $imageUrl;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imageUrl, $title, $description)
    {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat-component');
    }
}
