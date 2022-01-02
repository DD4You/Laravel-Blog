<?php

namespace App\View\Components;

use App\Models\AdminUser;
use Illuminate\View\Component;

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
        $data = AdminUser::where('id', '=', session('LoggedAdminUser'))->first(['id', 'name', 'email']);
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
