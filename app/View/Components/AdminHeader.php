<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class AdminHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $email;

    public function __construct()
    {
        //
        $data = User::where('id', '=', session('LoggedUser'))->first(['id', 'name', 'email']);
        $this->name = $data->name;
        $this->email = $data->email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-header');
    }
}
