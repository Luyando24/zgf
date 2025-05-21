<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    public $src;
    public $alt;
    public $class;
    public $decorative;

    public function __construct($src, $alt = null, $class = '', $decorative = false)
    {
        $this->src = $src;
        $this->alt = $alt;
        $this->class = $class;
        $this->decorative = $decorative;
    }

    public function render()
    {
        return view('components.image');
    }
}