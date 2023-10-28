<?php

namespace App\Modules\Admins\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminAuthLayout extends Component
{
    public function render(): View
    {
        return view('admin.layouts.auth');
    }
}
