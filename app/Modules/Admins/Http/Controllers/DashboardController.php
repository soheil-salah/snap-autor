<?php

namespace App\Modules\Admins\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $list = [
            [
                'name' => 'John Smith',
                'age' => 'N/A'
            ],
            [
                'name' => 'Jab The Lab',
                'age' => '39'
            ],
            [
                'name' => 'James Bond',
                'age' => 'secret'
            ],
        ];

        return view('admin.dashboard', compact('list'));
    }
}
