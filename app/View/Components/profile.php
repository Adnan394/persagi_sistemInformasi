<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\daftarAnggota;

class profile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $id)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = daftarAnggota::where('user_id', $this->id)->first();
        return view('components.profile', ['data' => $data]);
    }
}

