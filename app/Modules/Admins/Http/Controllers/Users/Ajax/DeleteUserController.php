<?php

namespace App\Modules\Admins\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use App\Mail\Admin\UserAccountRemovedMail;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DeleteUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        Mail::to($user->email)->send(new UserAccountRemovedMail($user));

        $user->delete();
    }
}
