<?php

namespace App\Modules\Admins\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForceDeleteUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        dd($request->input());
    }
}
